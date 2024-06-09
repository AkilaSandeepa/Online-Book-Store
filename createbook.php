<?php
    session_start();
    include("./config/database.php");

    if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit'])){
        $BookName = mysqli_real_escape_string($conn, $_POST['bname']);
        $Quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
        $Author = mysqli_real_escape_string($conn, $_POST['author']);
        $Description = mysqli_real_escape_string($conn, $_POST['description']);


        

        if(!empty($BookName) && !empty($Quantity) && !empty($Author) && !empty($Description) ){
            $query ="INSERT INTO `book` (bname, quantity, author, description) VALUES('$BookName', '$Quantity', '$Author', '$Description')";
            
            mysqli_query($conn, $query);
            echo "<script type='text/javascript'>alert('Successfully Created'); window.location.href = 'inventrydashboard.php';</script>";
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
    <title>Add Books</title>
    <link rel="stylesheet" href="./style/createbook.css">
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
        <h2>Add Bokks</h2>
        
     
        <form method="post">
            <div class="form-group">
                <label for="bname"> Book Name:</label>
                <input type="text" id="bname" name="bname" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="text" id="quantity" name="quantity" required>
            </div>
            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" id="author" name="author" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" id="description" name="description" required>
            </div>
            
            
            <div class="button-group">
                <button class="edit-button" type="submit" name="submit"> Conform </button>
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
