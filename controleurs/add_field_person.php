<?php
session_start();

if(isset($_SESSION['connected'])){
    require_once (__DIR__.'/../vues/back_template.html');
    require_once (__DIR__.'/../modeles/FieldPerson.php');
    $fieldPersonObject = new FieldPerson();

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        $fieldPersonObject->displayForm();
    } else {
        $fieldPersonObject->addFieldPerson();
        $fieldPersonObject->displayForm();
    }
} else {
    header('Location: /index.php');
}