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
  $uid = $_SESSION['userlogin'];
  $q = mysqli_query($bd,"SELECT * FROM `userdata` WHERE UserName = '$uid' LIMIT 1");
  while($row = mysqli_fetch_assoc($q)){
      $fn= $row['FullName'];
      $phone = $row['UserMobileNumber'];
      $house = $row['House'];
      $email = $row['UserEmail'];
      $zip = $row['Zip'];
      $state = $row['State'];
      $img = $row['Img'];
     }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>B2B</title>
  <meta charset="utf-8">
  <meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='js/a076d05399.js'></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style.css">.
</head>
<style>

.square {
  height: 125px;
  border-style: ridge;
  background-image: linear-gradient(#000, #1c4966);
  border-radius: 15px;
  box-shadow: 2px 2px 3px #999;
}

.square2 {
  height: 30px;
  width: 50px;

}
p {
  font-style: normal;
  color: #000;
}

h2 {
  font-style: normal;
  font-weight: 600;
  font-size: 1.3em;
  color: #000;
}
hr {
  border-top: 1px dashed grey;
}

#navbar{
  z-index: 999999;
 position: fixed;
  top: 0;
  width: 100%;
  font-style: normal;
  overflow: hidden;
  color: #fff;
  border: solid;
  border-color: #8b0000;
  border-top: none;
  border-right: none;
  border-left: none;
  border-width: thin;
}
.product {
  vertical-align: middle;
  width: 260px;
  height: 260px;
  border-width: thin;
  border-color: #8b0000;
}

.topnav {
  background-color: #BF0000;
  overflow: hidden;

}


body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  border-width: thin;
  top: 0;
  left: 0;
  background-color: #f1f1f1;
  color: #000;
  overflow-x: hidden;
  transition: 0.1s;
  padding-top: 60px;
  border: solid;
  border-color: #8b0000;
  border-top: none;
  border-right: none;
  border-width: thin;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 20px;
  color: #000;
  text-align: left;
  display: block;
  transition: 0.0s;
}

.sidenav .jumbotron a {
	border-bottom: 0px double #000 ;
}

.sidenav a:hover {
  color: #000;
}
a:hover {
    color: #fff;
    text-decoration: none;
}

.sidenav .closebtn {
  position: absolute;
  color: #000;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.avatar {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
.iclass {
  text-align: center;
}
.avatar {
  vertical-align: middle;
  width: 80px;
  height: 80px;
  border-radius: 50%;
  border: groove;
  border-width: thin;
  border-color: #fff;
}
::-webkit-scrollbar-track
{
	 -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	 background-color: linear-gradient(#000, #1c4966);
}

::-webkit-scrollbar
{
	 width: 0.5px;
	 background-color: #FF0000;
}

::-webkit-scrollbar-thumb
{
	 -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	 background-color: #BF0000;
}


* {
  box-sizing: border-box;
}




/* Add Animation */
@-webkit-keyframes slideIn {
  from {bottom: -300px; opacity: 0}
  to {bottom: 0; opacity: 1}
}

@keyframes slideIn {
  from {bottom: -300px; opacity: 0}
  to {bottom: 0; opacity: 1}
}

@-webkit-keyframes fadeIn {
  from {opacity: 0}
  to {opacity: 1}
}

@keyframes fadeIn {
  from {opacity: 0}
  to {opacity: 1}
}
.btn{
  background-color: #bf0000;

}

</style>
<script>
	var auto_refresh = setInterval(
	function()
		{
			$('#load_talk').load('load-noti.php');
		}, 1000); //3000 Milliseconds or 3 seconds
</script>
<body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
<div id="opt">
 <div class="topnav" id="navbar">
  <h4><span style="font-size:20px;cursor:pointer" onclick="goBack()" color="white" >&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Profile </h4>
</div>

<div style="background-color:#f1f1f1">
  <br/><br/><br/>
<img id="myBtn" src="<?php echo $img; ?>" alt="Avatar" class="avatar">
<div class="container">
<form id="loginForm" method="post" action="profileupdate.php">
    <div class="form-group">
      <label for="usr">Full Name:</label>
      <input type="text" name="fn" class="form-control" value="<?php echo $fn; ?>" id="usr" required>
    </div>
    <div class="form-group">
      <label for="cnt">Contact Number:</label>
      <input type="number" name="contactno" class="form-control" value="<?php echo $phone; ?>" id="cnt" required>
    </div>
    <div class="form-group">
      <label for="cnt">Email Id:</label>
      <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" id="cnt" required>
    </div>
    <div class="form-group">
      <label for="sel1">Address Type:</label>
      <select name="hometype" class="form-control" id="sel1">
        <option>Home Address</option>
        <option>Work Address</option>
      </select></div>
    <div class="form-group">
  <label for="add">Address:</label>
  <textarea name="home" class="form-control" rows="5" id="add" required><?php echo $house; ?></textarea>
</div>
<div class="form-group">
  <label for="pnc">Pin Code: </label>
  <input name="zip" type="number" class="form-control" value="<?php echo $zip; ?>" id="pnc" required>
</div>
<div class="form-group">
  <label for="sta">State: </label>
  <input name="state" type="text" class="form-control" value="<?php echo $state; ?>" id="sta" required>
</div>
<button type="submit" class="btn btn-danger">Update Profile</button>
  </form>
  <br/>
  <br/>
  <br/>
</div>
</div>
  </div>
</div>
<div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">

<div class="modal-body">
<span class="close"></span>
<br/>
<form method="post" action="profilepic.php" enctype="multipart/form-data">
<input class='form-control' name="uploadfile" type="file" class="form-control" id="usr" required>
<br/>
<div align="center">
<button  type="submit"  name="login">Submit</button>
</div>
<br/>
</form>
</div>

</div>

</div>


<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
function goBack() {
  window.history.back();
}
</script>
</body>
</html>
<?php } ?>
