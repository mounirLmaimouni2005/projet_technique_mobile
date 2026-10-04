<?php

//connect database

$host = "localhost";
$dbname = "destination_db";
$user ="root";
$password ='13737115';
$dsn = "mysql:host=$host;dbname=$dbname";

try{

    $pdo  = new PDO($dsn,$user,$password);
    $stmt =$pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
    

}catch(PDOException $err){
    echo $err->getMessage();
}























?>