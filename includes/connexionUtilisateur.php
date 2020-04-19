<?php


if (isset($_POST['submit'])) {
    $db = new PDO('mysql:host=localhost;dbname=FOCUS2', 'root', 'root');

    $emailUtilisateur = $_POST['emailUtilisateur'];
    $mdpUtilisateur = $_POST['mdpUtilisateur'];


    $sql = "SELECT * FROM Utilisateur WHERE MailUtilisateur = '$emailUtilisateur'";
    $res = $db->prepare($sql);
    $res->execute();
    $resultat = $res->fetch();

    // Comparaison du pass envoyé via le formulaire avec la base de données
    $isPasswordCorrect = password_verify($mdpUtilisateur, $resultat['MotDePasseUtilisateur']);

    if (!$resultat)
    {
        header("Location: ../Connexion.php?connexion=failed");
    }
    else
    {
        if ($isPasswordCorrect) {
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
        }
        else {
            header("Location: ../Connexion.php?connexion=failed");
        }
    }

}

