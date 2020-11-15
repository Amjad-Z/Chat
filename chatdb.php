
<?php
session_start();
include_once('config.php');
if(isset($_POST['chat']))
{
	//passing the string to as escaping characters' function
	$chat = $conn->real_escape_string($_POST['chat']);
	//Filling the chat DB
	$result = mysqli_query($conn , "INSERT INTO `Chat`.`chat`
            (`chat_id`,
             `chat_person_name`,
             `chat_value`,
			       `chat_time`
			      )
VALUES (NULL,
    '$_SESSION[name]',
		'$chat',
		NOW()
		);");

	}

?>
