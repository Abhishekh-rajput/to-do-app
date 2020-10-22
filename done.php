<?php
error_reporting(0);
include('config.php');
session_start();
// Validating Session
if(strlen($_SESSION['userlogin'])==0)
{
header('location:home.php');
exit();
}
else{
	$uname = $_SESSION['userlogin'];
$id = mysqli_real_escape_string($bd, $_GET['id']);


date_default_timezone_set('Asia/Kolkata');
$qt = date('d-m-Y H:i');
$query=mysqli_query($bd,"UPDATE `task` SET `status` = 'done' WHERE `task`.`uid` ='$uname' AND `task`.`id` ='$id' ") or die(mysqli_error($bd));
header("location:index.php?note=success");

}; ?>
