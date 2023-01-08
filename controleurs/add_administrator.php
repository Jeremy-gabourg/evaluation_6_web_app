<?php
require_once (__DIR__.'/../vues/back_template.html');
require_once (__DIR__.'/../vues/add_administrator_form.html');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once (__DIR__.'/../modeles/Administrator.php');
    $administratorObject = new Administrator();
    $administratorObject->addAdministrator();
}


