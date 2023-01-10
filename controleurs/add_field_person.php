<?php
session_start();

if(isset($_SESSION['connected'])){
    require_once (__DIR__.'/../vues/back_template.html');
    require_once (__DIR__.'/../modeles/FieldPerson.php');

    $fieldPersonObject = new FieldPerson();
    $fieldPersonObject->displayForm();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require_once (__DIR__.'/../modeles/FieldPerson.php');
        $fieldPersonObject = new FieldPerson();
        $fieldPersonObject->addFieldPerson();
    }

} else {
    header('Location: /index.php');
}