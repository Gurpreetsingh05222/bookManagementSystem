<?php
   session_start();
   include "connection.php";

   $query = "SELECT * FROM book";

   $result = mysqli_query($connection, $query);

   $num = mysqli_num_rows($result);

?> 

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Update book records</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
 	<link rel="stylesheet" type="text/css" href="css/viewStyle.css">
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
    <form action="updation.php" method="post">
	 <table id="viewTable">
	 	<tr>
	 		<th>Book Id</th>
	 		<th>Title</th>
	 		<th>Price</th>
	 		<th>Author</th>
	 	</tr>
	 	<?php
            for($i = 1; $i <= $num; $i++){
            	$row = mysqli_fetch_array($result);

            	?>

            	<tr>
            		<td><?php echo $row['bookid']; ?><input type="hidden" name="bookid<?php echo $i; ?>" value="<?php echo $row['bookid']; ?>" ></td>
            		<td><input type="text" name="title<?php echo $i;?>" value= "<?php echo $row['title']; ?>"></td>
            		<td><input type="text" name="price<?php echo $i;?>" value="<?php echo $row['price']; ?>"></td>
            		<td><input type="text" name="author<?php echo $i;?>" value="<?php echo $row['author']; ?>"></td>
            	</tr>

        <?php
            }
	 	?>
	 </table>
    <input type="submit" value="Update">
    </form>
 </body>
 </html>