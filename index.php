<?php include_once "header.php"; ?>

	<section class="container">
		<div class="main-wrapper">
			<h2>Sign up</h2>
			<form class="signup-form" action="signup.php" method="post">
				<input type="text" name="first" placeholder="Firstname">
				<input type="text" name="last" placeholder="Lastname">
				<input type="text" name="email" placeholder="Email">
				<input type="text" name="uid" placeholder="Username">
				<input type="password" name="pwd" placeholder="Password">
				<button type="submit" name="submit">Signup</button>
			</form>
		</div>
	</section>

<?php include_once"footer.php"; ?>