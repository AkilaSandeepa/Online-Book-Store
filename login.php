<?php

include("./config/database.php");
session_start();

$error = ""; // Initialize error variable

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $UserName = $_POST['username_email']; // Changed to username_email to accommodate both username and email
  $Password = $_POST['password']; // Changed to password

  // Updated the query to check both email and username
  $query = "SELECT * FROM user WHERE (email='$UserName' OR username='$UserName') AND Password='$Password'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    $user_data = mysqli_fetch_array($result);
    $_SESSION['user_id'] = $user_data['ID'];

    if ($user_data['user_type'] == 'user') {
      header("location:homebook.html");
      die;
    } else if ($user_data['user_type'] == 'omanager') {
      header("location:orderdashboard.php");
      die;
    }
    else if ($user_data['user_type'] == 'pmanager') {
      header("location:profiledashboard.php");
      die;
    }
    else if ($user_data['user_type'] == 'imanager') {
      header("location:inventrydashboard.php");
      die;
    }
    else if ($user_data['user_type'] == 'cmanager') {
      header("location:viewcontactdata.php");
      die;
    }
    else if ($user_data['user_type'] == 'pamanager') {
      header("location:readpayments.php");
      die;
    }
  } else {
    $error = "Incorrect email or password"; // Set error message
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="./style/login.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.5/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>

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

<div class="hero min-h-screen bg-base-200">
    <div class="hero-content flex-col lg:flex-row-reverse">
      <div class="text-center lg:text-left">
        <h1 class="text-5xl font-bold">Login now!</h1>
        <p class="py-6">Welcome to our login page! Please enter your username and password to access your account and explore our online bookstore. If you don't have an account yet, you can easily create one by clicking on the "Sign Up" link below. Thank you for choosing us for your literary adventures!</p>
        <?php
        if ($error != "") {
          echo "<div class='text-red-500'>$error</div>";
        }
        ?>
      </div>
      <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
        <form class="card-body" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="form-control">
            <label class="label">
              <span class="label-text">Email or Username</span>
            </label>
            <input type="text" name="username_email" placeholder="email or username" class="input input-bordered" required />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text">Password</span>
            </label>
            <input type="password" name="password" placeholder="password" class="input input-bordered" required />
            <label class="label">
              <a href="#" class="label-text-alt link link-hover">Forgot password?</a>
            </label>
          </div>
          <div class="form-control mt-6">
            <button class="btn btn-primary" type="submit">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>

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
