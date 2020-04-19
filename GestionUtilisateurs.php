<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Utilisateurs</title>
    <link rel="stylesheet" href="GestionUtilisateurs.css"/>
</head>

<body>
<div class="barreHeader">
    <h2><p id="titreProfil">GESTION DES UTILISATEURS</p></h2>
    <form method="post" action="includes/deconnexionUtilisateur.php">
        <button type="submit" name="submit" id="deconnexion">&emsp;Deconnexion&emsp;</button>
    </form>
    <a id="retouradmin" href="ProfilAdmin.php">&emsp;Retour au menu Administrateur&emsp;</a>
    <a href="Accueil.php"><img src="images/maison.png" id="maisonAccueil" alt=""></a>
</div>


<?php
//TODO
// Relier a la bdd pour supprimer et avoir acces aux profils des utilisateurs
?>
<div class="BoutonClient">
    <a href="#"><img src="images/perso.jpg" id="pdp" alt="" </a>
    <a href="#" id="nomClient"> Guillaume Durand, N° Client : 295 </a>
    <a href ="#" id="modificationsProfil" > Infos Client </a>
    <a id="suppressionProdil" > Supprimer </a>
</div>
<div class="BoutonClient2">
    <a href="#"><img src="images/profil3.jpg" id="pdp2" alt=""</a>
    <a href="#" id="nomClient"> Juliette Blanc, N° Client : 132 </a>
    <a href ="#" id="modificationsProfil" > Infos Client </a>
    <a id="suppressionProdil" > Supprimer </a>
</div>
<div class="BoutonClient3">
    <a href="#"><img src="images/profil2.jpg" id="pdp3" alt=""</a>
    <a href="#" id="nomClient"> Jacques Bernard, N° Client : 29  </a>
    <a href ="#" id="modificationsProfil" > Infos Client </a>
    <a id="suppressionProdil" > Supprimer </a>
</div>
</body
>
</html>

