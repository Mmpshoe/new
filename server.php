<?php include('errors.php'); ?>
<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$firstname ="";
$lastname ="";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'fintechdb');

// REGISTER USER
if (isset($_POST['reg_user'there are no errors in the form
  if (count($errors) == 0) ])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);}

  // Check if form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate form data
  $username = mysqli_real_escape_string($conn, $_POST["username"]);
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $password_1 = mysqli_real_escape_string($conn, $_POST["password_1"]);
  $password_2 = mysqli_real_escape_string($conn, $_POST["password_2"]);

  if (empty($username) || empty($email) || empty($password_1) || empty($password_2)) {
    echo "Please enter all required fields.";
  } else if ($password_1 != $password_2) {
    echo "Passwords do not match.";
  } else {
    // Insert user into database
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password_1')";
    if (mysqli_query($conn, $sql)) {
      echo "User created successfully!";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
}
// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}



mysqli_close($conn);
?>