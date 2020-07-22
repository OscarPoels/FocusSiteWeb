<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Utilisateurs</title>
    <link rel="stylesheet" href="../Stylesheets/GestionUtilisateurs.css"/>
</head>

<body>
<?php
session_start();
if (!isset($_SESSION['idAdmin']) && !isset($_SESSION['idGestio'])) {
    header("location: Connexion.php");
}

include 'header.php';

$db = new PDO('mysql:host=localhost;dbname=focus', 'root', '');
// Requete pour compter le nombre d'inscris
$nombreClients = $db->prepare("SELECT COUNT(*) AS nombreClients FROM utilisateur");
$nombreClients->execute();
$nombre = $nombreClients->fetch();
// Nombre total d'inscris
$nb = $nombre['nombreClients'];
?>


<div id="titre"> Gestion des Utilisateurs</div>
<?php
echo "<div id='sous_titre'>" . ' Utilisateurs de FOCUS : ' . $nb . "</div>";
?>

<form class="barreRecherche" method="get">
    <input type="search" name="recherchePrenom" placeholder="Prenom...">
    <input type="submit" id="boutonRechercher" value="Rechercher">
</form>

<form class="barreRecherche2" method="get">
    <input type="search" name="rechercheNom" placeholder="Nom...">
    <input type="submit" id="boutonRechercher2" value="Rechercher">
</form>


<?php
switch ($nb) {
    // Nb d'utilisateurs == nombre pair
    case $nb % 2 == 0:
        $moitie = ($nb / 2);

        $allIDGauchePair = $db->prepare("SELECT * FROM utilisateur LIMIT 0,$moitie");
        $allIDGauchePair->execute();

        $allIDDroitePair = $db->prepare("SELECT * FROM utilisateur LIMIT $moitie,$nb ");
        $allIDDroitePair->execute();

        if (isset($_GET['recherchePrenom']) AND !empty($_GET['recherchePrenom'])) {
            $recherchePrenom = htmlspecialchars($_GET['recherchePrenom']);
            $allIDGauchePair = $db->prepare("SELECT * FROM utilisateur WHERE prenom LIKE '%" . $recherchePrenom .
                "%' LIMIT 0,$moitie");
            $allIDGauchePair->execute();
            $allIDDroitePair = $db->prepare("SELECT * FROM utilisateur WHERE prenom LIKE '%" . $recherchePrenom .
                "%' LIMIT $moitie,$nb");
            $allIDDroitePair->execute();
        }
        if (isset($_GET['rechercheNom']) AND !empty($_GET['rechercheNom'])) {
            $rechercheNom = htmlspecialchars($_GET['rechercheNom']);
            $allIDGauchePair = $db->prepare("SELECT * FROM utilisateur WHERE nom LIKE '%" . $rechercheNom .
                "%' LIMIT 0,$moitie");
            $allIDGauchePair->execute();
            $allIDDroitePair = $db->prepare("SELECT * FROM utilisateur WHERE nom LIKE '%" . $rechercheNom .
                "%' LIMIT $moitie,$nb");
            $allIDDroitePair->execute();
        }
        ?>
        <div class="supportClientGauche">
            <?php
            while ($row = $allIDGauchePair->fetch()) {
                ?>
                <div class="BoutonClient">
                <img src="../avatars/<?php echo $row['avatar'] ?>" id="photo" alt=""/>
                <?php
                echo "<p id='infoClient'>" . $row['prenom'] . ' ' . $row['nom'] . ' / n° id = ' . $row['id'] .
                    ' / ' . $row['mail'] . "</p>";
                ?>
                    <form method="post" action="AfficherTestUtilisateur.php?id=<?= $row['id'] ?>">
                        <button type="submit" name="submit" id="visuUtil">
                            <p>Visualiser Tests</p>
                        </button>
                    </form>
                    <?php
                if (isset($_SESSION['idAdmin'])) {
                    ?>
                    <form method="post" action="../modele/suppUtilisateur.php?id=<?= $row['id'] ?>">
                        <button type="submit" name="submit" id="supprimerProfil">
                            <p>Supprimer</p>
                        </button>
                    </form>
                    <?php
                }?>
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
                    <img src="../avatars/<?php echo $row2['avatar'] ?>" id="photo"
                         alt=""/>
                    <?php
                    echo "<p id='infoClient'>" . $row2['prenom'] . ' ' . $row2['nom'] . ' / n° id = ' . $row2['id'] .
                        ' / ' . $row2['mail'] . "</p>";
                    ?>
                    <form method="post" action="AfficherTestUtilisateur.php?id=<?= $row2['id'] ?>">
                        <button type="submit" name="submit" id="visuUtil">
                            <p>Visualiser Tests</p>
                        </button>
                    </form>
                    <?php
                if (isset($_SESSION['idAdmin'])) {
                    ?>

                    <form method="post" action="../modele/suppUtilisateur.php?id=<?= $row2['id'] ?>">
                        <button type="submit" name="submit" id="supprimerProfil">
                            <p>Supprimer</p>
                        </button>
                    </form>
                    <?php
                }?>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
        break;
    // Nb d'utilisateurs == nombre impair
    case $nb % 2 == 1:
        $moitie = (($nb - 1) / 2) + 1;

        $allIDGaucheImpair = $db->prepare("SELECT * FROM utilisateur LIMIT 0,$moitie");
        $allIDGaucheImpair->execute();

        $allIDDroiteImpair = $db->prepare("SELECT * FROM utilisateur LIMIT $moitie,$nb ");
        $allIDDroiteImpair->execute();

        if (isset($_GET['recherchePrenom']) AND !empty($_GET['recherchePrenom'])) {
            $recherchePrenom = htmlspecialchars($_GET['recherche']);
            $allIDGaucheImpair = $db->prepare("SELECT * FROM utilisateur WHERE prenom LIKE '%" . $recherchePrenom .
                "%' LIMIT 0,$moitie");
            $allIDGaucheImpair->execute();
            $allIDDroiteImpair = $db->prepare("SELECT * FROM utilisateur WHERE prenom LIKE '%" . $recherchePrenom .
                "%' LIMIT $moitie,$nb");
            $allIDDroiteImpair->execute();
        }
        if (isset($_GET['rechercheNom']) AND !empty($_GET['rechercheNom'])) {
            $rechercheNom = htmlspecialchars($_GET['rechercheNom']);
            $allIDGaucheImpair = $db->prepare("SELECT * FROM utilisateur WHERE nom LIKE '%" . $rechercheNom .
                "%' LIMIT 0,$moitie");
            $allIDGaucheImpair->execute();
            $allIDDroiteImpair = $db->prepare("SELECT * FROM utilisateur WHERE nom LIKE '%" . $rechercheNom .
                "%' LIMIT $moitie,$nb");
            $allIDDroiteImpair->execute();
        }
        ?>

        <div class="supportClientGauche">
            <?php
            while ($row3 = $allIDGaucheImpair->fetch()) {
                ?>
                <div class="BoutonClient">
                    <img src="../avatars/<?php echo $row3['avatar'] ?>" id="photo" alt=""/>
                    <?php
                    echo "<p id='infoClient'>" . $row3['prenom'] . ' ' . $row3['nom'] . ' / n° id = ' . $row3['id'] .
                        ' / ' . $row3['mail'] . "</p>";
                    ?>
                    <form method="post" action="AfficherTestUtilisateur.php?id=<?= $row3['id'] ?>">
                        <button type="submit" name="submit" id="visuUtil">
                            <p>Visualiser Tests</p>
                        </button>
                    </form>
                    <?php
                if (isset($_SESSION['idAdmin'])) {
                    ?>

                    <form method="post" action="../modele/suppUtilisateur.php?id=<?= $row3['id'] ?>">
                        <button type="submit" name="submit" id="supprimerProfil">
                            <p>Supprimer</p>
                        </button>
                    </form>
                    <?php
                }?>
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
                    <img src="../avatars/<?php echo $row4['avatar'] ?>" id="photo" alt=""/>
                    <?php
                    echo "<p id='infoClient'>" . $row4['prenom'] . ' ' . $row4['nom'] . ' / n° id = ' . $row4['id'] .
                        ' / ' . $row4['mail'] . "</p>";
                    ?>
                    <form method="post" action="AfficherTestUtilisateur.php?id=<?= $row4['id'] ?>">
                        <button type="submit" name="submit" id="visuUtil">
                            <p>Visualiser Tests</p>
                        </button>
                    </form>
                    <?php
                if (isset($_SESSION['idAdmin'])) {
                    ?>

                    <form method="post" action="../modele/suppUtilisateur.php?id=<?= $row4['id'] ?>">
                        <button type="submit" name="submit" id="supprimerProfil">
                            <p>Supprimer</p>
                        </button>
                    </form>

                    <?php
                }?>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
        break;
}


?>
</body>
</html>
