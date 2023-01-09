<?php
session_start();

if(isset($_SESSION['connected'])){
    require_once (__DIR__.'/../vues/back_template.html');
    require_once (__DIR__.'/../vues/countries_listing_table_header.html');

    require_once (__DIR__.'/../modeles/Country.php');
    $countryObject = new Country();

    if (isset($_POST['suppressionbutton'])){
        $countryId=$_POST['suppressionbutton'];
        $countryObject->removeCountry($countryId);
    }
    $countryObject->displayCountriesList();
} else {
    header('Location: /index.php');
}