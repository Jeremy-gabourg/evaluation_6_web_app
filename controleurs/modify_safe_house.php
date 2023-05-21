<?php
session_start();

if(isset($_SESSION['connected'])){

    if(isset($_POST['modifybutton'])){
        require_once (__DIR__.'/../modeles/SafeHouse.php');
        $safeHouseObject = new SafeHouse();
        $safeHouseId = $_POST['modifybutton'];
        $safeHouseObject->displaySelectedSafeHouse ($safeHouseId);
    }  elseif (isset($_SESSION['safeHouseId']) && $_POST['address']!=="" && $_POST['country']!=="" && $_POST['type']!=="") {
        require_once (__DIR__.'/../modeles/SafeHouse.php');
        $safeHouseObject = new SafeHouse();
        $safeHouseId = $_SESSION['safeHouseId'];
        require_once (__DIR__.'/../vues/back_template.html');
        $countryObject->modifySafeHouse($safeHouseId);
    } else {
        require_once (__DIR__.'/../vues/back_template.html');
        echo '<div class="alert alert-danger">Erreur d\'affichage</div>';
    }
} else {
    header('Location: /index.php');
}