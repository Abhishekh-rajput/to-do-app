<?php
session_start();
// Validating Session
if(strlen($_SESSION['userlogin'])==0)
{
header('location:login.php');
exit();
}
?>
