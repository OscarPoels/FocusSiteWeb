<?php
session_start();

if (!isset($_GET['vue'])) {
    $vue = 'Acceuil';
} else {
    switch ($_GET['vue']) {

        case 'Acceuil':
            $vue = 'Acceuil';
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

                $mdp = password_hash($mdp, PASSWORD_DEFAULT);
                $option = inscription($prenom, $nom, $mail, $mdp, $avatar);

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
                    $vue = 'connexion';
                    $option = '?connexion=failed';
                } else {
                    if ($isPasswordCorrect) {
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
                $mail = $_POST['mail'];
                $newMdp = $_POST['newMdp'];
                $mdp = $_POST['mdp'];
                $id = $_SESSION['id'];

                $newMdp = password_hash($newMdp, PASSWORD_DEFAULT);

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
                $retour = mail('o.poels@gmail.com', 'Envoi depuis la page de contact',
                    "Id utilisateur : ".$_SESSION['id']." "."Mail utilisateur : ".$_SESSION['mail']." ".$_POST['sujet']." ".$_POST['demande'],
                    'From : webmaster@focus.fr');
                if ($retour) {
                    $option = '?mail=correct';
                } else {
                    $option = '?mail=fail';
                }
            }
            break;
    }
}

header("Location: ../vue/$vue.php$option");



