<?php
    require 'connection.php';
    session_start();

    $select_sql = "SELECT * FROM contactus";
    $result = $con->query($select_sql);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Book Store</title>
    <link rel="icon" type="image/png" href="image/logo.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="./style/header-footer.css">
    <link rel="stylesheet" type="text/css" href="./style/viewcontact.css">
</head>

<body>
    <!-- horizontal navigation bar -->
    <div class="navbar">
        <div class="logo">
            <h1>Online Book Store</h1>
        </div>
        <div class="menu">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="packages.html">Packages</a></li>
                <li><a href="terms.html">Terms and Conditions</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="../contact.html">Contact Us</a></li>
            </ul>
        </div>
        <div class="login">
            <a href="login.html">Login</a>
            <a href="Register.html">Register</a>
        </div>
    </div>

    <br>
    <center><h2 class="contact">Contact us Details</h2></center>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Fullname</th>
            <th>Phone No</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['fullname'] . "</td>";
                echo "<td>" . $row['phoneNo'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['subject'] . "</td>";
                echo "<td>" . $row['message'] . "</td>";
                echo '<td>
                        <a href="editcontact.php?ID=' . $row['id'] . '"><button class="btn">Edit</button></a>
                        <a href="deletecontact.php?ID=' . $row['id'] . '"><button class="btn">Delete</button></a>
                    </td>';
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No data found in the table.</td></tr>";
        }
        ?>
    </table>

    <footer class="footer">
        <!-- Your footer content here -->
    </footer>

    <script src="js/home.js"></script>
</body>
</html>

<?php
$con->close();
?>
