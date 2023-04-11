<?php
session_start();

if(isset($_SESSION['connected'])){
    require_once (__DIR__.'/../vues/back_template.html');
    require_once (__DIR__.'/../vues/field_person_types_listing.html');

    require_once (__DIR__.'/../modeles/FieldPersonType.php');
    $fieldPersonTypesObject = new FieldPersonType();

    if (isset($_POST['suppressionbutton'])){
        $typeId=$_POST['suppressionbutton'];
        $fieldPersonTypesObject->removeFieldPersonTypes($typeId);
    }
    $fieldPersonTypesObject->displayPersonTypesList();
} else {
    header('Location: /index.php');
}
