<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestion FAQ</title>
    <link rel="stylesheet" href="Stylesheets/GestionFAQ.css"/>
</head>

<body>
<div class="barreHeader">
    <h2><p id="titreProfil">GESTION DE LA FAQ </p></h2>
    <form method="post" action="includes/deconnexionUtilisateur.php">
        <button type="submit" name="submit" id="deconnexion">&emsp;Deconnexion&emsp;</button>
    </form>
    <a id="retouradmin" href="ProfilAdmin.php">&emsp;Retour au menu Administrateur&emsp;</a>
    <a href="Accueil.php"><img src="images/maison.png" id="maisonAccueil" alt=""></a>
</div>
<div class="SecondeBarre">
    <a id="Sectionlike" > Questions avec le plus de réactions </a>
    <a id="SectionRecente" > Questions Récentes </a>
</div>
<hr>
<div class="BackgroundLike">
    <a class="Un" ></a>
    <a href="#"> <img src="images/perso.jpg" id="photo" alt=""> </a>
    <a href="#" id="Nom" > Guillaume Durand </a>
    <a id="Question"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi u
        t aliquip ex ea com</a>
    <a id="nombreLikes"> 17 Likes </a>
    <a href="#" id="repondre"> Répondre </a>
</div>
<div class="BackgroundRecent">
    <a class="Un"></a>
    <a href="#"> <img src="images/profil3.jpg" id="photo2" alt=""> </a>
    <a href="#" id="Nom" > Juliette Blanc </a>
    <a id="Question"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi u
        t aliquip ex ea com </a>
    <a id="nombreLikes"> 8 Likes </a>
    <a href="#" id="repondre"> Répondre </a>
</div>
</body>

</html>