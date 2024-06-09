<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Payment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"],
        input[type="submit"] {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: calc(100% - 22px); /* Adjusting for padding and border */
            box-sizing: border-box; /* Ensure padding and border are included in width calculation */
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Update Payment</h2>
    <form action="process_update.php" method="post">
        <?php
        // Include database connection code
        include_once "db_connection.php";

        // Get payment id from URL
        $id = $_GET['id'];

        // Fetch payment details
        $sql = "SELECT * FROM payments WHERE id=$id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        // Output form fields
        ?>
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>"><br>
        <label for="phone">Phone Number:</label><br>
        <input type="text" id="phone" name="phone" value="<?php echo $row['phone']; ?>"><br>
        <label for="quantity">Quantity:</label><br>
        <input type="number" id="quantity" name="quantity" value="<?php echo $row['quantity']; ?>"><br>
        <label for="name_on_card">Name On Card:</label><br>
        <input type="text" id="name_on_card" name="name_on_card" value="<?php echo $row['name_on_card']; ?>"><br>
        <label for="card_number">Card Number:</label><br>
        <input type="text" id="card_number" name="card_number" value="<?php echo $row['card_number']; ?>"><br>
        <label for="expiration_date">Expiration Date:</label><br>
        <input type="text" id="expiration_date" name="expiration_date" value="<?php echo $row['expiration_date']; ?>"><br>
        <label for="cvv">CVV:</label><br>
        <input type="text" id="cvv" name="cvv" value="<?php echo $row['cvv']; ?>"><br>
        <label for="book_price">Book Price:</label><br>
        <input type="number" id="book_price" name="book_price" value="<?php echo $row['book_price']; ?>"><br>
        <label for="service_charge">Service Charge:</label><br>
        <input type="number" id="service_charge" name="service_charge" value="<?php echo $row['service_charge']; ?>"><br>
        <input type="submit" value="Update">
    </form>

    <?php
    // Close database connection
    $conn->close();
    ?>
</body>
</html>
