<?php
	session_start();

include("./config/database.php");

if (isset($_POST['update'])) {
    $iname = $_POST['iname'];
    $quantity = $_POST['quantity'];
    $uprice = $_POST['uprice'];
    $tprice = $_POST['tprice'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $ID = $_POST['ID'];


    $sql = "UPDATE `order` SET iname ='$iname', quantity = '$quantity', uprice = '$uprice',
        tprice = '$tprice', email = '$email', mobile = '$mobile' WHERE ID = '$ID'";


    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "Record update suceesfully!";
        header('Location: orderdashboard.php');

    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $sql = "SELECT * FROM `order` WHERE ID = '$id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $iname = $row['iname'];
            $quantity = $row['quantity'];
            $uprice = $row['uprice'];
            $tprice = $row['tprice'];
            $email = $row['email'];
            $mobile = $row['mobile'];


            $ID = $row['ID'];
        }
    

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="./style/updateorder.css">
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
        <h2>Edit Order</h2>
        
     
        <form action="updateorder.php" method="post">
            <div class="form-group">
            <input type="hidden" name="ID" value="<?php echo $ID; ?>">

                <label for="iname">Item Name:</label>
                <input type="text" id="iname" name="iname" value="<?php echo $iname; ?>">
            </div>
            
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="text" id="quantity" name="quantity" value="<?php echo $quantity; ?>">
            </div>
            <div class="form-group">
                <label for="uprice">Unit Price:</label>
                <input type="text" id="uprice" name="uprice" value="<?php echo $uprice; ?>">
            </div>
            <div class="form-group">
                <label for="tprice">Total Price:</label>
                <input type="text" id="tprice" name="tprice" value="<?php echo $tprice; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>">
            </div>
            
            <div class="form-group">
                <label for="mobile">Mobile Number:</label>
                <input type="tel" id="mobile" name="mobile" value="<?php echo $mobile; ?>">
            </div>
            <div class="button-group">
                <button class="edit-button"  type="submit" value="update" name="update"> Save Changes</button>
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
<?php
    } else {
        header('Location: orderdashboard.php');
    }
}
?>