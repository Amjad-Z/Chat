
<?php
include_once('config.php');

$name     = $_POST['name'];
$email    = $_POST['email'];
$country  = $_POST['country'];
$password = $_POST['pass1'];

/* echo $name;
echo $email;
echo $country;
echo $password; */

//Inserting the user values coming with POST in the DB
if (isset ($_POST['name']) && isset($_POST['email']) && isset($_POST['pass1'])) {
$result = mysqli_query($conn, "INSERT INTO `Chat`.`user`
            (`user_id`,
             `user_name`,
             `user_email`,
             `user_password`,
             `user_country`,
             `user_status`)
VALUES (NULL,
        '$name',
        '$email',
        '$password',
        '$country',
        '0');");
//print_r ($result);

if ($result) {
    header('location: welcome.php?registeration_successfull=<span style="color:green">You have successfully registered. You can now login.</span>');
} else {
    header('location: welcome.php?registeration_successfull=<span style="color:red">Failed to add a new user, wrong entries!</span>');
    //echo "Failed to add a new user, wrong email or email already exists!";
}
}
?>
