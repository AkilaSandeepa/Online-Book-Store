<?php
// Include database connection code
include_once "db_connection.php";

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$quantity = $_POST['quantity'];
$name_on_card = $_POST['name_on_card'];
$card_number = $_POST['card_number'];
$expiration_date = $_POST['expiration_date'];
$cvv = $_POST['cvv'];
$book_price = $_POST['book_price'];
$service_charge = $_POST['service_charge'];
$total_payment = $book_price + $service_charge; // Calculate total payment

// Insert data into database
$sql = "INSERT INTO payments (name, email, phone, quantity, name_on_card, card_number, expiration_date, cvv, book_price, service_charge, total_payment) 
        VALUES ('$name', '$email', '$phone', '$quantity', '$name_on_card', '$card_number', '$expiration_date', '$cvv', '$book_price', '$service_charge', '$total_payment')";

if ($conn->query($sql) === TRUE) {
    // Redirect to ReadPayments.php
    header("Location: ReadPayments.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
?>
