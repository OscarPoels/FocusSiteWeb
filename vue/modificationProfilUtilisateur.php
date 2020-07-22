<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profil</title>
    <link rel="stylesheet" href="../Stylesheets/modificationProfilUtilisateur.css"/>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>  <!-- Importer scripte pour les logos -->
    <script type="text/javascript">
        function verifyPass(element1, element2) {
            let passed = false;
            if (element1.value !== element2.value) {
                alert("Les mots de passe que vous avez rentrés ne sont pas identiques");
                element1.select()
            } else {
                passed = true;
            }
            return passed;
        }

    </script>
</head>

<body>
<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=focus', 'root', '');

switch ($_SESSION['langue']) {
    case 'francais':
        if (isset($_GET['modification'])) {
            if ($_GET['modification'] == 'OK') {
                echo "<div id='successModif' >Vos modifications ont bien été prises en compte </div>";
            }
        }
        if (isset($_GET['mdp'])) {
            if ($_GET['mdp'] == 'false') {
                echo "<div id='failed' >Mot de passe incorrect</div>";
            }
        }
        if (isset($_GET['erreur'])) {
            if ($_GET['erreur'] == 'true') {
                echo "<div id='failed' >Une erreur s'est produite, veuillez contacter un administrateur</div>";
            }
        }
        if (isset($_GET['photo'])) {
            switch ($_GET['photo']) {
                case 'failedImport':
                    echo "<div id='failedImport' >Une erreur s'est produite lors de l'importation</div>";
                    break;
                case 'failedFormat':
                    echo "<div id='failedFormat' >Votre photo doit être au format : jpg, jpeg, gif ou png</div>";
                    break;
                case 'failedSize':
                    echo "<div id='failedSize' >Votre photo ne doit pas dépasser 2 MO</div>";
                    break;
                default:
                    break;
            }
        }
        break;
    case 'anglais':
        if (isset($_GET['modification'])) {
            if ($_GET['modification'] == 'OK') {
                echo "<div id='successModif' >Your changes have been saved successfully</div>";
            }
        }
        if (isset($_GET['mdp'])) {
            if ($_GET['mdp'] == 'false') {
                echo "<div id='failed' >Incorrect password</div>";
            }
        }
        if (isset($_GET['erreur'])) {
            if ($_GET['erreur'] == 'true') {
                echo "<div id='failed' >An error occured, please contact an admin</div>";
            }
        }
        if (isset($_GET['photo'])) {
            switch ($_GET['photo']) {
                case 'failedImport':
                    echo "<div id='failedImport' >An error occurred during import</div>";
                    break;
                case 'failedFormat':
                    echo "<div id='failedFormat' >Your photo must be in the format: jpg, jpeg, gif or png</div>";
                    break;
                case 'failedSize':
                    echo "<div id='failedSize' >Your photo should not exceed 2 MB</div>";
                    break;
                default:
                    break;
            }
        }
        break;
}


include('header.php');
include('infoProfil.php');
include('MenuVerticalProfil.php')
?>

<div id="nomProfil"></div>

<div class="Texte" id="GrandTitre"> Complétez vos informations</div>

<form method="post" name="myForm" action="../controleurs/utilisateur.php?vue=modificationProfilUtilisateur"
      id="fondInfo"
      onsubmit="return verifyPass(this.NewMdp, this.confirmNewMdp)"
      enctype="multipart/form-data">
    <div class="ChampsDeModification">
        <div class="Box" id="Box1">
            <input id="FormPrenom" type="text" class="MoitierInput" placeholder="<?php
            if ($_SESSION['langue'] == 'francais'){
                echo 'Prenom';
            } else if ($_SESSION['langue'] == 'anglais'){
                echo 'First name';
            } ?>"
                   value="<?php echo $_SESSION['prenom']; ?>" size="21"
                   name="prenom">
            <input id="FormNom" type="text" class="MoitierInput" placeholder="<?php
            if ($_SESSION['langue'] == 'francais'){
                echo 'Nom';
            } else if ($_SESSION['langue'] == 'anglais'){
                echo 'Name';
            } ?>"
                   value="<?php echo $_SESSION['nom']; ?>" size="21"
                   name="nom">
        </div>
        <div class="Box" id="Box2">
            <div class="PetiteBarre" id="PetiteBarreGauche" alt="Barre design"></div>
            <div class="PetiteBarre" id="PetiteBarreDroite" alt="Barre design"></div>
        </div>
        <div class="Box" id="Box3">
            <input id="Email" type="email" placeholder="E-mail" value="<?php echo $_SESSION['mail']; ?>"
                   size="50" name="mail">
        </div>
        <div class="Box" id="Box4">
            <div class="Barre" alt="Barre design"></div>
        </div>
        <div class="Box" id="Box5">
            <input id="MdpActuel" name="mdp" type="password" minlength="6" maxlength="24"
                   placeholder="<?php
                   if ($_SESSION['langue'] == 'francais'){
                       echo 'Mot de passe actuel';
                   } else if ($_SESSION['langue'] == 'anglais'){
                       echo 'Password';
                   } ?>" size="50" required>
        </div>
        <div class="Box" id="Box6">
            <div class="Barre" alt="Barre design"></div>
        </div>
        <div class="Box" id="Box7">
            <input id="NewMdp" name="newMdp" type="password" minlength="6" maxlength="24"
                   placeholder="<?php
                   if ($_SESSION['langue'] == 'francais'){
                       echo 'Nouveau mot de passe';
                   } else if ($_SESSION['langue'] == 'anglais'){
                       echo 'New password';
                   } ?>"
                   size="50">
        </div>
        <div class="Box" id="Box8">
            <div class="Barre" alt="Barre design"></div>
        </div>
        <div class="Box" id="Box9">
            <input id="ConfirmerNewMdp" name="confirmNewMdp" type="password" minlength="6" maxlength="24"
                   placeholder="<?php
                   if ($_SESSION['langue'] == 'francais'){
                       echo 'Confirmer nouveau mot de passe';
                   } else if ($_SESSION['langue'] == 'anglais'){
                       echo 'Confirm password';
                   } ?>" size="50">
        </div>
        <div class="Box" id="Box10">
            <div class="Barre" alt="Barre design"></div>
        </div>
        <div class="Box" id="Box11">
            <label><?php
                if ($_SESSION['langue'] == 'francais'){
                    echo 'Photo de profil :';
                } else if ($_SESSION['langue'] == 'anglais'){
                    echo 'Profil picture :';
                } ?></label>
            <input id="avatar" name="avatar" type="file">
        </div>
    </div>
    <button type="submit" id="BoutonEnregistrerModif" name="submit">
        <?php
        if ($_SESSION['langue'] == 'francais'){
            echo 'Enregistrer';
        } else if ($_SESSION['langue'] == 'anglais'){
            echo 'Save';
        } ?>
    </button>
</form>


<div id="barreBas"></div>

</body>
</html>