<?php
 require_once "JsonStorage.php";

 //class get data used read method;
 class GetAllData {
    public $reaData;
    public function __construct($file){
         $this->reaData = new JsonStorage($file);
    }

   public function GetAllData(){
        return $this->reaData->read();
   }

 }
































?>