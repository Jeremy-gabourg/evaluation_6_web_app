<?php
session_start();

if(isset($_SESSION['connected'])){
    require_once (__DIR__.'/../vues/back_template.html');
    require_once (__DIR__.'/../vues/field_person_status_listing.html');

    require_once (__DIR__.'/../modeles/FieldPersonStatus.php');
    $fieldPersonStatusObject = new FieldPersonStatus();

    if (isset($_POST['suppressionbutton'])){
        $statusId=$_POST['suppressionbutton'];
        $fieldPersonStatusObject->removeFieldPersonStatus($statusId);
    }
    $fieldPersonStatusObject->displayPersonStatusList();
} else {
    header('Location: /index.php');
}
