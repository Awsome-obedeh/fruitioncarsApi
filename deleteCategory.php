<?php
    require "dbConnect.php";
    require "config.php";
    cors();

    

    
$method = $_SERVER['REQUEST_METHOD'];
if ($method !== 'DELETE') {
    http_response_code(405);
    echo json_encode(["error" => "Method Not Allowed"]);
    exit;
}
// Check if 'name' is provided in the request
if (!isset($_GET['name']) || empty($_GET['name'])) {
    echo json_encode([
        "status" => 400,
        "message" => "Car ID is required"
    ]);
    exit;
}
    $cat= ($_GET['name']); // Sanitize input

    $del_cat_sql="DELETE FROM  category WHERE name='$cat'";
    $del_cat_query=mysqli_query($conn,$del_cat_sql);
    if($del_cat_query){
        http_response_code(200);
      
        echo json_encode([
          
            "message"=>"$cat category deleted successfully"
        ]);
    }
    


?>