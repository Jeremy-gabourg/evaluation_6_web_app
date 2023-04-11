<?php
session_start();

if(isset($_SESSION['connected'])){
    require_once (__DIR__.'/../vues/back_template.html');
    require_once (__DIR__.'/../vues/safe_house_types_listing_header.html');

    require_once (__DIR__.'/../modeles/SafeHouseType.php');
    $safeHouseTypesObject = new SafeHouseType();

    if (isset($_POST['suppressionbutton'])){
        $typeId=$_POST['suppressionbutton'];
        $safeHouseTypesObject->removeSafeHouseTypes($typeId);
    }
    $safeHouseTypesObject->displaySafeHouseTypesList();
} else {
    header('Location: /index.php');
}
