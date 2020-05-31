<?php
session_start();

if (isset($_POST['submit'])) {
    // Suppression des variables de session et de la session
    session_destroy();

    // Suppression des cookies de connexion automatique
    setcookie('MailUtilisateur', '');
    setcookie('MotDePasseUtilisateur', '');

    header("Location: ../vue/Connexion.php?connexion=end");
}else {
    echo 'ERREUR';
}