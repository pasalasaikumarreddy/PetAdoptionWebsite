<?php session_start();
$thereisemptyfield=false;
if(isset($_POST['submitbtn'])){
$_SESSION['submitbtn1']=$_POST['submitbtn'];
$_SESSION['typeofpet1']=$_POST['typeofpet'];
$_SESSION['Trained1']=$_POST['Trained'];
if($_POST['typeofpet']=="Dog"){
$_SESSION['breedofpet1']=$_POST['breedofdogs'];
$thebreed=$_POST['breedofdogs'];
}elseif($_POST['typeofpet']=="Cat"){
$_SESSION['breedofpet1']=$_POST['breedofpet'];
$thebreed=$_POST['breedofpet'];
}
$_SESSION['ageofpet1']=$_POST['ageofpet'];
$_SESSION['Gender1']=$_POST['Gender'];
$_SESSION['friendly1']=$_POST['friendly'];
if(($_POST['typeofpet']=="")||($thebreed=="")||($_POST['friendly']=="")){
$thereisemptyfield=true;
}else{
if($_POST['Gender']=="Male"||$_POST['Gender']=="Female"){
$URL="Browse_pets.php";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}else{
$thereisemptyfield=true;
}
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
<div class="Filter">
<form method="POST">
<p>Cat Or Dog?
<select name="typeofpet" onchange="enableBrand(this)">
<option value="">--select an option--</option>
<option value="Dog">Dog</option>
<option value="Cat">Cat</option>
</select>
</p><br>
<p>What is the breed of your pet?
<select name="breedofpet" id="4">
<option value="">--select an option--</option>
<option value="Abyssinian">Abyssinian Cat Breed</option>
<option value="American bobtail">American Bobtail Cat Breed</option>
<option value="Bombay">Bombay Cat Breed</option>
<option value="Chartreux">Chartreux Cat Breed</option>
<option value="British shorthair">British Shorthair Cat Breed</option>
<option value="Turkish Angora">Turkish Angora Cat Breed</option>
<!--<option value="doesnotmatter">Does Not Matter </option> -->
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
<!--<option value="doesnotmatter">Does Not Matter</option>-->
</select>
</p><br>
<p>Please select your preferred age range:
<select name="ageofpet">
<option value="">Please select one of the following</option>
<option value="Less than 1 years old">Less than 1 years old</option>
<option value="More than 1 years old">More than 1 years old</option>
</select></p><br>
<p>Gender:
<input type="radio" class="radiobtn" name="Gender" value="1" hidden checked>
<label><input type="radio" class="radiobtn" name="Gender" value="Male" id="Male">Male</label>
<label><input type="radio" class="radiobtn" name="Gender" value="Female" id="Female">Female</label>
</p><br>
<p>Trained?:
<input type="radio" class="radiobtn" name="Trained" value="1" hidden checked>
<label><input type="radio" class="radiobtn" name="Trained" value="Yes" id="Yes">Yes</label>
<label><input type="radio" class="radiobtn" name="Trained" value="No" id="No">No</label>
</p><br>
<p>Does your pet need to get along with other cats, dogs or children?
<select name="friendly">
<option value="">--select an option--</option>
<option value="yes">Yes</option>
<option value="no">No</option>
</select>
</p><br>
<input type="submit" class="btn btn-success" id="submit"name="submitbtn">
<input type="reset" class="btn btn-danger" value="Clear">
<br><br><br><br>
</form>
</div>
<?php include 'footer.php';?>
</body>
</html>