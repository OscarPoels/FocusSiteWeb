<?php

$host = 'localhost';
$user = "GabrielFerrier";
$password = "stayfocusforever";
$dbname = 'FOCUS2';

// SET DSN
$dsn = 'mysql:host = ' . $host . ';dbname = ' . $dbname;

// Create a PDO instance
$pdo = new PDO($dsn, $user, $password);

# PRDO Query
$requete = $pdo->query('SELECT PrenomAdministrateur FROM Administrateur');

while ($row = $requete->fetch(PDO::FETCH_ASSOC)) {
    echo $row['PrenomAdministrateur'] . '<br>';
}



/*
try {
    $pdo = new PDO($dsn, $user, $password);
    echo "Connecté !";
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo $error_message;
    exit();
}



*/ ?>