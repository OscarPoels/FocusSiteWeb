<!DOCTYPE html>
<?php session_start() ?>
<html lang="fr">
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
    <div class="ChampsDeConnexion">
        <form class="Email" method="post" action="TraitementConnexion.php">
            <p><input type="email" name="email" placeholder="E-mail" size="40" onsubmit=" return TraitementConnexion()" required/></p>
        </form>
        <div class="Barre" id="barre1" alt="Barre design"></div>
        <form id="Mdp" method="post" action="TraitementConnexion.php">
            <p><input minlength="6" maxlength="24" title="Pas d'espace" type="password"
                      name="Mdp" placeholder="Mot de passe" size="40" required></p>
        </form>
        <div class="Barre" id="barre2" alt="Barre design"></div>
    </div>
    <div class="Box" id="Box1">
        <input type="checkbox" id="RestezConnecte" name="RestezConnecte"/>
        <label for="RestezConnecte">Rester connecté</label>
        <a id="MdpOublie" href="https://apple.com">Mot de passe oublié ?</a>
    </div>
    <div class="Box" id="Box2">
        <a class="Bouton" id="BoutonConnexion" href="https://tesla.com">Connexion</a>
        <a class="Bouton" id="BoutonInscription" href="Inscription.php">Inscription</a>
    </div>
</div>
</body>
</html>