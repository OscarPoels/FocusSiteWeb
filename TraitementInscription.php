<?php
if (isset($_POST['prenom']) AND $_POST['prenom'] != ''){
    echo $_POST['prenom'];
}else{
    echo "erreur vous n'avez rien rentre";
    require 'Inscription.php';
}