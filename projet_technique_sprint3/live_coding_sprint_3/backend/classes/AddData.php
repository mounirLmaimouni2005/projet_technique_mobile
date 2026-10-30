<?php

require_once 'GetAllData.php';
require_once 'JsonStorage.php';



//class add data 
class AddData{
    public $getdata;
    public $jsondata;
    

    public function __construct($file){
        $this->jsondata = new JsonStorage($file);
        $this->getdata = new GetAllData($file);
    }

    public function addData($id, $nom, $colour, $incon){
            $data = $this->getdata->getallData();
            $category = [
                'id' =>$id,
                'nom' =>$nom,
                'colour' =>$colour,
                'incon' =>$incon
            ];

            $data[] = $category;
            
            $jsonDt = $this->jsondata->write($data);

    }


}



















?>