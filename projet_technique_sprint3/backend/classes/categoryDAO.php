<?php

require_once "JsonStorage.php";

class CategoryDAO {

    private $storage;

    public function __construct($file) {
        $this->storage = new JsonStorage($file);
    }

    public function getAll() {
        return $this->storage->read();
    }

    public function saveAll($data) {
        $this->storage->write($data);
    }
}
