<?php
session_start();

if(isset($_SESSION['connected'])){
    require_once (__DIR__.'/../vues/back_template.html');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require_once (__DIR__.'/../modeles/Administrator.php');
        $administratorObject = new Administrator();
        $administratorObject->addAdministrator();
    }

} else {
    header('Location: /index.php');
}


