<?php
session_start();

if(isset($_SESSION['connected'])){
    require_once (__DIR__.'/../vues/back_template.html');
    require_once (__DIR__.'/../vues/mission_status_listing.html');

    require_once (__DIR__.'/../modeles/MissionStatus.php');
    $missionStatusObject = new MissionStatus();

    if (isset($_POST['suppressionbutton'])){
        $statusId=$_POST['suppressionbutton'];
        $missionStatusObject->removeMissionStatus($statusId);
    }
    $missionStatusObject->displayMissionStatusList();
} else {
    header('Location: /index.php');
}