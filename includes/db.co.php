<?php
session_start();

if (isset($_POST['submit'])) {
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];

    $mdp = password_hash($mdp, PASSWORD_DEFAULT);

    $db = new PDO('mysql:host=localhost;dbname=focus_g6d', 'root', '');

    $sql = "SELECT Mail, Mdp FROM utilisateur WHERE Mail = '$mail'";
    $res = $db->prepare($sql);
    $res->execute();
    $resultat = $res->fetch();

    $isPasswordCorrect = password_verify($_POST['mdp'], $resultat['Mdp']);

    if (!$resultat)
    {
        header("Location: ../connexion.php?connexion=failed");
    }
    else
    {
        if ($isPasswordCorrect) {
            echo 'Vous êtes connecté !';
            $sql = "SELECT numeroUtilisateur FROM utilisateur WHERE Mail ='$mail'";

            $res = $db->prepare($sql);
            $res->execute();
            $resultat = $res->fetch();
            $_SESSION['id']= $resultat['numeroUtilisateur'];

            echo '<form action="../Connexion.php" /><button class="submit" /> Deconnexion </button></form>';

        }
        else {
            header("Location: ../connexion.php?connexion=failed");
        }
    }

}



