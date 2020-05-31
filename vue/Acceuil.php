<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="../Stylesheets/Accueil.css"/>
</head>

<body>


<scroll-page class="page1" id="page1">
    <?php include("MenuHorizontalAccueil.php"); ?>
    <div class="rectangle"></div>

    <!-- Traduction texte -->
    <?php
    /*
    $texte1 = "";
    $texte1FR = "<h1> Besoin de tests <br> psycotechniques ?</h1>";
    $texte1AN = "<h1>You need psycotechnicals <br> measures ?</h1>";
    $texte1ESP = "<h1>Necessitas<br> blabalbalab</h1>";

    switch ($_GET['langue']){
        case "anglais":
            $texte1 = $texte1AN;
            echo $texte1;
            break;
        case "espagnol":
            $texte1 = $texte1ESP;
            echo $texte1;
            break;
        case "francais":
            $texte1 = $texte1FR;
            echo $texte1;
            break;
    }
    */
    ?>

    <h1><p class="texte1"> Besoin de tests <br> psychotechniques ? </p></h1>
    <h1><p class="texte2"> Infinite Measures crée FOCUS </p></h1>
    <h3><p class="phraseAccroche">Leader dans la mise en place de <br> mesures psycotechniques dans les auto écoles</p>
    </h3>
</scroll-page>


<scroll-page class="page2" id="page2">
    <img id="imagePage2" src="../images/BarreQuiSommesNous.jpg">
    <h1>
        <div class="titre">QUI SOMMES NOUS ?</div>
    </h1>
    <div class="carre_gauche">
        <img src="../images/focus.png" id="logoFocus" alt="">
        <img src="../images/Infinite_measures.png" id="logoInfiniteMeasures" alt="">
        <p class="texte" id="para1">Fondé en septembre 2017 suite à l’appel d’offre de la société
            Infinite Measures, FOCUS est une start up de 5 jeunes, motivés
            à mettre en place des systèmes &emsp;&emsp;&emsp;&emsp; de mesures psychotechniques
            dans les auto écoles.
        </p>
        <h3><p class="texte" id="sous_titre">Perte de permis ? En periode de tests ? Sécurité !</p></h3>
        <p class="texte" id="para2">Focus propose les tests nécessaires à valider, directement depuis
            votre ordinateur <br> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;ou alors en auto
            école.</p>
        <p class="texte" id="para3">Ces mesures psychotechniques sont de plus en plus courantes
            dans différents <br> &emsp; domaines dont celui de l’auto école et Focus se veut être 1er vendeur <br>
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; de cette offre !</p>
    </div>

    <div class="carre_droite">
        <h1>
            <div class="titre" id="titre1">NOS CLIENTS</div>
        </h1>
        <img src="../images/auto_ecole.jpg" id="autoEcole1" alt="">
        <img src="../images/autoEcole.png" id="autoEcole2" alt="">
        <p class="texte" id="texte_client">Equiper les auto écoles de tests de mesures psycotechniques <br>&emsp;&emsp;&emsp;&emsp;&emsp;
            et proposer un suivi pour le client <br>&emsp;(fréquence cardiaque, réflexes, température de la peau...)</p>
        <h1>
            <div class="titre" id="titre2">COMMENT ET POURQUOI ?</div>
        </h1>
        <img src="../images/analyse.jpg" id="analyse" alt="">
        <ul id="liste_commentPourquoi">
            <li>Boitier éléctroniques rempli de capteurs</li>
            <li>Passerelle bluetooth entres les capteurs et <br> notre plateforme<br><br></li>
            <li>Assurer plus de sécurité au volant et proposer un suivi à différentes fréquences en fonction <br> du
                client
            </li>
        </ul>
    </div>

    <h1><p class="texte" id="stat">STATISTIQUES ET ENGAGEMENTS</p></h1>
    <div class="statistiques_engagements">
        <img src="../images/l1.png" id="l1" alt="">
        <h3><p class="texte" id="titrel1">Prix le plus bas du marché</p></h3>
        <img src="../images/l2.png" id="l2" alt="">
        <h3><p class="texte" id="titrel2">Annulation sans frais</p></h3>
        <img src="../images/l3.png" id="l3" alt="">
        <h3><p class="texte" id="titrel3">95% de taux de réussite</p></h3>
        <img src="../images/l4.png" id="l4" alt="">
        <h3><p class="texte" id="titrel4">Tests agréés par les préféctures</p></h3>
    </div>
</scroll-page>


<scroll-page class="page3" id="page3">
    <h1><p class="titre" id="titrePage3">NOS DIFFERENTS TESTS</p></h1>

    <div class="FrequenceCardiaque">
        <div id="barreTitreCardiaque"></div>
        <h3>
            <div class="titreTest" id="titreFreqCardiaque">Mesure de la fréquence cardiaque</div>
        </h3>
        <img src="../images/cardiaque.png" id="imageCardiaque" alt="">
        <p id="paraCardiaque">La prise en charge de la fréquence cardiaque est une fonctionnalité primordiale.
            Elle nous permet <br> d’évaluer le taux de stress chez l’individu. <br><br>
            Cette mesure sera réalisé avec un phototransistor et calculera le flux sanguin de la personne réalisant <br>
            le test. <br><br>
            Exemple de cas : mauvaise période pour le conducteur, surplus de responsabilitées au volant et perte <br>
            totale du contrôle</p>
        <a class="Bouton" id="boutonCardiaque" href="Connexion.php">&emsp;&emsp;&emsp;&emsp;&emsp;Faire le test</a>
    </div>

    <div class="Tonalité">
        <div id="barreTitreTonalite"></div>
        <h3>
            <div class="titreTest" id="titreTonalite">Mesure de la reconnaissance de tonalité</div>
        </h3>
        <img src="../images/micro.jpg" id="imageTonalite" alt="">
        <p id="paraTonalite">La mesure de la reconnaissance de tonalité est la deuxième fonctionnalité primordiale. Elle
            nous <br>
            permet d’évaluer l’analyse sonore du conducteur face à différents sons. <br><br>
            Cette mesure est réalisée grâce à un micro qui va analyser le son reproduit par le client une fois <br>
            celui-ci ayant reçus un son entre x et y Hz dans un casque. <br><br> Exemple de cas : Capacité d'écoute et
            d'analyse des
            différents sons rencontrés sur la route <br>(klaxon, sirènes pompiers...)</p>
        <a class="Bouton" id="boutonTonalite" href="Connexion.php">&emsp;&emsp;&emsp;&emsp;&emsp;Faire le test</a>
    </div>

    <div class="Temperature">
        <div id="barreTitreTemp"></div>
        <h3>
            <div id="titreTemperature">Mesure de la température superficielle de la peau</div>
        </h3>
        <img src="../images/temperature.jpg" id="imageTemp" alt="">
        <p id="paraTemp">La prise en charge de la fréquence cardiaque est une fonctionnalité primordiale. Elle nous
            permet <br> d’évaluer
            le taux de stress chez l’individu et également d'évoluer la fièvre et fatigue du conducteur <br><br>
            Cette mesure sera réalisé avec un phototransistor et calculera le flux sanguin de la personne réalisant <br>
            le test. <br><br>
            Exemple de cas : mauvaise période pour le conducteur, surplus de responsabilités au volant et perte <br>
            totale du contrôle </p>
        <a class="Bouton" id="boutonTemp" href="Connexion.php">&emsp;&emsp;&emsp;&emsp;&emsp;Faire le test</a>
    </div>

    <div id="barreTitreStimulus"></div>
    <div id="separateurStimu"></div>

    <div class="Sonore">
        <h3>
            <div id="titreStimuSonore">Réaction à un stimulus sonore</div>
        </h3>
        <img src="../images/casque.jpg" id="imageSon" alt="">
        <p id="paraSon">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Ce test calcule votre temps de réaction suite à l’envoie
            d’un son <br>
            d’une fréquence aléatoire entre 440Hz
            et 1760Hz dans un casque audio puis suite à l’envoie <br>
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;d’une succession de son toutes les 1 seconde.<br>
            &emsp;&emsp;&emsp;Le temps est calculé par l’intermédiaire d’un chronomètre et d’un bouton poussoir <br>
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; que vous devez pousser des le son reçu. </p>
        <a class="Bouton" id="boutonSon" href="Connexion.php">&emsp;&emsp;&emsp;&emsp;&emsp;Faire le test</a>
    </div>

    <div class="Visuel">
        <h3>
            <div id="titreStimuVisu">Réaction à un stimulus visuel</div>
        </h3>
        <img src="../images/visu.jpg" id="imageVisu" alt="">
        <p id="paraVisu">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Ce test calcule votre temps de réaction suite à l’allumage
            d’une LED <br> dans un
            intervalle de 1 à 10 secondes puis suite à une succession d’allumage de <br> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; la LED toutes les 1 seconde. <br> &emsp;&emsp;&emsp;
            Le temps est calculé par l’intermédiaire d’un chronomètre et d’un bouton poussoir <br>
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;que vous devez pousser dès la LED allumé. </p>
        <a class="Bouton" id="boutonVisu" href="Connexion.php">&emsp;&emsp;&emsp;&emsp;&emsp;Faire le test</a>
    </div>
</scroll-page>


<scroll-page class="footer">
    <footer>
        <div class="logos">
            <a href="#page2"><img src="../images/focus.png" id="Focus" alt=""></a>
            <a href="#page2"><img src="../images/Infinite_measures.png" id="Infinite_Measures" alt=""></a>
        </div>
        <div class="contenu">
            <a href="#page1" id="footerAccueil">Accueil</a>
            <a href="ConditionsUtilisations.php" id="mention_legales">Mention légales</a>
            <a href="mailto:infinitemeasures.focus@gmail.com" id="mail">&emsp;@ Nous contacter &emsp;</a>
        </div>
    </footer>
</scroll-page>

</body>
</html>
