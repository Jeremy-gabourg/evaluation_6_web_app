<?php
require_once (__DIR__.'/../vues/back_template.html');
require_once (__DIR__.'/../vues/add_administrator_form.html');

require_once (__DIR__.'/../modeles/Administrator.php');
$administratorObject = new Administrator();
$administratorObject->addAdministrator();

