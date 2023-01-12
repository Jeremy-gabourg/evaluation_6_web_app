<?php

session_start();

if (isset($_SESSION['connected'])) {

    if (isset($_POST['modifybutton'])) {
        require_once(__DIR__ . '/../modeles/Speciality.php');
        $specialitysObject = new Speciality();
        $specialitysId = $_POST['modifybutton'];
        $specialitysObject->displaySelectedSpeciality($specialitysId);
    } elseif (isset($_SESSION['specialityId'])) {
        require_once(__DIR__ . '/../modeles/Speciality.php');
        $specialityObject = new Speciality();
        $specialityId = $_SESSION['specialityId'];
        require_once(__DIR__ . '/../vues/back_template.html');
        $specialityObject->modifySpeciality($specialityId);
    } else {
        require_once(__DIR__ . '/../vues/back_template.html');
        echo '<div class="alert alert-danger">Erreur d\'affichage</div>';
    }
} else {
    header('Location: /index.php');
}
