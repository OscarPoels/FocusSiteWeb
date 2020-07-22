<?php
session_start();

if (!isset($_GET['vue'])) {
    $vue = 'Accueil';
    $option = '';
} else {
    switch ($_GET['vue']) {

        case 'Accueil':
            $vue = 'Accueil';
            $option = '';
            break;

        case 'Inscription':
            $vue = 'Inscription';
            $option = '';
            if (isset($_GET['Inscription'])) {
                $option = '?Inscription=' . $_GET['Inscription'];
            }
            if (isset($_POST['submit'])) {
                include("../modele/db.inc.php");

                $prenom = htmlspecialchars($_POST['prenom']);
                $nom = htmlspecialchars($_POST['nom']);
                $mail = $_POST['mail'];
                $mdp = $_POST['mdp'];
                $avatar = 'defaut.png';
                $code = $_POST['CodeTest'];

                $CodeInscriptionUtil = array('00000000','00000001');
                $CodeInscriptionGestio = array('10000000','11000000');


                for($i = 0; $i < count($CodeInscriptionUtil); $i++ ){
                    if($CodeInscriptionUtil[$i] == $code){
                        $code = "util";
                    }
                    else if($CodeInscriptionGestio[$i] == $code){
                        $code = "gestio";
                    }
                }
                if($code == "util") {
                    $mdp = password_hash($mdp, PASSWORD_DEFAULT);
                    $option = inscriptionUtil($prenom, $nom, $mail, $mdp, $avatar);
                }  else if($code == "gestio"){
                    $mdp = password_hash($mdp, PASSWORD_DEFAULT);
                    $option = inscriptionGestio($prenom, $nom, $mail, $mdp, $avatar);
                } else{
                    $option = "?inscription=code";
                }

            } else {
                echo 'ERREUR';
            }
            break;
        case 'Connexion':
            if (isset($_POST['submit'])) {
                $mail = $_POST['mail'];
                $mdp = $_POST['mdp'];
                include("../modele/db.co.php");

                list ($resultat, $isPasswordCorrect) = connexion($mail, $mdp);


                if (!$resultat) {
                    list ($resultat, $isPasswordCorrect) = connexionGestio($mail, $mdp);
                    if(!$resultat){
                        $vue = 'connexion';
                        $option = '?connexion=failed';
                    }
                    else{
                        if ($isPasswordCorrect) {
                            $_SESSION['idGestio'] = $resultat['id'];
                            $_SESSION['nom'] = $resultat['nom'];
                            $_SESSION['prenom'] = $resultat['prenom'];
                            $_SESSION['mail'] = $resultat['mail'];
                            $_SESSION['avatar'] = $resultat['avatar'];

                            $vue = 'ProfilGestio';
                        }else {
                            $vue = 'connexion';
                            $option = '?connexion=failed';
                        }
                    }
                } else {
                    if ($isPasswordCorrect) {
                        if ($mail == 'marceau.gerardin@focus.fr'
                            || $mail == 'oscar.poels@focus.fr'
                            || $mail == 'gabriel.ferrier@focus.fr') {
                            $_SESSION['idAdmin'] = $resultat['id'];
                            $_SESSION['prenomAdmin'] = $resultat['prenom'];
                            $_SESSION['nomAdmin'] = $resultat['nom'];
                            $_SESSION['posteAdmin'] = $resultat['poste'];
                            $_SESSION['avatarAdmin'] = $resultat['avatar'];

                            $vue = 'ProfilAdmin';
                            break;
                        } else {
                            $_SESSION['id'] = $resultat['id'];
                            $_SESSION['nom'] = $resultat['nom'];
                            $_SESSION['prenom'] = $resultat['prenom'];
                            $_SESSION['mail'] = $resultat['mail'];
                            $_SESSION['nombreTest'] = $resultat['nombreTest'];
                            $_SESSION['points'] = $resultat['points'];
                            $_SESSION['avatar'] = $resultat['avatar'];
                            $_SESSION['age'] = $resultat['age'];
                            $_SESSION['dateInscription'] = $resultat['dateInscription'];

                            $vue = 'ProfilUtilisateur';
                            break;
                        }
                    } else {
                        $vue = 'connexion';
                        $option = '?connexion=failed';
                    }
                }
            }
            break;

        case 'ProfilUtilisateur':
            $vue = 'ProfilUtilisateur';
            break;

        case 'modificationProfilUtilisateur':
            $vue = 'modificationProfilUtilisateur';
            if (isset($_POST['submit'])) {
                include('../modele/db.modification.php');
                include('../modele/db.co.php');
                $prenom = htmlspecialchars($_POST['prenom']);
                $nom = htmlspecialchars($_POST['nom']);
                $newMdp = $_POST['newMdp'];
                $mail = $_POST['mail'];
                $mdp = $_POST['mdp'];
                $id = $_SESSION['id'];
                list ($resultat, $isPasswordCorrect) = connexionModif($mdp);
                if (!$resultat) {
                    $option = '?erreur=true';
                } else {
                    if ($isPasswordCorrect) {
                        $option = modification($id, $prenom, $nom, $mail, $newMdp);
                        $_SESSION['nom'] = $nom;
                        $_SESSION['prenom'] = $prenom;
                        $_SESSION['mail'] = $mail;
                    } else {
                        $option = '?mdp=false';
                    }
                }
            }
            break;
        case 'ContactAdmin':
            $vue = 'ContactAdmin';
            if (isset($_POST['submit'])) {
                $retour = mail('o.poels@gmail.com', 'Envoi depuis la page de contact [Utilisateur]',
                    "Id utilisateur : " . $_SESSION['id'] . " " . "Mail utilisateur : " . $_SESSION['mail'] . " " . $_POST['sujet'] . " " . $_POST['demande'],
                    'From : webmaster@focus.fr');
                if ($retour) {
                    $option = '?mail=correct';
                } else {
                    $option = '?mail=fail';
                }
            }
            break;
        case 'ConditionsUtilisation':
            $vue = 'ConditionsUtilisation';
            break;
        case 'testEcritureFAQ':
            if (isset($_SESSION['id'])) {
                $vue = 'FAQEcrire';
            } else {
                $vue = 'Connexion';
            }
            break;
        case 'MdpOublie':
            $vue = 'Connexion';
            $option = '?MdpOublie=true';
            if(isset($_POST['submit'])) {
                $retour = mail('o.poels@gmail.com', 'Réinitialiser le mot de passe',
                    $_POST['mail'],
                    'From : webmaster@focus.fr');
            }
    }
}

header("Location: ../vue/$vue.php$option");



