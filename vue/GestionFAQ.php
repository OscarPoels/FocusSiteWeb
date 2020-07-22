<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestion FAQ</title>
    <link rel="stylesheet" href="../Stylesheets/GestionFAQ.css"/>
</head>

<body>
<?php
session_start();
if (!isset($_SESSION['idAdmin'])) {
    header("location: Connexion.php");
}
include 'header.php';

$db = new PDO('mysql:host=localhost;dbname=focus', 'root', '');

// Requete pour compter le nombre TOTAL de questions VALIDEES
$nombreTotalQuestions = $db->prepare("SELECT COUNT(*) AS nombreTotalQuestions FROM faq");
$nombreTotalQuestions->execute();
$nombreTotal = $nombreTotalQuestions->fetch();
// Nombre total de questions
$nbTotal = $nombreTotal['nombreTotalQuestions'];
?>

<div id="titre"> Gestion de la FAQ</div>
<?php
echo "<div id='sous_titre'>" . ' Nombre de questions : ' . $nbTotal . "</div>";
?>

<form class="barreRecherche" method="get">
    <input type="search" name="rechercheAuteur" placeholder="Auteur...">
    <input type="submit" id="boutonRechercher" value="Rechercher">
</form>

<form class="barreRecherche2" method="get">
    <input type="search" name="rechercheTitre" placeholder="Titre...">
    <input type="submit" id="boutonRechercher2" value="Rechercher">
</form>

<?php
switch ($nbTotal) {
    // Nb de messages == nombre pair
    case $nbTotal % 2 == 0:
        $moitie = ($nbTotal / 2);

        $allIDGauchePair = $db->prepare("SELECT * FROM faq LIMIT 0,$moitie");
        $allIDGauchePair->execute();

        $allIDDroitePair = $db->prepare("SELECT * FROM faq LIMIT $moitie,$nbTotal ");
        $allIDDroitePair->execute();

        if (isset($_GET['rechercheAuteur']) AND !empty($_GET['rechercheAuteur'])) {
            $rechercheAuteur = htmlspecialchars($_GET['rechercheAuteur']);
            $allIDGauchePair = $db->prepare("SELECT * FROM faq WHERE auteur LIKE '%" . $rechercheAuteur . "%' 
            LIMIT 0,$moitie");
            $allIDGauchePair->execute();
            $allIDDroitePair = $db->prepare("SELECT * FROM faq WHERE auteur LIKE '%" . $rechercheAuteur . "%'
             LIMIT $moitie,$nbTotal");
            $allIDDroitePair->execute();
        }
        if (isset($_GET['rechercheTitre']) AND !empty($_GET['rechercheTitre'])) {
            $rechercheTitre = htmlspecialchars($_GET['rechercheTitre']);
            $allIDGauchePair = $db->prepare("SELECT * FROM faq WHERE titre LIKE '%" . $rechercheTitre .
                "%' LIMIT 0,$moitie");
            $allIDGauchePair->execute();
            $allIDDroitePair = $db->prepare("SELECT * FROM faq WHERE titre LIKE '%" . $rechercheTitre .
                "%' LIMIT $moitie,$nbTotal");
            $allIDDroitePair->execute();
        }
        ?>
        <div class="supportClientGauche">
            <?php
            while ($row = $allIDGauchePair->fetch()) {
                $avatarAuteur = $row['idAuteur'];
                $requeteAvatar = $db->prepare("SELECT avatar AS avatar FROM utilisateur WHERE id = $avatarAuteur");
                $requeteAvatar->execute();
                $avatar = $requeteAvatar->fetch();
                $avatar = $avatar['avatar'];
                ?>
                <div class="contourQuestion">
                    <img src="../avatars/<?php echo $avatar ?>"  class="photo" alt=""/>
                    <?php
                    echo "<p id='infoAuteurQuestion'>" . $row['id'] . ' / ' . $row['auteur'] . ' / ' . $row['titre'] . "</p>";
                    switch ($row['validation']){
                        case 'oui':
                            ?>
                            <p id="etatQuestion">Visible :</p>
                            <img src="../images/valide.png" id="validée" alt="">
                            <?php
                            break;
                        case 'non':
                            ?>
                            <p id="etatQuestion">Visible :</p>
                            <img src="../images/croix.png" id="nonValidée" alt="">
                            <?php
                            break;
                        default:
                            break;
                    }
                    echo "<p id='date'>" . $row['dateCreation'] . "</p>";
                    echo "<p id='questionTitre'>" . 'Question :' . "</p>";
                    echo "<p id='contenuQuestion'>" . '"' . $row['contenu'] . '"' . "</p>";
                    ?>
                    <div id="barreSeparatrice"></div>
                    <?php
                    echo "<p id='reponseTitre'>" . 'Reponse de FOCUS :' . "</p>";
                    echo "<p id='contenuReponse'>" . '"' . $row['reponse'] . '"' . "</p>";
                    ?>
                    <form method="post" action="../modele/repondreQuestion.php?idQuestion=<?= $row['id'] ?>">
                        <button type="submit" name="repondre" id="boutonRepondreQuestion">
                            <p>Repondre</p>
                        </button>
                    </form>
                    <form method="post" action="../modele/gestionFAQValidation.php?idFAQ=<?= $row['id']?>">
                        <label id="Validation">Validation : </label>
                        <button type="submit" name="validationOui" id="boutonValidationOui">
                            <p>Oui</p>
                        </button>
                        <button type="submit" name="validationNon" id="boutonValidationNon">
                            <p>Non</p>
                        </button>
                    </form>
                    <form method="post" action="../modele/suppQuestionFAQ.php?id=<?= $row['id']?>">
                        <button type="submit" name="suppQuestion" id="boutonSuppFAQ">
                            <p>Supprimer</p>
                        </button>
                    </form>
                </div>
                <?php

            }
            ?>
        </div>
        <div class="supportClientDroite">
            <?php
            while ($row2 = $allIDDroitePair->fetch()) {
                $avatarAuteur = $row2['idAuteur'];
                $requeteAvatar = $db->prepare("SELECT avatar AS avatar FROM utilisateur WHERE id = $avatarAuteur");
                $requeteAvatar->execute();
                $avatar = $requeteAvatar->fetch();
                $avatar = $avatar['avatar'];
                ?>
                <div class="contourQuestion">
                    <img src="../avatars/<?php echo $avatar ?>" class="photo" alt=""/>
                    <?php
                    echo "<p id='infoAuteurQuestion'>" . $row2['id'] . ' / ' . $row2['auteur'] . ' / ' . $row2['titre'] . "</p>";
                    switch ($row2['validation']){
                        case 'oui':
                            ?>
                            <p id="etatQuestion">Visible :</p>
                            <img src="../images/valide.png" id="validée" alt="">
                            <?php
                            break;
                        case 'non':
                            ?>
                            <p id="etatQuestion">Visible :</p>
                            <img src="../images/croix.png" id="nonValidée"  alt="">
                            <?php
                            break;
                        default:
                            break;
                    }
                    echo "<p id='date'>" . $row2['dateCreation'] . "</p>";
                    echo "<p id='questionTitre'>" . 'Question :' . "</p>";
                    echo "<p id='contenuQuestion'>" . '"' . $row2['contenu'] . '"' . "</p>";
                    ?>
                    <div id="barreSeparatrice"></div>
                    <?php
                    echo "<p id='reponseTitre'>" . 'Reponse de FOCUS :' . "</p>";
                    echo "<p id='contenuReponse'>" . '"' . $row2['reponse'] . '"' . "</p>";
                    ?>
                    <form method="post" action="../modele/repondreQuestion.php?idQuestion=<?= $row2['id'] ?>">
                        <button type="submit" name="repondre" id="boutonRepondreQuestion">
                            <p>Repondre</p>
                        </button>
                    </form>
                    <form method="post" action="../modele/gestionFAQValidation.php?idFAQ=<?= $row2['id']?>">
                        <label id="Validation">Validation : </label>
                        <button type="submit" name="validationOui" id="boutonValidationOui">
                            <p>Oui</p>
                        </button>
                        <button type="submit" name="validationNon" id="boutonValidationNon">
                            <p>Non</p>
                        </button>
                    </form>
                    <form method="post" action="../modele/suppQuestionFAQ.php?id=<?= $row2['id']?>">
                        <button type="submit" name="suppQuestion" id="boutonSuppFAQ">
                            <p>Supprimer</p>
                        </button>
                    </form>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
        break;
    // Nb de messages == nombre impair
    case $nbTotal % 2 == 1:
        $moitie = (($nbTotal - 1) / 2) + 1;

        $allIDGaucheImpair = $db->prepare("SELECT * FROM faq LIMIT 0,$moitie");
        $allIDGaucheImpair->execute();

        $allIDDroiteImpair = $db->prepare("SELECT * FROM faq LIMIT $moitie,$nbTotal ");
        $allIDDroiteImpair->execute();

        if (isset($_GET['rechercheAuteur']) AND !empty($_GET['rechercheAuteur'])) {
            $rechercheAuteur = htmlspecialchars($_GET['rechercheAuteur']);
            $allIDGaucheImpair = $db->prepare("SELECT * FROM faq WHERE auteur LIKE '%" . $rechercheAuteur . "%' 
            LIMIT 0,$moitie");
            $allIDGaucheImpair->execute();
            $allIDDroiteImpair = $db->prepare("SELECT * FROM faq WHERE auteur LIKE '%" . $rechercheAuteur .
                "%' LIMIT $moitie,$nbTotal");
            $allIDDroiteImpair->execute();
        }
        if (isset($_GET['rechercheTitre']) AND !empty($_GET['rechercheTitre'])) {
            $rechercheTitre = htmlspecialchars($_GET['rechercheTitre']);
            $allIDGaucheImpair = $db->prepare("SELECT * FROM faq WHERE titre LIKE '%" . $rechercheTitre .
                "%' LIMIT 0,$moitie");
            $allIDGaucheImpair->execute();
            $allIDDroiteImpair = $db->prepare("SELECT * FROM faq WHERE titre LIKE '%" . $rechercheTitre .
                "%' LIMIT $moitie,$nbTotal");
            $allIDDroiteImpair->execute();
        }
        ?>
        <div class="supportClientGauche">
            <?php
            while ($row3 = $allIDGaucheImpair->fetch() /*and $val3 = $requeteValidation->fetch()*/) {
                $avatarAuteur = $row3['idAuteur'];
                $requeteAvatar = $db->prepare("SELECT avatar AS avatar FROM utilisateur WHERE id = $avatarAuteur");
                $requeteAvatar->execute();
                $avatar = $requeteAvatar->fetch();
                $avatar = $avatar['avatar'];
                ?>
                <div class="contourQuestion">
                    <img src="../avatars/<?php echo $avatar ?>"  class="photo" alt=""/>
                    <?php
                    echo "<p id='infoAuteurQuestion'>" . $row3['id'] . ' / ' . $row3['auteur'] . ' / ' . $row3['titre'] . "</p>";
                    switch ($row3['validation']){
                        case 'oui':
                            ?>
                            <p id="etatQuestion">Visible :</p>
                            <img src="../images/valide.png" id="validée" alt="">
                            <?php
                            break;
                        case 'non':
                            ?>
                            <p id="etatQuestion">Visible :</p>
                            <img src="../images/croix.png" id="nonValidée" alt="">
                            <?php
                            break;
                        default:
                            break;
                    }
                    echo "<p id='date'>" . $row3['dateCreation'] . "</p>";
                    echo "<p id='questionTitre'>" . 'Question :' . "</p>";
                    echo "<p id='contenuQuestion'>" . '"' . $row3['contenu'] . '"' . "</p>";
                    ?>
                    <div id="barreSeparatrice"></div>
                    <?php
                    echo "<p id='reponseTitre'>" . 'Reponse de FOCUS :' . "</p>";
                    echo "<p id='contenuReponse'>" . '"' . $row3['reponse'] . '"' . "</p>";
                    ?>
                    <form method="post" action="../modele/repondreQuestion.php?idQuestion=<?= $row3['id'] ?>">
                        <button type="submit" name="repondre" id="boutonRepondreQuestion">
                            <p>Repondre</p>
                        </button>
                    </form>
                    <form method="post" action="../modele/gestionFAQValidation.php?idFAQ=<?= $row3['id']?>">
                        <label id="Validation">Validation : </label>
                        <button type="submit" name="validationOui" id="boutonValidationOui">
                            <p>Oui</p>
                        </button>
                        <button type="submit" name="validationNon" id="boutonValidationNon">
                            <p>Non</p>
                        </button>
                    </form>
                    <form method="post" action="../modele/suppQuestionFAQ.php?id=<?= $row3['id']?>">
                        <button type="submit" name="suppQuestion" id="boutonSuppFAQ">
                            <p>Supprimer</p>
                        </button>
                    </form>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="supportClientDroite">
            <?php
            while ($row4 = $allIDDroiteImpair->fetch() /*and $val4 = $requeteValidation->fetch()*/) {
                $avatarAuteur = $row4['idAuteur'];
                $requeteAvatar = $db->prepare("SELECT avatar AS avatar FROM utilisateur WHERE id = $avatarAuteur");
                $requeteAvatar->execute();
                $avatar = $requeteAvatar->fetch();
                $avatar = $avatar['avatar'];
                ?>
                <div class="contourQuestion">
                    <img src="../avatars/<?php echo $avatar ?>" class="photo" alt=""/>
                    <?php
                    echo "<p id='infoAuteurQuestion'>" . $row4['id'] . ' / ' . $row4['auteur'] . ' / ' . $row4['titre'] . "</p>";
                    switch ($row4['validation']){
                        case 'oui':
                            ?>
                            <p id="etatQuestion">Visible :</p>
                            <img src="../images/valide.png" id="validée" alt="">
                            <?php
                            break;
                        case 'non':
                            ?>
                            <p id="etatQuestion">Visible :</p>
                            <img src="../images/croix.png" id="nonValidée"alt="">
                            <?php
                            break;
                        default:
                            break;
                    }
                    echo "<p id='date'>" . $row4['dateCreation'] . "</p>";
                    echo "<p id='questionTitre'>" . 'Question :' . "</p>";
                    echo "<p id='contenuQuestion'>" . '"' . $row4['contenu'] . '"' . "</p>";
                    ?>
                    <div id="barreSeparatrice"></div>
                    <?php
                    echo "<p id='reponseTitre'>" . 'Reponse de FOCUS :' . "</p>";
                    echo "<p id='contenuReponse'>" . '"' . $row4['reponse'] . '"' . "</p>";
                    ?>
                    <form method="post" action="../modele/repondreQuestion.php?idQuestion=<?= $row4['id'] ?>">
                        <button type="submit" name="repondre" id="boutonRepondreQuestion">
                            <p>Repondre</p>
                        </button>
                    </form>
                    <form method="post" action="../modele/gestionFAQValidation.php?idFAQ=<?= $row4['id']?>">
                        <label id="Validation">Validation : </label>
                        <button type="submit" name="validationOui" id="boutonValidationOui">
                            <p>Oui</p>
                        </button>
                        <button type="submit" name="validationNon" id="boutonValidationNon">
                            <p>Non</p>
                        </button>
                    </form>
                    <form method="post" action="../modele/suppQuestionFAQ.php?id=<?= $row4['id']?>">
                            <button type="submit" name="suppQuestion" id="boutonSuppFAQ">
                                <p>Supprimer</p>
                            </button>
                        </form>
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