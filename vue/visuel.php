<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mes tests</title>
    <link rel="stylesheet" href="../Stylesheets/Capteurs.css"/>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>  <!-- Importer scripte pour les logos -->
</head>

<body>
<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location: connexion.php");
}

include ('header.php');
include('MenuVerticalProfil.php');

$db = new PDO('mysql:host=localhost;dbname=focus', 'root', '');
$id = $_SESSION['id'];

$sql2 = "SELECT COUNT(*) as NbVisuel FROM test WHERE numeroUtilisateur = '$id' AND  capteur = 'Visuel'";
$res2 = $db->prepare($sql2);
$res2->execute();
$resultat2 = $res2->fetch();
$nbTotalTest = $resultat2['NbVisuel'];

switch ($_SESSION['langue']) {
    case 'francais':
        ?>
        <div id="titre"> Mes tests de mesure de réaction à un stimulus visuel</div>
        <?php
        echo "<div id='sous_titre'>" . ' Nombre de test(s) effectué(s) : ' . $nbTotalTest . "</div>";
        break;
    case 'anglais':
        ?>
        <div id="titre"> Mes tests de mesure de réaction à un stimulus visuel</div>
        <?php
        echo "<div id='sous_titre'>" . ' Number of test (s) performed: ' . $nbTotalTest . "</div>";
        break;
}

if ($nbTotalTest == 0) {
    if ($_SESSION['langue'] == 'francais') {
        echo '<div class="Texte"> Vous n\'avez effectué aucun test de réaction à un stimulus visuel ! N\'attendez plus ! </div>';
    } else {
        echo '<div class="Texte"> You have not performed any reaction to a visual stimulus! do not wait any longer! </div>';
    }
} else {
    $sql3 = "SELECT COUNT(*) as NbTestValide FROM test WHERE numeroUtilisateur = '$id' AND capteur = 'Visuel' AND validation = 'oui'";
    $res3 = $db->prepare($sql3);
    $res3->execute();
    $resultat3 = $res3->fetch();
    $nbTestValide = $resultat3['NbTestValide'];
    $pourcentageReussite = round(($nbTestValide / $nbTotalTest) * 100, 1);
    if ($_SESSION['langue'] == 'francais') {
        echo "<div id='reussite'>" . ' Pourcentage de réussite  : ' . $pourcentageReussite . " %" . "</div>";
    } else {
        echo "<div id='reussite'>" . ' Percentage of success: ' . $pourcentageReussite . " %" . "</div>";
    }
    switch ($nbTotalTest) {
        // Nb d'utilisateurs == nombre pair
        case $nbTotalTest % 2 == 0:
            $moitie = ($nbTotalTest / 2);

            $allIDGauchePair = $db->prepare("SELECT * FROM test WHERE numeroUtilisateur = '$id' AND
            capteur = 'Visuel' ORDER BY dateTest DESC LIMIT 0,$moitie ");
            $allIDGauchePair->execute();

            $allIDDroitePair = $db->prepare("SELECT * FROM test WHERE numeroUtilisateur = '$id' 
            AND capteur = 'Visuel' ORDER BY dateTest DESC LIMIT $moitie,$nbTotalTest ");
            $allIDDroitePair->execute();
            ?>
            <div class="supportClientGauche">
                <?php
                while ($row = $allIDGauchePair->fetch()) {
                    ?>
                    <div class="BoutonClient">
                        <img src="avatars/<?php echo $_SESSION['avatar'] ?>" style="width: 7.5%;height: 50px" id="photo"
                             alt=""/>
                        <?php
                        if ($_SESSION['langue'] == 'francais'){
                            echo "<p id='infoClient'>" . " " . $row['capteur'] . " :    Score = " . $row['score'];
                        }else {
                            echo "<p id='infoClient'>" . " " . $row['capteurAnglais'] . " :    Score = " . $row['score'];
                        }
                        echo "<p id='date'>" . $row['dateTest'];
                        if ($row['validation'] == 'non') {
                            ?>
                            <img src="../images/jaugeSup.png" id="jaugeSup" alt="">
                            <p id="etatNON">TRY AGAIN ! </p>
                            <img src="../images/croix.png" id="nonValidee" style="width: 6%;height: 7%" alt="">
                            <?php
                            echo "<p id='infoTmps' style='color: #c70700'>" . $row['score'];
                        } else if ($row['validation'] == 'oui') { ?>
                            <img src="../images/jaugeOK.png" id="jaugeOK" alt="">
                            <p id="etatOK">SUCCESS ! </p>
                            <img src="../images/valide.png" id="valide" style="width: 5%;height:6%" alt="">
                            <?php
                            echo "<p id='infoTmps' style='color: #03c700'>" . $row['score'];
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
                        <img src="avatars/<?php echo $_SESSION['avatar'] ?>" style="width: 7.5%;height: 50px" id="photo"
                             alt=""/>
                        <?php
                        if ($_SESSION['langue'] == 'francais'){
                            echo "<p id='infoClient'>" . " " . $row2['capteur'] . " :    Score = " . $row2['score'];
                        }else {
                            echo "<p id='infoClient'>" . " " . $row2['capteurAnglais'] . " :    Score = " . $row2['score'];
                        }
                        echo "<p id='date'>" . $row2['dateTest'];
                        if ($row2['validation'] == 'non') {
                            ?>
                            <img src="../images/jaugeSup.png" id="jaugeSup" alt="">
                            <p id="etatNON">TRY AGAIN ! </p>
                            <img src="../images/croix.png" id="nonValidee" style="width: 6%;height: 7%" alt="">
                            <?php
                            echo "<p id='infoTmps' style='color: #c70700'>" . $row2['score'];
                        } else if ($row2['validation'] == 'oui') { ?>
                            <img src="../images/jaugeOK.png" id="jaugeOK" alt="">
                            <p id="etatOK">SUCCESS ! </p>
                            <img src="../images/valide.png" id="valide" style="width: 5%;height:6%" alt="">
                            <?php
                            echo "<p id='infoTmps' style='color: #03c700'>" . $row2['score'];
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

            $allIDGaucheImpair = $db->prepare("SELECT * FROM test WHERE numeroUtilisateur = '$id' AND 
            capteur = 'Visuel' ORDER BY dateTest DESC LIMIT 0,$moitie ");
            $allIDGaucheImpair->execute();

            $allIDDroiteImpair = $db->prepare("SELECT * FROM test WHERE numeroUtilisateur = '$id' 
            AND  capteur = 'Visuel' ORDER BY dateTest DESC LIMIT $moitie,$nbTotalTest ");
            $allIDDroiteImpair->execute();
            ?>
            <div class="supportClientGauche">
                <?php
                while ($row3 = $allIDGaucheImpair->fetch()) {
                    ?>
                    <div class="BoutonClient">
                        <img src="avatars/<?php echo $_SESSION['avatar'] ?>" style="width: 7.5%;height: 50px" id="photo"
                             alt=""/>
                        <?php
                        if ($_SESSION['langue'] == 'francais'){
                            echo "<p id='infoClient'>" . " " . $row3['capteur'] . " :    Score = " . $row3['score'];
                        }else {
                            echo "<p id='infoClient'>" . " " . $row3['capteurAnglais'] . " :    Score = " . $row3['score'];
                        }
                        echo "<p id='date'>" . $row3['dateTest'];
                        if ($row3['validation'] == 'non') {
                            ?>
                            <img src="../images/jaugeSup.png" id="jaugeSup" alt="">
                            <p id="etatNON">TRY AGAIN ! </p>
                            <img src="../images/croix.png" id="nonValidee" style="width: 6%;height: 7%" alt="">
                            <?php
                            echo "<p id='infoTmps' style='color: #c70700'>" . $row3['score'];
                        } else if ($row3['validation'] == 'oui') { ?>
                            <img src="../images/jaugeOK.png" id="jaugeOK" alt="">
                            <p id="etatOK">SUCCESS ! </p>
                            <img src="../images/valide.png" id="valide" style="width: 5%;height:6%" alt="">
                            <?php
                            echo "<p id='infoTmps' style='color: #03c700'>" . $row3['score'];
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
                        <img src="avatars/<?php echo $_SESSION['avatar'] ?>" style="width: 7.5%;height: 50px" id="photo"
                             alt=""/>
                        <?php
                        if ($_SESSION['langue'] == 'francais'){
                            echo "<p id='infoClient'>" . " " . $row4['capteur'] . " :    Score = " . $row4['score'];
                        }else {
                            echo "<p id='infoClient'>" . " " . $row4['capteurAnglais'] . " :    Score = " . $row4['score'];
                        }
                        echo "<p id='date'>" . $row4['dateTest'];
                        if ($row4['validation'] == 'non') {
                            ?>
                            <img src="../images/jaugeSup.png" id="jaugeSup" alt="">
                            <p id="etatNON">TRY AGAIN ! </p>
                            <img src="../images/croix.png" id="nonValidee" style="width: 6%;height: 7%" alt="">
                            <?php
                            echo "<p id='infoTmps' style='color: #c70700'>" . $row4['score'];
                        } else if ($row4['validation'] == 'oui') { ?>
                            <img src="../images/jaugeOK.png" id="jaugeOK" alt="">
                            <p id="etatOK">SUCCESS ! </p>
                            <img src="../images/valide.png" id="valide" style="width: 5%;height:6%" alt="">
                            <?php
                            echo "<p id='infoTmps' style='color: #03c700'>" . $row4['score'];
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
}
?>
</body>
</html>
