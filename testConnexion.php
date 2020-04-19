<?php
session_start();

// Si c'est un utilisateur qui est connecté
if (isset($_SESSION['idUtilisateur'])) {
    header("Location: ../FocusSiteWeb/ProfilUtilisateur.php");
}
// Sinon si c'est un administrateur
else if (isset($_SESSION['idAdministrateur'])) {
    header("Location: ../FocusSiteWeb/ProfilAdmin.php");
}
// Sinon, alors personne de connecter, redirection a la connexion
else {
    header("Location: ../FocusSiteWeb/Connexion.php");
}


