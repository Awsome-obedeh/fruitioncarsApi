<?php
require "dbConnect.php";
require "config.php";
cors();

// Get JSON data
$edata = file_get_contents("php://input");
$data = json_decode($edata, true);

// Validate JSON payload
if (!$data) {
    echo json_encode(["status" => 400, "msg" => "Invalid JSON data received"]);
    exit;
}

// Extract values safely
$title = $data['title'] ?? null;
$description = $data['description'] ?? null;
$image_url = $data['image_url'] ?? null;
$car_gallery = isset($data["car_gallery"]) ? json_encode($data["car_gallery"]) : null;
$price = $data['price'] ?? null;
$category = $data['category'] ?? null;
$brand_name = $data['brand_name'] ?? null;
$model = $data['model'] ?? null;
$fuel_type = $data['fuel_type'] ?? null;
$color = $data['color'] ?? null;

// Validate required fields
if (!$title || !$price || !$category || !$brand_name || !$model) {
    echo json_encode(["status" => 400, "msg" => "Missing required fields"]);
    exit;
}

// Use prepared statements to prevent SQL injection
$insert_sql = "INSERT INTO carlisting (title, description, image_url, car_gallery, price, category, brand_name, model, fuel_type, color) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $insert_sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ssssssssss", $title, $description, $image_url, $car_gallery, $price, $category, $brand_name, $model, $fuel_type, $color);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode([
            "status" => 200,
            "msg" => "Car added to featured Listing successfully"
        ]);
    } else {
        echo json_encode([
            "status" => 500,
            "msg" => "Database error: " . mysqli_error($conn)
        ]);
    }

    mysqli_stmt_close($stmt);
} else {
    echo json_encode(["status" => 500, "msg" => "Failed to prepare statement"]);
}

mysqli_close($conn);
