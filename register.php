<?php
    session_start();
    include("./config/database.php");

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $UserName=$_POST['username'];
        $Fullname=$_POST['fullname'];
        $Email=$_POST['email'];
        $Password=$_POST['password'];
        $NIC=$_POST['nic'];
        $Type=$_POST['user_type'];
       
      
        
        if(!empty($Email) && !empty($Password) && !is_numeric($Email)){
            
            $query ="INSERT INTO user(username, fullname, email, password, nic, user_type) VALUES('$UserName', '$Fullname', '$Email', '$Password', '$NIC', '$Type')";
            
            mysqli_query($conn, $query);
            echo "<script type='text/javascript'>alert('Successfully Registered'); window.location.href = 'logIn.php';</script>";
            exit; // Ensure no further output after redirection
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
    <title>Document</title>
    
    <link rel="stylesheet" href="./style/register.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">


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


<br/>

  <div class="sign-up-form">
    <img src="./images/usericon.png">
    <h1> Sign Up </h1>
    <form method="post" action="">
        <input type="text" name="username" class="input-box" placeholder="Username">
        <input type="text" name="fullname" class="input-box" placeholder="Full Name">
        <input type="email" name="email" class="input-box" placeholder="Email">
     
        
            <input type="text" name="nic" class="input-box" placeholder="NIC ">
            <input type="Password" name="password" class="input-box" placeholder="Password"> <br>
            <select name="user_type">
              <option value="">-Select-</option>
              <option value="User" >User</option>
              <option value="omanager">Order manager</option>
              <option value="pmanager">Profile manager</option>
              <option value="imanager">Inverntory manager</option>
              <option value="cmanager">Conatct manager</option>
              <option value="pamanager">Payment manager</option>



              
              </select> <br>
            <button type="submit" class=" SignUp-btn">Sign Up</button>
            <p>Already have an account ? <a href="login.php"> Login </a></p>

    </form>
</div>
<br/>
<br/>
   <!--footer-->

   <footer>
    <div class="footerContainer">
        <div class="socialIcons">
            <a href=""><i class="fa-brands fa-facebook"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
            <a href=""><i class="fa-brands fa-twitter"></i></a>
            <a href=""><i class="fa-brands fa-youtube"></i></a>
        </div>
        <div class="footerNav">
            <ul>
                <li><a href="contact1.html">Contact Us</a></li>
                <li><a href="terms.html">Terms & Conditions</a></li>
            </ul>
        </div>
        <div class="footerBottom">
            <p> Copyright &copy; Designed by <span class="designer">us</span></p>
        </div>
    </div>
    
    </footer>
    
</body>
</html>