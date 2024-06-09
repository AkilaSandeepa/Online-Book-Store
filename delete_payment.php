<?php
// Include database connection code
include_once "db_connection.php";

// Get payment id from URL
$id = $_GET['id'];

// Delete payment
$sql = "DELETE FROM payments WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: ReadPayments.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

// Close database connection
$conn->close();
?>
