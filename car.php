<?php

require "config.php";
require "dbConnect.php";
cors();



// Check if 'id' is provided in the request
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo json_encode([
        "status" => 400,
        "message" => "Car ID is required"
    ]);
    exit;
}

$car_id = intval($_GET['id']); // Sanitize input

// Fetch the car from the database
$get_car_sql = "SELECT * FROM cars WHERE id = ?";
$stmt = mysqli_prepare($conn, $get_car_sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $car_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($result)) {
        echo json_encode([
            "status" => 200,
            "car" => $row
        ]);
    } else {
        echo json_encode([
            "status" => 404,
            "message" => "Car not found"
        ]);
    }

    mysqli_stmt_close($stmt);
} else {
    echo json_encode([
        "status" => 500,
        "message" => "Database error"
    ]);
}

?>
