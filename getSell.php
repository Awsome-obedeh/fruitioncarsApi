<?php
    require "dbConnect.php";
    require "config.php";
    require "helper.php";
    cors();

    

    
$method = $_SERVER['REQUEST_METHOD'];
if ($method !== 'GET') {
    http_response_code(405);
    echo json_encode(["error" => "Method Not Allowed"]);
    exit;
}

$get_cars_sql = "SELECT * FROM sellcar ORDER BY id DESC  "; // Limit to 12 rows
$get_cars_query = mysqli_query($conn, $get_cars_sql);

$cars = []; // Initialize an empty array

if ($get_cars_query) {
    while ($row = mysqli_fetch_assoc($get_cars_query)) {
        $cars[] = $row; // Append each row to the array
    }

    echo json_encode([
        "status" => 200,
        "cars" => $cars
    ]);
} else {
    echo json_encode([
        "status" => 500,
        "message" => "Error fetching cars"
    ]);
};
?>