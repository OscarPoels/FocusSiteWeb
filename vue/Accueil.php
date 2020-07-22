<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="../Stylesheets/Accueil.css"/>
</head>

<body>
<?php
session_start();
?>

<scroll-page class="page1" id="page1">
    <?php include("MenuHorizontalAccueil.php"); ?>
    <div class="rectangle"></div>
    <?php
    switch ($_SESSION['langue']) {
        case 'francais':
            ?>
            <h1><p class="texte1"> Besoin de tests psychotechniques ? </p></h1>
            <h1><p class="texte2"> Infinite Measures crée FOCUS </p></h1>
            <h3><p class="phraseAccroche">Leader dans la mise en place de mesures psycotechniques dans les auto
                    écoles</p></h3>
            <?php
            break;
        case 'anglais':
            ?>
            <h1><p class="texte1"> Need psychotechnical measures ? </p></h1>
            <h1><p class="texte2"> Infinite Measures created FOCUS </p></h1>
            <h3><p class="phraseAccroche">Leader of the implementation of psychotechnical measures in driving
                    schools</p></h3>
            <?php
            break;

    }
    ?>
</scroll-page>


<scroll-page class="page2" id="page2">
    <?php
    switch ($_SESSION['langue']) {
        case 'francais':
            ?>
            <h1>
                <div class="titre">QUI SOMMES NOUS ?</div>
            </h1>
            <div class="carre_gauche">
                <img src="../images/focus.png" id="logoFocus" alt="">
                <img src="../images/Infinite_measures.png" id="logoInfiniteMeasures" alt="">
                <p class="texte" id="para1">Fondé en septembre 2017 suite à l’appel d’offre de la société
                    Infinite Measures, FOCUS est une start up de 5 jeunes, motivés
                    à mettre en place des systèmes de mesures psychotechniques
                    dans les auto écoles.</p>
                <h3><p class="texte" id="sous_titre">Perte de permis ? En periode de tests ? Sécurité !</p></h3>
                <p class="texte" id="para2">Focus propose les tests nécessaires à valider, directement depuis
                    votre ordinateur ou alors en
                    auto école.</p>
                <p class="texte" id="para3">Ces mesures psychotechniques sont de plus en plus courantes
                    dans différents domaines dont celui de l’auto école et Focus se veut être 1er vendeur de cette offre
                    !</p>
            </div>

            <div class="carre_droite">
                <h1>
                    <div class="titre" id="titre1">NOS CLIENTS</div>
                </h1>
                <img src="../images/auto_ecole.jpg" id="autoEcole1" alt="">
                <img src="../images/autoEcole.png" id="autoEcole2" alt="">
                <p class="texte" id="texte_client">Equiper les auto écoles de tests de mesures psycotechniques
                    et proposer un suivi pour le client (fréquence cardiaque, réflexes, température de la
                    peau...)</p>
                <h1>
                    <div class="titre" id="titre2">COMMENT ET POURQUOI ?</div>
                </h1>
                <img src="../images/analyse.jpg" id="analyse" alt="">
                <ul id="liste_commentPourquoi">
                    <li>Boitier éléctroniques rempli de capteurs</li>
                    <li>Passerelle bluetooth entres les capteurs et notre plateforme</li>
                    <li>Assurer plus de sécurité au volant et proposer un suivi à différentes fréquences en fonction
                        du client
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
            <?php
            break;
        case 'anglais':
            ?>
            <h1>
                <div class="titre">WHO ARE WE ?</div>
            </h1>
            <div class="carre_gauche">
                <img src="../images/focus.png" id="logoFocus" alt="">
                <img src="../images/Infinite_measures.png" id="logoInfiniteMeasures" alt="">
                <p class="texte" id="para1"> Founded in September 2017 following the company's tender
                    Infinite Measures, FOCUS is a start up of 5 young boys, motivated
                    to set up systems psychotechnical measures
                    in dribing schools</p>
                <h3><p class="texte" id="sous_titre">
                        Loss of license? In testing period? Security !</p></h3>
                <p class="texte" id="para2">Focus offers the necessary tests to validate, directly from
                    your computer or in driving
                    schools .</p>
                <p class="texte" id="para3">These psychotechnical measures are more and more common
                    in different areas including driving schools and Focus wants to be the 1st seller of this offer
                    !</p>
            </div>

            <div class="carre_droite">
                <h1>
                    <div class="titre" id="titre1">OUR CLIENTS</div>
                </h1>
                <img src="../images/auto_ecole.jpg" id="autoEcole1" alt="">
                <img src="../images/autoEcole.png" id="autoEcole2" alt="">
                <p class="texte" id="texte_client">Equip driving schools with psycho-technical tests
                    and offer follow-up for the client (heart rate, reflexes, temperature of the
                    skin...)</p>
                <h1>
                    <div class="titre" id="titre2">HOW AND WHY ?</div>
                </h1>
                <img src="../images/analyse.jpg" id="analyse" alt="">
                <ul id="liste_commentPourquoi">
                    <li>Electronic box filled with sensors</li>
                    <li>Bluetooth gateway between the sensors and our web site</li>
                    <li>Ensure more safety at the wheel and offer tracking at different frequencies depending
                        of the client
                    </li>
                </ul>
            </div>

            <h1><p class="texte" id="stat">STATISTICS AND COMMITMENTS</p></h1>
            <div class="statistiques_engagements">
                <img src="../images/l1.png" id="l1" alt="">
                <h3><p class="texte" id="titrel1">The lowest price of the market</p></h3>
                <img src="../images/l2.png" id="l2" alt="">
                <h3><p class="texte" id="titrel2">Free cancellation</p></h3>
                <img src="../images/l3.png" id="l3" alt="">
                <h3><p class="texte" id="titrel3">95% success rate</p></h3>
                <img src="../images/l4.png" id="l4" alt="">
                <h3><p class="texte" id="titrel4">Tests approved by the prefectures</p></h3>
            </div>
            <?php
            break;
        case 'espagnol':
            ?>
            <?php
            break;

    }
    ?>
</scroll-page>


<scroll-page class="page3" id="page3">
    <?php
    switch ($_SESSION['langue']) {
        case 'francais':
            ?>
            <h1><p class="titre" id="titrePage3">NOS DIFFERENTS TESTS</p></h1>

            <div class="FrequenceCardiaque">
                <div id="barreTitreCardiaque"></div>
                <h3>
                    <div class="titreTest" id="titreFreqCardiaque">Mesure de la fréquence cardiaque</div>
                </h3>
                <img src="../images/cardiaque.png" id="imageCardiaque" alt="">
                <p id="paraCardiaque">La prise en charge de la fréquence cardiaque est une fonctionnalité primordiale.
                    Elle nous permet d’évaluer le taux de stress chez l’individu.
                    Cette mesure sera réalisé avec un phototransistor et calculera le flux sanguin de la personne
                    réalisant
                    le test.
                    Exemple de cas : mauvaise période pour le conducteur, surplus de responsabilitées au volant et perte

                    totale du contrôle</p>
                <a class="Bouton" id="boutonCardiaque" href="Connexion.php">Faire le
                    test</a>
            </div>

            <div class="Tonalité">
                <div id="barreTitreTonalite"></div>
                <h3>
                    <div class="titreTest" id="titreTonalite">Mesure de la reconnaissance de tonalité</div>
                </h3>
                <img src="../images/micro.jpg" id="imageTonalite" alt="">
                <p id="paraTonalite">La mesure de la reconnaissance de tonalité est la deuxième fonctionnalité
                    primordiale. Elle
                    nous
                    permet d’évaluer l’analyse sonore du conducteur face à différents sons.
                    Cette mesure est réalisée grâce à un micro qui va analyser le son reproduit par le client une fois

                    celui-ci ayant reçus un son entre x et y Hz dans un casque. Exemple de cas : Capacité
                    d'écoute et
                    d'analyse des
                    différents sons rencontrés sur la route (klaxon, sirènes pompiers...)</p>
                <a class="Bouton" id="boutonTonalite" href="Connexion.php">Faire le
                    test</a>
            </div>

            <div class="Temperature">
                <div id="barreTitreTemp"></div>
                <h3>
                    <div id="titreTemperature">Mesure de la température superficielle de la peau</div>
                </h3>
                <img src="../images/temperature.jpg" id="imageTemp" alt="">
                <p id="paraTemp">La prise en charge de la fréquence cardiaque est une fonctionnalité primordiale. Elle
                    nous
                    permet d’évaluer
                    le taux de stress chez l’individu et également d'évoluer la fièvre et fatigue du conducteur
                    Cette mesure sera réalisé avec un phototransistor et calculera le flux sanguin de la personne
                    réalisant
                    le test.
                    Exemple de cas : mauvaise période pour le conducteur, surplus de responsabilités au volant et perte

                    totale du contrôle </p>
                <a class="Bouton" id="boutonTemp" href="Connexion.php">Faire le test</a>
            </div>

            <div id="barreTitreStimulus"></div>
            <div id="separateurStimu"></div>

            <div class="Sonore">
                <h3>
                    <div id="titreStimuSonore">Réaction à un stimulus sonore</div>
                </h3>
                <img src="../images/casque.jpg" id="imageSon" alt="">
                <p id="paraSon">Ce test calcule votre temps de réaction suite à
                    l’envoie
                    d’un son
                    d’une fréquence aléatoire entre 440Hz
                    et 1760Hz dans un casque audio puis suite à l’envoie
                    d’une succession de son toutes les 1
                    seconde.
                    Le temps est calculé par l’intermédiaire d’un chronomètre et d’un bouton poussoir

                    que vous devez pousser des le son reçu.
                </p>
                <a class="Bouton" id="boutonSon" href="Connexion.php">Faire le test</a>
            </div>

            <div class="Visuel">
                <h3>
                    <div id="titreStimuVisu">Réaction à un stimulus visuel</div>
                </h3>
                <img src="../images/visu.jpg" id="imageVisu" alt="">
                <p id="paraVisu">Ce test calcule votre temps de réaction suite à
                    l’allumage
                    d’une LED dans un
                    intervalle de 1 à 10 secondes puis suite à une succession d’allumage de
                    la LED toutes les 1 seconde.
                    Le temps est calculé par l’intermédiaire d’un chronomètre et d’un bouton poussoir
                    que vous devez pousser dès la LED allumé. </p>
                <a class="Bouton" id="boutonVisu" href="Connexion.php">Faire le test</a>
            </div>
            <?php
            break;
        case 'anglais':
            ?>
            <h1><p class="titre" id="titrePage3">OUR TESTS</p></h1>

            <div class="FrequenceCardiaque">
                <div id="barreTitreCardiaque"></div>
                <h3>
                    <div class="titreTest" id="titreFreqCardiaque">Heart rate measurement</div>
                </h3>
                <img src="../images/cardiaque.png" id="imageCardiaque" alt="">
                <p id="paraCardiaque">Managing heart rate is a primary feature.
                    It allows us to assess the stress level in the individual.
                    This measurement will be performed with a phototransistor and will calculate the person's blood flow
                    realizing the test.
                    Case example: bad period for the driver, excess driving responsibilities and total loss
                    of the control</p>
                <a class="Bouton" id="boutonCardiaque" href="Connexion.php">Do the
                    test</a>
            </div>

            <div class="Tonalité">
                <div id="barreTitreTonalite"></div>
                <h3>
                    <div class="titreTest" id="titreTonalite">
                        Measurement of tone recognition
                    </div>
                </h3>
                <img src="images/micro.jpg" id="imageTonalite" alt="">
                <p id="paraTonalite">
                    The second feature is the measurement of tone recognition
                    paramount. She allows us to evaluate the driver’s sound analysis when faced with different
                    sounds.

                    This measurement is carried out thanks to a microphone which will analyze the sound reproduced by
                    the client once

                    the latter having received a sound between x and y Hz in headphones.
                    Case example: Capacity listening and analysing different sounds encountered on the road
                    (horn, fire sirens ...)</p>
                <a class="Bouton" id="boutonTonalite" href="Connexion.php">Do the test
                </a>
            </div>

            <div class="Temperature">
                <div id="barreTitreTemp"></div>
                <h3>
                    <div id="titreTemperature">
                        Measurement of the surface temperature of the skin
                    </div>
                </h3>
                <img src="../images/temperature.jpg" id="imageTemp" alt="">
                <p id="paraTemp">Managing heart rate is a primary feature. She allows us
                    to evaluate the stress rate in the individual and also to evolve the driver's fever and fatigue

                    This measurement will be performed with a phototransistor and will calculate the person's blood flow
                    realizing the test.
                    Case example : bad time for the driver, extra responsibilities behind the wheel and total
                    loss of control </p>
                <a class="Bouton" id="boutonTemp" href="Connexion.php">Do the test</a>
            </div>

            <div id="barreTitreStimulus"></div>
            <div id="separateurStimu"></div>

            <div class="Sonore">
                <h3>
                    <div id="titreStimuSonore">
                        Sonic stimulus reactione
                    </div>
                </h3>
                <img src="../images/casque.jpg" id="imageSon" alt="">
                <p id="paraSon">
                    This test calculates your reaction time following send it of a sound
                    with a random frequency between 440Hz and 1760Hz in a headset then after the sent
                    of a succession of sound every 1 second.
                    Time is calculated using a stopwatch and a pushbutton
                    that you have to push when you received
                    sound.
                </p>
                <a class="Bouton" id="boutonSon" href="Connexion.php">Do the test</a>
            </div>

            <div class="Visuel">
                <h3>
                    <div id="titreStimuVisu">
                        Reaction to a visual stimulus
                    </div>
                </h3>
                <img src="../images/visu.jpg" id="imageVisu" alt="">
                <p id="paraVisu">
                    This test calculates your reaction time following ignition of an LED
                    in an interval of 1 to 10 seconds then following a succession of ignition of
                    the LED every 1 second.
                    Time is calculated using a stopwatch and a pushbutton
                    that you have to push when you the LED lights up.
                </p>
                <a class="Bouton" id="boutonVisu" href="Connexion.php">Do the test</a>
            </div>
            <?php
            break;
    }
    ?>
</scroll-page>


<scroll-page class="footer">
    <footer>
        <div class="logos">
            <a href="#page2"><img src="../images/focus.png" id="Focus" alt=""></a>
            <a href="#page2"><img src="../images/Infinite_measures.png" id="Infinite_Measures" alt=""></a>
        </div>
        <div class="contenu">
            <?php
            switch ($_SESSION['langue']) {
                case 'francais':
                    ?>
                    <a href="#page1" id="footerAccueil">Accueil</a>
                    <a href="ConditionsUtilisation.php" id="mention_legales">Mention légales</a>
                    <a href="mailto:o.poels@gmail.com" id="mail">infinitemeasurefocus@gmail.com </a>
                    <?php
                    break;
                case 'anglais':
                    ?>
                    <a href="#page1" id="footerAccueil">Home</a>
                    <a href="ConditionsUtilisation.php" id="mention_legales">Legal mentions</a>
                    <a href="mailto:o.poels@gmail.com" id="mail">infinitemeasurefocus@gmail.com </a>
                    <?php
                    break;
            }
            ?>

        </div>
    </footer>
</scroll-page>

</body>
</html>
