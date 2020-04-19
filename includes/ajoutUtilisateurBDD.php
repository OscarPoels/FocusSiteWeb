<?php
session_start();
if (isset($_POST['submit'])) {
    $db = new PDO('mysql:host=localhost;dbname=FOCUS2', 'root', 'root');

    $prenomUtilisateur = $_POST['prenomUtilisateur'];
    $nomUtilisateur = $_POST['nomUtilisateur'];
    $emailUtilisateur = $_POST['emailUtilisateur'];
    $ageUtilisateur =$_POST['ageUtilisateur'];

    $mdpUtilisateur = $_POST['mdpUtilisateur'];
    $mdpUtilisateur = password_hash($_POST['mdpUtilisateur'], PASSWORD_DEFAULT);

    $sql = "SELECT * FROM Utilisateur WHERE MailUtilisateur = '$emailUtilisateur'";
    $res = $db->prepare($sql);
    $res->execute();

    if ($res->rowCount() > 0) {
        header("Location: ../Inscription.php?inscription=failed");
    } else {
        $sql = "INSERT INTO Utilisateur (PrenomUtilisateur,NomUtilisateur,AgeUtilisateur,MailUtilisateur,MotDePasseUtilisateur,NombreTestsUtilisateur, NombrePointsUtilisateur,DateInscription) 
                VALUES ('$prenomUtilisateur','$nomUtilisateur','$ageUtilisateur','$emailUtilisateur','$mdpUtilisateur','0','0',CURDATE())";

        $req = $db->prepare($sql);
        $req->execute();
        header("Location: ../Inscription.php?inscription=succes");
    }

}

?>

