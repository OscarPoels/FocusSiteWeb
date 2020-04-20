<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profil Menu</title>
    <link rel="stylesheet" href="MenuVerticalProfil.css"/>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
            <li><a href="Accueil.php"><i class="fas fa-home"></i> Accueil</a></li>
            <li><a href="PasserUnTest.php"><i class="fas fa-user-md"></i> Passer un test</a></li>
            <li><a href="#"><i class="far fa-chart-bar"></i> Total des résultats</a></li>
        </div>

        <div class="mesTests">
            <li><a href="MesTests.php" id="btnMesTests"><i class="fas fa-folder"></i> Mes tests</a></li>
            <div class="mesTestsContenu">
                <li><a href="#"><i class="fas fa-heartbeat"></i> Fréquence Cardiaque</a></li>
                <li><a href="#"><i class="fas fa-microphone"></i> Reconnaissance de tonalité</a></li>
                <li><a href="#"><i class="fas fa-thermometer"></i> Température de la peau</a></li>
                <li><a href="#"><i class="fas fa-eye"></i> Stimulus Visuel</a></li>
                <li><a href="#"><i class="fas fa-headphones"></i> Stimulus Sonore</a></li>
            </div>
        </div>

        <div class="sidebar2">
            <li><a href="#"><i class="fas fa-question"></i> FAQ</a></li>
            <li><a href="mailto:infinitemeasures.focus@gmail.com" id="mail"><i class="far fa-envelope"></i> Nous contacter</a></li>
            <li><a href="#"><i class="fas fa-cog"></i> Réglages</a></li>
        </div>
    </ul>
</div>
</body>
</html>
