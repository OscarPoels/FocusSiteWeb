<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestion FAQ</title>
    <link rel="stylesheet" href="../Stylesheets/GestionFAQ!.css"/>
</head>

<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=focus', 'root', '');

if (isset($_GET['idQuestion'])) {
    $id = $_GET['idQuestion'];
}

$sql = $db->prepare("SELECT * FROM faq WHERE id = '$id'");
$sql->execute();
$infoQuestion = $sql->fetch();

$avatarAuteur = $infoQuestion['idAuteur'];
$requeteAvatar = $db->prepare("SELECT avatar AS avatar FROM user WHERE id = '$avatarAuteur'");
$requeteAvatar->execute();
$avatar = $requeteAvatar->fetch();
$avatar = $avatar['avatar'];

?>

<div class="contourQuestion">
    <img src="avatars/<?php echo $avatar ?>" style="width: 5%" id="photo" alt=""/>
    <?php
    echo "<p id='infoAuteurQuestion'>" . $infoQuestion['id'] . ' / ' . $infoQuestion['auteur'] . ' / ' . $infoQuestion['titre'] . "</p>";
    switch ($infoQuestion['validation']) {
        case 'oui':
            ?>
            <p id="etatQuestion">Visible :</p>
            <img src="../images/valide.png" id="validée" style="width: 3%;height:4%" alt="">
            <?php
            break;
        case 'non':
            ?>
            <p id="etatQuestion">Visible :</p>
            <img src="../images/croix.png" id="nonValidée" style="width: 3%;height: 4%" alt="">
            <?php
            break;
        default:
            break;
    }
    echo "<p id='date'>" . $infoQuestion['dateCreation'] . "</p>";
    echo "<p id='questionTitre'>" . 'Question :' . "</p>";
    echo "<p id='contenuQuestion'>" . '"' . $infoQuestion['contenu'] . '"' . "</p>";
    ?>
    <div id="barreSeparatrice"></div>
    <?php
    echo "<p id='reponseTitre'>" . 'Reponse de FOCUS :' . "</p>";
    echo "<p id='contenuReponse'>" . '"' . $infoQuestion['reponse'] . '"' . "</p>";
    ?>
</div>



<form method="post">
    <textarea id="reponseQuestion" style="position:absolute;left: 800px;top:200px;width: 300px;height: 70px" maxlength="500" minlength="10" name="reponse"
              placeholder="Entrez votre reponse"></textarea>

    <button type="submit" name="submit" id="boutonEnvoyerReponse" style="position:absolute;left: 900px;top:300px;">
        Envoyer !
    </button>
</form>

<a id="boutonRetour" href="../controleurs/administrateur.php?vue=GestionFAQ" style="position:absolute;left: 800px;top:300px">Annuler !</a>


<?php
if (isset($_POST['submit'])) {
    $reponseQuestion = $_POST['reponse'];
    // Supprimer la question de la BDD
    $sql = $db->prepare("UPDATE faq SET reponse = '$reponseQuestion' WHERE id = '$id'");
    $sql->execute();
    header("Location: ../controleurs/administrateur.php?vue=GestionFAQ");
}


?>
