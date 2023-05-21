<?php
session_start();

if(isset($_SESSION['connected'])){
    require_once (__DIR__.'/../vues/back_template.html');
    require_once (__DIR__.'/../vues/mission_types_listing.html');

    require_once (__DIR__.'/../modeles/MissionType.php');
    $missionTypesObject = new MissionType();

    if (isset($_POST['suppressionbutton'])){
        $missionTypeId=$_POST['suppressionbutton'];
        $missionTypesObject->removeMissionTypes($missionTypeId);
    }
    $missionTypesObject->displayMissionTypesList();
} else {
    header('Location: /index.php');
}
