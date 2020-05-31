<?php

function inscription($prenom, $nom, $mail, $mdp, $avatar){
    $db = new PDO('mysql:host=localhost;dbname=focus', 'root', '');

    echo $mdp;
    $sql = "SELECT * FROM utilisateur WHERE Mail = '$mail'";
    $res = $db->prepare($sql);
    $res->execute();

    if ($res->rowCount() > 0) {
        return '?inscription=failed';
    } else {
        $sql = "INSERT INTO utilisateur (prenom,nom,mail,mdp,avatar,age,dateInscription) 
                VALUES ('$prenom','$nom','$mail','$mdp','$avatar',0,current_date)";
        $req = $db->prepare($sql);
        $req->execute();
        return '?inscription=succes';
    }
}
