<!DOCTYPE html>
<?php session_start() ?>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Connexion.css"/>
    <title>Connexion</title>
</head>
<body>
<div class="gauche"><img src="images/PageConnexion.jpg" alt="Photo page de connexion"/></div>
<div class="droite">
    <div class="Texte" id="Connexion"> Connexion</div>
    <div class="Texte" id="SousTexteConnexion"> Veuillez vous connecter à votre compte</div>
    <form method="post" action="TraitementConnexion.php">
        <div class="ChampsDeConnexion">
            <input type="email" name="email" placeholder="E-mail" size="50" required/>
            <div class="Barre" id="barre1" alt="Barre design"></div>
            <input id="Mdp" minlength="6" maxlength="24" title="Pas d'espace" size="50" type="password"
                   name="Mdp" placeholder="Mot de passe" required>

            <div class="Barre" id="barre2" alt="Barre design"></div>
        </div>
        <div class="Box" id="Box1">
            <input type="checkbox" id="RestezConnecte" name="RestezConnecte"/>
            <label for="RestezConnecte">Rester connecté</label>
            <a id="MdpOublie" href="https://apple.com">Mot de passe oublié ?</a>
        </div>
        <div class="Box" id="Box2">
            <input type="submit" class="Bouton" id="BoutonConnexion" value="Connexion">
            <a class="Bouton" id="BoutonInscription" href="Inscription.php">Inscription</a>
        </div>
    </form>
</div>
</body>
</html>