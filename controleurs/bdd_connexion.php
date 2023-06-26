<?php

// Dockerfile local
$host = "mysql";
$dbname = "kgb_db";
$charset = "utf8";
$port="3306";
$username = 'root';
$password = 'super-secret-password';

// Serveur Planet Hoster
// $host = "localhost";
// $dbname = "jyuvhkkx_evaluation_kgb";
// $charset = "utf8";
// $port ="3306";
// $username ='jyuvhkkx_admin';
// $password = 'Monsupermotdepasse1';


$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset;port=$port", username:$username, password:$password,);

