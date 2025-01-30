<?php

require "dbConnect.php";
require "config.php";
cors();




if (isset($_GET['cat']) && !empty($_GET['cat'])) {
    $cat = $_GET['cat'];

    $get_cat_sql = "SELECT * FROM cars WHERE category= ?";

    $stmt = mysqli_prepare($conn, $get_cat_sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $cat);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            echo json_encode([
                "status" => 200,
                "cat" => $row
            ]);
        } else {
            echo json_encode([
                "status" => 404,
                "message" => "Category does not exist"
            ]);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo json_encode([
            "status" => 500,
            "message" => "Database error"
        ]);
    }
}

else{
    $get_cars_sql = "SELECT * FROM cars LIMIT 12"; // Limit to 12 rows
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
}
