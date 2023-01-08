<?php

if($_POST!==[]){
    require_once (__DIR__.'/../modeles/Administrator.php');
    $administratorObject = new Administrator();
    $administratorObject->connectAdministrator();
}
    require_once (__DIR__ . '/../vues/front_header.php');

    require_once (__DIR__.'/../vues/connexion_form.html');

    require_once (__DIR__ . '/../vues/front_footer.html');




