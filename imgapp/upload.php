<?php session_start(); ?>
<?php 
    if(isset($_POST['submit'])){
        $file = $_FILES['file'];
        $filename = $_FILES['file']['name'];
        $filetmpname = $_FILES['file']['tmp_name'];
        $filesize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];
        $fileExt = explode('.', $filename);
        $fileActualExt = strtolower(end($fileExt));
        $allow = array('jpg', 'jpeg', 'png');
        $username = $_SESSION['username'];
        print_r($file);
        if(in_array($fileActualExt, $allow)){
            if($fileError == 0){
                if($filesize < 1000000){
                    $fileNameNew = $username.".".$fileActualExt;
                    $fileDestination = '/var/www/imgapp/uploads/'.$fileNameNew;
                    if(move_uploaded_file($filetmpname, $fileDestination)){
                        echo "true";
                        $_SESSION['image'] = $fileNameNew;
                        header("Location:profile.php");
                        $mysqli= mysqli_connect("localhost", "first_year", "first_pass", "first_db");
                        $result=$mysqli->query("UPDATE pictures SET image = '". $fileNameNew ."' WHERE username = '". $username ."'");
                    }
                    else{
                        echo "no";
                    }
                    /*$_SESSION['image'] = $fileDestination;
                    $result=$mysqli->query("UPDATE pictures SET image = '". $fileNameNew ."' WHERE username = '". $_SESSION['username'] ."'");
                    echo "UPDATE pictures SET image = '". $fileNameNew ."' WHERE username = '". $_SESSION['username'] ."'";
                    header("Location:profile.php");*/
                }else{
                    echo "File too big";
                }
            }else{
                echo "eroor";
            }
        }else{
            echo "Select";
        }
    }else{
        echo "Hello";
    }
?>