<?php
session_start();

if(isset($_SESSION['connected'])){
    require_once (__DIR__.'/../vues/back_template.html');
    require_once (__DIR__.'/../modeles/SafeHouseType.php');
    require_once (__DIR__.'/../modeles/Country.php');

    require_once (__DIR__.'/../vues/add_safe_house_form.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require_once (__DIR__.'/../modeles/SafeHouse.php');

        $safeHouseObject = new safeHouse();
        $safeHouseObject->addSafeHouse();
    }

} else {
    header('Location: /index.php');
}
