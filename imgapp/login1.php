<?php session_start(); ?>
<?php 
if(isset($_COOKIE['username'])){
    $username = $_COOKIE['username'];
    $mysqli= mysqli_connect("localhost", "first_year", "first_pass", "first_db");
    $result=$mysqli->query("SELECT * FROM user WHERE username='". $username ."'");
    /*if($result->num_row==0){
        header("Location:login.html");
    }*/
    while($row=$result->fetch_assoc()){
        $dbusername = $row['username'];
        $dbpass = $row['password'];
        $dbname = $row['full_name'];
        $email = $row['email'];
        $gender = $row['gender'];
        $mobile = $row['mobile'];
    }
    $_SESSION['username']=$username;
    $_SESSION['password']=$password;
    $_SESSION['name']=$dbname;
    $_SESSION['email']=$email;
    $_SESSION['gender']=$gender;
    $_SESSION['mobile']=$mobile;
}
if($_SESSION['username']!=null){
    header("Location:profile.php");
}
?>





<!DOCTYPE html>
<html>
    <head>
        <title>LOGIN PAGE</title>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <div id="form"><form action="login.php" method="POST" name="login">
            <input type="text" name="username" placeholder="username"><br>
            <input type="password" name="password" placeholder="password">
            <input type="checkbox" name="rememberme" value="rememberme" checked="checked">
            <label for="rememberme">Remember Me</label>
            <input type="submit" value="sign in">
            <div>
                New here? Click <a href = "index.php">here</a> to register.
            </div>
        </form></div>
    </body>
</html>