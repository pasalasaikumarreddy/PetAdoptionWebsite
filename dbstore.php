<?php session_start();
header("Refresh: 1");
$json_data = file_get_contents("availablepetinformation.json");
$data = json_decode($json_data, true);
$mysqli = new mysqli("localhost", "root", "", "petsdemo");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

foreach ($data as $record) {
    $number = $record["number"];
    $username = $record["username"];
    $typeofpet = $record["typeofpet"];
    $breedofpet = $record["breedofpet"];
    $ageofpet = $record["ageofpet"];
    $gender = $record["gender"];
    $dog_friendly = $record["dog_friendly"];
    $cat_friendly = $record["cat_friendly"];
    $child_friendly = $record["child_friendly"];
    $img_url = $record["img_url"];
    
    $sql="INSERT INTO pets (id, username, typeofpet, breedofpet, ageofpet, gender, dog_friendly, cat_friendly, child_friendly, img_url) VALUES ('$number','$username','$typeofpet','$breedofpet','$ageofpet','$gender','$dog_friendly','$cat_friendly','$child_friendly','$img_url')
           ON DUPLICATE KEY UPDATE username = '$username' ";
    
    mysqli_query($mysqli, $sql);
   
}

mysqli_close($mysqli);

?>