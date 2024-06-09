<?php

$con = mysqli_connect("localhost", "root", "", "book");

if (!$con){
    die("Connection Failed!" . mysqli_connect_error());
}

if (isset($_POST['sendbtn']))
{   
    
    $fullname     = $_POST['fullname'];
    $phoneNo     = $_POST['phoneNo'];
    $email   = $_POST['email'];
    $subject    = $_POST['subject'];
    $message   = $_POST['message'];
    
    $sql = "INSERT INTO contactus (fullname,phoneNo,email,subject,message) VALUES ('$fullname','$phoneNo','$email','$subject','$message')";

    $result = mysqli_query($con, $sql);
        
    if($result)
    {
         echo "Payment Successful";
        header('location:../php/viewcontactdata.php');
    }
      else{
       die(mysqli_error($con));
    }
}
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the delete query
    $delete_sql = "DELETE FROM contactus WHERE id = '$id'";

    // Execute the delete query
    if ($con->query($delete_sql)) {
        ?>
        <script>
             window.alert("delete Successfully");
             window.location.href ="../php/viewcontactdata.php";
    </script>
        <?php
        exit(0);
        } else 
        {
            ?>
        <script>
            window.alert("Not deleted Successfully");
            window.location.href ="../php/viewcontactdata.php";
            </script>
        <?php
            exit(0);    }

}
$con->close();
?>