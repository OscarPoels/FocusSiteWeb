<!DOCTYPE html>
<html lang="en">

<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("location: Connexion.php");
}
include("MenuVerticalProfil.php");

?>
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
    <link rel="stylesheet" href="../Stylesheets/ProfilUtilisateur.css"/>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>

<?php
include('header.php');
include('infoProfil.php')
?>

<body>



<?php
if ($_SESSION['langue'] == 'francais') {
    echo "<div id='titreBienvenue'>" . $_SESSION['prenom'] . ", qu'est ce qu'on fait ajourd'hui ?" . "</div>";
    ?>
    <div class="imagesTests">
        <div class="barreTest" id="barreTitreCardiaque">
            <div class="titreTest" id="titreFreqCardiaque">Fréquence cardiaque</div>
        </div>
        <a href="#"><img class="imageTest" src="../images/cardiaque.png" id="imageCardiaque" alt=""></a>
        <div class="barreTest" id="barreTitreTonalite">
            <div class="titreTest" id="titreTonalite">Reconnaissance de tonalité</div>
        </div>
        <a href="#"><img class="imageTest" src="../images/micro.jpg" id="imageTonalite" alt=""></a>
        <div class="barreTest" id="barreTitreTemp">
            <div class="titreTest">Température de la peau</div>
        </div>
        <a href="#"><img class="imageTest" src="../images/temperature.jpg" id="imageTemp" alt=""></a>
        <div class="barreTest" id="barreTitreStimulus">
            <div class="titreTest">Stimulus visuel // sonore</div>
        </div>
        <a href="#"><img class="imageTest" src="../images/oeil.png" id="imageVisu" alt=""></a>
        <a href="#"><img class="imageTest" src="../images/son.png" id="imageSon" alt=""></a>
    </div>
    <?php
} else if ($_SESSION['langue'] == 'anglais') {
    echo "<div id='titreBienvenue'>" . $_SESSION['prenom'] . ", what are we doing today ?" . "</div>";
    ?>
    <div class="imagesTests">
        <div class="barreTest" id="barreTitreCardiaque">
            <div class="titreTest" id="titreFreqCardiaque">Cardiac frequency</div>
        </div>
        <a href="#"><img class="imageTest" src="../images/cardiaque.png" id="imageCardiaque" alt=""></a>
        <div class="barreTest" id="barreTitreTonalite">
            <div class="titreTest" id="titreTonalite">Tone recognition</div>
        </div>
        <a href="#"><img class="imageTest" src="../images/micro.jpg" id="imageTonalite" alt=""></a>
        <div class="barreTest" id="barreTitreTemp">
            <div class="titreTest">Skin temperature</div>
        </div>
        <a href="#"><img class="imageTest" src="../images/temperature.jpg" id="imageTemp" alt=""></a>
        <div class="barreTest" id="barreTitreStimulus">
            <div class="titreTest">Visual // Sound stimulus</div>
        </div>
        <a href="#"><img class="imageTest" src="../images/oeil.png" id="imageVisu" alt=""></a>
        <a href="#"><img class="imageTest" src="../images/son.png" id="imageSon" alt=""></a>
    </div>
    <?php
}
?>

<a href="#" id="barreBas"></a>
<a href="#"><p id="HistoriqueTests">Voir mon historique de tests</p></a>
<a href="#"><i class="fas fa-angle-down" id="flecheBas1" style="color: white"></i></a>
<a href="#"><i class="fas fa-angle-down" id="flecheBas2" style="color: white"></i></a>

<div id="nomProfil"></div>

</body>
</html>