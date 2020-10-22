<?php
require_once('config.php');
require_once('sasfill.php');
include("enc.php");
include("enx.php");
session_start();
// Validating Session
if(strlen($_SESSION['userlogin'])==0)
{
header('location:home.php');
exit();
}
else{
  $_POST['msg'] = filter_var($_POST['msg'], FILTER_SANITIZE_STRING);
  $msg = $_POST['msg'];
  $msg = encKeyx($msg);
  $_POST['t'] = filter_var($_POST['t'], FILTER_SANITIZE_STRING);
  $to = $_POST['t'];
  $f =  sf($_SESSION['userlogin']);
  date_default_timezone_set("Asia/Kolkata");
  $date =  date("H:i a d-m-y");
  $query=mysqli_query($bd,"INSERT INTO dc (T,  Fm, Msg, Date) VALUES ('$to', '$f', '$msg', '$date')") or die(mysqli_error($bd));
  header("location:chat.php");
  } ?>
