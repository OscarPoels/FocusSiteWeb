<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ProfilAdmin</title>
    <link rel="stylesheet" href="../Stylesheets/ProfilAdminEtGestio.css"/>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
<?php
session_start();
if (!isset($_SESSION['idAdmin'])) {
    header("location: connexion.php");
}
include 'header.php';
?>


<div id="infoProfil">
    <?php
    echo "<div class='info' id='prenomAdmin'>" . $_SESSION['prenomAdmin'] . " " . $_SESSION['nomAdmin'] . "</div>";
    echo "<div class='info' id='separateur'>" . " - " . "</div>";
    echo "<div class='info' id='posteAdmin'>" . $_SESSION['posteAdmin'] . "</div>";
    ?>

</div>

<div id="contourPhoto">
    <img src="../avatars/<?php echo $_SESSION['avatarAdmin'] ?>" id="photoProfil"
         alt=""/>
</div>


<div class="optionAdmin">
    <h2><a class="bouton" id="gestionUtilisateur" href="GestionUtilisateurs.php"> GESTION DES UTILISATEURS</a></h2>
    <h2><a class="bouton" id="FAQ" href="../controleurs/administrateur.php?vue=GestionFAQ"> GESTION DE LA FAQ </a></h2>
    <h2><a class="bouton" id="gestionCapteurs" href="#"> GERER LES CAPTEURS</a></h2>
    <h2><a class="bouton" id="accesBDD" href="http://localhost/phpmyadmin">
            ACCEDER A LA BASE DE DONNÉES </a></h2>

</div>


</body>
</html>
