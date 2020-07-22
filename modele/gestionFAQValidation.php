<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=focus', 'root', '');

if (isset($_GET['idFAQ'])) {
    $idFAQ = $_GET['idFAQ'];
}

if (isset($_POST['validationOui'])) {
    // Validation = 'oui' dans BDD
    $sql = $db->prepare("UPDATE faq SET validation = 'oui' WHERE id = '$idFAQ'");
    $sql->execute();
    header("Location: ../controleurs/administrateur.php?vue=GestionFAQ");
} else if (isset($_POST['validationNon'])) {
    // Validation = 'oui' dans BDD
    $sql = $db->prepare("UPDATE faq SET validation = 'non' WHERE id = '$idFAQ'");
    $sql->execute();
    header("Location: ../controleurs/administrateur.php?vue=GestionFAQ");
}