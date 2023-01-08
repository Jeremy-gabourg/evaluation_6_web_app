<?php

session_start();

require_once (__DIR__ . '/../vues/front_header.php');

include_once (__DIR__.'/../modeles/Mission.php');
$missionObject = new Mission();
$missionObject->displayMissionDetails();

require_once (__DIR__ . '/../vues/front_footer.html');
?>