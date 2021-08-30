<?php 
    $q = $_REQUEST["q"];
    $mysqli= mysqli_connect("localhost", "first_year", "first_pass", "first_db");
    $username = $q;
    $result=$mysqli->query("SELECT username FROM user WHERE username='". $q ."'");
    while($row=$result->fetch_assoc()){
        $dbusername = $row['username'];
    }
    if($q == $dbusername){
        $x = "Invalid username";
    }
    else{
        $x = '';
    }
    echo $x;
?>