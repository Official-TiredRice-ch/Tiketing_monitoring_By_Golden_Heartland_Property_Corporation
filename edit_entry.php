<?php
require_once 'Db.php';

// Create an instance of the Db class
$db = new Db();
$conn = $db->conn(); // Assuming you have a conn() method in your Db class

// Handle the POST request for editing an entry
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $editId = $_POST['edit_id'];
    $newPersonName = $_POST['new_person_name'];
    $newPersonId = $_POST['new_person_id'];
    $newEmail = $_POST['new_email'];
    $newAddress = $_POST['new_address'];
    $newContactNumber = $_POST['new_contact_number'];

    // Update data in the 'tickets' table
    $stmt = $conn->prepare('UPDATE tickets SET person_name=?, person_id=?, email=?, address=?, contact_number=? WHERE id=?');
    $stmt->bindParam(1, $newPersonName);
    $stmt->bindParam(2, $newPersonId);
    $stmt->bindParam(3, $newEmail);
    $stmt->bindParam(4, $newAddress);
    $stmt->bindParam(5, $newContactNumber);
    $stmt->bindParam(6, $editId);
    $stmt->execute();

    // You can send a JSON response to indicate success or failure
    if ($stmt->rowCount() > 0) {
        echo json_encode(['success' => true, 'message' => 'Entry updated successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update entry']);
    }

    $conn = null;
} else {
    // Handle the case where it's not a POST request
    // ...
}
?>
