<?php
session_start();

if(isset($_SESSION['connected'])){
    require_once (__DIR__.'/../vues/back_template.html');
    require_once (__DIR__.'/../vues/add_field_person_status_form.html');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require_once (__DIR__.'/../modeles/FieldPersonStatus.php');
        $fieldPersonStatusObject = new FieldPersonStatus();
        $fieldPersonStatusObject->addStatus();
    }

} else {
    header('Location: /index.php');
}
