<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Stylesheets/MdpOublie.css"/>
    <title>Mot de passe oublié</title>
</head>
<body>
<div class="gauche"><img src="../images/PageConnexion.jpg" alt="Photo page de connexion"/></div>
<div class="droite">
    <?php
    session_start();
    switch ($_SESSION['langue']) {
        case 'francais':
            ?>
            <div class="Texte" id="GrandTitre"> Mot de passe oublié</div>
            <div class="Texte" id="SousTitre">Entrez votre adresse e-mail pour pouvoir réinitialiser votre mot de
                passe
            </div>
            <?php
            break;
        case 'anglais':
            ?>
            <div class="Texte" id="GrandTitre"> Forgot your password</div>
            <div class="Texte" id="SousTitre">Enter your email address to be able to reset your password</div>
            <?php
            break;
    }
    ?>
    <form method="post" action="../controleurs/utilisateur.php?vue=MdpOublie">
        <div class="Box" id="Box1">
            <input id="E-mail" type="email" placeholder="Email" size="50" required name="mail">
        </div>
        <div class="Box" id="Box2">
            <div class="Barre" alt="Barre design"></div>
        </div>
        <input type="submit" id="BoutonEnvoyer" value="<?php if ($_SESSION['langue'] == 'francais') {
            echo 'Envoyer';
        } else
            if ($_SESSION['langue'] == 'anglais') {
                echo 'Send';
            }
        ?>">
    </form>
</body>
</html>