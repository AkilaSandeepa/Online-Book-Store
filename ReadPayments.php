<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment List</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Payment List</h1>
    <a href="CreatePayment.php">
    <button>Create Payment</button>
</a><br>

    <table><br>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Quantity</th>
            <th>Name On Card</th>
            <th>Card Number</th>
            <th>Expiration Date</th>
            <th>CVV</th>
            <th>Book Price</th>
            <th>Service Charge</th>
            <th>Total Payment</th>
            <th>Options</th>
        </tr>
        <?php
        // Include database connection code
        include_once "db_connection.php";

        // Fetch all payments
        $sql = "SELECT * FROM payments";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["name"]."</td>";
                echo "<td>".$row["email"]."</td>";
                echo "<td>".$row["phone"]."</td>";
                echo "<td>".$row["quantity"]."</td>";
                echo "<td>".$row["name_on_card"]."</td>";
                echo "<td>".$row["card_number"]."</td>";
                echo "<td>".$row["expiration_date"]."</td>";
                echo "<td>".$row["cvv"]."</td>";
                echo "<td>".$row["book_price"]."</td>";
                echo "<td>".$row["service_charge"]."</td>";
                echo "<td>".$row["total_payment"]."</td>";
                echo "<td><a href='update_payment.php?id=".$row["id"]."'>Update</a> | <a href='delete_payment.php?id=".$row["id"]."'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='12'>0 results</td></tr>";
        }

        // Close database connection
        $conn->close();
        ?>
    </table>
</body>
</html>
