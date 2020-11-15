<?php
session_start();
 ?>

<script>

//Ajax function that gets the text in the chat text area and send it in order to be saved in the DB
function getText() {

	var $a = document.getElementById('text').value;
  //console.log($a);
	xhr = new XMLHttpRequest();
	xhr.open('POST' , 'chatdb.php',true);
	xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xhr.send('chat='+$a);
	/*xhr.onreadystatechange=function(){
		if (xhr.responseText)
		{
			document.getElementById('chatarea').innerHTML=xhr.responseText;
  }
} */
}

//Ajax function that sets then prints the text in the chat area
function setText(){

	xhr = new XMLHttpRequest();
	xhr.open('POST' , 'chatFetch.php' , true);
	xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xhr.send();
	xhr.onreadystatechange = function()
	{
		document.getElementById('chatarea').innerHTML = xhr.responseText;
	}

	}


//Ajax function that sets then prints users in the users area
function users(){
	xhr1 = new XMLHttpRequest();
	xhr1.open('POST' , 'userFetch.php' , true);
	xhr1.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xhr1.send();
	xhr1.onreadystatechange = function()
	{
		document.getElementById('loginperson').innerHTML = xhr1.responseText;
	}
}

//Setting the refreshing intervals for both the chat and users
setInterval("setText()",1500);
setInterval("users()",3000);

</script>
<?php
include_once('config.php');
echo	"Welcome ".$_SESSION['name'];

//logging out and destroying the session when logout is clicked
if (isset($_GET['logout']))
{
	$result = mysqli_query($conn, "UPDATE user
	SET user_status = '0' , last_seen = NOW()
	WHERE user_email = '$_SESSION[email]';");
	session_destroy();
	header('location: welcome.php?logout_successfully=<span style="color:green">You have successfully Logged Out.</span>');
}
?>

<body background="bg3.jpg">
<!-- The logout button-->
<form action="">
	<input type="submit" name="logout" value="logout">
</form>
<!-- Divs for the chatting area, the chat textbox and the users with their status-->
<div id="chatbox">

	<div id ="chatarea">
	</div>

	<div id="loginperson">
	</div>

	<div id="textbox">
	<form>
		<textarea rows="4" cols="100" id="text"></textarea>
		<input type="button" value="send"  onclick="getText()" />
	</form>
	</div></center>
</div>
</body>

<!-- Just some basic stylying for the divs-->
<style>
#chatbox
{
	border:double;
	height:500px;
	width:1000px;
	align;
}
#chatarea
{
	width:750px;
	height:400px;
	border:double;
	float:left;
	overflow:auto;
}
#loginperson
{
	width:238px;
	height:497px;
	border:double;
	float:right;
}
#textbox
{
	width:750px;
	height:89px;
	border:double;
	float:left;
}
#chatting
{
	float:left;
}
</style>
<?php
	if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
		//session_destroy();
		header('location: welcome.php');
		}
?>
