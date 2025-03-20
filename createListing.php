


<?php
require "dbConnect.php";
require "config.php";
cors();


   // get php post inputs
   $edata = file_get_contents("php://input");
   $data = json_decode($edata, true);
   $title = $data['title'];
   $description = $data['description'];
   $image_url=$data["image_url"];
   $car_gallery = isset($data["car_gallery"]) ? json_encode($data["car_gallery"]) : null;
   $price=$data["price"];
   $category=$data["category"];
   $model=$data['model'];
   $brand_name=$data["brand_name"];
   // $year=$data["year"];
   $fuel_type=$data["fuel_type"];
   $color=$data["color"];

// Use prepared statements to avoid SQL injection
$insert_sql = "INSERT INTO cars (title, description, image_url, car_gallery, price, category, brand_name, model, fuel_type, color) 
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


