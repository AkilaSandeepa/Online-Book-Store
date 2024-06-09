<?php
	session_start();

include("./config/database.php");

if (isset($_POST['update'])) {
    $bname = $_POST['bname'];
    $quantity = $_POST['quantity'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    
    $ID = $_POST['ID'];


    $sql = "UPDATE `book` SET bname ='$bname', quantity = '$quantity', author = '$author',
        description = '$description' WHERE ID = '$ID'";


    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "Record update suceesfully!";
        header('Location: inventrydashboard.php');

    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $sql = "SELECT * FROM `book` WHERE ID = '$id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $bname = $row['bname'];
            $quantity = $row['quantity'];
            $author = $row['author'];   
            $description = $row['description']; 

            

            $ID = $row['ID'];
        }
    

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Books</title>
    <link rel="stylesheet" href="./style/updatebook.css">
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
        <h2>Edit Books</h2>
        
     
        <form action="updatebook.php" method="post">
            <div class="form-group">
            <input type="hidden" name="ID" value="<?php echo $ID; ?>">

                <label > Book Name:</label>
                <input type="text" id="bname" name="bname" value="<?php echo $bname; ?>">
            </div>
            
            <div class="form-group">
                <label >Quantity:</label>
                <input type="text" id="quantity" name="quantity" value="<?php echo $quantity; ?>">
            </div>
            <div class="form-group">
                <label >Author:</label>
                <input type="text" id="author" name="author" value="<?php echo $author; ?>">
            </div>
            <div class="form-group">
                <label >Description:</label>
                <input type="text" id="description" name="description" value="<?php echo $description; ?>">
            </div>
            
            
            
            <div class="button-group">
                <button class="edit-button" type="submit" value="update" name="update"> Conform </button>
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
        header('Location: inventrydashboard.php');
    }
}
?>