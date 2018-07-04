<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert Form</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body >
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
	<form action="insertion.php" method="post">
		<table cellspacing="15" cellpadding="15">
			<tr>
				<th>Title</th>
				<td><input type="text" name="title" placeholder="Title" required></td>
			</tr>

			<tr>
				<th>Price</th>
				<td><input type="text" name="price" placeholder="Price" required></td>
			</tr>

			<tr>
				<th>Author</th>
				<td><input type="text" name="author" placeholder="Author" ></td>
			</tr>

			<tr>
				<th></th>
				<td><input type="submit" value="Insert" ></td>
			</tr>
		</table>
	</form>
</body>
</html>