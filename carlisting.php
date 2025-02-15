<?php

require "dbConnect.php";
require "config.php";
cors();





    $get_cars_sql = "SELECT * FROM carlisting ORDER by id DESC LIMIT 12"; // Limit to 12 rows
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

