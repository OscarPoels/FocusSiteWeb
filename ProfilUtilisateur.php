<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profil</title>
    <link rel="stylesheet" href="ProfilUtilisateur.css"/>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>  <!-- Importer scripte pour les logos -->

</head>

<body>
<?php session_start(); ?>

<div class="barreHeader">
    <?php
    if (isset($_SESSION['idUtilisateur']) AND isset($_SESSION['PrenomUtilisateur']) AND isset($_SESSION['NomUtilisateur'])) {
        echo "<div id='titreProfil'>" . $_SESSION['PrenomUtilisateur'] . " " . $_SESSION['NomUtilisateur'] . "</div>";
    }
    ?>
    <form method="post" action="includes/deconnexionUtilisateur.php">
        <button type="submit" name="submit" id="deconnexion">&emsp;Deconnexion&emsp;</button>
    </form>
    <a href="Accueil.php"><img src="images/maison.png" id="maisonAccueil" alt=""></a>
</div>

<?php include("MenuVerticalProfil.php"); ?>

<img src="images/perso.jpg" id="photoProfil" alt=""/>

<a class="Bouton" id="boutonModiflProfil" href="modificationProfilUtilisateur.php">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    &emsp;&emsp;&emsp;&emsp;Modifier mon profil</a>


<div class="infoProfil"></div>


<?php

if (isset($_SESSION['idUtilisateur']) AND isset($_SESSION['DateInscription']) AND isset($_SESSION['NombreTestsUtilisateur']) AND isset($_SESSION['NombrePointsUtilisateur'])) {
    echo "<div id='stat1'>" . "Membre depuis :" . "</div>";
    echo "<div id='dateInscription'>" . $_SESSION['DateInscription'] . "</div>";
    echo "<div id='barreStat1'>" . "</div>";

    echo "<div id='stat2'>" . "Age :" . "</div>";
    echo "<div id='age'>" . $_SESSION['AgeUtilisateur'] . " ans" . "</div>";
    echo "<div id='barreStat2'>" . "</div>";


    echo "<div id='stat3'>" . "Nombre de tests :" . "</div>";
    echo "<div id='nbTests'>" . $_SESSION['NombreTestsUtilisateur'] . "</div>";
    echo "<div id='barreStat3'>" . "</div>";

    echo "<div id='stat4'>" . "Nombre de points :" . "</div>";
    echo "<div id='nbPoints'>" . $_SESSION['NombrePointsUtilisateur'] . "</div>";

}
?>



<?php
if (isset($_SESSION['idUtilisateur']) AND isset($_SESSION['PrenomUtilisateur'])) {
    echo "<div id='titreTest'>" . $_SESSION['PrenomUtilisateur'] . ", qu'est ce qu'on fait ajourd'hui ?" . "</div>";
}
?>

<div class="imagesTests">
    <div id="barreTitreCardiaque"></div>
    <div class="titreTest" id="titreFreqCardiaque">Fréquence cardiaque</div>
    <a href="#"><img src="images/cardiaque.png" id="imageCardiaque" alt=""></a>

    <div id="barreTitreTonalite"></div>
    <div class="titreTest" id="titreTonalite">Reconnaissance de tonalité</div>
    <a href="#"><img src="images/micro.jpg" id="imageTonalite" alt=""></a>

    <div id="barreTitreTemp"></div>
    <div id="titreTemperature">Température de la peau</div>
    <a href="#"><img src="images/temperature.jpg" id="imageTemp" alt=""></a>

    <div id="barreTitreStimulus"></div>
    <div id="titreStimu">Stimulus visuel // sonore</div>
    <a href="#"><img src="images/oeil.png" id="imageVisu" alt=""></a>
    <a href="#"><img src="images/son.png" id="imageSon" alt=""></a>
</div>

<a href="#" id="barreBas"></a>
<a href="#"><p id="HistoriqueTests">Voir mon historique de tests</p></a>
<a href="#"><i class="fas fa-angle-down" id="flecheBas1" style="color: white"></i></a>
<a href="#"><i class="fas fa-angle-down" id="flecheBas2" style="color: white"></i></a>

<div id="contourPhoto"></div>
<div id="nomProfil"></div>

</body>
</html>