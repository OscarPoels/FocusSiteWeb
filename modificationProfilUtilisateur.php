<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profil</title>
    <link rel="stylesheet" href="Stylesheets/modificationProfilUtilisateur.css"/>
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
?>

<?php
if (isset($_GET['mdp'])) {
    if ($_GET['mdp'] == 'false') {
        echo "<div id='failed' >Mot de passe incorrect</div>";
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
?>

<div class="barreHeader">
    <?php
    if (isset($_SESSION['id'])) {
        echo "<div id='titreProfil'>" . $_SESSION['prenom'] . " " . $_SESSION['nom'] .
            "- Edition Profil" . "</div>";
    }
    ?>
    <form method="post" action="includes/deconnexionUtilisateur.php">
        <button type="submit" name="submit" id="deconnexion">&emsp;Deconnexion&emsp;</button>
    </form>
    <a href="Accueil.php"><img src="images/maison.png" id="maisonAccueil" alt=""></a>
</div>

<div id="contourPhoto">
    <img src="avatars/<?php echo $_SESSION["avatar"] ?>" id="photoProfil"
         alt=""/>

</div>
<div id="nomProfil"></div>
<div class="infoProfil">
    <div class="statsTexte" id='stat1'>Membre depuis :</div>
    <div class="barre" id='barreStat1'></div>
    <?php
    if (isset($_SESSION['DateInscription'])) {
        echo "<div class=\"stats\" id='dateInscription'>" . $_SESSION['DateInscription'] . "</div>";
    } else {
        echo "<div  class=\"stats\" id='dateInscription'> N/A </div>";
    }
    ?>
    <div class="statsTexte" id='stat2'>Age :</div>
    <div class="barre" id='barreStat2'></div>
    <?php
    if (isset($_SESSION['age'])) {
        echo "<div class=\"stats\" id='age'>" . $_SESSION['age'] . " ans" . "</div>";
    } else {
        echo "<div class=\"stats\" id='age'> N/A </div>";
    }
    ?>
    <div class="statsTexte" id='stat3'>Nombre de tests :</div>
    <div class="barre" id='barreStat3'></div>
    <?php
    if (isset($_SESSION['nombreTest'])) {
        echo "<div class=\"stats\" id='nbTests'>" . $_SESSION['nombreTest'] . "</div>";
    } else {
        echo "<div class=\"stats\" id='nbTests'> N/A </div>";
    }
    ?>
    <div class="statsTexte" id='stat4'>Points :</div>
    <div class="barre" id='barreStat4'></div>

    <?php
    if (isset($_SESSION['points'])) {
        echo "<div class=\"stats\" id='nbPoints'>" . $_SESSION['points'] . "</div>";
    } else {
        echo "<div class=\"stats\" id='nbPoints'> N/A </div>";
    }
    ?>
</div>


<div class="Texte" id="GrandTitre"> Compléter vos informations</div>

<form method="post" name="myForm" action="includes/db.modification.php"
      onsubmit="return verifyPass(this.NewMdp, this.confirmNewMdp)"
      enctype="multipart/form-data">
    <div class="ChampsDeModification">
        <div class="Box" id="Box1">
            <input id="FormPrenom" type="text" class="MoitierInput" placeholder="Prenom"
                   value="<?php echo $_SESSION['prenom']; ?>" size="21"
                   name="prenom">
            <input id="FormNom" type="text" class="MoitierInput" placeholder="Nom"
                   value="<?php echo $_SESSION['nom']; ?>" size="21"
                   name="nom">
        </div>
        <div class="Box" id="Box2">
            <div class="PetiteBarre" id="PetiteBarreGauche" alt="Barre design"></div>
            <div class="PetiteBarre" id="PetiteBarreDroite" alt="Barre design"></div>
        </div>
        <div class="Box" id="Box3">
            <input id="Email" type="email" placeholder="Email" value="<?php echo $_SESSION['mail']; ?>"
                   size="50" name="mail">
        </div>
        <div class="Box" id="Box4">
            <div class="Barre" alt="Barre design"></div>
        </div>
        <div class="Box" id="Box5">
            <input id="MdpActuel" name="mdp" type="password" minlength="6" maxlength="24"
                   placeholder="Mot de passe actuel" size="50" required>
        </div>
        <div class="Box" id="Box6">
            <div class="Barre" alt="Barre design"></div>
        </div>
        <div class="Box" id="Box7">
            <input id="NewMdp" name="newMdp" type="password" minlength="6" maxlength="24"
                   placeholder="Nouveau mot de passe"
                   size="50">
        </div>
        <div class="Box" id="Box8">
            <div class="Barre" alt="Barre design"></div>
        </div>
        <div class="Box" id="Box9">
            <input id="ConfirmerNewMdp" name="confirmNewMdp" type="password" minlength="6" maxlength="24"
                   placeholder="Confirmer nouveau mot de passe" size="50">
        </div>
        <div class="Box" id="Box10">
            <div class="Barre" alt="Barre design"></div>
        </div>
        <div class="Box" id="Box11">
            <label>Photo de Profil : &emsp;</label>
            <input id="avatar" name="avatar" type="file">
        </div>
    </div>
    <button type="submit" id="BoutonEnregistrerModif" name="submit">
        Enregistrer
    </button>
</form>

<a class="Bouton" id="BoutonAnnulerModif" href="ProfilUtilisateur.php">Annuler</a>


<div id="barreBas"></div>

</body>
</html>