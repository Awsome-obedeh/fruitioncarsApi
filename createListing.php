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
$price=$data["price"];
$category=$data["category"];
$model=$data['model'];
$brand_name=$data["brand_name"];
// $year=$data["year"];
$fuel_type=$data["fuel_type"];
$color=$data["color"];


if($_SERVER['REQUEST_METHOD']=="POST"){
// insert admin details
// remember to hash the user password 
$insert_sql = "INSERT INTO carlisting (title, description, image_url, price, category, brand_name, model,  fuel_type, color) 
VALUES ('$title', '$description', '$image_url', $price, '$category', '$brand_name', '$model',  '$fuel_type', '$color')";

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
        "msg"=>mysqli_error($conn)
    ]);
}
}




?>

