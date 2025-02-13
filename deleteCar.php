<?php

require "dbConnect.php";
require "config.php";
cors();

global $pdo; // Ensure $pdo is accessible

$method = $_SERVER['REQUEST_METHOD'];
if ($method !== 'DELETE') {
    http_response_code(405);
    echo json_encode(["error" => "Method Not Allowed"]);
    exit;
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Check if car exists
    $checkSql = "SELECT id FROM cars WHERE id = :id";
    $checkStmt = $pdo->prepare($checkSql);
    $checkStmt->execute([':id' => $id]);
    
    if ($checkStmt->rowCount() === 0) {
        http_response_code(404);
        echo json_encode(["error" => "Car not found"]);
        exit;
    }

    // Delete the car listing
    $sql = "DELETE FROM cars WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([':id' => $id])) {
        echo json_encode(["status" => "success", "message" => "Car deleted successfully"]);
    } else {
        http_response_code(500);
        echo json_encode(["error" => "Failed to delete car listing"]);
    }
} else {
    http_response_code(400);
    echo json_encode(["error" => "Invalid ID"]);
    exit;
}

?>
