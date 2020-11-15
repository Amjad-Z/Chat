
<?php
include_once('config.php');
$result= mysqli_query($conn , "SELECT * FROM user");
while ($row = mysqli_fetch_assoc($result)){
	//Printing in the user area: the user name, his status (online or offline) and when was the last time he's seen before he logged out
	if($row['user_status'] == 1 ){
		echo "<font color='#009900'><b>".$row['user_name']." </b>(Online)"."</font><br>";
		}
		else {
				echo "<font color='#FF0000'><b>".$row['user_name']." </b>(Offline)<i> last seen: ".$row['last_seen']."</i></font><br>";
			}
	}

?>
