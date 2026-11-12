<?php

require_once __DIR__ . "/../classes/JsonStorage.php";
require_once __DIR__ . "/../classes/CategoryDAO.php";
require_once __DIR__ . "/../classes/CategoryService.php";




header("Content-Type: application/json");

try {

    $file = __DIR__ . "/../data/data.json";

    $dao = new CategoryDAO($file);
    $service = new CategoryService($dao);

    $method = $_SERVER["REQUEST_METHOD"];

    if ($method === "GET") {

        $categories = $service->getAllCategories();

        http_response_code(200);
        echo json_encode($categories);

    } elseif ($method === "POST") {

        $postData = json_decode(file_get_contents("php://input"), true);

        if (!is_array($postData)) {
            throw new Exception("Invalid JSON data");
        }
        $nom = $postData["nom"] ?? null;
        $colour = $postData["colour"] ?? null;
        $incon = $postData["incon"] ?? null;

        $category = $service->addCategory($nom, $colour, $incon);

        http_response_code(201);
        echo json_encode([
            "success" => true,
            "message" => "Category added successfully",
            "data" => $category
        ]);

    } else {

        throw new Exception("Method not allowed");
    }

} catch (Exception $e) {

    http_response_code(400);

    echo json_encode([
        "success" => false,
        "message" => $e->getMessage()
    ]);
}
