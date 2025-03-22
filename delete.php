<?php
session_start();
require_once 'db.php'; // Database connection

// Check if q_id is set
if (!isset($_GET['q_id']) || empty($_GET['q_id'])) {
    die("Invalid request.");
}

$q_id = intval($_GET['q_id']); // Ensure it's a valid integer

// Prepare a DELETE statement to remove only the specific row
$stmt = $conn->prepare("DELETE FROM tbl_response WHERE q_id = ?");
$stmt->bind_param("i", $q_id);

if ($stmt->execute()) {
    // Redirect to results.php after deletion
    header("Location: results.php?msg=deleted");
    exit();
} else {
    echo "Error deleting record: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
