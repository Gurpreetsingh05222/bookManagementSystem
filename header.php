<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/indexStyle.css">
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
						echo '<form action="login.php" method="post">
						<input type="text" name="uid" placeholder="Username/email">
						<input type="password" name="pwd" placeholder="Password">
						<button type="submit" name="submit">Login</button>
					</form>';
					}
				?>
				
					
				</div>
			</div>
		</nav>
	</header>