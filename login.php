<?php
session_start(); 
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
$doesnotexist=false;
$file='logininfo.txt';
if($_SESSION['user']!=""&&$_SESSION['pass']!=""){
$URL="Form.php";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}
if(isset($_POST['loginbtn'])){
  // Connect to the database
  $conn = mysqli_connect("localhost:3307", "root", "", "petsdemo");

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Get the username and password from the form
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Query the database for the user
  $sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $sql);

  // Check if the user exists
  if (mysqli_num_rows($result) == 1) {
    // User found, set session variables
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;

    header('Location: Form.php');
	echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
    exit;
  } else {
    // User not found, show error message
    $doesnotexist=true;
  }
  // Close the connection
  mysqli_close($conn);
}elseif(isset($_POST['registerbtn'])){
$URL="createaccount.php";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}
include 'header.php';
include 'navigation.php';
if($doesnotexist){
echo '<h3 class"text-danger">Your Username/Password is incorrect.<br>Please Try Again!</h3>';
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<title>Login</title>
</head>
<body>
<h3 class="word-wrap text-primary">In order to give away your pet you need to have an account.<br> Please Log In or Click the Register button to Create an account.</h3><br>
<form method="POST" action="login.php">
<div class="form-floating">
  <input type="text" class="form-control" name="username" id="floatingUsername" style="width:75%;" placeholder="Password">
  <label for="floatingUsername">Username</label>
</div><br>
<div class="form-floating">
  <input type="password" class="form-control" name="password" id="floatingPassword"  style="width:75%;"  placeholder="Password">
  <label for="floatingPassword">Password</label>
</div><br>
<input type="submit" class="btn btn-primary" value="Log In" name="loginbtn">&nbsp;&nbsp;
<input type="submit"  class="btn btn-primary" value="Register" name="registerbtn">
</form>
<?php
include 'footer.php'?>
</body>
</html>