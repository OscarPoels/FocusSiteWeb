<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <link rel="stylesheet" href="../Stylesheets/MenuHorizontalAccueil.css"/>
</head>

<body>
<header>
    <nav>
        <a class="logo" href="#">
            <img id="logoMenu" src="../images/focus.png" width="90" height="40" alt="">
        </a>
        <div class="langues">
            <a class="enFrancais" href="../controleurs/accueil.php?vue=Accueil&langue=francais">
                <img src="../images/drapeauFrance.png" width="25" height="20" alt="">
            </a>
            <div class="langues-contenu">
                <a class="enAnglais" href="../controleurs/accueil.php?vue=Accueil&langue=anglais">
                    <img src="../images/drapeauUK.png" width="20" height="20" alt="">
                </a>
            </div>
        </div>
        <ul>
            <?php
            switch ($_SESSION['langue']) {
            case 'francais':
            ?>
            <li><a href="Connexion.php">Passer un test</a></li>
        <li><a href="Accueil.php#page3">Nos tests</a></li>
        <li><a href="Accueil.php#page2">Qui sommes nous ?</a></li>
        <li><a href="FAQ.php">FAQ</a></li>
        <li><a href="mailto:infinitemeasures.focus@gmail.com">Contact</a></li>
        <li><a href="Connexion.php">Mon profil</a></li>
        <li><a id="connexion" href="Connexion.php">Connexion</a></li>
                <?php
                break;
            case 'anglais':
            ?>
                <li><a href="Connexion.php">Pass a test</a></li>
                <li><a href="Accueil.php#page3">Our tests</a></li>
                <li><a href="Accueil.php#page2">Who are we ?</a></li>
                <li><a href="FAQ.php">FAQ</a></li>
                <li><a href="mailto:infinitemeasures.focus@gmail.com">Contact</a></li>
                <li><a href="Connexion.php">My profil</a></li>
                <li><a id="connexion" href="Connexion.php">Log in</a></li>
                <?php
                break;
            }
            ?>
        </ul>
    </nav>
</header>
</body>