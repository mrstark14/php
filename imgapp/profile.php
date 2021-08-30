<?php session_start(); ?>
<?php 
    if($_SESSION['username']==null){
        header("Location:login1.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Profile:<?php echo $_SESSION['username']; ?></title>
    </head>
    <body>
        Hello there, General <?php echo $_SESSION['name']; ?><br>
        Your mobile no. is <?php echo $_SESSION['mobile']; ?><br>
        Your email id is <?php echo $_SESSION['email']; ?><br>
        <img src ="uploads/<?php echo $_SESSION['image']; ?>">
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="file">
            <button type="submit" name="submit">Update dp</button>
        </form>
        Getting bored? <a href = "chat.php"> click here to chat with other people.</a>
        Click here to <a href='logout.php'>logout</a>
    </body>
</html>