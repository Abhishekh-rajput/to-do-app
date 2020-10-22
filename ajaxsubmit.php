<?php
include('config.php');
session_start();
// Validating Session
if(strlen($_SESSION['userlogin'])==0)
{
header('location:login.php');
exit();
}
else{

$id=$_POST['id'];
$qnt=$_POST['qnt'];
$min=$_POST['min'];
$ptype=$_GET['ptype'];
//Insert query
array_push($_SESSION['cart'],array($id,$qnt,$min,$ptype));
}
?>
