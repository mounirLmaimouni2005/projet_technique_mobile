<?php

class CategoryService {

    private $DAO;

    public function __construct($dao) {
        $this->DAO = $dao;
    }

    public function getAllCategories() {
        return $this->DAO->getAll();
    }

    public function addCategory($nom, $colour, $icon) {

        if (empty(trim($nom)) || empty(trim($colour)) || empty(trim($icon))) {
            throw new Exception("Some inputs are empty");
        }

        $data = $this->DAO->getAll();

        foreach ($data as $dt) {
            if (strtolower($dt['nom']) === strtolower(trim($nom))) {
                throw new Exception("Name already exists");
            }
        }

        $ids = array_column($data, 'id');
        $id = empty($ids) ? 1 : max($ids) + 1;

        $category = [
            'id' => $id,
            'nom' => trim($nom),
            'colour' => trim($colour),
            'incon' => trim($icon)
        ];

        $data[] = $category;

        $this->DAO->saveAll($data);

        return $category;
    }
}

?>