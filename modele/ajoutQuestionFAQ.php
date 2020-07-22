<?php
session_start();
if (isset($_POST['submit'])) {
    $db = new PDO('mysql:host=localhost;dbname=focus', 'root', '');

    $auteurQuestion = $_POST['nom'];
    $titreQuestion = $_POST['titreQuestion'];
    $contenu = $_POST['contenu'];
    $idAuteur =$_SESSION['id'];


    $sql = "INSERT INTO faq (auteur, titre, contenu, reponse,reponseAnglais, dateCreation, validation, idAuteur) 
    VALUES (\"$auteurQuestion\", \"$titreQuestion\", \"$contenu\", '', '', CURRENT_DATE , 'non', \"$idAuteur\");";
    $req = $db->prepare($sql);
    $req->execute();
    header("Location: ../vue/FAQEcrire.php?envoie=succes");

}