<?php
session_start();

if (!isset($_GET['vue'])) {
    $vue = 'Accueil';
    $option = '';

} else {
    switch ($_GET['vue']) {
        case 'Accueil':
            $vue = 'Accueil';
            $option = '';
            if(isset($_GET['langue'])){
                $_SESSION['langue'] = $_GET['langue'];
            }
            break;
    }
}

header("Location: ../vue/$vue.php$option");