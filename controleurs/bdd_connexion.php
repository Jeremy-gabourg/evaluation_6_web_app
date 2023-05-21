<?php

$host = "mysql";
$dbname = "kgb_db";
$charset = "utf8";
$port="3306";

$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset;port=$port", username:'root', password:'super-secret-password',);