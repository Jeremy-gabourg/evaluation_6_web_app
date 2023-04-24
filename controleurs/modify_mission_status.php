<?php
session_start();

if(isset($_SESSION['connected'])){

    if(isset($_POST['modifybutton'])){
        require_once (__DIR__.'/../modeles/MissionStatus.php');
        $missionStatusObject = new MissionStatus();
        $missionStatusId = $_POST['modifybutton'];
        $missionStatusObject->displaySelectedStatus($missionStatusId);
    }  elseif (isset($_SESSION['missionStatusId'])) {
        require_once (__DIR__.'/../modeles/MissionStatus.php');
        $missionStatusObject = new MissionStatus();
        $missionStatusId = $_SESSION['missionStatusId'];
        require_once (__DIR__.'/../vues/back_template.html');
        $missionStatusObject->modifyStatus($missionStatusId);
    } else {
        require_once (__DIR__.'/../vues/back_template.html');
        echo '<div class="alert alert-danger">Erreur d\'affichage</div>';
    }
} else {
    header('Location: /index.php');
}
