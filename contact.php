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
$message = $data['message'];
$phone = $data['phone'];

$contact_sql="INSERT INTO contact(fullname,message,phone)
VALUES(?, ?, ?)";
$stmt = mysqli_prepare($conn, $contact_sql);

if($stmt){
    mysqli_stmt_bind_param($stmt, "sss", $fullname,$message, $phone);
    if(mysqli_stmt_execute($stmt)){
        sendContactEmail($fullname,$phone,$message,$_ENV['SMTP_USERNAME']);
    }
}

?>