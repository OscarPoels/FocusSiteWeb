<!DOCTYPE html>
<?php session_start() ?>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Stylesheets/FAQ.css"/>
    <title>Connexion</title>
</head>


<body>

<div class="gauche"><img src="../images/PageConnexion.jpg" alt="Photo page de connexion"/></div>
<div class="droite">
    <a href="Accueil.php"><img src="../images/maison.png" id="maisonAccueil" alt="" style="width: 3%;height: 5%"></a>
    <div class="Texte" id="GrandTitre"> FAQ</div>
    <?php
    switch ($_SESSION['langue']) {
        case 'francais':
            ?>
            <div class="Texte" id="SousTitre"> Veuillez choisir l'option souhaitée</div>
            <div class="Texte" id="option1"> Option 1 : Vous n'avez pas forcemment de compte et souhaitez consulter la
                FAQ ?
            </div>
            <a href="FAQConsulter.php" id="consulterFAQ"> Consulter la FAQ</a>
            <div class="Texte" id="option2"> Option 2 : Vous avez un compte et souhaitez proposer votre question pour la
                FAQ ?
            </div>
            <a class="Bouton" href="../controleurs/utilisateur.php?vue=testEcritureFAQ" id="ecrireFAQ">Proposer une question pour la
                FAQ</a><?php
            break;
        case 'anglais':
            ?>
            <div class="Texte" id="SousTitre">
                Please choose the desired option
            </div>
            <div class="Texte" id="option1">
                Option 1: You do not necessarily have an account and wish to consult the
                FAQ?
            </div>
            <a href="FAQConsulter.php" id="consulterFAQ">
                Consult the FAQ</a>
            <div class="Texte" id="option2">
                Option 2: You have an account and wish to submit your question for the
                FAQ?
            </div>
            <a class="Bouton" href="../controleurs/utilisateur.php?vue=testEcritureFA" id="ecrireFAQ">
                Suggest a question for the
                Faq</a><?php
            break;
    }
    ?>
</div>
</body>
</html>


