<?php

 require "../classes/destination.php";

    $method = $_SERVER["REQUEST_METHOD"];


    // check if request method is Get and get data;
    if($method === "GET"){
        $getData = new GetAllDestinationData("../data/destination.json");
        $data =  $getData->gettData();
            
        header("content-type:application/json");
        echo json_encode($data);
    }





    
// check if method is post and add data to json file;
    if($method === 'POST'){
         $file ="../data/destination.json";
        $getData = new GetAllDestinationData("../data/destination.json");
        $data = $getData->gettData();

        $ids = array_column($data, 'id');
        $id = max($ids) + 1;

        $input = file_get_contents("php://input");
        $dataRqst = json_decode($input, true);

        $nom = $dataRqst['nom'];
        $description = $dataRqst['description'];
        $region = $dataRqst['region'];

        $addDestinationCls = new  Addestination(
            $id,
            $nom,
            $description,
            $region,
            $file
        );

        $addDestinationCls->addDestination();
    }




?>