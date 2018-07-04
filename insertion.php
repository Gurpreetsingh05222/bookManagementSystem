<?php
session_start();

   include "connection.php";

   $title = $_POST['title'];
   $price = $_POST['price'];
   $author = $_POST['author'];

   $query = "INSERT INTO book (title, price, author) VALUES('$title', '$price', '$author')";

   $status = mysqli_query($connection, $query);

   mysqli_close($connection);

?>
 
<!DOCTYPE html>
 <html>
	 <head>
	 	<title>Insert</title>
	 </head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
            if($status){
            	echo "Insert successfully";
            }
            else {
            	echo "Insertion Failed";
            }
	 	?> </p>
	 	Do you want to insert more records?<a href="insertForm.php">Click here</a>
      Or want to go to home page?<a href="home.php">Click here</a>
	 </body>
 </html>