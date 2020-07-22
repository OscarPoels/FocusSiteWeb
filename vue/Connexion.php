<!DOCTYPE html>
<?php session_start() ?>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Stylesheets/Connexion.css"/>
    <title>Connexion</title>
</head>

<?php
if (isset($_SESSION['id'])) {
    header("location: ProfilUtilisateur.php");
}
if (isset($_SESSION['idAdmin'])) {
    header("location: ProfilAdmin.php");
}

if (isset($_SESSION['idGestio'])) {
    header("location: ProfilGestio.php");
}

?>

<body>
<div class="gauche"><img src="../images/PageConnexion.jpg" alt="Photo page de connexion"/></div>
<div class="droite">
    <?php
    switch ($_SESSION['langue']) {
        case 'francais':
            ?>
            <div class="Texte" id="GrandTitre"> Connexion</div>
            <div class="Texte" id="SousTitre"> Veuillez vous connecter à votre compte</div>
            <?php
            break;
        case 'anglais':
            ?>
            <div class="Texte" id="GrandTitre"> Log in</div>
            <div class="Texte" id="SousTitre">Please login to your account</div>
            <?php
            break;
    }
    if (isset($_GET['connexion'])) {
        if ($_GET['connexion'] == 'failed') {
            if ($_SESSION['langue'] == 'francais') {
                echo "<div id='failed' >E-mail ou mot de passe incorrect </div>";
            } else if ($_SESSION['langue'] == 'anglais') {
                echo "<div id='failed' >E-mail or pass word incorrect </div>";
            }
        } else if ($_GET['connexion'] == 'end') {
            if ($_SESSION['langue'] == 'francais') {
                echo "<div id='end'> Vous êtes déconnecté </div> ";
            } else if ($_SESSION['langue'] == 'anglais') {
                echo "<div id='end'> You are disconnect </div> ";
            }
        }
    }
    if (isset($_GET['MdpOublie'])) {
        if ($_GET['MdpOublie'] == 'true') {
            if ($_SESSION['langue'] == 'francais') {
                echo "<div id='end'> Votre demande a bien été prise en compte </div> ";
            } else if ($_SESSION['langue'] == 'anglais') {
                echo "<div id='end'> You will receive an email to reset your password soon </div> ";
            }
        }
    }

    ?>
    <form method="post" action="../controleurs/utilisateur.php?vue=Connexion">
        <div class="ChampsDeConnexion">
            <input type="email" name="mail" placeholder="E-mail" size="50" required/>
            <div class="Barre" id="barre1" alt="Barre design"></div>
            <input id="Mdp" minlength="6" maxlength="24" size="50" type="password"
                   name="mdp" placeholder="<?php if ($_SESSION['langue'] == 'francais') {
                echo 'Mot de passe';
            } else
                if ($_SESSION['langue'] == 'anglais') {
                    echo 'Password';
                }
            ?>e" required>

            <div class="Barre" id="barre2" alt="Barre design"></div>
        </div>
        <div class="Box" id="Box1">
            <input type="checkbox" id="RestezConnecte" name="RestezConnecte"/>
            <?php
            switch ($_SESSION['langue']) {
                case 'francais':
                    ?>
                    <label for="RestezConnecte">Rester connecté</label>
                    <a id="MdpOublie" href="MdpOublie.php">Mot de passe oublié ?</a>
                    <?php
                    break;
                case 'anglais':
                    ?>
                    <label for="RestezConnecte">Stay connected</label>
                    <a id="MdpOublie" href="MdpOublie.php">Forgot your password ?</a>
                    <?php
                    break;
            }
            ?>
        </div>
        <div class="Box" id="Box2">
            <?php
            if ($_SESSION['langue'] == 'francais') {
                ?>
                <button type="submit" class="Bouton" id="BoutonConnexion" name="submit">
                    Connexion
                </button>
                <a class="Bouton" id="BoutonInscription" href="../controleurs/utilisateur.php?vue=Inscription">Inscription</a>
                <?php
            } else if ($_SESSION['langue'] == 'anglais') {
                ?>
                <button type="submit" class="Bouton" id="BoutonConnexion" name="submit">
                    Log in
                </button>
                <a class="Bouton" id="BoutonInscription" href="../controleurs/utilisateur.php?vue=Inscription">Sign
                    in</a>
                <?php
            }
            ?>
        </div>
    </form>
</div>
</body>
</html>


