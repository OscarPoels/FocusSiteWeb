<?php


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
        echo 'Mauvais identifiant ou mot de passe !';
    }
    else
    {
        if ($isPasswordCorrect) {
            echo 'Vous êtes connecté !';
        }
        else {
            echo 'Mauvais identifiant ou mot de passe !';
        }
    }

}



