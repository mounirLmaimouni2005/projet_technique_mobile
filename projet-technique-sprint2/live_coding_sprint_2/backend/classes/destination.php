<?php


//class add destination;

class GetAllDestinationData{
   public $file;
   public function __construct($file){
     $this->file = $file;
    
   }
    
    public function gettData(){
        $dataGeted = file_get_contents($this->file);
        return json_decode($dataGeted ,true) ;
    }

}



class  Adddestination extends GetAllDestinationData {

   
   public $id;
   public $nom;
   public $description;
   public $region;


   public function __construct($id , $nom , $description , $region , $file){
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->region = $region;

        parent::__construct($file);
    }



public function addDestination(){
    
     $getdata = parent::gettData();
     
     
     $destination = [
        'id' => $this -> id,
        'nom' => $this -> nom,
        'description' => $this -> description,
        'region' => $this -> region
     ];

      $getdata[] = $destination;
      file_put_contents($this->file, json_encode($getdata , JSON_PRETTY_PRINT));

}

}




























?>