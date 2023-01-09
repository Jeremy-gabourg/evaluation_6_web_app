<?php
session_start();

if(isset($_SESSION['connected'])){

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require_once (__DIR__.'/../modeles/Administrator.php');
        $administratorObject = new Administrator();
        $administratorObject->modifyProfile();
    }
require_once (__DIR__.'/../vues/back_template.html');
require_once (__DIR__ . '/../vues/profile_page.php');

} else {
    header('Location: /index.php');
}