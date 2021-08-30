<?php session_start(); ?>
<?php 
if($_SESSION['username']==null){
    header("Location:login1.php");
}
$mysqli= mysqli_connect("localhost", "first_year", "first_pass", "first_db");
$username = $_SESSION['username'];
$result = $mysqli->query("SELECT * FROM user WHERE username != '{$username}'");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>chat</title>
    </head>
    <body>
        <form action = "chat1.php" method = "POST">
        Select whom you want to chat with <select name = "chat">
        <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <option value = <?php echo $row['username']; ?>> <?php echo $row['full_name']; ?></option>
        <?php } ?>
        <input type = 'submit' name = "submit">
        </form>
        <div><a href = "profile.php">Return to profile</a>
    </body>
</html>