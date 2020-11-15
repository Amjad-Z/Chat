<?php
$email = $_GET['email'];
//echo $email;
include_once('config.php');
$result = mysqli_query ($conn , "SELECT * FROM Chat.user WHERE user_email = '".$email."'");
$rows = mysqli_num_rows($result);
//echo $rows;

//Checking if the new user email already exists
if($rows > 0 )
{
	echo "<font color='#FF0000'>email already exists</font>";

}
else {
	echo "<font color='#00CC00'>email available</font>";

	} ?>
