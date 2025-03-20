<?php


require "dbConnect.php";
require "config.php";
cors();

    // get php post inputs
$edata = file_get_contents("php://input");
$data = json_decode($edata, true);
$name = $data['categoryName'];
$thumbnail = $data['thumbnail'];




// check if category name already exist
$check_sql="SELECT name FROM category WHERE name = '$name'";
$check_query=mysqli_query($conn,$check_sql);
if(mysqli_num_rows($check_query)> 0){
    http_response_code(409);
    echo json_encode([

        "msg"=>"category already exists"
    ]);
    exit();
}
$insert_sql="INSERT INTO category(name,image)
 VALUES('$name', '$thumbnail')";
$insert_query=mysqli_query($conn,$insert_sql);

if($insert_query){
    http_response_code(200);
    echo json_encode([
      
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
