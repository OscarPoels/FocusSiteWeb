<?php

function inscriptionUtil($prenom, $nom, $mail, $mdp, $avatar)
{
    $db = new PDO('mysql:host=localhost;dbname=focus', 'root', '');

    $sql = "SELECT * FROM utilisateur WHERE Mail = '$mail'";
    $res = $db->prepare($sql);
    $res->execute();


    if ($res->rowCount() > 0 || $mail == 'marceau.gerardin@focus.fr'
            || $mail == 'oscar.poels@focus.fr'
                || $mail == 'gabriel.ferrier@focus.fr') {
        return '?inscription=failed';

    } else {
        $sql = "INSERT INTO utilisateur (prenom,nom,mail,mdp,avatar,age,dateInscription) 
                VALUES ('$prenom','$nom','$mail','$mdp','$avatar',0,current_date)";
        $req = $db->prepare($sql);
        $req->execute();
        return '?inscription=succes';
    }
}


function inscriptionGestio($prenom, $nom, $mail, $mdp, $avatar)
{
    $db = new PDO('mysql:host=localhost;dbname=focus', 'root', '');

    $sql = "SELECT * FROM utilisateur WHERE Mail = '$mail'";
    $res = $db->prepare($sql);
    $res->execute();

    $sql2 = "SELECT * FROM gestionnaire WHERE Mail = '$mail'";
    $res2 = $db->prepare($sql);
    $res2->execute();


    if ($res->rowCount() > 0
        || $res2->rowCount() >0
        || $mail == 'marceau.gerardin@focus.fr'
        || $mail == 'oscar.poels@focus.fr'
        || $mail == 'gabriel.ferrier@focus.fr') {
        return '?inscription=failed';

    } else {
        $sql = "INSERT INTO gestionnaire (prenom,nom,mail,mdp,avatar) 
                VALUES ('$prenom','$nom','$mail','$mdp','$avatar')";
        $req = $db->prepare($sql);
        $req->execute();
        return '?inscription=succes';
    }
}
