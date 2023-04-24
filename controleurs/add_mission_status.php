<?php
session_start();

if(isset($_SESSION['connected'])){
    require_once (__DIR__.'/../vues/back_template.html');
    require_once (__DIR__.'/../vues/add_mission_status_form.html');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require_once (__DIR__.'/../modeles/MissionStatus.php');
        $missionStatusObject = new MissionStatus();
        $missionStatusObject->addStatus();
    }

} else {
    header('Location: /index.php');
}