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
$uname =  $_SESSION['userlogin'];
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>LB</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body {
      background-color: #fff ;
    }
    #loginForm {

      margin: 100px auto;
      font-family: Raleway;
      padding: 40px;
      width: 100%;
      min-width: 300px;
    }
    h4 {
      font-family: 'Lato', sans-serif;
      color: #fff;
      font-size: 20px;
      font-weight: bold;
    }
    h5 {
      font-family: 'Lato', sans-serif;
      color: #fff;
      font-size: 12px;
      font-weight: bold;
    }
    h1 {
      font-family: 'Lato', sans-serif;
      color: #fff;
      font-size: 25px;
      font-weight: bold;
    }
    h3{
      color: white;
      font-size: 15px;
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

input[type=text], input[type=email], input[type=date],input[type=file]{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 1px solid #fe6700;
  outline: none;
}

input[type=button], input[type=submit], input[type=reset] {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}


input[type=text]:focus {
  background-color: #f1f1f1;
}
input[type=email]:focus {
  background-color: #f1f1f1;
}
input[type=date]:focus {
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
h3 span{
  font-size: 0.9em;
}
.card {
  box-shadow: 0 6px 10px 0 grey;
  transition: 0.3s;
  width: 100%;
  background-color: #fe6700;
  border-radius: 0px;
}
a{
  color: #f1f1f1;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}


</style>
</head>
<body>
  <div class="topnav" id="navbar">
    <ul>
      <h4>
 <li><a><span cursor:pointer" onclick="goBack()"  ><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> </span></a></li>
 <li ><a><b>View Tasks</b></a></li>
 </h4></ul>
 </div>
                  <div class="col-xs-12">
<br/>
<br/>
<br/>
<br/>
<?php
 $q = mysqli_query($bd,"SELECT * FROM `task` WHERE uid = '$uname' AND status = '' ORDER BY id DESC");
 while($row = mysqli_fetch_assoc($q)){
   $id = $row['id'];
     $title = $row['title'];
     $description = $row['description'];
     $category = $row['category'];
     $due = $row['Due'];
     $date = $row['Date'];
     echo"<a href='done.php?id={$id}'><button type='button' class='btn btn-warning'>Done?</button></a>";
     echo "<div class='card'>
       <div class='container'>
            <h5 align='right'> {$date} </h5>
           <h1 align='left'> {$title}</h1>
           <h3> {$description}</h3>

             <hr/>
             <h3 align='center'>{$due}</h3>
       </div>
     </div></br>";

 }
?>


                  </div>

</body>
<script>
function goBack() {
  window.history.back();
}
</script>
</html>
 <?php } ?>
