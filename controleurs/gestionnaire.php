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

        case 'ContactAdmin':
            $vue = 'ContactAdmin';
            if (isset($_POST['submit'])) {
                $retour = mail('o.poels@gmail.com', 'Envoi depuis la page de contact [Gestionnaire]',
                    "Id gestionnaire : " . $_SESSION['idGestio'] . " " . "Mail utilisateur : " . $_SESSION['mail'] . " " . $_POST['sujet'] . " " . $_POST['demande'],
                    'From : webmaster@focus.fr');
                if ($retour) {
                    $option = '?mail=correct';
                } else {
                    $option = '?mail=fail';
                }
            }
            break;
    }
}

header("Location: ../vue/$vue.php$option");

