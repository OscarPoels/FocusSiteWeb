<?php
session_start();
if (isset($_POST['submit'])) {
    $db = new PDO('mysql:host=localhost;dbname=FOCUS2', 'root', 'root');

    $prenomUtilisateur = $_POST['prenomUtilisateur'];
    $nomUtilisateur = $_POST['nomUtilisateur'];
    $emailUtilisateur = $_POST['emailUtilisateur'];
    $ageUtilisateur = $_POST['ageUtilisateur'];

    $mdpUtilisateur = $_POST['mdpUtilisateur'];
    $mdpUtilisateur = password_hash($_POST['mdpUtilisateur'], PASSWORD_DEFAULT);

    // Mail utilisateur existe deja
    $sql = "SELECT * FROM Utilisateur WHERE MailUtilisateur = '$emailUtilisateur'";
    $res = $db->prepare($sql);
    $res->execute();

    // Creation de la liste des adresses mails des administrateurs
    $listeMailAdmin = array();
    $requete2 = $db->query('SELECT MailAdministrateur FROM Administrateur');
    while ($data = $requete2->fetch()) {
        array_push($listeMailAdmin, $data['MailAdministrateur']);
    }


    // Si il existe un compte utilisateur avec ce mail
    if ($res->rowCount() > 0) {
        header("Location: ../Inscription.php?inscription=failed");
    }
    // Si le mail rentré correspond à un mail administrateur
    else if (in_array("$emailUtilisateur",$listeMailAdmin)){
        header("Location: ../Inscription.php?inscription=failed");
    }
    // Sinon, on créée l'utilisateur
    else {
        $sql = "INSERT INTO Utilisateur (PrenomUtilisateur,NomUtilisateur,AgeUtilisateur,MailUtilisateur,MotDePasseUtilisateur,NombreTestsUtilisateur, NombrePointsUtilisateur,DateInscription) 
                VALUES ('$prenomUtilisateur','$nomUtilisateur','$ageUtilisateur','$emailUtilisateur','$mdpUtilisateur','0','0',CURDATE())";

        $req = $db->prepare($sql);
        $req->execute();
        header("Location: ../Inscription.php?inscription=succes");
    }

}

?>

