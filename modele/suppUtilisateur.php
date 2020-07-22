<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=focus', 'root', '');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

// Si on appuie sur supprimer
if (isset($_POST['submit'])) {
    // Supprimer la question de la BDD
    $sql = $db->prepare("DELETE FROM utilisateur WHERE id = '$id'");
    $sql->execute();
    header("Location: ../vue/GestionUtilisateurs.php?supp=ok");
}