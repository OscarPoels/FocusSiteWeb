<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mes Tests</title>
    <link rel="stylesheet" href="../Stylesheets/SyntheseResultat.css"/>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location: connexion.php");
}

include 'MenuVerticalProfil.php';
include('header.php');


$db = new PDO('mysql:host=localhost;dbname=focus', 'root', '');
$id = $_SESSION['id'];

$sql = "SELECT COUNT(*) as NbTotalTest FROM test WHERE numeroUtilisateur = '$id'";
$res = $db->prepare($sql);
$res->execute();
$resultat = $res->fetch();
$nbTotalTest = $resultat['NbTotalTest'];

$sql3 = "SELECT COUNT(*) as NbTestValide FROM test WHERE numeroUtilisateur = '$id' AND validation = 'oui'";
$res3 = $db->prepare($sql3);
$res3->execute();
$resultat3 = $res3->fetch();
$nbTestValide = $resultat3['NbTestValide'];
if($nbTotalTest != 0) {
    $pourcentageReussite = round(($nbTestValide / $nbTotalTest) * 100, 1);
}else{
    $pourcentageReussite = 0;
}

if ($_SESSION['langue'] == 'francais') {
    echo "<div id='sous_titre'>" . ' Nombre total de test(s) effectué(s) : ' . $nbTotalTest . "</div>";
    echo "<div id='reussiteTotale'>" . ' Pourcentage de réussite total : ' . $pourcentageReussite . " %" . "</div>";
} else {
    echo "<div id='sous_titre'>" . ' Total number of test(s) performed: ' . $nbTotalTest . "</div>";
    echo "<div id='reussiteTotale'>" . ' Percentage of total success: ' . $pourcentageReussite . " %" . "</div>";
}
?>

<div class="supportClientGauche">
    <div class="BoutonClient">
        <img src="../avatars/<?php echo $_SESSION['avatar'] ?>" style="width: 7.5%;height: 50px" id="photo"
             alt=""/>
        <?php
        if ($_SESSION['langue'] == 'francais') {
            echo "<p id='infoClient'>" . " Mesure de la fréquence cardiaque";
        } else {
            echo "<p id='infoClient'>" . "Heart rate measurement";
        }
        ?>
        <img src="../images/courbeCardiaque.jpg" id="illustrationCard" alt="">
        <?php
        $sqlCard = "SELECT COUNT(*) as NbTestValideCardiaque FROM test WHERE numeroUtilisateur = '$id' AND 
            capteur = 'Cardiaque' AND validation = 'oui'";
        $resCard = $db->prepare($sqlCard);
        $resCard->execute();
        $resultatCard = $resCard->fetch();
        $nbTestValideCard = $resultatCard['NbTestValideCardiaque'];
        if($nbTotalTest != 0) {
            $pourcentageReussiteCardiaque = round(($nbTestValideCard / $nbTotalTest) * 100, 1);
        } else {
            $pourcentageReussiteCardiaque = 0;
        }
        if ($_SESSION['langue'] == 'francais') {
            echo "<div id='reussite'>" . ' Pourcentage de réussite  : ' . $pourcentageReussiteCardiaque . " %" . "</div>";
        } else {
            echo "<div id='reussite'>" . ' Percentage of total success : ' . $pourcentageReussiteCardiaque . " %" . "</div>";
        }
        ?>
    </div>
    <div class="BoutonClient">
        <img src="../avatars/<?php echo $_SESSION['avatar'] ?>" style="width: 7.5%;height: 50px" id="photo"
             alt=""/>
        <?php
        if ($_SESSION['langue'] == 'francais') {
            echo "<p id='infoClientTona'>" . " Mesure de reconnaissance de tonalité";
        } else {
            echo "<p id='infoClientTona'>" . " Tone recognition measurement";
        }
        ?>
        <img src="../images/microElec.jpeg" id="illustrationTona" alt="">
        <?php
        $sqlTona = "SELECT COUNT(*) as NbTestValideTonalite FROM test WHERE numeroUtilisateur = '$id' AND 
            capteur = 'Tonalite' AND validation = 'oui'";
        $resTona = $db->prepare($sqlTona);
        $resTona->execute();
        $resultatTona = $resTona->fetch();
        $nbTestValideTona = $resultatTona['NbTestValideTonalite'];
        if($nbTotalTest != 0) {
            $pourcentageReussiteTonalite = round(($nbTestValideTona / $nbTotalTest) * 100, 1);
        } else {
            $pourcentageReussiteTonalite = 0;
        }
        if ($_SESSION['langue'] == 'francais') {
            echo "<div id='reussite'>" . ' Pourcentage de réussite  : ' . $pourcentageReussiteTonalite . " %" . "</div>";
        } else {
            echo "<div id='reussite'>" . ' Percentage of total success : ' . $pourcentageReussiteTonalite . " %" . "</div>";
        }
        ?>
    </div>
    <div class="BoutonClient">
        <img src="../avatars/<?php echo $_SESSION['avatar'] ?>" style="width: 7.5%;height: 50px" id="photo"
             alt=""/>
        <?php
        if ($_SESSION['langue'] == 'francais') {
            echo "<p id='infoClientSon'>" . " Mesure de réaction à un stimulus sonore";
        } else {
            echo "<p id='infoClientSon'>" . " Measurement of reaction to a sound stimulus";
        }
        ?>
        <img src="../images/sonLogo.png" id="illustrationSonore" alt="">
        <?php
        $sqlSon = "SELECT COUNT(*) as NbTestValideSonore FROM test WHERE numeroUtilisateur = '$id' AND 
            capteur = 'Sonore' AND validation = 'oui'";
        $resSon = $db->prepare($sqlSon);
        $resSon->execute();
        $resultatSon = $resSon->fetch();
        $nbTestValideSon = $resultatSon['NbTestValideSonore'];
        if($nbTotalTest != 0) {
            $pourcentageReussiteSonore = round(($nbTestValideSon / $nbTotalTest) * 100, 1);
        } else {
            $pourcentageReussiteSonore = 0;
        }
        if ($_SESSION['langue'] == 'francais') {
            echo "<div id='reussiteSonore'>" . ' Pourcentage de réussite  : ' . $pourcentageReussiteSonore . " %" . "</div>";
        } else {
            echo "<div id='reussiteSonore'>" . ' Percentage of total success : ' . $pourcentageReussiteSonore . " %" . "</div>";
        }
        ?>
    </div>
</div>


<div class="supportClientDroite">
    <div class="BoutonClient">
        <img src="../avatars/<?php echo $_SESSION['avatar'] ?>" style="width: 7.5%;height: 50px" id="photo"
             alt=""/>
        <?php
        if ($_SESSION['langue'] == 'francais') {
            echo "<p id='infoClient'>" . " Mesure de la temperature de la peau";
        } else {
            echo "<p id='infoClient'>" . "Skin temperature measurement";
        }
        ?>
        <img src="../images/temperature.jpg" id="illustrationTemp" alt="">
        <?php
        $sqlTemp = "SELECT COUNT(*) as NbTestValideTemperature FROM test WHERE numeroUtilisateur = '$id' AND 
            capteur = 'Temperature' AND validation = 'oui'";
        $resTemp = $db->prepare($sqlTemp);
        $resTemp->execute();
        $resultatTemp = $resTemp->fetch();
        $nbTestValideTemp = $resultatTemp['NbTestValideTemperature'];
        if($nbTotalTest != 0) {
            $pourcentageReussiteTemperature = round(($nbTestValideTemp / $nbTotalTest) * 100, 1);
        } else {
            $pourcentageReussiteTemperature = 0;
        }
        if ($_SESSION['langue'] == 'francais') {
            echo "<div id='reussite'>" . ' Pourcentage de réussite  : ' . $pourcentageReussiteTemperature . " %" . "</div>";
        } else {
            echo "<div id='reussite'>" . ' Percentage of total success : ' . $pourcentageReussiteTemperature . " %" . "</div>";
        }
        ?>
    </div>
    <div class="BoutonClient">
        <img src="../avatars/<?php echo $_SESSION['avatar'] ?>" style="width: 7.5%;height: 50px" id="photo"
             alt=""/>
        <?php
        if ($_SESSION['langue'] == 'francais') {
            echo "<p id='infoClientVisu'>" . " Mesure de réaction à un stimulus visuel";
        } else {
            echo "<p id='infoClientVisu'>" . " Measuring reaction to a visual stimulus";
        }
        ?>
        <img src="../images/visu.jpg" id="illustrationVisu" alt="">
        <?php
        $sqlVisu = "SELECT COUNT(*) as NbTestValideVisuel FROM test WHERE numeroUtilisateur = '$id' AND 
            capteur = 'Visuel' AND validation = 'oui'";
        $resVisu = $db->prepare($sqlVisu);
        $resVisu->execute();
        $resultatVisu = $resVisu->fetch();
        $nbTestValideVisu = $resultatVisu['NbTestValideVisuel'];
        if($nbTotalTest != 0) {
            $pourcentageReussiteVisuel = round(($nbTestValideVisu / $nbTotalTest) * 100, 1);
        } else {
            $pourcentageReussiteVisuel = 0;
        }
        if ($_SESSION['langue'] == 'francais') {
            echo "<div id='reussiteVisu'>" . ' Pourcentage de réussite  : ' . $pourcentageReussiteVisuel . " %" . "</div>";
        } else {
            echo "<div id='reussiteVisu'>" . ' Percentage of total success : ' . $pourcentageReussiteVisuel . " %" . "</div>";
        }
        ?>
    </div>
</div>


</body>
</html>
