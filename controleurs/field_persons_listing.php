<?php
session_start();

if(isset($_SESSION['connected'])){
    require_once (__DIR__.'/../vues/back_template.html');
    require_once (__DIR__.'/../vues/field_persons_listing_table_header.html');

    require_once (__DIR__.'/../modeles/FieldPerson.php');
    $fieldPersonObject = new FieldPerson();

    if (isset($_POST['suppressionbutton'])){
        $fieldPersonId=$_POST['suppressionbutton'];
        $fieldPersonObject->removeFieldPerson($fieldPersonId);
    }
    $fieldPersonObject->displayFieldPersonsList();
} else {
    header('Location: /index.php');
}