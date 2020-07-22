<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Stylesheets/header.css"/>
</head>
<header class="barreHeader">
    <?php
    if (isset($_SESSION['id'])) {
        echo "<div id='titreProfil'>" . $_SESSION['prenom'] . " " . $_SESSION['nom'] . "</div>";
    } elseif (isset($_SESSION['idAdmin'])) {
        echo "<div id='titreProfil'>" . $_SESSION['prenomAdmin'] . " " . $_SESSION['nomAdmin'] . "</div>";
    }
    ?>
    <form method="post" action="../modele/deconnexionUtilisateur.php">
        <button type="submit" name="submit" id="deconnexion">
            <div id="logoDeco"></div>
            <p><?php switch ($_SESSION['langue']){
                case 'francais':
                    echo 'Déconnexion';
                    break;
                case 'anglais':
                echo 'Log out';
                break;
                }
                ?></p></button>
    </form>
    <a href="Accueil.php"><img src="../images/maison.png" id="maisonAccueil" alt=""></a>
</header>