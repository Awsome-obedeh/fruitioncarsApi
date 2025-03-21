<?php
require "dbConnect.php";
require "config.php";
cors();

// Get PHP POST inputs
$edata = file_get_contents("php://input");
$data = json_decode($edata, true);

$title = $data['title'];
$description = $data['description'];
$image_url = $data["image_url"];
$car_gallery = isset($data["car_gallery"]) ? json_encode($data["car_gallery"]) : null;
$price = $data["price"];
$category = $data["category"];
$brand_name = $data["brand_name"];
$featured=isset($data['featured']) ? $data['featured']: "main";
$model=$data['model'];
$year = $data["year"];
$fuel_type = $data["fuel_type"];
$color = $data["color"];
$seat = $data['seat'];

// Use prepared statements to avoid SQL injection
$insert_sql = "INSERT INTO cars (title, description, image_url, car_gallery, price, category, brand_name, model, `year`, featured, fuel_type, color, seat) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $insert_sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sssssssssssss", $title, $description, $image_url, $car_gallery, $price, $category, $brand_name, $model, $year, $featured,  $fuel_type, $color, $seat);
    
    if (mysqli_stmt_execute($stmt)) {
        echo json_encode([
            "status" => 200,
            "msg" => "Car added successfully"
        ]);
    } else {
        echo json_encode([
            "status" => 500,
            "msg" => "Something went wrong"
        ]);
    }

    mysqli_stmt_close($stmt);
} else {
    echo json_encode([
        "status" => 500,
        "msg" => "Failed to prepare statement"
    ]);
}

mysqli_close($conn);
?>
