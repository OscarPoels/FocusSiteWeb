<link href="TraitementConnexion.css" rel="stylesheet" />
<?php
if(isset($_POST['Mdp']) AND isset($_POST['email'])){
    if(empty($_POST['Mdp']) AND empty($_POST['email'])){
        echo $_POST['Mdp'];
        echo $_POST['email'];
    }
    else{
        echo $_POST['Mdp'];
        echo $_POST['email'];
    }
}
else{

}


