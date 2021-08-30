<?php session_start();?>
<?php
    $username=$_POST['username'];
    $password=$_POST['password'];
    $mysqli= mysqli_connect("localhost", "first_year", "first_pass", "first_db");
    $result=$mysqli->query("SELECT * FROM user WHERE username='". $username ."'");
    $result1=$mysqli->query("SELECT * FROM pictures WHERE username='". $username ."'");
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
    while($row1 = $result1->fetch_assoc()){
        $dbimage = $row1['image'];
    }
    if($password==$dbpass && $username==$dbusername){
        $_SESSION['username']=$username;
        $_SESSION['password']=$password;
        $_SESSION['name']=$dbname;
        $_SESSION['email']=$email;
        $_SESSION['gender']=$gender;
        $_SESSION['mobile']=$mobile;
        $_SESSION['image']=$dbimage;
        if(isset($_POST['rememberme'])){
            $name='username';
            $value=$username;
            $expiration=time()+(60*60);
            setcookie($name,$value,$expiration);
        }
        header("Location:profile.php");
    }else{
        header("Location:login1.php");
    }
?>