<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
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
	<a href="insertForm.php">Insert Book Records</a><br>
	<a href="view.php">View Book Records</a><br>
	<a href="deleteForm.php">Delete Book Records</a><br>
	<a href="updateForm.php">Update Book Records</a>
</body>
</html>