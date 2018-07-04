<?php
session_start();
   
   include "connection.php";

  $size = sizeof($_POST);
  $records = $size/4;

  for($i=1; $i<=$records; $i++){
  	
  	$index1="bookid". $i;
  	$bookid[$i]= $_POST[$index1];
  	$index2="title".$i;
  	$title[$i]= $_POST[$index2];
  	$index3="price".$i;
  	$price[$i]= $_POST[$index3];
  	$index4="author".$i;
  	$author[$i]= $_POST[$index4];
  }

  for ($i=1; $i<=$records; $i++){
  	$q = "update book SET title='$title[$i]', price =$price[$i], author='$author[$i]' where bookid=$bookid[$i]";
    mysqli_query($connection, $q);
  }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Updation</title>
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
	<p><?php

		 echo $size."Records Updated";

	?></p>
	GO back to home page<a href="home.php">Click here</a>
</body>
</html>