<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ProfilAdmin</title>
    <link rel="stylesheet" href="Stylesheets/ProfilAdmin.css"/>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
<?php
session_start();
?>
<div class="barreHeader">
    <h2><p id="titreProfil">MENU ADMINISTRATEUR</p></h2>
    <form method="post" action="includes/deconnexionUtilisateur.php">
        <button type="submit" name="submit" id="deconnexion">&emsp;Deconnexion&emsp;</button>
    </form>
    <a href="Accueil.php"><img src="images/maison.png" id="maisonAccueil" alt=""></a>
</div>

<div class="SecondeBarre">
    <h2><a id="gestion" href="GestionUtilisateurs.php"> GESTION DES UTILISATEURS</a></h2>
    <h2><a id="FAQ" href="GestionFAQ.php"> GESTION DE LA FAQ </a></h2>
</div>

<?php
if (isset($_SESSION['idAdministrateur']) AND isset($_SESSION['PrenomAdministrateur']) AND isset($_SESSION['NomAdministrateur'])) {
    echo "<div id='titreProfilAdmin'>" . "Administrateur = " . $_SESSION['PrenomAdministrateur'] . " " . $_SESSION['NomAdministrateur'] . "</div>";
    echo "<div id='posteAdmin'>" . "Poste : " . $_SESSION['PosteAdministrateur'] . "</div>";
}
?>

</body>
</html>
