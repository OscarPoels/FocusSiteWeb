<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FAQ</title>
    <link rel="stylesheet" href="../Stylesheets/FAQConsulter.css"/>
</head>

<body>
<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=focus', 'root', '');

// Requete pour compter le nombre TOTAL de questions VALIDEES
$nombreTotalQuestions = $db->prepare("SELECT COUNT(*) AS nombreTotalQuestions FROM faq where validation='oui'");
$nombreTotalQuestions->execute();
$nombreTotal = $nombreTotalQuestions->fetch();
// Nombre total d'inscris
$nbTotal = $nombreTotal['nombreTotalQuestions'];


switch ($_SESSION['langue']) {
    case 'francais':
        ?>
        <div id="titre">Bienvenue dans la FAQ de FOCUS</div>
        <?php
        echo "<div id='sous_titre'>" . ' Nombre total de questions : ' . $nbTotal . "</div>";
        ?>
        <a href="FAQ.php" id="retourFAQ">Accueil FAQ</a>
        <a href="Connexion.php" id="retourProfil">Mon Profil</a>
        <?php
        break;
    case 'anglais':
        ?>
        <div id="titre">Welcome to the FAQ of FOCUS</div>
        <?php
        echo "<div id='sous_titre'>" . ' Total number of questions : ' . $nbTotal . "</div>";
        ?>
        <a href="FAQ.php" id="retourFAQ">FAQ - Home</a>
        <a href="Connexion.php" id="retourProfil">My profile</a>
        <?php
        break;
}
?>

<a href="Accueil.php"><img src="../images/maison.png" id="maisonAccueil" alt="" style="width: 3%;height: 5%"></a>


<?php
// Requette pour ne travailler qu'avec les infos des utilisateurs dont leurs questions ont ete validées
$requeteValidation = $db->prepare("SELECT * FROM faq WHERE validation = 'oui'");
$requeteValidation->execute();

switch ($nbTotal) {
    // Nb de messages == nombre pair
    case $nbTotal % 2 == 0:
        $moitie = ($nbTotal / 2);

        $allIDGauchePair = $db->prepare("SELECT * FROM faq LIMIT 0,$moitie");
        $allIDGauchePair->execute();

        $allIDDroitePair = $db->prepare("SELECT * FROM faq LIMIT $moitie,$nbTotal ");
        $allIDDroitePair->execute();

        ?>
        <div class="supportClientGauche">
            <?php
            while ($row = $allIDGauchePair->fetch() and $val = $requeteValidation->fetch()) {
                $avatarAuteur = $val['idAuteur'];
                $requeteAvatar = $db->prepare("SELECT avatar AS avatar FROM user WHERE id = $avatarAuteur");
                $requeteAvatar->execute();
                $avatar = $requeteAvatar->fetch();
                $avatar = $avatar['avatar'];
                ?>
                <div class="contourQuestion">
                    <img src="avatars/<?php echo $avatar ?>" style="width: 6.5%;height: 45px" id="photo"
                         alt=""/>
                    <?php
                    if ($_SESSION['langue'] == 'francais'){
                        echo "<p id='infoAuteurQuestion'>" . $val['auteur'] . ' / ' . $val['titre'] . "</p>";
                        echo "<p id='date'>" . $val['dateCreation'] . "</p>";
                        echo "<p id='questionTitre'>" . 'Question :' . "</p>";
                        echo "<p id='contenuQuestion'>" . '"' . $val['contenu'] . '"' . "</p>";
                    }else {
                        echo "<p id='infoAuteurQuestion'>" . $val['auteur'] . ' / ' . $val['titreAnglais'] . "</p>";
                        echo "<p id='date'>" . $val['dateCreation'] . "</p>";
                        echo "<p id='questionTitre'>" . 'Question :' . "</p>";
                        echo "<p id='contenuQuestion'>" . '"' . $val['contenuAnglais'] . '"' . "</p>";
                    }

                    ?>
                    <div id="barreSeparatrice"></div>
                    <?php
                    if ($_SESSION['langue'] == 'francais') {
                        echo "<p id='reponseTitre'>" . 'Reponse de FOCUS :' . "</p>";
                        echo "<p id='contenuReponse'>" . '"' . $val['reponse'] . '"' . "</p>";
                    } else if ($_SESSION['langue'] == 'anglais') {
                        echo "<p id='reponseTitre'>" . 'FOCUS response :' . "</p>";
                        echo "<p id='contenuReponse'>" . '"' . $val['reponseAnglais'] . '"' . "</p>";
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="supportClientDroite">
            <?php
            while ($row2 = $allIDDroitePair->fetch() and $val2 = $requeteValidation->fetch()) {
                $avatarAuteur = $val2['idAuteur'];
                $requeteAvatar = $db->prepare("SELECT avatar AS avatar FROM user WHERE id = $avatarAuteur");
                $requeteAvatar->execute();
                $avatar = $requeteAvatar->fetch();
                $avatar = $avatar['avatar'];
                ?>
                <div class="contourQuestion">
                    <img src="avatars/<?php echo $avatar ?>" style="width: 6.5%;height: 45px" id="photo"
                         alt=""/>
                    <?php
                    if ($_SESSION['langue'] == 'francais'){
                        echo "<p id='infoAuteurQuestion'>" . $val2['auteur'] . ' / ' . $val2['titre'] . "</p>";
                        echo "<p id='date'>" . $val2['dateCreation'] . "</p>";
                        echo "<p id='questionTitre'>" . 'Question :' . "</p>";
                        echo "<p id='contenuQuestion'>" . '"' . $val2['contenu'] . '"' . "</p>";
                    }else {
                        echo "<p id='infoAuteurQuestion'>" . $val2['auteur'] . ' / ' . $val2['titreAnglais'] . "</p>";
                        echo "<p id='date'>" . $val2['dateCreation'] . "</p>";
                        echo "<p id='questionTitre'>" . 'Question :' . "</p>";
                        echo "<p id='contenuQuestion'>" . '"' . $val2['contenuAnglais'] . '"' . "</p>";
                    }
                    ?>
                    <div id="barreSeparatrice"></div>
                    <?php
                    if ($_SESSION['langue'] == 'francais') {
                        echo "<p id='reponseTitre'>" . 'Reponse de FOCUS :' . "</p>";
                        echo "<p id='contenuReponse'>" . '"' . $val2['reponse'] . '"' . "</p>";
                    } else if ($_SESSION['langue'] == 'anglais') {
                        echo "<p id='reponseTitre'>" . 'FOCUS response :' . "</p>";
                        echo "<p id='contenuReponse'>" . '"' . $val2['reponseAnglais'] . '"' . "</p>";
                    }
                    ?>
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
        ?>
        <div class="supportClientGauche">
            <?php
            while ($row3 = $allIDGaucheImpair->fetch() and $val3 = $requeteValidation->fetch()) {
                $avatarAuteur = $val3['idAuteur'];
                $requeteAvatar = $db->prepare("SELECT avatar AS avatar FROM user WHERE id = $avatarAuteur");
                $requeteAvatar->execute();
                $avatar = $requeteAvatar->fetch();
                $avatar = $avatar['avatar'];
                ?>
                <div class="contourQuestion">
                    <img src="avatars/<?php echo $avatar ?>" style="width: 6.5%;height: 45px" id="photo"
                         alt=""/>
                    <?php
                    if ($_SESSION['langue'] == 'francais'){
                        echo "<p id='infoAuteurQuestion'>" . $val3['auteur'] . ' / ' . $val3['titre'] . "</p>";
                        echo "<p id='date'>" . $val3['dateCreation'] . "</p>";
                        echo "<p id='questionTitre'>" . 'Question :' . "</p>";
                        echo "<p id='contenuQuestion'>" . '"' . $val3['contenu'] . '"' . "</p>";
                    }else {
                        echo "<p id='infoAuteurQuestion'>" . $val3['auteur'] . ' / ' . $val3['titreAnglais'] . "</p>";
                        echo "<p id='date'>" . $val3['dateCreation'] . "</p>";
                        echo "<p id='questionTitre'>" . 'Question :' . "</p>";
                        echo "<p id='contenuQuestion'>" . '"' . $val3['contenuAnglais'] . '"' . "</p>";
                    }
                    ?>
                    <div id="barreSeparatrice"></div>
                    <?php
                    if ($_SESSION['langue'] == 'francais') {
                        echo "<p id='reponseTitre'>" . 'Reponse de FOCUS :' . "</p>";
                        echo "<p id='contenuReponse'>" . '"' . $val3['reponse'] . '"' . "</p>";
                    } else if ($_SESSION['langue'] == 'anglais') {
                        echo "<p id='reponseTitre'>" . 'FOCUS response :' . "</p>";
                        echo "<p id='contenuReponse'>" . '"' . $val3['reponseAnglais'] . '"' . "</p>";
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="supportClientDroite">
            <?php
            while ($row4 = $allIDDroiteImpair->fetch() and $val4 = $requeteValidation->fetch()) {
                $avatarAuteur = $val4['idAuteur'];
                $requeteAvatar = $db->prepare("SELECT avatar AS avatar FROM user WHERE id = $avatarAuteur");
                $requeteAvatar->execute();
                $avatar = $requeteAvatar->fetch();
                $avatar = $avatar['avatar'];
                ?>
                <div class="contourQuestion">
                    <img src="avatars/<?php echo $avatar ?>" style="width: 6.5%;height: 45px" id="photo"
                         alt=""/>
                    <?php
                    if ($_SESSION['langue'] == 'francais'){
                        echo "<p id='infoAuteurQuestion'>" . $val4['auteur'] . ' / ' . $val4['titre'] . "</p>";
                        echo "<p id='date'>" . $val4['dateCreation'] . "</p>";
                        echo "<p id='questionTitre'>" . 'Question :' . "</p>";
                        echo "<p id='contenuQuestion'>" . '"' . $val4['contenu'] . '"' . "</p>";
                    }else {
                        echo "<p id='infoAuteurQuestion'>" . $val4['auteur'] . ' / ' . $val4['titreAnglais'] . "</p>";
                        echo "<p id='date'>" . $val4['dateCreation'] . "</p>";
                        echo "<p id='questionTitre'>" . 'Question :' . "</p>";
                        echo "<p id='contenuQuestion'>" . '"' . $val4['contenuAnglais'] . '"' . "</p>";
                    }
                    ?>
                    <div id="barreSeparatrice"></div>
                    <?php
                    if ($_SESSION['langue'] == 'francais') {
                        echo "<p id='reponseTitre'>" . 'Reponse de FOCUS :' . "</p>";
                        echo "<p id='contenuReponse'>" . '"' . $val4['reponse'] . '"' . "</p>";
                    } else if ($_SESSION['langue'] == 'anglais') {
                        echo "<p id='reponseTitre'>" . 'FOCUS response :' . "</p>";
                        echo "<p id='contenuReponse'>" . '"' . $val4['reponseAnglais'] . '"' . "</p>";
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
