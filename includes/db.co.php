<?php
session_start();

if (isset($_POST['submit'])) {
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];

    $mdp = password_hash($mdp, PASSWORD_DEFAULT);

    $db = new PDO('mysql:host=localhost;dbname=focus', 'root', '');

    $sql = "SELECT * FROM utilisateur WHERE mail = '$mail'";
    $res = $db->prepare($sql);
    $res->execute();
    $resultat = $res->fetch();

    $isPasswordCorrect = password_verify($_POST['mdp'], $resultat['mdp']);

    if (!$resultat)
    {
        header("Location: ../connexion.php?connexion=failed");
    }
    else
    {
        if ($isPasswordCorrect) {
            $_SESSION['id']= $resultat['id'];
            $_SESSION['nom'] = $resultat['nom'];
            $_SESSION['prenom'] = $resultat['prenom'];
            $_SESSION['mail'] = $resultat['mail'];
            $_SESSION['nombreTest'] = $resultat['nombreTest'];
            $_SESSION['points'] = $resultat['points'];
            $_SESSION['avatar'] = $resultat['avatar'];

            header('location: ../ProfilUtilisateur.php');
        }
        else {
            header("Location: ../connexion.php?connexion=failed");
        }
    }

}else {
    echo 'ERREUR';
}



