<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <link rel="stylesheet" href="MenuHorizontal.css"/>
</head>

<?php
if ($_GET['langue'] == "anglais") {
    echo "Traduction en anglais svp";
}
?>

<body>
<header>
    <nav>
        <a class="logo" href="#">
            <img id="logoMenu" src="images/focus.png" width="90" height="40" alt="">
        </a>
        <div class="langues">
            <a class="enFrancais" href="Accueil.php?langue=francais">
                <img src="images/drapeauFrance.png" width="30" height="20" alt="">
            </a>
            <div class="langues-contenu">
                <a class="enAnglais" href="Accueil.php?langue=anglais">
                    <img src="images/drapeauUK.png" width="30" height="30" alt="">
                </a>
                <a class="enEspagnol" href="Accueil.php?langue=espagnol">
                    <img src="images/drapeauEspagne.png" width="30" height="20" alt="">
                </a>
            </div>
        </div>
        <ul>
            <li><a href="testConnexion.php">Passer un test</a></li>&emsp;<!--
        --><li><a href="http://localhost:8888/FocusSiteWeb/Accueil.php#page3">Nos tests</a></li>&emsp;<!--
        --><li><a href="http://localhost:8888/FocusSiteWeb/Accueil.php#page2">Qui sommes nous ?</a></li>&emsp;<!--
        --><li><a href="#">FAQ</a></li>&emsp;<!--
        --><li><a href="mailto:infinitemeasures.focus@gmail.com">Contact</a></li>&emsp;<!--
        --><li><a href="testConnexion.php">Mon profil</a></li>&emsp;<!--
        --><li><a id="connexion" href="testConnexion.php">Connexion</a></li>

        </ul>
    </nav>
</header>
</body>