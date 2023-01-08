<?php
require_once (__DIR__.'/../vues/back_template.html');
require_once (__DIR__.'/../vues/administrators_listing_table_header.html');

require_once (__DIR__.'/../modeles/Administrator.php');
$administratorObject = new Administrator();

if (isset($_POST['suppressionbutton'])){
    $administratorId=$_POST['suppressionbutton'];
    $administratorObject->removeAdministrator($administratorId);
}
$administratorObject->displayAdministratorsList();


