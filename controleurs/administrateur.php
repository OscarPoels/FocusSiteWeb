<?php
session_start();

if (!isset($_GET['vue'])) {
    $vue = 'Acceuil';
    $option = '';

} else {
    switch ($_GET['vue']) {

        case 'Acceuil':
            $vue = 'Acceuil';
            $option = '';
            break;

        case 'GestionFAQ':
            $vue = 'GestionFAQ';
            break;
    }
}

header("Location: ../vue/$vue.php$option");
