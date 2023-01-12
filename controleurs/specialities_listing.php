<?php
session_start();

if(isset($_SESSION['connected'])){
    require_once (__DIR__.'/../vues/back_template.html');
    require_once (__DIR__.'/../vues/specialities_listing_table_header.html');

    require_once (__DIR__.'/../modeles/Speciality.php');
    $specialityObject = new Speciality();

    if (isset($_POST['suppressionbutton'])){
        $specialityId=$_POST['suppressionbutton'];
        $specialityObject->removeSpeciality($specialityId);
    }
    $specialityObject->displaySpecialitiesList();
} else {
    header('Location: /index.php');
}

