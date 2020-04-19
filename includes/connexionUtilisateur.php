<?php


if (isset($_POST['submit'])) {
    $db = new PDO('mysql:host=localhost;dbname=FOCUS2', 'root', 'root');

    $emailUtilisateur = $_POST['emailUtilisateur'];
    $mdpUtilisateur = $_POST['mdpUtilisateur'];


    // Requete cas mail = mail utilisateur
    $sql = "SELECT * FROM Utilisateur WHERE MailUtilisateur = '$emailUtilisateur'";
    $res = $db->prepare($sql);
    $res->execute();
    $resultat = $res->fetch();
    // Comparaison du pass envoyé via le formulaire avec la base de données
    $isPasswordCorrect = password_verify($mdpUtilisateur, $resultat['MotDePasseUtilisateur']);


    // Requete cas mail = mail administrateur
    $sql2 = "SELECT * FROM Administrateur WHERE MailAdministrateur = '$emailUtilisateur'";
    $res2 = $db->prepare($sql2);
    $res2->execute();
    $resultat2 = $res2->fetch();

    //TODO
    // Hacher mot de passe du compte administrateur de la meme facon que pour l'utilisateur


    // Session Utilisateur
    if ($resultat AND $isPasswordCorrect) {
        header("Location: ../ProfilUtilisateur.php?connexion=succes");
        session_start();
        $_SESSION['idUtilisateur'] = $resultat['idUtilisateur'];
        $_SESSION['PrenomUtilisateur'] = $resultat['PrenomUtilisateur'];
        $_SESSION['NomUtilisateur'] = $resultat['NomUtilisateur'];
        $_SESSION['AgeUtilisateur'] = $resultat['AgeUtilisateur'];
        $_SESSION['MailUtilisateur'] = $resultat['MailUtilisateur'];
        $_SESSION['NombreTestsUtilisateur'] = $resultat['NombreTestsUtilisateur'];
        $_SESSION['NombrePointsUtilisateur'] = $resultat['NombrePointsUtilisateur'];
        $_SESSION['DateInscription'] = $resultat['DateInscription'];
    } else if ($resultat AND !$isPasswordCorrect) {
        header("Location: ../Connexion.php?connexion=failed");
    }
    // Session Administrateur
    else if ($resultat2 AND $mdpUtilisateur == $resultat2['MotDePasseAdministrateur']){
        header("Location: ../ProfilAdmin.php?connexion=succes");
        session_start();
        $_SESSION['idAdministrateur'] = $resultat2['idAdministrateur'];
        $_SESSION['PrenomAdministrateur'] = $resultat2['PrenomAdministrateur'];
        $_SESSION['NomAdministrateur'] = $resultat2['NomAdministrateur'];
        $_SESSION['PosteAdministrateur'] = $resultat2['PosteAdministrateur'];
    }
    else {
        header("Location: ../Connexion.php?connexion=failed");
    }

}

