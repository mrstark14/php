<?php session_start(); ?>
<?php 
if($_SESSION['username']==null){
    header("Location:login1.php");
}
$_SESSION['username1'] = $_POST['chat'];
$username = $_SESSION['username'];
$username1 = $_SESSION['username1'];
$mysqli= mysqli_connect("localhost", "first_year", "first_pass", "first_db");
$result = $mysqli->query("SELECT usernameFrom, message FROM msg WHERE usernameFrom IN('{$username}', '{$username1}') AND usernameTo IN('{$username}', '{$username1}') ORDER BY time ASC")
?>
<!DOCTYPE html>
<html>
    <head><title>chat</title></head>
    <body>
        Enjoy your chat with <?php echo $_POST['chat']; ?><br>
        <div id="chat"><?php
        while($row = $result->fetch_assoc()){
            $user = $row['usernameFrom'];
            $msg = $row['message'];
            $msg1 = '';
            if($user == $username){
                $msgarray = str_split($msg);
                foreach ($msgarray as $character){
                    if($character == '<'){
                        $character = '&lt';
                        $msg1 = $msg1.$character;
                    }else if($character == '>'){
                        $character = '&gt';
                        $msg1 = $msg1.$character;
                    }else{
                        $msg1 = $msg1.$character;
                    }
                }
                echo "You<br>". $msg1 ."<br>";
            }else{
                $msgarray = str_split($msg);
                foreach ($msgarray as $character){
                    if($character == '<'){
                        $character = '&lt';
                        $msg1 = $msg1.$character;
                    }else if($character == '>'){
                        $character = '&gt';
                        $msg1 = $msg1.$character;
                    }else{
                        $msg1 = $msg1.$character;
                    }
                }
                echo $user ."<br>". $msg1 ."<br>";
            }
        }
        ?>
        </div>
        <label for = "msg">Send a message: </label>
        <input type = "text" name = "msg" id = "msg"><br>
        <input type="submit" value="Send" onclick = "return sendMessage()">
        <a href = "return.php">Go Back</a>
        &ltscript&gt alert('drumil') &lt/script&gt
        <script src="chat.js"></script>
    </body>
</html>