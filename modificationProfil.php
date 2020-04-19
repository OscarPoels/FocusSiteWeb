<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profil</title>
    <link rel="stylesheet" href="modifProfil2.css"/>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>  <!-- Importer scripte pour les logos -->

</head>

<body>
<?php session_start(); ?>

<div class="barreHeader">
    <?php
    if (isset($_SESSION['idUtilisateur']) AND isset($_SESSION['PrenomUtilisateur']) AND isset($_SESSION['NomUtilisateur'])) {
        echo "<div id='titreProfil'>" . $_SESSION['PrenomUtilisateur'] . " " . $_SESSION['NomUtilisateur'] . "- Edition Profil" . "</div>";
    }
    ?>
    <form method="post" action="includes/deconnexionUtilisateur.php">
        <button type="submit" name="submit" id="deconnexion">&emsp;Deconnexion&emsp;</button>
    </form>
    <a href="Accueil.php"><img src="images/maison.png" id="maisonAccueil" alt=""></a>
</div>

<div class="infoProfil"></div>
<img src="images/perso.jpg" id="photoProfil" alt=""/>
<div id="contourPhoto"></div>
<div id="nomProfil"></div>

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



<form method="post" action="">
    <input type="text">
</form>




<a class="Bouton" id="boutonEnregistrerModif" href="#">&emsp;&emsp;&emsp;&emsp;
    &emsp;&emsp;&emsp;&emsp;Enregistrer les modifications</a>
<a class="Bouton" id="boutonAnnulerModif" href="ProfilUtilisateur.php">&emsp;&emsp;
    &emsp;&emsp;&emsp;&emsp;Annuler</a>

<a href="#" id="barreBas"></a>
<a href="#"><p id="HistoriqueTests">Voir mon historique de tests</p></a>
<a href="#"><i class="fas fa-angle-down" id="flecheBas1" style="color: white"></i></a>
<a href="#"><i class="fas fa-angle-down" id="flecheBas2" style="color: white"></i></a>



</body>
</html>