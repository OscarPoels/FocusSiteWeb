<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Profil</title>
    <link rel="stylesheet" href="MesTests.css"/>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>  <!-- Importer scripte pour les logos -->

</head>

<body>
<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location: Connexion.php");
}

?>

<div class="barreHeader">
    <?php
    if (isset($_SESSION['prenom']) AND isset($_SESSION['nom'])) {
        echo "<div id='titreProfil'>" . $_SESSION['prenom'] . " " . $_SESSION['nom'] . "</div>";
    }
    ?>
    <form method="post" action="includes/deconnexionUtilisateur.php">
        <button type="submit" name="submit" id="deconnexion">&emsp;Deconnexion&emsp;</button>
    </form>
    <a href="Accueil.php"><img src="images/maison.png" id="maisonAccueil" alt=""></a>
</div>

<?php include("MenuVerticalProfil.php"); ?>


<?php
if(isset($_SESSION['nombreTests'])){
    echo '<div class="Texte"> Impossible de charger vos tests, veuillez contacter un administrateur </div>';
}
else{
    if($_SESSION['nombreTest'] == 0){
        echo '<div class="Texte"> Vous n\'avez effectué aucun test ou ils ont été supprimés </div>';
    }
    else {
        $db = new PDO('mysql:host=localhost;dbname=focus_g6d', 'root', '');
        $id = $_SESSION['id'];


        $sql2 = "SELECT COUNT(*) as Nb FROM test";
        $res2 = $db->prepare($sql2);
        $res2->execute();
        $resultat2 = $res2->fetch();
        $res2->closeCursor();


        for($i = 1; $i <= $resultat2['Nb']; $i++) {
            $sql = "SELECT * FROM test WHERE numeroUtilisateur = '$id' AND numeroTest = '$i'";
            $res = $db->prepare($sql);
            $res->execute();
            $resultat = $res->fetch();

            echo '<div class="Resultat"> Test numéro : ' . $resultat['numeroTest'] . '</div>';
            echo '<div class="Resultat"> Test effectué : ' . $resultat['capteur'] . '</div>';
            echo '<div class="Resultat">Score obtenu : ' . $resultat['score'] . '</div>';
            echo '<div id="Blanc"></div>';
        }
    }
}

?>




</body>
</html>