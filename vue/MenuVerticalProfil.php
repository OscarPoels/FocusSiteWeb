<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <title>Profil Menu</title>
    <link rel="stylesheet" href="../Stylesheets/MenuVerticalProfil.css"/>
</head>
<body>

<input type="checkbox" id="check">
<label for="check">
    <i class="fas fa-bars" id="btnMenu"></i>
    <i class="fas fa-times" id="cancelMenu"></i>
</label>

<div class="sidebar">
    <header>Profil Menu</header>
    <ul>
        <div class="sidebar1">
            <li id="ProfilUtilisateur">
                <div class="ProfilUtilisateur"></div>
                <a href="ProfilUtilisateur.php">
                    <i class="fas fa-home"></i> Accueil</a></li>
            <li id="passerTest"><a href="PasserUnTest.php"><i class="fas fa-user-md"></i> Passer un test</a></li>
            <li id="resultats"><a href="#"><i class="far fa-chart-bar"></i> Total des résultats</a></li>
        </div>

        <div class="mesTests">
            <li id="MesTests">
                <div class="MesTests"></div>
                <a href="MesTests.php" id="btnMesTests"><i class="fas fa-folder"></i> Mes tests</a></li>
            <div class="mesTestsContenu">
                <li id="freqCard"><a href="#"><i class="fas fa-heartbeat"></i> Fréquence Cardiaque</a></li>
                <li id="recoTon"><a href="#"><i class="fas fa-microphone"></i> Reconnaissance de tonalité</a></li>
                <li id="tempPeau"><a href="#"><i class="fas fa-thermometer"></i> Température de la peau</a></li>
                <li id="StimuVisu"><a href="#"><i class="fas fa-eye"></i> Stimulus Visuel</a></li>
                <li id="StimuSon"><a href="#"><i class="fas fa-headphones"></i> Stimulus Sonore</a></li>
            </div>
        </div>

        <div class="sidebar2">
            <li><a href="#"><i class="fas fa-question"></i> FAQ</a></li>
            <li>
                <div class="ContactAdmin"></div>
                <a href="../controleurs/utilisateur.php?vue=ContactAdmin" id="ContactAdmin"><i
                            class="far fa-envelope"></i> Nous
                    contacter</a></li>
            <li>
                <div class="modificationProfilUtilisateur"></div>
                <a id="modificationProfilUtilisateur"
                   href="../controleurs/utilisateur.php?vue=modificationProfilUtilisateur"><i class="fas fa-cog"></i>
                    Réglages</a></li>
        </div>
    </ul>
</div>
<script type="text/javascript">
    let pos = document.location.pathname.substring(14, document.location.pathname.length - 4);
    console.log(document.location.pathname.substring(14, document.location.pathname.length - 4));
    document.getElementById(pos).style.backgroundColor = 'rgba(6,19,33,0.87)';
    document.getElementsByClassName(pos)[0].style.width = '2px';
    document.getElementsByClassName(pos)[0].style.position = 'fixed';
    document.getElementsByClassName(pos)[0].style.height = '65px';
    document.getElementsByClassName(pos)[0].style.backgroundColor = 'white';
    document.getElementsByClassName(pos)[0].style.left = '0';

</script>
</body>
</html>
