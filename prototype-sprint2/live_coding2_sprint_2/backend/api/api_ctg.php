<?php
require "../classes/classes_ctg.php";
header("Content-type: application/json" );

$file = "../data/data.json";

$method = $_SERVER["REQUEST_METHOD"];

if($method == "GET"){
     $getdata= new GetAllData($file);
     $data = $getdata->getallData();
      echo json_encode($data);
}
























?>