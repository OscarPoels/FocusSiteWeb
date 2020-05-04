<?php
session_start();
if (isset($_POST['submit'])) {
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    $avatar = 'defaut.png';

    $mdp = password_hash($mdp, PASSWORD_DEFAULT);

    $db = new PDO('mysql:host=localhost;dbname=focus', 'root', '');

    $sql = "SELECT * FROM utilisateur WHERE Mail = '$mail'";
    $res = $db->prepare($sql);
    $res->execute();

    if ($res->rowCount() > 0) {
        header("Location: ../Inscription.php?inscription=failed");
    } else {
        header("Location: ../Inscription.php?inscription=succes");
        $sql = "INSERT INTO utilisateur (prenom,nom,mail,mdp,avatar) 
                VALUES ('$prenom','$nom','$mail','$mdp','$avatar')";
        $req = $db->prepare($sql);
        $req->execute();
    }
}else {
    echo 'ERREUR';
}