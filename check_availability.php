<?php
require_once("config.php");
// Code for checking username availabilty
if(!empty($_POST["username"])) {
$uname= $_POST["username"];
$sql ="SELECT UserName FROM  userdata WHERE UserName=:uname";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
echo "<span style='color:red'> <mark><b>Username already exists.</b></mark></span>";
} else{
echo "<span style='color:black'><b> Username available for Registration.</b></span>";
}
}

// Code for checking email availabilty
if(!empty($_POST["email"])) {
$email= $_POST["email"];
$sql ="SELECT UserEmail FROM  userdata WHERE UserEmail=:email";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
echo "<span style='color:red'> <mark><b>Email-id already exists.</b></mark></span>";
} else{
echo "<span style='color:black'>Email-id available for Registration.</span>";
}
}

?>
