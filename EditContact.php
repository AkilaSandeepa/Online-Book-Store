<?php
session_start();

include("./config/database.php");

if (isset($_POST['update'])) {
    $fullname = $_POST['fullname'];
    $phoneNo = $_POST['phoneNo'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $ID = $_POST['id'];

    $sql = "UPDATE `contactus` SET fullname ='$fullname', phoneNo = '$phoneNo', email = '$email',
        subject = '$subject', message = '$message' WHERE id = '$ID'";

    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "Record updated successfully!";
        header('Location: viewcontactdata.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $sql = "SELECT * FROM `contactus` WHERE id = '$id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $fullname = $row['fullname'];
            $phoneNo = $row['phoneNo'];
            $email = $row['email'];
            $subject = $row['subject'];
            $message = $row['message'];

            $ID = $row['id'];
        }
    ?>

        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Online Book Store</title>
            <link rel="icon" type="img/png" href="image/logo.png">
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" type="text/css" href="./style/header-footer.css">
            <link rel="stylesheet" type="text/css" href="./style/contact.css">
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
                        <li><a href="contact.html">Contact Us</a></li>
                    </ul>
                </div>
                <div class="login">
                    <a href="login.html">Login</a>
                    <a href="Register.html">Register</a>
                </div>
            </div>
            </div>



            <!--contact section start-->

            <section>
                <div class="section-header">
                    <div class="container1">
                        <h2>Contact Us</h2>
                        <h4>Get in touch with us today</h4>
                    </div>
                </div>

                <div class="container2">
                    <div class="row">

                        <div class="contact-info">
                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="fas fa-home"></i>
                                </div>

                                <div class="contact-info-content">
                                    <h4>Address</h4>
                                    <p>Head office,<br />New kandy Road<br />Malabe,<br /> Sri Lanka</p>
                                </div>
                            </div>

                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="fas fa-phone"></i>
                                </div>

                                <div class="contact-info-content">
                                    <h4>24x7 Care Center</h4>
                                    <p>561-456-2321</p>
                                </div>
                            </div>

                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>

                                <div class="contact-info-content">
                                    <h4>Email</h4>
                                    <p>support@bookstore.com</p>
                                </div>
                            </div>
                        </div>

                        <div class="contact-form">
                            <form method="post" action="editcontact.php" id="contact-form">
                                <h2>Send Message</h2>
                                <div class="input-box">
                                    <input type="hidden" name="id" value="<?php echo $ID; ?>">

                                    <input type="text" placeholder="Full Name*" name="fullname" value="<?php echo $fullname; ?>" required>

                                </div>

                                <div class="input-box">
                                    <input type="text" placeholder="Phone number*" name="phoneNo" value="<?php echo $phoneNo; ?>" required>

                                </div>

                                <div class="input-box">
                                    <input type="email" placeholder="email*" name="email" value="<?php echo $email; ?>" required>

                                </div>

                                <div class="input-box">
                                    <input type="text" placeholder="Subject*" name="subject" value="<?php echo $subject; ?>" required>

                                </div>

                                <div class="input-box">
                                    <textarea placeholder="Type your message.......*" name="message" required><?php echo $message; ?></textarea>

                                </div>

                                <div class="button-group">
                                    <button class="edit-button" type="submit" value="update" name="update"> Save Changes</button>
                                    <br/>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </section>


            <footer class="footer">
                <div class="container">
                    <div class="row">
                        <!--1st column-->
                        <div class="footer-col">
                            <h4>Pages</h4>
                            <ul>
                                <li><a href="contact.html">Contact Us</a></li>
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                            </ul>
                        </div>
                        <!--2nd column-->
                        <div class="footer-col">
                            <ul>
                                <br>
                                <br>
                                <li><a href="#">Promotions</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">News</a></li>
                                <li><a href="#">FAQs</a></li>
                            </ul>
                        </div>
                        <!--3rd column-->
                        <div class="footer-col">
                            <h4>Office</h4>
                            <ul>
                                <li><a href="">312, Kandy rd</a></li>
                                <li><a href="">Malabe</a></li>
                                <li><a href="">+97 123134235</a></li>
                                <li><a href="">support@sunsetsafari.com</a></li>
                            </ul>
                        </div>
                        <!--4th column-->

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <p>&#169; 2024 Sunest Boat Safari. All Rights Reserved.</p>
                        </div>
                        <div class="socialIcons">
                            <a href=""><i class="fa-brands fa-facebook"></i></a>
                            <a href=""><i class="fa-brands fa-instagram"></i></a>
                            <a href=""><i class="fa-brands fa-twitter"></i></a>
                            <a href=""><i class="fa-brands fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </footer>
            <!--SLIDES USING JAVASCRIPT -->
            <script src="js/home.js"></script>
        </body>

        </html>
<?php
    } else {
        header('Location: viewcontactdata.php');
        exit();
    }
}
?>
