<?php
$email = $_GET['email'];
//echo $email;
include_once('config.php');
$result = $base->query ("SELECT * FROM Chat.user WHERE user_email = '".$email."'");
$rows = $result->rowCount();
//echo $rows;
if($rows > 0 )
{
	echo "<font color='#FF0000'>email already exists</font>";

}
else {
	echo "<font color='#00CC00'>email available</font>";

	} ?>
