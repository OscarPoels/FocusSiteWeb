<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profil</title>
    <link rel="stylesheet" href="modificationProfilUtilisateur.css"/>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>  <!-- Importer scripte pour les logos -->

</head>

<body>
<?php session_start(); ?>

<div class="barreHeader">
    <?php
    if (isset($_SESSION['idUtilisateur']) AND isset($_SESSION['PrenomUtilisateur']) AND isset($_SESSION['NomUtilisateur'])) {
        echo "<div id='titreProfil'>" . $_SESSION['PrenomUtilisateur'] . " " . $_SESSION['NomUtilisateur'] . "- Edition Profil" . "</div>";
    }
    ?>
    <form method="post" action="includes/deconnexionUtilisateur.php">
        <button type="submit" name="submit" id="deconnexion">&emsp;Deconnexion&emsp;</button>
    </form>
    <a href="Accueil.php"><img src="images/maison.png" id="maisonAccueil" alt=""></a>
</div>

<div class="infoProfil"></div>
<img src="images/perso.jpg" id="photoProfil" alt=""/>
<div id="contourPhoto"></div>
<div id="nomProfil"></div>

<?php

if (isset($_SESSION['idUtilisateur']) AND isset($_SESSION['DateInscription']) AND isset($_SESSION['NombreTestsUtilisateur']) AND isset($_SESSION['NombrePointsUtilisateur'])) {
    echo "<div id='stat1'>" . "Membre depuis :" . "</div>";
    echo "<div id='dateInscription'>" . $_SESSION['DateInscription'] . "</div>";
    echo "<div id='barreStat1'>" . "</div>";

    echo "<div id='stat2'>" . "Age :" . "</div>";
    echo "<div id='age'>" . $_SESSION['AgeUtilisateur'] . " ans" . "</div>";
    echo "<div id='barreStat2'>" . "</div>";


    echo "<div id='stat3'>" . "Nombre de tests :" . "</div>";
    echo "<div id='nbTests'>" . $_SESSION['NombreTestsUtilisateur'] . "</div>";
    echo "<div id='barreStat3'>" . "</div>";

    echo "<div id='stat4'>" . "Nombre de points :" . "</div>";
    echo "<div id='nbPoints'>" . $_SESSION['NombrePointsUtilisateur'] . "</div>";
}
?>

<?php


if (isset($_SESSION['idUtilisateur']) AND isset($_SESSION['PrenomUtilisateur']) AND isset($_SESSION['NomUtilisateur']) AND isset($_SESSION['MailUtilisateur'])) {
    $prenomUser = $_SESSION['PrenomUtilisateur'];
    $nomUser = $_SESSION['NomUtilisateur'];
    $emailUser = $_SESSION['MailUtilisateur'];
}
?>

<form method="post" action="">
    <div class="ChampsDeModification">
        <div class="Box" id="Box1">
            <input id="FormPrenom" type="text" class="MoitierInput"  placeholder="Prenom" value="<?php echo $prenomUser?>" size="21"
                   name="newPrenomUtilisateur"
                   required>
            <input id="FormNom" type="text" class="MoitierInput" placeholder="Nom" value="<?php echo $nomUser?>" size="21" required
                   name="newNomUtilisateur">
        </div>
        <div class="Box" id="Box2">
            <div class="PetiteBarre" id="PetiteBarreGauche" alt="Barre design"></div>
            <div class="PetiteBarre" id="PetiteBarreDroite" alt="Barre design"></div>
        </div>
        <div class="Box" id="Box3">
            <input id="Email" type="email" placeholder="Email" value="<?php echo $emailUser?>" size="50" name="emailUtilisateur" required>
        </div>
        <div class="Box" id="Box4">
            <div class="Barre" alt="Barre design"></div>
        </div>
        <div class="Box" id="Box5">
            <input id="MdpActuel" name="mdpUtilisateur" type="password" minlength="6" maxlength="24"
                   placeholder="Mot de passe actuel" size="50" required>
        </div>
        <div class="Box" id="Box6">
            <div class="Barre" alt="Barre design"></div>
        </div>
        <div class="Box" id="Box7">
            <input id="NewMdp" name="ConfirmerMdp" type="password" placeholder="Nouveau mot de passe"
                   size="50" >
        </div>
        <div class="Box" id="Box8">
            <div class="Barre" alt="Barre design"></div>
        </div>
        <div class="Box" id="Box9">
            <input id="MdpActuel" name="mdpUtilisateur" type="password" minlength="6" maxlength="24"
                   placeholder="Confirmer nouveau mot de passe" size="50" required>
        </div>
        <div class="Box" id="Box10">
            <div class="Barre" alt="Barre design"></div>
        </div>
        <button type="submit" id="BoutonEnregistrerModif" name="submit">
            Enregistrer les modifications
        </button>
    </div>
</form>




<a class="Bouton" id="BoutonAnnulerModif" href="ProfilUtilisateur.php">&emsp;&emsp;
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Annuler</a>

<a href="#" id="barreBas"></a>



</body>
</html>