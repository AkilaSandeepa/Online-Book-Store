<?php
    session_start();
    include("./config/database.php");

    if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit'])){
        $ItemName = mysqli_real_escape_string($conn, $_POST['iname']);
        $Quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
        $UnitPrice = mysqli_real_escape_string($conn, $_POST['uprice']);
        $TotalPrice = mysqli_real_escape_string($conn, $_POST['tprice']);
        $Email = mysqli_real_escape_string($conn, $_POST['email']);
        $Phone = mysqli_real_escape_string($conn, $_POST['mobile']);

        if(!empty($ItemName) && !empty($Quantity) && !empty($UnitPrice) && !empty($TotalPrice) ){
            $query ="INSERT INTO `order` (iname, quantity, uprice,tprice , email, mobile) VALUES('$ItemName', '$Quantity', '$UnitPrice', '$TotalPrice', '$Email', '$Phone')";
            
            mysqli_query($conn, $query);
            echo "<script type='text/javascript'>alert('Successfully Created'); window.location.href = 'orderdashboard.php';</script>";
            exit(); // Ensure no further output after redirection
        }
        else{
            echo "<script type='text/javascript'>alert('Please Enter some Valid Details');</script>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="./style/createorder.css">
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
        <h2>Create Order</h2>
        
     
        <form method="post">
            <div class="form-group">
                <label for="iname">Item Name:</label>
                <input type="text" id="iname" name="iname" required>
            </div>
            
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="text" id="quantity" name="quantity" required>
            </div>
            <div class="form-group">
                <label for="uprice">Unit Price:</label>
                <input type="text" id="uprice" name="uprice" required>
            </div>
            <div class="form-group">
                <label for="tprice">Total Price:</label>
                <input type="tprice" id="tprice" name="tprice" required>
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile No:</label>
                <input type="tel" id="mobile" name="mobile" required>
            </div>
            <div class="button-group">
                <button class="edit-button" type="submit" name="submit" >Conform Order</button>
                <br/>
                
            </div>
        </form>
        
    </div>
</body>
<script>
    function confirmDelete() {
        if (confirm('Are you sure you want to delete the user profile?')) {
            // Code to delete the user profile
            showNotification('User profile deleted successfully!', 'success');
        }
    }

    function showNotification(message, type) {
        const notification = document.getElementById('notification');
        notification.textContent = message;
        notification.classList.add(type);
        setTimeout(() => {
            notification.textContent = '';
            notification.classList.remove(type);
        }, 3000); // Remove notification after 3 seconds
    }
</script>
</html>
