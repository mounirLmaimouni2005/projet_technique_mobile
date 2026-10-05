<?php

require "../classes/destination.php";

$method = $_SERVER['REQUEST_METHOD'];

//chek if request method is post and give data from json;
if($method == 'GET'){
     $file1 = "../data/destination.json";
      $getData = new GetAllDestinationData($file1);
      $allGetData = $getData->gettData();
       header("content-type:application/json");
       echo json_encode($allGetData);
}




//check if request method is post and add data to file json;

if($method == "POST"){
  $file = "../data/destination.json";

 $requestData = json_decode(file_get_contents("php://input"),true)  ;

 $nom = $requestData['nom'];
 $description = $requestData['description'];
 $region = $requestData['region'];



  $getData = new GetAllDestinationData($file);
  $allGetData = $getData->gettData();

  $ids = array_column( $allGetData , 'id');
  $id = max($ids)+1;

   $addDestination = new Adddestination($id , $nom , $description , $region ,$file);
   $addDestination->addDestination();
}















?>