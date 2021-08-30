<?php session_start(); ?>
<?php
$_SESSION['username1'] = NULL;
header("Location:chat.php");
?>