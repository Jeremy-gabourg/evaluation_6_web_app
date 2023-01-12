<?php
session_start();

if(isset($_SESSION['connected'])){
    require_once (__DIR__.'/../vues/back_template.html');
    require_once (__DIR__.'/../vues/safe_houses_listing_table_header.html');

    require_once (__DIR__.'/../modeles/SafeHouse.php');
    $safeHouseObject = new SafeHouse();

    if (isset($_POST['suppressionbutton'])){
        $safeHouseId=$_POST['suppressionbutton'];
        $safeHouseObject->removeSafeHouse($safeHouseId);
    }
    $safeHouseObject->displaySafeHousesList();
} else {
    header('Location: /index.php');
}
