<?php

function connexion($mail, $mdp){
    $db = new PDO('mysql:host=localhost;dbname=focus', 'root', '');

    $sql = "SELECT * FROM utilisateur WHERE mail = '$mail'";
    $res = $db->prepare($sql);
    $res->execute();
    $resultat = $res->fetch();

    $isPasswordCorrect = password_verify($mdp, $resultat['mdp']);

    return array($resultat, $isPasswordCorrect);
}

function connexionModif($mdp){
    $db = new PDO('mysql:host=localhost;dbname=focus', 'root', '');

    $id = $_SESSION['id'];

    $sql = "SELECT * FROM utilisateur WHERE id = '$id'";
    $res = $db->prepare($sql);
    $res->execute();
    $resultat = $res->fetch();


    $isPasswordCorrect = password_verify($mdp, $resultat['mdp']);

    return array($resultat, $isPasswordCorrect);
}



