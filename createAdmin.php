<?php
require "dbConnect.php";
require "config.php";
cors();
    // get php post inputs
$edata = file_get_contents("php://input");
$data = json_decode($edata, true);
$email = $data['email'];
$password = $data['password'];

// insert admin details
// remember to hash the user password 
$insert_sql="INSERT INTO admin (email,password )VALUES('$email', '$password')";
$insert_query=mysqli_query($conn,$insert_sql);

if($insert_query){
    echo json_encode([
        "status"=>200,
        "msg"=>"admin created successfully"
    ]);
}
else{
    echo json_encode([
        "status"=>500,
        "msg"=>"Something went wrong"
    ]);
}



?>