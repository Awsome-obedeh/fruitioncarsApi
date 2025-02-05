<?php


require "dbConnect.php";
require "config.php";
    // get php post inputs
$edata = file_get_contents("php://input");
$data = json_decode($edata, true);
$name = $data['categoryName'];



// insert admin details
// remember to hash the user password 
$insert_sql="INSERT INTO category( name )
 VALUES('$name')";
$insert_query=mysqli_query($conn,$insert_sql);

if($insert_query){
    echo json_encode([
        "status"=>200,
        "msg"=>"category addded successfully"
    ]);
}
else{
    echo json_encode([
        "status"=>500,
        "msg"=>"Something went wrong"
    ]);
}



?>
