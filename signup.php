<?php

   if (isset($_POST['submit'])) {
   	
	include_once "connection.php";

	$first = mysqli_real_escape_string($connection, $_POST['first']);
	$last = mysqli_real_escape_string($connection, $_POST['last']);
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$uid = mysqli_real_escape_string($connection, $_POST['uid']);
	$pwd = mysqli_real_escape_string($connection, $_POST['pwd']);

	//check for empty fields

	if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)){
		header("Location: index.php?index=empty");
		exit();
	} else{
		if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){
			header("Location: index.php?index=invalid");
			exit();
		} else{
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: index.php?index=email");
				exit();
			} else{
				$sql = "SELECT * FROM users WHERE user_uid = '$uid' ";
				$result = mysqli_query($connection, $sql);
				$resultCheck = mysqli_num_rows($result);

				if ($resultCheck > 0) {
					header("Location: index.php?index=usertaken");
					exit();
				}else{
					//Hashing password
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
					//Insertion into db
					$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES('$first', '$last' , '$email', '$uid', '$hashedPwd')";
					mysqli_query($connection, $sql);
					header("Location: index.php?index=success");
					exit();
				}
			}
		}
	}

   } else{
   	header("Location: index.php");
   	exit();
   }

?>