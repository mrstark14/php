<?php session_start() ?>
<?php 
$username = $_SESSION['username'];
$username1 = $_SESSION['username1'];
$message = $_POST['message'];
$mysqli= mysqli_connect("localhost", "first_year", "first_pass", "first_db");
$result = $mysqli->query("INSERT INTO msg(usernameFrom, usernameTo, message, time) VALUES('". $username . "', '". $username1 ."', \"". $message ."\", ". time() .")");
echo $message;
