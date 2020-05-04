<!DOCTYPE html>
<html lang="en">

<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("location: connexion.php");
}
include("MenuVerticalProfil.php");

?>
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
    <link rel="stylesheet" href="Stylesheets/ProfilUtilisateur.css"/>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>


<header class="barreHeader">
    <?php
    echo "<div id='titreProfil'>" . $_SESSION['prenom'] . " " . $_SESSION['nom'] . "</div>";

    ?>
    <form method="post" action="includes/deconnexionUtilisateur.php">
        <button type="submit" name="submit" id="deconnexion">
            <div id="logoDeco"></div>
            <p>Déconnexion</p></button>
    </form>
    <a href="Accueil.php"><img src="images/maison.png" id="maisonAccueil" alt=""></a>
</header>

<body>


<?php
if (isset($_GET['modification'])) {
    if ($_GET['modification'] == 'OK') {
        echo "<div id='successModif' >Vos modifications ont bien été prises en compte </div>";
    }
}

/*if (isset($_GET['suppPhoto'])) {
    switch ($_GET['suppPhoto']) {
        case 'oui':
            break;
        default:
            break;
    }
}
*/ ?>

<!--
<a class="Bouton" id="boutonModiflProfil" href="modificationProfilUtilisateur.php"><img src="images/reglage.png" id="logoReglage">
    <p id="reglageTexte">Modifier mon profil</p></a>-->

<div class="infoProfil">
    <div class="statsTexte" id='stat1'>Membre depuis :</div>
    <?php
    if (isset($_SESSION['DateInscription'])) {
        echo "<div class=\"stats\" id='dateInscription'>" . $_SESSION['DateInscription'] . "</div>";
    } else {
        echo "<div  class=\"stats\" id='dateInscription'> N/A </div>";
    }
    ?>
    <div class="barre" id='barreStat1'></div>

    <div class="statsTexte" id='stat2'>Age :</div>
    <?php
    if (isset($_SESSION['age'])) {
        echo "<div class=\"stats\" id='age'>" . $_SESSION['age'] . " ans" . "</div>";
    } else {
        echo "<div class=\"stats\" id='age'> N/A </div>";
    }
    ?>
    <div class="barre" id='barreStat2'></div>

    <div class="statsTexte" id='stat3'>Nombre de tests :</div>
    <?php
    if (isset($_SESSION['nombreTest'])) {
        echo "<div class=\"stats\" id='nbTests'>" . $_SESSION['nombreTest'] . "</div>";
    } else {
        echo "<div class=\"stats\" id='nbTests'> N/A </div>";
    }
    ?>
    <div class="barre" id='barreStat3'></div>
    <div class="statsTexte" id='stat4'>Points :</div>
    <?php
    if (isset($_SESSION['points'])) {
        echo "<div class=\"stats\" id='nbPoints'>" . $_SESSION['points'] . "</div>";
    } else {
        echo "<div class=\"stats\" id='nbPoints'> N/A </div>";
    }
    ?>

</div>

<?php
echo "<div id='titreBienvenue'>" . $_SESSION['prenom'] . ", qu'est ce qu'on fait ajourd'hui ?" . "</div>";
?>

<div class="imagesTests">
    <div class="barreTest" id="barreTitreCardiaque">
        <div class="titreTest" id="titreFreqCardiaque">Fréquence cardiaque</div>
    </div>

    <a href="#"><img class="imageTest" src="images/cardiaque.png" id="imageCardiaque" alt=""></a>

    <div class="barreTest" id="barreTitreTonalite">
        <div class="titreTest" id="titreTonalite">Reconnaissance de tonalité</div>
    </div>

    <a href="#"><img class="imageTest" src="images/micro.jpg" id="imageTonalite" alt=""></a>

    <div class="barreTest" id="barreTitreTemp">
        <div class="titreTest">Température de la peau</div>
    </div>

    <a href="#"><img class="imageTest" src="images/temperature.jpg" id="imageTemp" alt=""></a>

    <div class="barreTest" id="barreTitreStimulus">
        <div class="titreTest">Stimulus visuel // sonore</div>
    </div>

    <a href="#"><img class="imageTest" src="images/oeil.png" id="imageVisu" alt=""></a>
    <a href="#"><img class="imageTest" src="images/son.png" id="imageSon" alt=""></a>
</div>

<a href="#" id="barreBas"></a>
<a href="#"><p id="HistoriqueTests">Voir mon historique de tests</p></a>
<a href="#"><i class="fas fa-angle-down" id="flecheBas1" style="color: white"></i></a>
<a href="#"><i class="fas fa-angle-down" id="flecheBas2" style="color: white"></i></a>

<div id="contourPhoto">

    <img src="avatars/<?php echo $_SESSION['avatar'] ?>" id="photoProfil"
         alt=""/>


</div>
<div id="nomProfil"></div>

</body>
</html>