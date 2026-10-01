<?php
 
 require "../classes/Destination.php";

    $method = $_SERVER["REQUEST_METHOD"];


    $file ="../data/Destinations.json";

    // check if request method is Get and get data;
    if($method === "GET"){
        $getData = new GetallData("../data/Destinations.json");
        $data =  $getData->getAllData();
            
        header("content-type:application/json");
        echo json_encode($data);
    }



// check if method is post and add data to json file;
    if($method === 'POST'){

        $getData = new GetallData("../data/Destinations.json");
        $data = $getData->getAllData();

        $ids = array_column($data, 'id');
        $id = max($ids) + 1;

        $input = file_get_contents("php://input");
        $dataRqst = json_decode($input, true);

        $nom = $dataRqst['nom'];
        $description = $dataRqst['description'];
        $region = $dataRqst['region'];

        $addDestinationCls = new AddDestinition(
            $id,
            $nom,
            $description,
            $region,
            $file
        );

        $addDestinationCls->AddDestinetion();
    }
































?>