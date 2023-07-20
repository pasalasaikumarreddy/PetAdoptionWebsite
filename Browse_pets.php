<?php session_start(); 
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
$match=false;
$nopetfound=false;
if(file_exists('availablepetinformation.json'))
{
	$filename = 'availablepetinformation.json';
	$data = file_get_contents($filename); //data read from json file
	//print_r($data);
	$users = json_decode($data);  //decode a data

	//print_r($users); //array format data printing
	 $message = "<h3 class='text-success'>JSON file data</h3>";
}else{
	 $message = "<h3 class='text-danger'>JSON file Not found</h3>";
}
?>
<?php include 'header.php';
include 'navigation.php';?>
<!DOCTYPE html>
 <html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
  <title>Read a JSON File</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<?php

// Connect to the MySQL database
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "petsdemo";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the data that was submitted from the search form
$type = $_SESSION['typeofpet1'];
$breed = $_SESSION['breedofpet1'];
$age = $_SESSION['ageofpet1'];
$gender = $_SESSION['Gender1'];
$friendly= $_SESSION['friendly1'];
$trained= $_SESSION['Trained1'];


// Construct the SQL query to search for pets with matching data
$sql = "SELECT * FROM avlpets WHERE typeofpet='$type' AND breedofpet='$breed' AND ageofpet='$age' AND gender='$gender' AND dog_friendly='$friendly' AND trained='$trained' ";

// Execute the query
$result = mysqli_query($conn, $sql);
// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Loop through the rows and display the pets
    while($row = mysqli_fetch_assoc($result)) {
        echo "Name: " . $row["username"] . "<br>";
        echo "Type of pet: " . $row["typeofpet"] . "<br>";
        echo "Breed: " . $row["breedofpet"] . "<br>";
        echo "Gender: " . $row["gender"] . "<br>";
        echo "Trained: " . $row["trained"] . "<br>";
        echo "Age: " . $row["ageofpet"] . "<br>";
        echo "Description: " . $row["descr"] . "<br>";
        echo "Email: " . $row["email"] . "<br>";
        echo "Contact No: " . $row["phone"] . "<br>";
        echo "Img_URL: " . $row["imgurl"] . "<br>" ;
        echo "<br>";
    /*
		echo "image: " .$row["img"] . "<br>";
		$imageURL = $row["img"];
		echo '<img src="<?php echo $imagrURL; ?>" alt="" />';
		echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/>';
        echo "<br>";
        */
    }
} else {
    echo "No results found.";
}

// Close the database connection
mysqli_close($conn);

?>	  
</html>