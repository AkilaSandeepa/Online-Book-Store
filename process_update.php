<?php
// Include database connection code
include_once "db_connection.php";

// Check if form data exists
if(isset($_POST['id'], $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['quantity'], $_POST['name_on_card'], $_POST['card_number'], $_POST['expiration_date'], $_POST['cvv'], $_POST['book_price'], $_POST['service_charge'])) {
    // Sanitize form data
    $id = $_POST['id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $name_on_card = mysqli_real_escape_string($conn, $_POST['name_on_card']);
    $card_number = mysqli_real_escape_string($conn, $_POST['card_number']);
    $expiration_date = mysqli_real_escape_string($conn, $_POST['expiration_date']);
    $cvv = mysqli_real_escape_string($conn, $_POST['cvv']);
    $book_price = mysqli_real_escape_string($conn, $_POST['book_price']);
    $service_charge = mysqli_real_escape_string($conn, $_POST['service_charge']);
    $total_payment = $book_price + $service_charge; // Calculate total payment

    // Update data in database
    $sql = "UPDATE payments SET name='$name', email='$email', phone='$phone', quantity='$quantity', name_on_card='$name_on_card', card_number='$card_number', expiration_date='$expiration_date', cvv='$cvv', book_price='$book_price', service_charge='$service_charge', total_payment='$total_payment' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Redirect to ReadPayments.php
        header("Location: ReadPayments.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    // Redirect back to update_payment.php if form data is not provided
    header("Location: update_payment.php");
    exit();
}

// Close database connection
$conn->close();
?>
