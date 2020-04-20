<?php
session_start();

if (isset($_POST['submit'])) {
    // Suppression des variables de session et de la session
    $_SESSION = array();
    session_destroy();

    // Suppression des cookies de connexion automatique
    setcookie('MailUtilisateur', '');
    setcookie('MotDePasseUtilisateur', '');

    header("Location: ../Connexion.php?connexion=end");
}