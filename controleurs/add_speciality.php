<?php
session_start();

if(isset($_SESSION['connected'])){
    require_once (__DIR__.'/../vues/back_template.html');
    require_once (__DIR__.'/../vues/add_speciality_form.html');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require_once (__DIR__.'/../modeles/Speciality.php');
        $specialityObject = new Speciality();
        $specialityObject->addSpeciality();
    }

} else {
    header('Location: /index.php');
}
