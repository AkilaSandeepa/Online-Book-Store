<?php 
	
	session_start();

	include "./config/database.php";
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/inventrydashboard.css">

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
            <li><a href="payment2.html">Add to Cart</a></li>
            <li><a href="logout.php">LogOut</a></li>
        </ul>

    </div>
</section>
  <nav>
    <div class="container">
      <h1>Inventry Manage Dashboard</h1>
    </div>
  </nav>

  <aside>
    <div class="container">
      
    </div>
  </aside>

  <main>
    <div class="container">
      <h2></h2>
      <!-- Your main content here -->
      <div class="hero min-h-screen bg-base-100">
        <div class="hero-content flex-col lg:flex-row-reverse">
          <img src="./images/project.png" class="max-w-sm rounded-lg shadow-2xl" />
          <div>
            <h1 class="text-5xl font-bold">Inventry manage  Dashboard</h1>
            <br/>
            <button class="btn btn-primary" onclick="goToBook()"> create </button>      
            <br/>
                  
          </div>
        </div>
      </div>
<br/>

      <div tabindex="0" class="collapse border border-base-300 bg-base-200"> 
       <center> <div class="collapse-title text-xl font-medium">
Books Details        </div></center>
        <div class="collapse-content"> 
        </div>
      </div>
       
    </div>

    <div class="overflow-x-auto">
      <table class="table table-xs">
        <thead>
          <tr>

          <th>BookID</th> 
          <th>Book Name</th> 
            <th>Quantity</th> 
            <th>Author</th> 
            <th>Description</th> 
            <th>Action</th> 
          </tr>
        </thead> 
        <tbody>
        <?php 
			$query = "SELECT * FROM `book`"; // Changed 'order' to 'order_table'
			$result = mysqli_query($conn, $query);
			while($row = mysqli_fetch_assoc($result)){
		?>
        <tr>
        <td><?php echo $row['ID'] ?></td>
					<td><?php echo $row['bname'] ?></td>
					<td><?php echo $row['quantity'] ?></td>
					<td><?php echo $row['author'] ?></td>
                    <td><?php echo $row['description'] ?></td>
					<td>
          <a href="updatebook.php?ID=<?php echo $row['ID']; ?>"><button class="btn">Edit</button></a>
          <a href="deletebook.php?ID=<?php echo $row['ID']; ?>"><button class="btn">Delete</button></a>

        </tr>
        <?php
			}
		?>
        </tbody> 
        <tfoot>
         
          </tr>
        </tfoot>
      </table>
    </div>
    
      <br/>
      <br/>
      <div tabindex="0" class="collapse border border-base-300 bg-base-200"> 
        <center> <div class="collapse-title text-xl font-medium">
  Chart      </div></center>
         <div class="collapse-content"> 
         </div>
       </div>
       <br/>
       Today Inventry chart
        
<br/>
<br/>
      <img src="./images/Pie-Chart.png" class="max-w-sm rounded-lg shadow-2xl" />

    </div>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
<center>
    <ul class="timeline">
      <li>
        <div class="timeline-start timeline-box">Get Start</div>
        <div class="timeline-middle">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-primary"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
        </div>
        <hr class="bg-primary"/>
      </li>
      <li>
      <hr class="bg-primary"/>
        <div class="timeline-middle">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-primary"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
        </div>
        <div class="timeline-end timeline-box">plan</div>
        <hr class="bg-primary"/>
      </li>
      <li>
        <hr class="bg-primary"/>
        <div class="timeline-start timeline-box">discuss</div>
        <div class="timeline-middle">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-primary"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
        </div>
        <hr/>
      </li>
      <li>
        <hr/>
        <div class="timeline-middle">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
        </div>
        <div class="timeline-end timeline-box">design</div>
        <hr/>
      </li>
      <li>
        <hr/>
        <div class="timeline-start timeline-box">Start project</div>
        <div class="timeline-middle">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
        </div>
      </li>
    </ul>
  </main>
</center>


<script>
    function goToBook() {
        window.location.href = 'createbook.php'; // Corrected 'login.php' to 'login.php'
    }
</script>


  

    
</body>
</html>

  
 