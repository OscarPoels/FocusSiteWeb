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
if (!isset($_SESSION['idGestio'])) {
    header("location: connexion.php");
}
include 'header.php';
?>


<div id="infoProfil">
    <?php
    echo "<div class='info' id='prenomAdmin'>" . $_SESSION['prenom'] . " " . $_SESSION['nom'] . "</div>";
    ?>

</div>

<div id="contourPhoto">
    <img src="../avatars/<?php echo $_SESSION['avatar'] ?>" id="photoProfil"
         alt=""/>
</div>


<div class="optionAdmin">
    <h2><a class="bouton" id="gestionUtilisateur" href="GestionUtilisateurs.php"> CONSULTER UTILISATEURS</a></h2>
    <h2><a class="bouton" id="FAQ" href="FAQConsulter.php"> CONSULTER LA FAQ </a></h2>
    <h2><a class="bouton" id="gestionCapteurs" href="ContactAdmin.php"> CONTACTER ADMIN PAR MAIL</a></h2>

</div>


</body>
</html>
