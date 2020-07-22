<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Stylesheets/FAQEcrire.css"/>
    <title>FAQ</title>
</head>

<body>
<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=focus', 'root', '');


if (isset($_GET['envoie'])) {
    switch ($_GET['envoie']) {
        case 'succes':
            if ($_SESSION['langue'] == 'francais') {
                echo "<div id='succes'>Votre question a bien été envoyé ! </div>";
                echo "<div id='succes2'>Votre question et sa réponse seront disponible si votre question est pertinente</div>";
            } else {
                echo "<div id='succes'>Your question has been sent </div>";
                echo "<div id='succes2'>Your question and answer will be available in the FAQ if FOCUS valide it</div>";
            }
            break;
        default:
            break;
    }
}
?>

<div class="gauche">
    <img src="../images/PageConnexion.jpg" alt="Photo page de connexion"/>
</div>

<?php
switch ($_SESSION['langue']) {
    case 'francais':
        ?>
        <div class="droite">
            <div class="Texte" id="GrandTitre"> Enregistrer votre question dans la FAQ</div>
            <div class="Texte" id="SousTitre"> Veuillez remplir les informations suivantes</div>
            <a href="Accueil.php"><img src="../images/maison.png" id="maisonAccueil" alt=""></a>
            <a href="Connexion.php" id="retourProfil">Mon profil</a>

            <form method="post" action="../modele/ajoutQuestionFAQ.php">
                <div class="ChampsDeFAQ">
                    <label for="nom"></label>
                    <input id="nom" type="text" name="nom" placeholder="Entrez votre nom" value="<?php echo $_SESSION['prenom'];
                    echo ' ';
                    echo $_SESSION['nom'] ?> " size="50" required/>
                    <div class="Barre" id="barre1" alt="Barre design"></div>

                    <label for="titreQuestion"></label>
                    <input id="titreQuestion" type="text" minlength="2" maxlength="50" name="titreQuestion"
                           placeholder="Donnez un titre à votre quesiton (50 caractères MAX)" size="50" required/>
                    <div class="Barre" id="barre2" alt="Barre design"></div>
                    <label for="contenuQuestion">
           <textarea id="contenuQuestion" name="contenu" style="width:430px;height: 140px"
                     placeholder="Posez votre question (500 caractères maximum !)" minlength="10" maxlength="500"
                     required></textarea>
                </div>
                <button type="submit" name="submit" id="boutonEnvoyerQuestion">
                    Envoyer !
                </button>
            </form>


        </div>
        <?php
        break;
    case 'anglais':
        ?>
        <div class="droite">
            <div class="Texte" id="GrandTitre">Register your question in the FAQ</div>
            <div class="Texte" id="SousTitre">Please fill in the following information</div>
            <a href="Accueil.php"><img src="../images/maison.png" id="maisonAccueil" alt=""></a>
            <a href="Connexion.php" id="retourProfil">My profile</a>

            <form method="post" action="../modele/ajoutQuestionFAQ.php">
                <div class="ChampsDeFAQ">
                    <label for="nom"></label>
                    <input id="nom" type="text" name="nom" placeholder="Enter your name" value="<?php echo $_SESSION['prenom'];
                    echo ' ';
                    echo $_SESSION['nom'] ?> " size="50" required/>
                    <div class="Barre" id="barre1" alt="Barre design"></div>

                    <label for="titreQuestion"></label>
                    <input id="titreQuestion" type="text" minlength="10" maxlength="50" name="titreQuestion"
                           placeholder="Give a title to your quesiton (50 characters MAX)" size="50" required/>
                    <div class="Barre" id="barre2" alt="Barre design"></div>
                    <label for="contenuQuestion">
           <textarea id="contenuQuestion" name="contenu" style="width:430px;height: 140px"
                     placeholder="Ask your question (500 characters maximum!)" minlength="10" maxlength="500"
                     required></textarea>
                </div>
                <button type="submit" name="submit" id="boutonEnvoyerQuestion">
                    Send !
                </button>
            </form>


        </div>
        <?php
        break;
}
?>


</body>
</html>


