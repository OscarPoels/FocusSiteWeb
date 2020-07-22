<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Stylesheets/Inscription.css"/>
    <title>Inscription</title>
    <script type="text/javascript">
        function verifyPass(element1, element2) {
            let passed = false;
            if (element1.value !== element2.value) {
                alert("Les mots de passe que vous avez rentrés ne sont pas identiques");
                element1.select()
            } else
                passed = true;
            return passed
        }
    </script>
</head>
<body>
<div class="gauche"><img src="../images/PageConnexion.jpg" alt="Photo page de connexion"/></div>
<div class="droite">
    <?php
    if ($_SESSION['langue'] == 'francais') {
        ?>
        <div id="GrandTitre"> Inscription</div>
        <div id="SousTitre"> Remplissez les champs ci-dessous pour compléter votre incription</div>
        <?php
        if (isset($_GET['inscription'])) {
            if ($_GET['inscription'] == 'failed') {
                echo "<div id='failed' >Un compte avec cette adresse e-mail existe déjà </div>";
            } else if ($_GET['inscription'] == 'succes') {
                echo "<div id='success'> Votre compte a été créé avec succès </div> ";
            }
            else if ($_GET['inscription'] == 'code') {
                echo "<div id='failed'> Votre code d'accès est incrorrect </div> ";
            }
        }
    } else if ($_SESSION['langue'] == 'anglais') {
        ?>
        <div id="GrandTitre"> Sign in</div>
        <div id="SousTitre"> Fill in the fields below to complete your registration</div>
        <?php
        if (isset($_GET['inscription'])) {
            if ($_GET['inscription'] == 'failed') {
                echo "<div id='failed' > An account with this email address already exists </div>";
            } else if ($_GET['inscription'] == 'succes') {
                echo "<div id='success'> Your account has been successfully created </div> ";
            }
        }

    }
    ?>
    <form method="post" action="../controleurs/utilisateur.php?vue=Inscription"
          onsubmit=" return verifyPass(this.Mdp, this.ConfirmerMdp)">
        <div class="ChampsDeConnexion">
            <div class="Box" id="Box1">
                <input id="FormPrenom" type="text" class="MoitierInput"
                       placeholder="<?php if ($_SESSION['langue'] == 'francais') {
                           echo 'Prenom';
                       } else if ($_SESSION['langue'] == 'anglais') {
                           echo 'First Name';
                       } ?>" size="21" name="prenom"
                       required>
                <input id="FormNom" type="text" class="MoitierInput"
                       placeholder="<?php if ($_SESSION['langue'] == 'francais') {
                           echo 'Nom';
                       } else if ($_SESSION['langue'] == 'anglais') {
                           echo 'Last Name';
                       } ?>" size="21" required name="nom">
            </div>
            <div class="Box" id="Box2">
                <div class="PetiteBarre" id="PetiteBarreGauche" alt="Barre design"></div>
                <div class="PetiteBarre" id="PetiteBarreDroite" alt="Barre design"></div>
            </div>
            <div class="Box" id="Box3">
                <input id="Mdp" minlength="6" maxlength="24" name="mdp" type="password"
                       placeholder="<?php if ($_SESSION['langue'] == 'francais') {
                           echo 'Mot de passe';
                       } else if ($_SESSION['langue'] == 'anglais') {
                           echo 'Password';
                       } ?>" size="50" required>
            </div>
            <div class="Box" id="Box4">
                <div class="Barre" alt="Barre design"></div>
            </div>
            <div class="Box" id="Box5">
                <input id="ConfirmerMdp" minlength="6" maxlength="24" name="ConfirmerMdp" type="password"
                       placeholder="<?php if ($_SESSION['langue'] == 'francais') {
                           echo 'Confirmer votre mot de passe';
                       } else if ($_SESSION['langue'] == 'anglais') {
                           echo 'Confirm your password';
                       } ?>"
                       size="50" required>
            </div>
            <div class="Box" id="Box6">
                <div class="Barre" alt="Barre design"></div>
            </div>
            <div class="Box" id="Box7">
                <input id="Email" type="email" placeholder="Email" size="50" name="mail" required>
            </div>
            <div class="Box" id="Box8">
                <div class="Barre" alt="Barre design"></div>
            </div>
            <div class="Box" id="Box9">
                <input id="CodeTest" type="text" pattern="[0-9]{8}" name="CodeTest"
                       placeholder="<?php if ($_SESSION['langue'] == 'francais') {
                           echo 'Code reçu';
                       } else if ($_SESSION['langue'] == 'anglais') {
                           echo 'Received code';
                       } ?>" size="50" required>
            </div>
            <div class="Box" id="Box10">
                <div class="Barre" alt="Barre design"></div>
            </div>
        </div>
        <div id="Box11">
            <input type="checkbox" id="AccepterCGU" name="AccepterCGU" required/>
            <?php if ($_SESSION['langue'] == 'francais') {
                ?>
                <label for="AccepterCGU">J'accepte les
                    <a id="ConditionUtilisation" href="">conditions d'utilisation</a>
                </label>
                <?php
            } else if ($_SESSION['langue'] == 'anglais') {
                ?>
                <label for="AccepterCGU">I accept the
                    <a id="ConditionUtilisation" href="">terms of use</a>
                </label>
                <?php
            } ?>
        </div>
        <button type="submit" id="BoutonInscription" name="submit">
            <?php if ($_SESSION['langue'] == 'francais') {
                ?>
                Inscription
                <?php
            } else if ($_SESSION['langue'] == 'anglais') {
                ?>
                Sign in
                <?php
            } ?>
        </button>
    </form>
    <?php if ($_SESSION['langue'] == 'francais') {
        ?>
        <a id="Connexion" href="Connexion.php">Vous avez déjà un compte ? Connectez vous</a>
        <?php
    } else if ($_SESSION['langue'] == 'anglais') {
        ?>
        <a id="Connexion" href="Connexion.php">Already have an account ? Please connect</a>
        <?php
    } ?>
</body>
</html>
