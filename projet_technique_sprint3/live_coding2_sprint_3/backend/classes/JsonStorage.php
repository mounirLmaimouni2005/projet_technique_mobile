<?php

// class read and add data;

class JsonStorage{
    public $file;

    public function __construct($file){
        $this->file = $file;
    }

    //method read
    public function read(){
        $data = json_decode(file_get_contents($this->file) , true);
        return $data;
    }

    //write method
     public function write($data){
         $addDdata = json_encode($data);
         file_put_contents($this->file ,$addDdata);
     }
}
























?>