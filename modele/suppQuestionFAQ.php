<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=focus', 'root', '');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

// Si on appuie sur supprimer
if (isset($_POST['suppQuestion'])) {
    // Supprimer la question de la BDD
    $sql = $db->prepare("DELETE FROM faq WHERE id = '$id'");
    $sql->execute();
    header("Location: ../controleurs/administrateur.php?vue=GestionFAQ");
}