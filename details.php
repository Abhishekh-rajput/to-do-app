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
  $q = mysqli_real_escape_string($bd, $_GET['q']);
  $pid = mysqli_real_escape_string($bd, $_GET['pid']);
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
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<style>

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
/* Style the buttons */
.btn {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: #BF0000;
  cursor: pointer;
  color: #fff;
}
.btn-danger {
  background-color: #000;
}


.btn-danger.active {
  background-color: #0000;
  color: white;
}
#info h3 {
  font-style: normal;
  color: #bf0000;
  font-weight: 700;
  font-size: 1.6em;
    display: inline;
    vertical-align: top;
    font-family: 'Open Sans', sans-serif;
    font-size: 24px;
    line-height: 28px;
    font-weight: 400;
}
#info h4 {
    display: inline;
    vertical-align: top;
    font-family: 'Open Sans', sans-serif;
    font-size: 16px;
    line-height: 28px;
}
#spc {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#spc td, #spc th {
  border: 1px solid #ddd;
  padding: 8px;
}

#spc tr:nth-child(even){background-color: #fff;}

#spc tr:hover {background-color: #ddd;}

#spc th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #bf0000;
  color: white;
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
  <h4><span style="font-size:20px;cursor:pointer" onclick="goBack()" color="white" >&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your Orders</h4>
</div>
<br/><br/>
    <ul class="w3-ul w3-card-4">
      <?php
      $sql = "SELECT * FROM orderbase WHERE SId = '$uid' AND PId = '$pid' AND Id = '$q'";
      $res_data = mysqli_query($bd,$sql);
      while($row = mysqli_fetch_array($res_data)){
        $Pid = $row['PId'];
        $id = $row['Id'];
        $Qnt = $row['Qnt'];
        $ProdNam = $row['ProductName'];
        $SKU = $row['SKU'];
        $SP = $row['SP'];
        $tmrp = $row['Totalmrp'];
        $tsp = $row['Totalsp'];
        $mn = $row['ModelNo'];
        $Time = $row['Time'];
        $SP1 = number_format($SP);
        $tsp = number_format($tsp);

      }
      $sql = "SELECT * FROM `electronics` WHERE Id = '$Pid' AND SellerId = '$uid'  AND ModelNo = '$mn' AND SP = '$SP' ";
      $res_data = mysqli_query($bd,$sql);
      while($row = mysqli_fetch_array($res_data)){
        $ProductName = $row['ProductName'];
        $bn = $row['BrandName'];
        $sc = $row['SizeChart'];
        $idealfor = $row['IdealFor'];
        $weight = $row['Weight'];
        $length = $row['Length'];
        $width = $row['Width'];
        $height = $row['Height'];
        $Min = $row['MinQnt'];
        $Description = $row['Description'];
        $Img1 = $row['Img1'];
        echo "  <li class='w3-bar'>
        <p> {$Time} | Order : GV203$id</p>
            <div class='w3-bar-item'>
              <span class='w3-large'><b>{$ProdNam}</b></span><br/>
              <span>Sku: {$SKU} | Model No: {$mn}</span><br/>
              <span class='w3-large'>Total Quantity: {$Qnt}</span><br/>
              <span>Rs {$SP1} x {$Qnt}</span><br/>
              <span>RS <b style='color:#bf0000; font-size: 1.3em;'>{$tsp}</b> | <s> {$tsp}</s></span><br/>
            </div><div class='w3-bar-item'>
              <img src='{$Img1}' class='w3-bar-item w3-circle' style='width:110px'>

            </div>
          </li>";


      }?>

    </ul>
    <div class="container">
    <h4><b>Product description:-</b></h4><p>
      <?php echo $Description; ?></p><br/>
    <h4><b>Specifications:-</b></h4>
    <table id="spc">
      <tr>
        <td>Brand Name</td>
        <td><?php echo $bn; ?></td>
      </tr>
      <tr>
        <td>Model No</td>
        <td><?php echo $mn;?></td>
      </tr>
      <tr>
        <td>Size</td>
        <td><?php echo $sc;?></td>
      </tr>
      <tr>
        <td>Ideal For:</td>
        <td><?php echo $idealfor; ?></td>
      </tr>
      <tr>
        <td>Weight</td>
        <td><?php echo $weight; ?> kg</td>
      </tr>
      <tr>
        <td>Length</td>
        <td><?php echo $length; ?> cm</td>
      </tr>
      <tr>
        <td>Height</td>
        <td><?php echo $height; ?> cm</td>
      </tr>
      <tr>
        <td>Width</td>
        <td><?php echo $width; ?> cm</td>
      </tr>
    </table>
    <BR/>
    <br/><br/>
  </div>

<?php include('foot.php'); ?>
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
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}


function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
document.body.style.backgroundColor = "rgba(0,0,0,0.5)";
  document.getElementById("opt").style.opacity = "0.5";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("opt").style.opacity = "1";
  document.body.style.backgroundColor = "white";
}
function goBack() {
    window.history.back();
}
</script>
</body>
</html>
<?php } ?>
