<?php session_start(); ?>
<?php 
    $_SESSION['username']=null;
    $_SESSION['password']=null;
    $_SESSION['name']=null;
    $_SESSION['email']=null;
    $_SESSION['gender']=null;
    $_SESSION['mobile']=null;
    header("Location:login1.php");
    if(isset($_COOKIE['username'])){
        setcookie('username', 'f', time() - 30000);
    }
?>