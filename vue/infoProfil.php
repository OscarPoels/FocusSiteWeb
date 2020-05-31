<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Stylesheets/infoProfil.css"/>
</head>

<div class="infoProfil">
    <div class="statsTexte" id='stat1'>Membre depuis :</div>
    <div class="stats" id='dateInscription'><?php echo $_SESSION['dateInscription'] ?></div>

    <div class="barre" id='barreStat1'></div>

    <div class="statsTexte" id='stat2'>Age :</div>
    <?php
    if ($_SESSION['age'] == 0){
        echo "<div class=\"stats\" id='age'> N/A </div>";
    }else{
        echo "<div class=\"stats\" id='age'>" . $_SESSION['age'] . " ans" . "</div>";
    }
    ?>
    <div class="barre" id='barreStat2'></div>

    <div class="statsTexte" id='stat3'>Nombre de tests :</div>
    <?php
    echo "<div class=\"stats\" id='nbTests'>" . $_SESSION['nombreTest'] . "</div>";
    ?>
    <div class="barre" id='barreStat3'></div>
    <div class="statsTexte" id='stat4'>Points :</div>
    <?php
    echo "<div class=\"stats\" id='nbPoints'>" . $_SESSION['points'] . "</div>";
    ?>

</div>


<div id="contourPhoto">

    <img src="../avatars/<?php echo $_SESSION['avatar'] ?>" id="photoProfil"
         alt=""/>


</div>
