<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Stylesheets/header.css"/>
</head>
<header class="barreHeader">
    <?php
    echo "<div id='titreProfil'>" . $_SESSION['prenom'] . " " . $_SESSION['nom'] . "</div>";

    ?>
    <form method="post" action="../modele/deconnexionUtilisateur.php">
        <button type="submit" name="submit" id="deconnexion">
            <div id="logoDeco"></div>
            <p>Déconnexion</p></button>
    </form>
    <a href="Acceuil.php"><img src="../images/maison.png" id="maisonAccueil" alt=""></a>
</header>