<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$password_1 = $_POST['password_1'];
		$email =$_POST['email'];

		if(!empty($username) && !empty($password_1) && !empty($email) && !is_numeric($username))
		{

			//save to database
			$query = "insert into users (username,email,password) values ('$username','$email','$password_1')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
<div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="POST">
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" >
	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" >
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Log in</a>
  	</p>
  </form>
	</div>
</body>
</html>