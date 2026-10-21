<?php


// class get data;
class GetAllData
{
   public $file;

   public function __construct($file)
   {
     $this->file = $file;

   }

   public function getAllData()
   {
       if(!file_exists($this->file))
        {
           return [];
           
        }

        $data = file_get_contents($this->file);
         return json_decode($data , true);
   }
}




// class add destinition;
class AddDestinition extends GetAllData{

    public $id;
    public $nom;
    public $description;
    public $region;

    public function __construct($id , $nom , $description , $region , $file)
    {
      $this -> id = $id;
      $this -> nom = $nom;
      $this -> description = $description;
      $this -> region = $region;

      parent::__construct($file);

    }
 
   public function AddDestinetion(){

       $data = parent::getAllData();

         if (!is_array($data)) {
            exit('you have a problem $data is not array');
         }

         $requestData = [
            'id' => $this->id,
            'nom' => $this->nom,
            'description' => $this->description,
            'region' => $this->region
         ];

         $data[] = $requestData;

         file_put_contents($this->file, json_encode($data));
            
   }

}






























?>