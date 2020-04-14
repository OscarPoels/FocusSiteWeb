<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Inscription.css"/>
    <title>Inscription</title>
    <script type="text/javascript">
        function verify(element1, element2) {
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
<div class="gauche"><img src="images/PageConnexion.jpg" alt="Photo page de connexion"/></div>
<div class="droite">
    <div class="Texte" id="Inscription"> Inscription</div>
    <div class="Texte" id="SousTexteInscription"> Remplissez les champs ci-dessous pour compléter votre incription</div>
    <form method="post" action="" onsubmit=" return verify(this.Mdp, this.ConfirmerMdp)">
        <div class="ChampsDeConnexion">
            <div class="Box" id="Box1">
                <input id="FormPrenom" type="text" class="MoitierInput" placeholder="Prénom" size="21"
                       required>
                <input id="FormNom" type="text" class="MoitierInput" placeholder="Nom" size="21" required>
            </div>
            <div class="Box" id="Box2">
                <div class="PetiteBarre" id="PetiteBarreGauche" alt="Barre design"></div>
                <div class="PetiteBarre" id="PetiteBarreDroite" alt="Barre design"></div>
            </div>
            <div class="Box" id="Box3">
                <input id="Mdp" name="Mdp" type="password" placeholder="Mot de passe" size="50" required>
            </div>
            <div class="Box" id="Box4">
                <div class="Barre" alt="Barre design"></div>
            </div>
            <div class="Box" id="Box5">
                <input id="ConfirmerMdp" name="ConfirmerMdp" type="password" placeholder="Confirmer mot de passe"
                       size="50" required>
            </div>
            <div class="Box" id="Box6">
                <div class="Barre" alt="Barre design"></div>
            </div>
            <div class="Box" id="Box7">
                <input id="E-mail" type="email" placeholder="Email" size="50" required>
            </div>
            <div class="Box" id="Box8">
                <div class="Barre" alt="Barre design"></div>
            </div>
            <div class="Box" id="Box9">
                <input id="CodeTest" type="text" pattern="[0-9]{8}" placeholder="Code Test" size="50" required>
            </div>
            <div class="Box" id="Box10">
                <div class="Barre" alt="Barre design"></div>
            </div>
        </div>
        <div id="Box11">
            <input type="checkbox" id="AccepterCGU" name="AccepterCGU" required/>
            <label for="AccepterCGU">J'accepte les
                <a id="ConditionUtilisation" href="">conditions d'utilisation</a>
            </label>
        </div>
        <input type="submit" id="BoutonInscription" value="Inscription">
    </form>
    <a id="Connexion" href="Connexion.php">Vous avez déjà un compte ? Connectez vous</a>
</body>