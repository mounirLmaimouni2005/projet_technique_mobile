<?php

//class getAllData
class GetAllData{
    public $file;
    public function __construct($file)
    {
        $this->file = $file;
    }
    public function getallData(){
         $jsnData =   json_decode(file_get_contents($this->file) , true); 
         return $jsnData;
         
    }

    
}



//class add data

class AddData extends GetAllData{
    public $file;
    public $id;
    public $nom;
    public $colour;
    public $incon;
 
 function __construct($file,$nom,$colour,$incon,$id)
 {
   $this->file = $file;
   $this->nom = $nom;
   $this->colour = $colour;
   $this->incon = $incon;
   $this->id = $id;
 }
  
 
 public function addDatajsn(){
      parent::getallData();
 }

}




















?>