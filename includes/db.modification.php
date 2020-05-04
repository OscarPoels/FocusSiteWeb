<?php
session_start();
if (isset($_POST['submit'])) {
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $mail = $_POST['mail'];
    $newMdp = $_POST['newMdp'];
    $mdp = $_POST['mdp'];
    $id = $_SESSION['id'];


    $_SESSION['nom'] = $nom;
    $_SESSION['prenom'] = $prenom;
    $_SESSION['mail'] = $mail;

    $newMdp = password_hash($newMdp, PASSWORD_DEFAULT);
    $mdp = password_hash($mdp, PASSWORD_DEFAULT);

    $db = new PDO('mysql:host=localhost;dbname=focus', 'root', '');

    $sql = "SELECT * FROM utilisateur WHERE id = '$id'";
    $res = $db->prepare($sql);
    $res->execute();
    $resultat = $res->fetch();

    $isPasswordCorrect = password_verify($_POST['mdp'], $resultat['mdp']);

    if (!$resultat)
    {
        header("Location: ../modificationProfilUtilisateur.php?mdp=false");
    }
    else
    {
        if ($isPasswordCorrect) {
            if ($res->rowCount() > 0) {
                if(!empty($_POST['newMdp'])){
                    $sql = "UPDATE utilisateur SET mdp = '$newMdp'WHERE id = '$id'";
                }
                $sql = "UPDATE utilisateur SET prenom = '$prenom', nom = '$nom', mail = '$mail' WHERE id = '$id'";
                $req = $db->prepare($sql);
                $req->execute();

                if (isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
                    $tailleMax = 2097152;
                    $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
                    if ($_FILES['avatar']['size'] <= $tailleMax) {
                        $extensionsUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
                        if (in_array($extensionsUpload, $extensionsValides)) {
                            $chemin = "../avatars/" . $_SESSION['id'] . "." . $extensionsUpload;
                            $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
                            if ($resultat) {
                                $updateAvatar = $db->prepare('UPDATE utilisateur SET avatar = :avatar WHERE id = :id');
                                $updateAvatar->execute(array(
                                    'avatar' => $_SESSION['id'] . "." . $extensionsUpload,
                                    'id' => $_SESSION['id']
                                ));
                                header("Location: ../ProfilUtilisateur.php?modification=OK");
                                $_SESSION['avatar']= $_SESSION['id'] . "." . $extensionsUpload;
                            } else {
                                header("Location: ?photo=failedImport"); // Erreur d'importation
                            }
                        } else {
                            header("Location: ?photo=failedFormat"); // Erreur de format
                        }
                    } else {
                        header("Location: ?photo=failedSize"); // Erreur de taille
                    }
                }
                header("Location: ../ProfilUtilisateur.php?modification=OK");
            }
            else {
                echo "Probleme rencontré";
            }
        }
        else {
            header("Location: ../modificationProfilUtilisateur.php?mdp=false");
        }
    }
} else {
    echo 'ERREUR';
}
