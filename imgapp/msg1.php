<?php session_start(); ?>
<?php
$username = $_SESSION['username'];
$username1 = $_SESSION['username1'];
$mysqli= mysqli_connect("localhost", "first_year", "first_pass", "first_db");
$result = $mysqli->query("SELECT message, time FROM (SELECT * FROM msg WHERE usernameFrom = '{$username1}') AS custom WHERE usernameTo = '{$username}' ORDER BY time DESC limit 1");
while($row = $result->fetch_assoc()){
    $x = $row['message'];
    $time = $row['time'];
}
if(((int)$time)+4>time()){
    echo  $username1 ."<br>". $x ."<br>";
}
else{
    echo "";
}