<?php
session_start();

if(isset($_SESSION['connected'])){

    if(isset($_POST['modifybutton'])){
        require_once (__DIR__.'/../modeles/Country.php');
        $countryObject = new Country();
        $countryId = $_POST['modifybutton'];
        $countryObject->displaySelectedCountry($countryId);
    }  elseif (isset($_SESSION['countryId']) && $_POST['frenchName']!=="" && $_POST['englishName']!=="" && $_POST['countryCode']!=="" && $_POST['alphaCode2']!=="" && $_POST['alphaCode3']!=="") {
        require_once (__DIR__.'/../modeles/Country.php');
        $countryObject = new Country();
        $countryId = $_SESSION['countryId'];
        require_once (__DIR__.'/../vues/back_template.html');
        $countryObject->modifyCountry($countryId);
    } else {
        require_once (__DIR__.'/../vues/back_template.html');
        echo '<div class="alert alert-danger">Erreur d\'affichage</div>';
    }
} else {
    header('Location: /index.php');
}
