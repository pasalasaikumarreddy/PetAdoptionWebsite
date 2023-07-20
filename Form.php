<?php 
session_start();
$thereisemptyfield=false;
if(isset($_POST['submitbtn'])){
if($_POST['typeofpet']=="Dog"){
$_POST['breedofpet']=$_POST['breedofdogs'];
}
if(empty($_POST['typeofpet'])||empty($_POST['phone'])||empty($_POST['breedofpet'])||empty($_POST['ageofpet'])||empty($_POST['Gender'])||empty($_POST['Dog_friendly'])||empty($_POST['cat_friendly'])||empty($_POST['child_friendly'])||empty($_POST['First_name'])||empty($_POST['Last_name'])||empty($_POST['Email'])){
$thereisemptyfield=true;
}else{
$thereisemptyfield=false;

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "petsdemo";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$username=$_POST['First_name'];
$typeofpet = $_POST['typeofpet'];
$breedofpet = $_POST['breedofpet'];
$ageofpet = $_POST['ageofpet'];
$gender = $_POST['Gender'];
$dog_friendly = $_POST['Dog_friendly'];
$cat_friendly = $_POST['cat_friendly'];
$child_friendly = $_POST['child_friendly'];
$descr = $_POST['description'];
$trained = $_POST['trained'];
//$img = $_POST['image'];
$email = $_POST['Email'];
$phone = $_POST['phone'];
$imgurl = $_POST['imgurl'];

// Insert data into database
$sql = "INSERT INTO avlpets (username, typeofpet, breedofpet, ageofpet, gender, dog_friendly,cat_friendly, child_friendly,descr, trained, imgurl, email, phone) VALUES ('$username', '$typeofpet', '$breedofpet', '$ageofpet','$gender',
		'$dog_friendly','$cat_friendly','$child_friendly', '$descr', '$trained', '$imgurl', '$email', '$phone')";

if (mysqli_query($conn, $sql)) {
    echo "";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}
}
include 'header.php';
include 'navigation.php';
if(isset($_POST['submitbtn'])){
if($thereisemptyfield){
echo '<h3 style="color:red;"> Some Fields Were Left Empty. Please Try Again!!!<br></h3>';
}else{
echo'<h3 style="color:green;"> Form Successfully submitted!!<br></h3>';
}
}
?>
<div class="Give_away">
<form name="myForm" action="Form.php" method="POST">
<p>Is Your Pet a Dog or a Cat?
<select name="typeofpet" onchange="enableBrand(this)">
<option value="">--select an option--</option>
<option value="Dog">Dog</option>
<option value="Cat">Cat</option>
</select>
</p><br>
<p>What is the breed of your pet?
<select name="breedofpet" id="4">
<option value="">--select an option--</option>
<option name="cat" value="Abyssinian">Abyssinian Cat Breed</option>
<option value="American bobtail">American Bobtail Cat Breed</option>
<option value="Bombay">Bombay Cat Breed</option>
<option value="Chartreux">Chartreux Cat Breed</option>
<option value="British shorthair">British Shorthair Cat Breed</option>
<option value="Turkish Angora">Turkish Angora Cat Breed</option>
</select>
<select name="breedofdogs" id="3">
<option value="">--select an option--</option>
<option  value="Bulldog">Bulldog Dog Breed</option>
<option  value="German Shepherd">German Shepherd Dog Breed</option>
<option  value="Golden Retriever">Golden Retriever Dog Breed</option>
<option  value="Siberian Husky">Siberian Husky Dog Breed</option>
<option  value="Pomeranian">Pomeranian Dog Breed</option>
<option  value="Chihuahua">Chihuahua Dog Breed</option>
<option  value="Mixed Breed">Mixed Breed</option>
</select>
</p><br>
<p>Please Specify the age of your pet
<select name="ageofpet">
<option value="">--select an option--</option>
<option value="Less than 1 years old">Less than 1 years old</option>
<option value="More than 1 years old">More than 1 years old</option>
</select>
</p><br>
<p>Please Specify the gender of your pet:
<label><input type="radio" class="radiobtn" name="Gender" value="Female">Female</label>
<label><input type="radio" class="radiobtn" name="Gender" value="Male">Male</label>
</p><br>
<p>Does your pet get along with dogs?
<label><input type="radio" class="radiobtn" name="Dog_friendly" value="yes">Yes</label>
<label><input type="radio" class="radiobtn" name="Dog_friendly" value="no">No</label>
</p><br>
<p>Does your pet get along with cats?
<label><input type="radio" class="radiobtn" name="cat_friendly" value="yes">Yes</label>
<label><input type="radio" class="radiobtn" name="cat_friendly" value="no">No</label>
</p><br>
<p>Is your pet suitable for a family with small children?
<label><input type="radio" class="radiobtn" name="child_friendly" value="yes">Yes</label>
<label><input type="radio" class="radiobtn" name="child_friendly" value="no">No</label>
</p><br>
<p>Give a short description of your pet (Optional):<br><br>
<input type="text" class="textinput" name="description">
</p><br>
<p>Is your pet trained?
<label><input type="radio" class="radiobtn" name="trained" value="yes">Yes</label>
<label><input type="radio" class="radiobtn" name="trained" value="no">No</label>
</p><br>
<p>Please Provide Us With A Picture of your pet (URLs only):<br>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
  <input type="text" class="form-control" name="imgurl" id="basic-url" aria-describedby="basic-addon3">
</div>
<p>Owner's First Name:
<input type="text" class="textinput" name="First_name">
</p><br>
<p>Owner's Last Name:
<input type="text"class="textinput" name="Last_name">
</p><br>
<!--  
<p>Pet Image:
<input type="file"class="textinput" name="image">
</p><br>
-->
<p>Please Provide us with your current Email Address:
<input type="email" id="emailfield" name="Email">
</p><br>
<p>Owner's Contact Number:
<input type="text" class="textinput" name="phone">
</p><br>
<input type="submit" class="btn btn-success" value="Submit" name="submitbtn">
<input type="reset" class="btn btn-danger" value="Clear">
<br><br><br><br>
</form>
</div>
<?php include 'footer.php';?>
<script src="a3.q5.js"></script>
</body>
</html>