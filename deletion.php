<?php

session_start();

   $size = sizeof($_POST);
   $j=1;
   for($i=1; $i<=$size; $i++,$j++){
   	$index = "b".$j;
   	if(isset($_POST[$index]))
   		$b_id[$i]= $_POST[$index];
   	else
   		$i--;
   }

   include "connection.php";

   for($k=1; $k<=$size; $k++){
     $q="delete from book where bookid=". $b_id[$k];
     mysqli_query($connection, $q);
   }
?>

<!DOCTYPE html>
 <html>
	 <head>
	 	<title>Delete</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	 </head>
	 <body>
   <header>
    <nav>
      <div class="main-wrapper">
        <ul>
          <li>Book Management System</li>
        </ul>
        <div class="nav-login">
        <?php
          if (isset($_SESSION['u_id'])) {
            echo '<form action="logout.php" method="post">
            <button type="submit" name="submit">Logout</button>
            </form>';
          } else{
            header("Location: index.php");
          }
        ?>
        </div>
      </div>
      
    </nav>
  </header>
	 	<p> <?php
            echo $size."Records deleted";
	 	?> </p>
	 	Go back to home page<a href="home.php">Click here</a>
	 </body>
 </html>