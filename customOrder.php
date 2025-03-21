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
$details = $data['details'];


$contact_sql="INSERT INTO customorder (fullname,email,phone, make, model, year, transmission, color, `condition`, details)
VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ? )";
$stmt = mysqli_prepare($conn, $contact_sql);

if($stmt){
    mysqli_stmt_bind_param($stmt, "ssssssssss", $fullname,$email, $phone, $make, $model, $year, $transmission, $color, $condition, $details);
    if(mysqli_stmt_execute($stmt)){
    http_response_code(200);
    echo json_encode([
        "message"=>"custom order submitted"
        // send notification mail to admin and seller
    ]);
    }
}

?>