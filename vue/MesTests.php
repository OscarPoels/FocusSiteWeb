<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mes Tests</title>
    <link rel="stylesheet" href="../Stylesheets/MesTests.css"/>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
<?php
session_start();



if (!isset($_SESSION['id'])) {
    header("location: Connexion.php");
}

include 'header.php';
include 'MenuVerticalProfil.php';

$db = new PDO('mysql:host=localhost;dbname=focus', 'root', '');
$id = $_SESSION['id'];

$sql2 = "SELECT COUNT(*) as Nb FROM test WHERE numeroUtilisateur = '$id'";
$res2 = $db->prepare($sql2);
$res2->execute();
$resultat2 = $res2->fetch();
$nbTotalTest = $resultat2['Nb'];

//Mis a jour du nombre de tests effectues par un utilisateur
$requeteNbTestUser = $db->prepare("UPDATE utilisateur SET nombreTest = '$nbTotalTest' WHERE id = '$id'");
$requeteNbTestUser->execute();

$sql3 = "SELECT COUNT(*) as NbTestValide FROM test WHERE numeroUtilisateur = '$id' AND validation = 'oui'";
$res3 = $db->prepare($sql3);
$res3->execute();
$resultat3 = $res3->fetch();
$nbTestValide = $resultat3['NbTestValide'];
if($nbTestValide != 0) {
    $pourcentageReussite = round(($nbTestValide / $nbTotalTest) * 100, 1);
} else {
    $pourcentageReussite = 0;
}


switch ($_SESSION['langue']) {
    case 'francais':
        echo "<div id='sous_titre'>" . ' Nombre de test(s) effectué(s) : ' . $nbTotalTest . "</div>";
        echo "<div id='reussite'>" . ' Pourcentage de réussite total : ' . $pourcentageReussite . " %" . "</div>";

        if ($nbTotalTest == 0) {
            echo '<div class="Texte"> Vous n\'avez effectué aucun test ou ils ont été supprimés </div>';
        }
        break;
    case 'anglais':
        echo "<div id='sous_titre'>" . ' Number of test (s) performed: ' . $nbTotalTest . "</div>";
        echo "<div id='reussite'>" . ' Percentage of total success: ' . $pourcentageReussite . " %" . "</div>";

        if ($nbTotalTest == 0) {
            echo '<div class="Texte"> You have not performed any tests or they have been deleted </div>';
        }
        break;
}
?>

<?php
switch ($nbTotalTest) {
    // Nb d'utilisateurs == nombre pair
    case $nbTotalTest % 2 == 0:
        $moitie = ($nbTotalTest / 2);

        $allIDGauchePair = $db->prepare("SELECT * FROM test WHERE numeroUtilisateur = '$id' 
            ORDER BY dateTest DESC LIMIT 0,$moitie 
            ");
        $allIDGauchePair->execute();

        $allIDDroitePair = $db->prepare("SELECT * FROM test WHERE numeroUtilisateur = '$id' ORDER BY dateTest DESC
            LIMIT $moitie,$nbTotalTest ");
        $allIDDroitePair->execute();
        ?>
        <div class="supportClientGauche">
            <?php
            while ($row = $allIDGauchePair->fetch()) {
                ?>
                <div class="BoutonClient">
                    <img src="../avatars/<?php echo $_SESSION['avatar'] ?>" id="photo"
                         alt=""/>
                    <?php
                    if ($_SESSION['langue'] == 'francais'){
                        echo "<p id='infoClient'>" . " " . $row['capteur'] . " :    Score = " . $row['score'];
                    }else {
                        echo "<p id='infoClient'>" . " " . $row['capteurAnglais'] . " :    Score = " . $row['score'];
                    }
                    echo "<p id='date'>" . $row['dateTest'];
                    switch ($row['validation']) {
                        case 'oui':
                            ?>
                            <img src="../images/valide.png" id="valide" alt="">
                            <?php
                            break;
                        case 'non':
                            ?>
                            <img src="../images/croix.png" id="nonValide" alt="">
                            <?php
                            break;
                        default:
                            break;
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="supportClientDroite">
            <?php
            while ($row2 = $allIDDroitePair->fetch()) {
                ?>
                <div class="BoutonClient">
                    <img src="../avatars/<?php echo $_SESSION['avatar'] ?>" id="photo"
                         alt=""/>
                    <?php
                    if ($_SESSION['langue'] == 'francais'){
                        echo "<p id='infoClient'>" . " " . $row2['capteur'] . " :    Score = " . $row2['score'];
                    }else {
                        echo "<p id='infoClient'>" . " " . $row2['capteurAnglais'] . " :    Score = " . $row2['score'];
                    }
                    echo "<p id='date'>" . $row2['dateTest'];
                    switch ($row2['validation']) {
                        case 'oui':
                            ?>
                            <img src="../images/valide.png" id="valide" alt="">
                            <?php
                            break;
                        case 'non':
                            ?>
                            <img src="../images/croix.png" id="nonValide" alt="">
                            <?php
                            break;
                        default:
                            break;
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
        break;
    // Nb d'utilisateurs == nombre impair
    case $nbTotalTest % 2 == 1:
        $moitie = (($nbTotalTest - 1) / 2) + 1;

        $allIDGaucheImpair = $db->prepare("SELECT * FROM test WHERE numeroUtilisateur = '$id' ORDER BY dateTest DESC
            LIMIT 0,$moitie");
        $allIDGaucheImpair->execute();

        $allIDDroiteImpair = $db->prepare("SELECT * FROM test WHERE numeroUtilisateur = '$id'
            ORDER BY dateTest DESC LIMIT $moitie,$nbTotalTest ");
        $allIDDroiteImpair->execute();
        ?>
        <div class="supportClientGauche">
            <?php
            while ($row3 = $allIDGaucheImpair->fetch()) {
                ?>
                <div class="BoutonClient">
                    <img src="../avatars/<?php echo $_SESSION['avatar'] ?>" id="photo"
                         alt=""/>
                    <?php
                    if ($_SESSION['langue'] == 'francais'){
                        echo "<p id='infoClient'>" . " " . $row3['capteur'] . " :    Score = " . $row3['score'];
                    }else {
                        echo "<p id='infoClient'>" . " " . $row3['capteurAnglais'] . " :    Score = " . $row3['score'];
                    }
                    echo "<p id='date'>" . $row3['dateTest'];
                    switch ($row3['validation']) {
                        case 'oui':
                            ?>
                            <img src="../images/valide.png" id="valide" alt="">
                            <?php
                            break;
                        case 'non':
                            ?>
                            <img src="../images/croix.png" id="nonValide" alt="">
                            <?php
                            break;
                        default:
                            break;
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="supportClientDroite">
            <?php
            while ($row4 = $allIDDroiteImpair->fetch()) {
                ?>
                <div class="BoutonClient">
                    <img src="../avatars/<?php echo $_SESSION['avatar'] ?>" id="photo"
                         alt=""/>
                    <?php
                    if ($_SESSION['langue'] == 'francais'){
                        echo "<p id='infoClient'>" . " " . $row4['capteur'] . " :    Score = " . $row4['score'];
                    }else {
                        echo "<p id='infoClient'>" . " " . $row4['capteurAnglais'] . " :    Score = " . $row4['score'];
                    }
                    echo "<p id='date'>" . $row4['dateTest'];
                    switch ($row4['validation']) {
                        case 'oui':
                            ?>
                            <img src="../images/valide.png" id="valide" alt="">
                            <?php
                            break;
                        case 'non':
                            ?>
                            <img src="../images/croix.png" id="nonValide" alt="">
                            <?php
                            break;
                        default:
                            break;
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
        break;
    default:
        break;
}
?>
</body>
</html>
