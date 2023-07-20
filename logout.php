<?php session_start();
$buttonpressed=false;
if(isset($_POST['logoutbtn'])){
$buttonpressed=true;
session_destroy();
}
include 'header.php';
include 'navigation.php';
if($buttonpressed){
echo '<h3 class="text-success">You have successfully Logged out!</h3>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Logout</title>
</head>
<body>
<form action="logout.php" method="POST">
<h2>Are you sure you want to Logout?</h2>
<input type="submit" value="Log Out" name="logoutbtn">
</form>
</body>
<?php include 'footer.php';?>
</html>