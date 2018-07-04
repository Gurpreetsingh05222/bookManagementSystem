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
 	<title>Delete book records</title>
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
	 <form action="deletion.php" method="post">
	 <table id="viewTable">
	 	<tr>
	 		<th>Book Id</th>
	 		<th>Title</th>
	 		<th>Price</th>
	 		<th>Author</th>
	 		<th>Select to delete</th>
	 	</tr>
	 	<?php
            for($i = 1; $i <= $num; $i++){
            	$row = mysqli_fetch_array($result);

            	?>

            	<tr>
            		<td><?php echo $row['bookid']; ?></td>
            		<td><?php echo $row['title']; ?></td>
            		<td><?php echo $row['price']; ?></td>
            		<td><?php echo $row['author']; ?></td>
            		<td><input type="checkbox" value="<?php echo $row['bookid']; ?>" name="b<?php echo $i; ?>"></td>
            	</tr>

        <?php
            }
	 	?>

	 	<tr>
	 		<td colspan="5"><input type="submit" value="Delete"></td>
	 	</tr>
	 </table>
	 </form>
 </body>
 </html>