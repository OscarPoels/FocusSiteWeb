<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
    <link rel="stylesheet" href="Profil.css"/>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>  <!-- Importer scripte pour les logos -->

    <?php
/*    $source = "mysql:host=localhost;dbname=FOCUS*";
    $login = "user";
    $mdp = "focus";
    $db = new PDO($source, $login, $mdp);
    */?>

</head>
<body>
<div class="barreHeader">
    <h2><p id="titreProfil">PROFIL UTILISATEUR</p></h2>
    <a id="deconnexion" href="Connexion.php">&emsp;Deconnexion&emsp;</a>
    <a href="Accueil.html"><img src="images/maison.png" id="maisonAccueil" alt=""></a>
</div>

<?php include("MenuVerticalProfil.php"); ?>

<img src="images/perso.jpg" id="photoProfil" alt=""/>

<a class="Bouton" id="boutonModiflProfil" href="#">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    &emsp;&emsp;&emsp;&emsp;Modifier mon profil</a>

<div class="infoProfil">
    <ul>
        <li><p>Membre depuis :</p></li>
        <li><p>Nombre de tests :</p></li>
        <li><p>Nombre de points :</p></li>
        <li><p>Pourcentage de réussite :</p></li>
    </ul>
</div>

<h2><p id="titreTest">Qu'est ce qu'on fait aujourd'hui ?</p></h2>

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