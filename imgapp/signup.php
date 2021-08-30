<?php session_start(); ?>
<?php
    $mysqli= mysqli_connect("localhost", "first_year", "first_pass", "first_db");
    $name=$_POST["Name"];
    $email=$_POST["email"];
    $mobile=$_POST["MobileNo"];
    $password=$_POST["Password"];
    $confirmPassword=$_POST["confirmPassword"];
    $Gender=$_POST["Gender"];
    $username=$_POST["username"];
    /*echo "$name $email $mobile $password $Gender";*/
    if(mysqli_connect_errno()){
        echo "Failed to connect to MySQL:";
    }
    else{
        echo "fine";
    }
    $result=$mysqli->query("SELECT password FROM user WHERE username='". $username ."'");
    if($result->num_rows>0){
        header("Location:index.php");
    }else{
        $result=$mysqli->query("INSERT INTO user(full_name, email, mobile, gender, username, password) VALUES ('". $name . "', '". $email . "','". $mobile . "','". $Gender ."','". $username ."', '". $password ."')");
        $_SESSION['name']=$_POST["Name"];
        $_SESSION['email']=$_POST["email"];
        $_SESSION['mobile']=$_POST["MobileNo"];
        $_SESSION['gender']=$_POST["Gender"];
        $_SESSION['username']=$_POST["username"];
        $_SESSION['password']=$_POST['Password'];
        $result=$mysqli->query("INSERT INTO pictures(username) VALUES ('". $username . "')");
        $_SESSION['image']='ironman.jpg';
        header("Location:profile.php");
    }
    echo "<br>";
?>