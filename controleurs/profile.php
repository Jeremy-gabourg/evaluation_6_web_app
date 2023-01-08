<?php
session_start();
if(isset($_SESSION['connected'])){
require_once (__DIR__.'/../vues/back_template.html');
require_once (__DIR__ . '/../vues/profile_page.php');
} else {
    header('Location: /index.php');
}