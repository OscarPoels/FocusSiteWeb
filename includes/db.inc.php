<?php
session_start();
if (isset($_POST['submit'])) {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];

    $mdp = password_hash($mdp, PASSWORD_DEFAULT);

    $db = new PDO('mysql:host=localhost;dbname=focus_g6d', 'root', '');

    $sql = "SELECT * FROM utilisateur WHERE Mail = '$mail'";
    $res = $db->prepare($sql);
    $res->execute();

    if ($res->rowCount() > 0) {
        header("Location: ../Inscription.php?inscription=failed");
    } else {
        header("Location: ../Inscription.php?inscription=succes");
        $sql = "INSERT INTO utilisateur (Prenom,Nom,Mail,Mdp) 
                VALUES ('$prenom','$nom','$mail','$mdp')";
        $req = $db->prepare($sql);
        $req->execute();
    }
}

