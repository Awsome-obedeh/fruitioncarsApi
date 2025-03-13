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
$car_gallery=$data["car_gallery"];
$price=$data["price"];
$category=$data["category"];
$brand_name=$data["brand_name"];
$year=$data["year"];
$fuel_type=$data["image_url"];
$color=$data["color"];


// insert admin details
// remember to hash the user password 

if (!empty($car_gallery)) {
    $value = json_encode($car_gallery);
}
$insert_sql = "INSERT INTO cars (title, description, image_url, car_gallery, price, category, brand_name, `year`, fuel_type, color) 
VALUES ('$title', '$description', '$image_url', '$value','$price', '$category', '$brand_name', '$year', '$fuel_type', '$color')";
 
$insert_query=mysqli_query($conn,$insert_sql);

if($insert_query){
    echo json_encode([
        "status"=>200,
        "msg"=>"car addded successfully"
    ]);
}
else{
    echo json_encode([
        "status"=>500,
        "msg"=>"Something went wrong"
    ]);
}



?>