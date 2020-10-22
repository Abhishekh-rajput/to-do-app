<?php
include('config.php');
session_start();
// Validating Session
if(strlen($_SESSION['userlogin'])==0)
{
  if(strlen($_COOKIE["ul"])!=0){
       $_SESSION['userlogin'] = $_COOKIE["ul"];
       header('location:index.php');
   }else{
     header('location:logout.php');
     exit();
   }
}
else{
  ?>
  <!DOCTYPE html>
  <html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100&display=swap" rel="stylesheet">
      <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
  body {
  background-color: #fff ;
  }
  #loginForm {

  margin: 30px auto;
  font-family: Raleway;
  padding: 40px;
  width: 100%;
  min-width: 100px;
  }
  h1 {
  text-align: center;
  }
  h4 {
    font-family: 'Lato', sans-serif;
    color: #fff;
    font-size: 20px;
    font-weight: bold;
  }
  button {
  background-color: #000;
  color: #fff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
  }
  a {
  color: #000;
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
  border-color: #FFF;
  border-top: none;
  border-right: none;
  border-left: none;
  border-width: thin;
  }


  .topnav {
  background-color: #fe6700;
  overflow: hidden;

  }

  select[type=text],input[type=text],input[type=tell], input[type=email], input[type=date],input[type=file]{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 1px solid #fe6700;
  outline: none;
  border-radius: 10px;
  }

   input[type=submit] {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  }
  hr {
  border: 0;
  height: 1px;
  background: #333;
  background-image: linear-gradient(to right, #ccc, #333, #ccc);}

  input[type=text]:focus {
  background-color: #f1f1f1;
  }
  input[type=email]:focus {
  background-color: #f1f1f1;
  }
  input[type=date]:focus {
  background-color: #f1f1f1;
  }
  input[type=password]:focus {
  background-color: #f1f1f1;
  }
  ::-webkit-scrollbar-track
  {
  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
  background-color: linear-gradient(#000, #1c4966);
  }

  ::-webkit-scrollbar
  {
  width: 0.5px;
  background-color: #F5F5F5;
  }

  ::-webkit-scrollbar-thumb
  {
  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
  background-color: #555;
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
  width: 100px;
  height: 100px;
  border-radius: 50%;
  border: solid;
  border-width: normal;
  border-color: #fe6700;
  }
  ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background: rgb(254,84,0);
background: linear-gradient(90deg, rgba(254,84,0,1) 0%, rgba(222,80,33,1) 35%, rgba(209,40,40,1) 100%);
    height: 60px;
  }

  li {
    float: left;
    font-family: 'Lato', sans-serif;

  }

  li a {
    display: block;
    color: white;
    padding: 14px 16px;
    text-decoration: none;

  }
  a:hover {
      color: #fff;
      text-decoration: none;
  }

  body {font-family: Arial;}

  /* Style the tab */
  .tab {
    overflow: hidden;
    border: solid;
    border-top: none;
    border-left: none;
    border-right: none;
    border-color: #fe6700;
    border-width: thin;
    background-color: #f1f1f1;

  }

  /* Style the buttons inside the tab */
  .tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
    color: #000;
  }

  /* Change background color of buttons on hover */
  .tab button:hover {
    background-color: #ddd;
  }

  /* Create an active/current tablink class */
  .tab button.active {
    background: rgb(254,84,0);
background: linear-gradient(90deg, rgba(254,84,0,1) 0%, rgba(222,80,33,1) 35%, rgba(209,40,40,1) 100%);
    color: #fff;
  }

  /* Style the tab content */
  .tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
  }
  .footer {
     position: fixed;
     left: 0;
     bottom: 0;
     width: 100%;
     background: rgb(254,84,0);
background: linear-gradient(90deg, rgba(254,84,0,1) 0%, rgba(222,80,33,1) 35%, rgba(209,40,40,1) 100%);
     color: white;
     text-align: center;
  }
  /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
  </style>
  </head>
  <body>
    <div class="topnav" id="navbar">
      <ul>
        <h4>
   <li><a><span cursor:pointer" onclick="goBack()"  ><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> </span></a></li>
   <li ><a><b>ADD TASK</b></a></li>
   </h4></ul>
   </div>

<br/>
<br/><br/>


    <form method="post" action="addpros.php" id="loginForm">
            <input type="text" name="title"  required="" title="title" placeholder="title" required>
             <input type="text"  name="description" placeholder="description" value="" required>
             <input type="text"  name="category" placeholder=" category" value=""  required>
             <label>Due date</label>
             <input type="date"  name="date" placeholder=" Due date" value=""  required>
             <div align="center">
               <br/>
            <button type="submit"  name="submit">Submit</button>
          </div>
            <br/>
            <br/>
    </form>

  <script>
  function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }
  function goBack() {
    window.history.back();
  }
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
  </script>

  </body>
  </html>
  <!DOCTYPE html>
<html lang="en">
<head>
<title>LB
</title>

</head>


</html>



<?php } ?>
