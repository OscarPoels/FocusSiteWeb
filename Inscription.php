<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Inscription.css"/>
    <title>Inscription</title>
</head>
<body>
<div class="gauche"><img src="images/PageConnexion.jpg" alt="Photo page de connexion"/></div>
<div class="droite">
    <div class="Texte" id="Inscription"> Inscription</div>
    <div class="Texte" id="SousTexteInscription"> Remplissez les champs ci-dessous pour compléter votre incription</div>
    <div class="ChampsDeConnexion">
        <form method="post" action="TraitementInscription.php">
            <div class="Box" id="Box1">
                <input id="FormPrenom" type="text" name="prenom" class="MoitierInput" placeholder="Prénom" size="14"
                       required>
                <label id="FormNom">
                    <input type="text" class="MoitierInput" placeholder="Nom" size="14" required>
                </label>
            </div>
            <div class="Box" id="Box2">
                <div class="PetiteBarre" alt="Barre design"></div>
                <div class="PetiteBarre" alt="Barre design"></div>
            </div>
            <div class="Box" id="Box3">
                <input id="Mdp" type="password" placeholder="Mot de passe" size="34" required>
            </div>
            <div class="Box" id="Box4">
                <div class="Barre" alt="Barre design"></div>
            </div>
            <div class="Box" id="Box5">
                <input id="ConfirmerMdp" type="password" placeholder="Confirmer mot de passe" size="34" required>
            </div>
            <div class="Box" id="Box6">
                <div class="Barre" alt="Barre design"></div>
            </div>
            <div class="Box" id="Box7">
                <input id="E-mail" type="email" placeholder="Email" size="34" required>
            </div>
            <div class="Box" id="Box8">
                <div class="Barre" alt="Barre design"></div>
            </div>
            <div class="Box" id="Box9">
                <input id="CodeTest" type="text" placeholder="Code Test" size="34" required>
            </div>
            <div class="Box" id="Box10">
                <div class="Barre" alt="Barre design"></div>
            </div>
        </form>
    </div>
</body>
</html>