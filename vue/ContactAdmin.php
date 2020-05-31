<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profil</title>
    <link rel="stylesheet" href="../Stylesheets/ContactAdmin.css"/>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>


<body>
<?php
if (isset($_SESSION['id'])) {
    header("location: Connexion.php");
}

session_start();
$db = new PDO('mysql:host=localhost;dbname=focus', 'root', '');

include('header.php');
include('infoProfil.php');
include('MenuVerticalProfil.php');

?>

<div id="nomProfil"></div>

<div class="Texte" id="GrandTitre"> Contacter un administrateur</div>

<?php
if (isset($_GET['mail'])) {
    if ($_GET['mail'] == 'correct') {
        echo "<div id='correct' >Votre demande a été envoyé avec succès</div>";
    } else if ($_GET['mail'] == 'fail') {
        echo "<div id='fail'> Votre demande n'a pas pu être traitée, veuillez contacter notre service technique</div> ";

    }
}
?>

<form method="post" name="myForm" action="../controleurs/utilisateur.php?vue=ContactAdmin"
      id="fondInfo"
      enctype="multipart/form-data">
    <div class="ChampsDeModification">
        <label id="sujet">Sujet<br>
            <input type="text" id="textSujet" name="sujet" required></label><br><br>
        <label id="demande">Votre demande <br><textarea id="textDemande" name="demande" rows="20" cols="70" required></textarea></label>
    </div>
    <button type="submit" id="BoutonEnvoyer" name="submit">
        Envoyer
    </button>
</form>


<div id="barreBas"></div>

</body>
</html>