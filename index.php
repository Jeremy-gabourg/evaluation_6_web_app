<?php
include_once (__DIR__.'/vues/front_header.html');
include_once (__DIR__ . '/vues/mission_listing_table_header.html');

include_once (__DIR__.'/modeles/Mission.php');
$missionObject = new Mission();
$missionObject->displayMissionsList();

include_once (__DIR__.'/vues/front_footer.html');