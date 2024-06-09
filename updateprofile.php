<?php
session_start();

include("./config/database.php");

// Check if the form is submitted for update
if (isset($_POST['update'])) {
    // Sanitize input to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $nic = mysqli_real_escape_string($conn, $_POST['nic']);
    $ID = mysqli_real_escape_string($conn, $_POST['ID']);

    // Update query
    $sql = "UPDATE `user` SET username ='$username', fullname = '$fullname', email = '$email', password = '$password', nic = '$nic' WHERE ID = '$ID'";

    $result = $conn->query($sql);

    if ($result === TRUE) {
        echo "Record updated successfully!";
        header('Location: profiledashboard.php');
        exit; // Terminate script execution after redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Check if ID is provided in the URL
if (isset($_GET['ID'])) {
    $id = mysqli_real_escape_string($conn, $_GET['ID']);
    $sql = "SELECT * FROM `user` WHERE ID = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Assign fetched values to variables
            $username = $row['username'];
            $fullname = $row['fullname'];
            $email = $row['email'];
            $password = $row['password'];
            $nic = $row['nic'];
            $ID = $row['ID'];
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="./style/updateprofile.css">
</head>
<body>

<!--header-->
<section class="menu">
    <div class="nav">
        <div class="logo"><h1>Book<b>shop</b></h1></div>
        <ul>
            <li><a class="active" href="homeBook.html">Home</a></li>
            <li><a href="category.html">Category</a></li>
            <li><a href="OFFER.HTML">Offers</a></li>
            <li><a href="aboutusnew.html">About Us</a></li>
            <li><a href="Create.php">Feedback</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="SignUp.php">SignUp</a></li>
            <li><a href="payment2.html">Add to Cart</a></li>
        </ul>
    </div>
</section>

<div class="container">
    <h2>Edit Profile</h2>
    
    <form action="updateprofile.php" method="post">
        <div class="form-group">
            <label for="username"> User Name:</label>
            <input type="text" id="username" name="username" value="<?php echo $username; ?>" >
        </div>
        
        <div class="form-group">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" value="<?php echo $fullname; ?>" >
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo $password; ?>" >
        </div>
        <div class="form-group">
            <label for="nic">NIC:</label>
            <input type="text" id="nic" name="nic" value="<?php echo $nic; ?>" >
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" >
        </div>
        
        <input type="hidden" name="ID" value="<?php echo $ID; ?>"> <!-- Hidden input for ID -->
        
        <div class="button-group">
            <button class="edit-button" type="submit" value="update" name="update"> Save Changes</button>
            <br/>
        </div>
    </form>
</div>

</body>
<script>
// Your JavaScript functions
</script>
</html>

<?php
    } else {
        header('Location: profiledashboard.php');
        exit; // Terminate script execution after redirect
    }
}
?>
