<?php
include('config.php');
session_start();
// Validating Session
if(strlen($_SESSION['userlogin'])==0)
{
header('location:home.php');
exit();
}
else{
$uid = $_SESSION['userlogin'];
$type = $_SESSION['type'];


$fn = mysqli_real_escape_string($bd, $_POST['fn']);
$contactno = mysqli_real_escape_string($bd, $_POST['contactno']);
$email = mysqli_real_escape_string($bd, $_POST['email']);
$hometype = mysqli_real_escape_string($bd, $_POST['hometype']);
$home = mysqli_real_escape_string($bd, $_POST['home']);
$zip = mysqli_real_escape_string($bd, $_POST['zip']);
$state = mysqli_real_escape_string($bd, $_POST['state']);

date_default_timezone_set('Asia/Kolkata');
$qt = date('d-m-Y H:i');
$query=mysqli_query($bd,"UPDATE `userdata` SET `FullName1` = '$fn', `Phone` = '$contactno', `UserEmail1` = '$email', `AddressType` = '$hometype', `House` = '$home',`Zip` = '$zip',`State` = '$state' WHERE `userdata`.`UserName` ='$uid' ") or die(mysqli_error($bd));
header("location:billing.php");
}

?>
