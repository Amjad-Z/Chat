<script>

//ajax fucnction to get the email and see if it already exists
function getEmail(emailid){

			email  = new XMLHttpRequest();
			email.open('GET' , 'testEmail.php?email='+emailid, true);
			email.send();
			email.onreadystatechange = function(){
				if (email.readyState == 4 && email.status == 200)
				{

					document.getElementById('emailDiv').innerHTML = email.responseText;
					}

				}


	}

//JS function that does a check to see if the 2 passwords match
	function password (pass){
	var a =	document.getElementById('pass1').value;
	//	document.write(a);
		var b = document.getElementById('pass2').value;
		if (a == b ){
			document.getElementById('cnfrmpass').innerHTML = "<font color='#00CC00'>Matched</font>";
			}
			else {
				document.getElementById('cnfrmpass').innerHTML = "<font color='red'>Miss matched</font>";
				}
		}

</script>

<?php
include_once('config.php');
//Getting the countries in the DB
$result = mysqli_query($conn, 'select * from country');
if (!$result) {
    echo 'country query failed';
}
?>


<?php
if (isset($_GET['logout_successfully'])) {
    echo $_GET['logout_successfully'];
	}
?>

<html>
<head>
	<title>Welcome to Amjad's Chat</title>
</head>

<body background="bg3.jpg">
<table>
<tr><td colspan="2"><center><h1>A new user?! Sign up here!</h1></td></tr>
<tr>
<!-- The sign up form -->
<form method="post" action="insert.php">
<td><b>Name : </b></td><td><input type="text" name="name" /></td>
</tr>
<tr><td><b>Email : </b></td><td><input type="email" name="email" onBlur="getEmail(this.value)" /></td><td><div id="emailDiv"></div></td></tr>

<tr>
<td><b>Country : </b></td><td><select name="country">
<!-- Extracting countries dynamically-->
<?php
while ($row = mysqli_fetch_assoc($result)) {
?>
<option value="<?php
    echo $row['country_id'];
?>"> <?php
    echo $row['country_name'];
?>
</option>

<?php
}
?>
</select></td>
</tr>

<tr><td><b>Password : </b></td><td><input type="password" name="pass1" id="pass1"/></td></tr>
<tr><br /><td><b>Confirm Password : </b></td><td><input type="password" name="pass2" id="pass2" onBlur="password()" /></td><td><div id="cnfrmpass"></div></td></tr>
<tr><td colspan="2"><center><input type="submit" name="sbt" value="Sign up"/></td></tr>
</table>
</form>
<br /><br />

<?php
if (isset($_GET['registeration_successfull'])) {
    echo $_GET['registeration_successfull'];
}
?>


<!-- The login form -->
<form method="post" action="process.php">
<table>
<tr><td colspan="2"><center> <h1>Already a user? Login!</h1></td></tr>
<tr><td><b>Email</b> : </td><td><input type="email" name="email"  /></td></tr>
<tr><td><b>Password : </b></td><td><input type="password" name="password" /></td></tr>
<tr><td colspan="2"><center> <input type="submit" name="loginbtn" value="Login" /></td></tr>
</table>

<?php
if (isset($_GET['login_error'])) {
    echo $_GET['login_error'];
}
?>

</form>

</body>
</html>
