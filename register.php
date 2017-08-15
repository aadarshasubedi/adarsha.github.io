<?php
if(isset($_POST['submit'])){
	
	require("db/db.php");
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirm = $_POST['confirm'];
	
	if($password != $confirm){
		$message = "Password not much !";
		header("location: index.php?message1=$message");
	}else{
		$check = mysqli_query($con, "SELECT * FROM login WHERE username='$username'");
		if(mysqli_num_rows($check)){
			$message = "Username already exist.";
			header("location: index.php?message1=$message");
		}else{
			mysqli_query($con, "INSERT INTO login(username, password) VALUES('$username', '$password')");
			$message = "You have successfully registered. Sign in now.";
			header("location: index.php?message1=$message");
		}
	}
}
?>