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
$title = mysqli_real_escape_string($bd, $_POST['title']);
$description = mysqli_real_escape_string($bd, $_POST['description']);
$category = mysqli_real_escape_string($bd, $_POST['category']);
$date = mysqli_real_escape_string($bd, $_POST['date']);


date_default_timezone_set('Asia/Kolkata');
$qt = date('d-m-Y H:i');
$query=mysqli_query($bd,"INSERT INTO task (title, description, category, due, uid,  Date) VALUES ('$title', '$description', '$category','$date', '$uname', '$qt')") or die(mysqli_error($bd));
header("location:index.php?note=success");

}; ?>
