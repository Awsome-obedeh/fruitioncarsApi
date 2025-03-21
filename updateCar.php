<?php

require "dbConnect.php";
require "config.php";
cors();

$method = $_SERVER['REQUEST_METHOD'];
if ($method !== 'PUT') {
    http_response_code(405);
    echo json_encode(["error" => "Method Not Allowed"]);
    exit;
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    // Get input data
    $input = json_decode(file_get_contents("php://input"), true);
    if (!$input) {
        http_response_code(400);
        echo json_encode(["error" => "Invalid JSON input"]);
        exit;
    }

    // Allowed fields for update
    $allowedFields = ["title", "description", "price", "image_url","car_gallery","category", "brand_name", "model", "year", "featured", "fuel_type", "color", "type_of_gear"];
    $setFields = [];
    $params = [];

    foreach ($input as $key => $value) {
        if (in_array($key, $allowedFields)) {
            // / Convert car_gallery array to JSON before updating
            if ($key === "car_gallery" && is_array($value)) {
                $value = json_encode($value);
            }
            $setFields[] = "$key = :$key";
            $params[":$key"] = $value;
        }
    }

    if (empty($setFields)) {
        http_response_code(400);
        echo json_encode(["error" => "No valid fields provided for update"]);
        exit;
    }

    $params[":id"] = $id;

    // Prepare and execute update query
    $sql = "UPDATE cars SET " . implode(", ", $setFields) . " WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute($params)) {
        echo json_encode(["status" => "success", "message" => "Car  updated successfully"]);
    } else {
        http_response_code(500);
        echo json_encode(["error" => "Failed to update car listing"]);
    }
} else {
    http_response_code(400);
    echo json_encode(["error" => " $id Invalid ID"]);
    exit;
}



// // Get the ID from the URL
// $path = explode('/', $_SERVER['REQUEST_URI']);
// $id = end($path);
// // if (!is_numeric($id)) {
// http_response_code(400);
// echo json_encode(["error" => " $id Invalid ID"]);
// // exit;
// // }
