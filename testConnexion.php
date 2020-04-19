<?php
session_start();

if (isset($_SESSION['idUtilisateur'])) {
    header("Location: ../FocusSiteWeb/ProfilUtilisateur.php");
} else {
    header("Location: ../FocusSiteWeb/Connexion.php");
}


