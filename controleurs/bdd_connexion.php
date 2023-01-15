<?php

$host = "localhost";
$dbname = "international_spy_agency";
$charset = "utf8";
$port="3306";

$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset;port=$port", 'root', '',);