<?php
session_start();

if(isset($_SESSION['connected'])){

    if(isset($_POST['modifybutton'])){
        require_once (__DIR__.'/../modeles/FieldPersonStatus.php');
        $fieldPersonStatusObject = new FieldPersonStatus();
        $fieldPersonStatusId = $_POST['modifybutton'];
        $fieldPersonStatusObject->displaySelectedStatus($fieldPersonStatusId);
    }  elseif (isset($_SESSION['name'])) {
        require_once (__DIR__.'/../modeles/FieldPersonStatus.php');
        $fieldPersonStatusObject = new FieldPersonStatus();
        $fieldPersonStatusId = $_SESSION['statusId'];
        require_once (__DIR__.'/../vues/back_template.html');
        $fieldPersonStatusObject->modifyStatus($fieldPersonStatusId);
    } else {
        require_once (__DIR__.'/../vues/back_template.html');
        echo '<div class="alert alert-danger">Erreur d\'affichage</div>';
    }
} else {
    header('Location: /index.php');
}
