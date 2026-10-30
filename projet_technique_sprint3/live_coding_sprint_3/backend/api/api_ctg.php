<?php
require "../classes/classes_ctg.php";
header("Content-type: application/json" );

$file = "../data/data.json";

$method = $_SERVER["REQUEST_METHOD"];

//check if request method is get and get data from database;
if($method == "GET"){
     $getdata= new GetAllData($file);
     $data = $getdata->getallData();
      echo json_encode($data);
}



//check if request method is post and add data to file json;
if($method == "POST"){
      $getdata2 = new GetAllData($file);
     $data2  = $getdata2->getallData();

      $id = array_column($data2 , "id");
      $ids = max($id)+1;

      $PostData = json_decode(file_get_contents("php://input"),true);
      $nom  = $PostData["nom"];
      $colour = $PostData["colour"];
      $incon = $PostData["incon"];

    $addData = new AddData($file , $nom, $colour , $incon  , $ids);
    $addData->addDatajsn();
}






















?>