<?php 
$file='logininfo.txt';
$usererror=false;
$passerror=false;
$pass2error=false;
$emptyerror=false;
$error=false;
if(isset($_POST['registerbtn'])){
$containsDigit=false;
$containsLetter=false;
$containsLetter  = preg_match('/[^a-zA-Z]/',$_POST['password']);
$containsDigit   = preg_match('/[^0-9]/',$_POST['password']);
if(preg_match('/[^a-zA-Z0-9]/',$_POST['username'])){
$usererror=true;
$error=true;
}
elseif($_POST['username']==""||$_POST['password']==""){
$emptyerror=true;
$error=true;
}
elseif($containsDigit==0|| $containsLetter==0){
$passerror=true;
$error=true;
}
elseif(strlen($_POST['password'])<4){
$pass2error=true;
$error=true;
}
if(!$error){
$new_message=array("username"=>$_POST['username'],
"password"=>$_POST['password']);
if(filesize("logininformation.json")==0){
$first_record=array($new_message);
$data_to_save=$first_record;
}else{
$old_records=json_decode(file_get_contents("logininformation.json"));
array_push($old_records,$new_message);
$data_to_save=$old_records;
}
if(!file_put_contents("logininformation.json",json_encode($data_to_save,JSON_PRETTY_PRINT),LOCK_EX)){
$error="Error storing msg, Please try again!";
}else{
$success="Message stored successfully";
}
}
}
include 'header.php';
include 'navigation.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Connect to the MySQL database
	$servername = "localhost:3307";
	$username_db = "root";
	$password_db = "";
	$dbname = "petsdemo";

	$conn = mysqli_connect($servername, $username_db, $password_db, $dbname);

	// Check if the username already exists
	$sql = "SELECT * FROM login WHERE username='$username'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		echo "Username already exists.";
	} else {
		// Insert the new user into the database
		$sql = "INSERT INTO login (username, password) VALUES ('$username', '$password')";
		if (mysqli_query($conn, $sql)) {
			echo '<p>Account created successfully</p>';
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}

	mysqli_close($conn);
}

if($usererror){
echo '<h3 class="text-danger">Username has special characters. Please include only digits and letters in your username</h3>';
}elseif($emptyerror){
echo '<h3 class="text-danger"> Username or Password Field is empty!</h3>';
}elseif($passerror){
echo '<h3 class="text-danger"> Password must contain at least one letter and one digit with no special characters</h3>';
}elseif($pass2error){
echo '<h3 class="text-danger"> Password is too short!</h3>';
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
</head>
<body>
<h3 class="text-danger">Please enter A username Containing Digits and letters only.</h3><br>
<form method="POST">
<div class="form-floating">
  <input type="text" class="form-control" name="username" id="floatingUsername" style="width:75%;" placeholder="Password">
  <label for="floatingUsername">Username</label>
</div><Br>
<h3  class="text-danger">Please enter a Password containing Digits and letters only.</h3><br>
<div class="form-floating">
  <input type="password" class="form-control" name="password" style="width:75%;" id="floatingPassword" placeholder="Password">
  <label for="floatingPassword">Password</label>
</div><br>
<input type="submit" class="btn btn-primary" value="Register" name="registerbtn">
</form>
<?php include 'footer.php'?>
</body>
</html>