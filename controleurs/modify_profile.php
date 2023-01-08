<?php
session_start();
if(isset($_SESSION['connected'])){
    require_once (__DIR__.'/../modeles/Administrator.php');
    $administratorObject = new Administrator();
    $administratorObject->modifyProfile();
;} else {
    header('Location: /index.php');
}
