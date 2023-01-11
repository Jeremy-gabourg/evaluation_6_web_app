<?php
session_start();

if(isset($_SESSION['connected'])){

    if(isset($_POST['modifybutton'])){
        require_once (__DIR__.'/../modeles/FieldPersonType.php');
        $fieldPersonTypeObject = new FieldPersonType();
        $fieldPersonTypeId = $_POST['modifybutton'];
        $fieldPersonTypeObject->displaySelectedTypes($fieldPersonTypeId);
    }  elseif (isset($_SESSION['name'])) {
        require_once (__DIR__.'/../modeles/FieldPersonType.php');
        $fieldPersonTypeObject = new FieldPersonType();
        $fieldPersonTypeId = $_SESSION['typeId'];
        require_once (__DIR__.'/../vues/back_template.html');
        $fieldPersonTypeObject->modifyTypes($fieldPersonTypeId);
    } else {
        require_once (__DIR__.'/../vues/back_template.html');
        echo '<div class="alert alert-danger">Erreur d\'affichage</div>';
    }
} else {
    header('Location: /index.php');
}
