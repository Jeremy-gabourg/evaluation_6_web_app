<?php
session_start();

if(isset($_SESSION['connected'])){

    if(isset($_POST['modifybutton'])){
        require_once (__DIR__.'/../modeles/FieldPerson.php');
        $fieldPersonObject = new FieldPerson();
        $fieldPersonId = $_POST['modifybutton'];
        $fieldPersonObject->displaySelectedFieldPerson($fieldPersonId);
    }  elseif (isset($_SESSION['fieldPersonId']) && $_POST['firstName']!=="" && $_POST['lastName']!=="" && $_POST['birthDate']!=="" && $_POST['codeNameOrIdentificationCode']!=="" && $_POST['status']!=="" && $_POST['type']) {
        require_once (__DIR__.'/../modeles/FieldPerson.php');
        $fieldPersonObject = new fieldPerson();
        $fieldPersonId = $_SESSION['fieldPersonId'];
        require_once (__DIR__.'/../vues/back_template.html');
        $fieldPersonObject->modifyFieldPerson($fieldPersonId);
    } else {
        require_once (__DIR__.'/../vues/back_template.html');
        echo '<div class="alert alert-danger">Erreur d\'affichage</div>';
    }
} else {
    header('Location: /index.php');
}
