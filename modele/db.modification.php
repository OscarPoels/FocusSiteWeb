<?php
function modification($id, $prenom, $nom, $mail, $newMdp)
{
    $db = new PDO('mysql:host=localhost;dbname=focus', 'root', '');
    if (!empty($newMdp)) {
        $sql = "UPDATE utilisateur SET mdp = '$newMdp'WHERE id = '$id'";
        $req = $db->prepare($sql);
        $req->execute();
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
                    $_SESSION['avatar'] = $_SESSION['id'] . "." . $extensionsUpload;
                    return '?modification=ok';
                } else {
                    return '?photo=failedImport'; // Erreur d'importation
                }
            } else {
                return "?photo=failedFormat"; // Erreur de format
            }
        } else {
            return "?photo=failedSize"; // Erreur de taille
        }
    }
    return "?modification=OK";

}
