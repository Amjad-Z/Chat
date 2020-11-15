<?php
include_once('config.php');
$result= mysqli_query($conn , "SELECT * FROM chat");
//Fetching the chat to print it in the chat room
while ($row = mysqli_fetch_assoc($result)){
  echo "[".$row['chat_time']."] ";
	echo "<b>".$row['chat_person_name'].": "."</b>";
	echo $row['chat_value']."<br>";

	}
?>
