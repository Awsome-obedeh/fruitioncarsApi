<?php
    require "dbConnect.php";
    require "config.php";
    require "helper.php";
    cors();

    

    
$method = $_SERVER['REQUEST_METHOD'];
if ($method !== 'POST') {
    http_response_code(405);
    echo json_encode(["error" => "Method Not Allowed"]);
    exit;
}


// Get PHP POST inputs
$edata = file_get_contents("php://input");
$data = json_decode($edata, true);

$fullname = $data['fullname'];
$email = $data['email'];
$phone = $data['phone'];
$make = $data['make'];
$model = $data['model'];
$year = $data['year'];
$transmission = $data['transmission'];
$color = $data['color'];
$condition = $data['condition'];
$description = $data['description'];
$location = $data['location'];
$price = $data['price'];
$images = isset($data["images"]) ? json_encode($data["images"]) : null;

$contact_sql="INSERT INTO sellcar (fullname,email,phone, make, model, year, transmission, color, `condition`, `description`, `location`, price, images)
VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )";
$stmt = mysqli_prepare($conn, $contact_sql);

if($stmt){
    mysqli_stmt_bind_param($stmt, "sssssssssssss", $fullname,$email, $phone, $make, $model, $year, $transmission, $color, $condition, $description, $location, $price, $images);
    if(mysqli_stmt_execute($stmt)){
    http_response_code(200);
    echo json_encode([
        "message"=>"Sell order submitted"
        // send notification mail to admin and seller
    ]);
    }
}

?>