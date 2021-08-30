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
        <title>sign up</title>
        <link rel="stylesheet" href="signup.css">
    </head>
    <body>
        <div id="head"><h2>HELLO THERE!</h2> Register below to enjoy our services!</div>
        <div id="form">
        <form method="POST" onsubmit="return validateForm()" name="signup" action="signup.php"> 
            <h1>CREATE A NEW ACCOUNT</h1>
            <input type="text" class="text" id="Name" name="Name" onchange="return naam()" placeholder="full name"><span id="NAME"></span><br><br>
            <input type="email" class="text" id="email" name="email" onchange="return mail()" placeholder="email address"><span id="EMAIL"></span><br><br>
            <input type="text" class="text" id="Mobile" name="MobileNo" onchange="return mobile()" placeholder="mobile number"><span id="mob"></span><br><br>
            <input type="text" class="text" id="username" name="username" placeholder="username" onkeyup="return validateUsername1()"><div id="abc"></div><!--<span id="abc">Invalid username</span>--><br><br>
            <!--<input type="number" id="age" name="age" onchange="return ages()" placeholder="age"><span id="AGE"></span><br>-->
            <input type="password" class="text" id="password" name="Password" onchange="return passwords()" placeholder="new password" onfocus = "return myFunction()" onfocusout = "return myFunctions()"><span id="pass">Password must be of 8-20 characters(first one being an alphabet) and can contain only alphabets, numbers and ('+', '-', '_', '$', '.', '@').</span><br><br>
            <input type="password" class="text" id="Cpassword" name="confirmPassword" onchange="return cpass()" placeholder="confirm password"><span id="cpass"></span><br><br>
            <label id="gender1" for="gender">Select Gender</label>
            <select id="gender" name="Gender" aria-placeholder="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select><br><br>
            <input type="submit" value="Sign Up" id='signup'><br><br>
        </form></div>
        <div id="foot">
            <br><br>
            If you are already signed up, login <a href="login1.php">here.</a>
        </div>
        <script src="signup.js"></script>
    </body>
</html>