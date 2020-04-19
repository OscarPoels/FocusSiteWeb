<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Connexion.css"/>
    <title>Connexion</title>
</head>
<body>
<div class="gauche"><img src="images/PageConnexion.jpg" alt="Photo page de connexion"/></div>

<a href="Accueil.php"><img src="images/maison.png" id="maisonAccueil" alt=""></a>

<div class="droite">
    <div class="Texte" id="GrandTitre"> Connexion</div>
    <div class="Texte" id="SousTitre"> Veuillez vous connecter à votre compte</div>
    <?php
    if (isset($_GET['connexion'])) {
        if ($_GET['connexion'] == 'failed') {
            echo "<div id='failed' >Mauvais identifiant ou mot de passe </div>";
        } else if ($_GET['connexion'] == 'succes') {
            echo "<div id='success'> Vous êtes connecté </div> ";
        } else if ($_GET['connexion'] == 'end') {
            echo "<div id='end'> Vous êtes déconnecté </div> ";
        }
    }
    ?>
    <form method="post" action="includes/connexionUtilisateur.php">
        <div class="ChampsDeConnexion">
            <input type="email" name="emailUtilisateur" placeholder="E-mail" size="50" required/>
            <div class="Barre" id="barre1" alt="Barre design"></div>
            <input id="Mdp" minlength="6" maxlength="24" title="Pas d'espace" size="50" type="password"
                   name="mdpUtilisateur" placeholder="Mot de passe" required>
            <div class="Barre" id="barre2" alt="Barre design"></div>
        </div>
        <div class="Box" id="Box1">
            <input type="checkbox" id="RestezConnecte" name="RestezConnecte"/>
            <label for="RestezConnecte">Rester connecté</label>
            <a id="MdpOublie" href="MdpOublie.php">Mot de passe oublié ?</a>
        </div>
        <div class="Box" id="Box2">
            <button type="submit" class="Bouton" id="BoutonConnexion" name="submit">
                Connexion
            </button>
            <a class="Bouton" id="BoutonInscription" href="Inscription.php">Inscription</a>
        </div>
    </form>
</div>
</body>
</html>


