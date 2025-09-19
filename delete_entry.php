<?php
require_once 'Db.php';  // Assuming your database connection is in Db.php

// Create an instance of the Db class
$db = new Db();
$conn = $db->conn();  // Assuming you have a conn() method in your Db class

// Check if the 'id' parameter is set in the request
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Prepare and execute the DELETE statement
        $stmt = $conn->prepare('DELETE FROM tickets WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        // Return a JSON response indicating success
        echo json_encode(['status' => 'success', 'message' => 'Entry deleted successfully']);
    } catch (PDOException $e) {
        // Return a JSON response indicating failure and the error message
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    // Return a JSON response indicating failure (id parameter not set)
    echo json_encode(['status' => 'error', 'message' => 'ID parameter not set']);
}

// Close the database connection
$conn = null;
?>