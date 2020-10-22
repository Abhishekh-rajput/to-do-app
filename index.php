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
 $uname =  $_SESSION['userlogin'];
  ?>

  <html>
  <head>
    <title>To do list</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Merienda+One&display=swap" rel="stylesheet">
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
  h1 {
  text-align: center;
  font-family: 'Pacifico', cursive;
  text-shadow: 1px 1px #888;
  }
  h3{
    color: white;
    font-size: 3.1em;
  }
  p{
    color: white;
    font-size: 1.1em;
    font-family: 'Merienda One', cursive;
  }
  a {
  color: #fff;
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

  a:hover {
      color: #fff;
      text-decoration: none;
  }
  .column {
    float: left;
    width: 25%;
    padding: 0 10px;
  }

  /* Remove extra left and right margins, due to padding */
  .row {margin: 0 -5px;}

  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }

  /* Responsive columns */
  @media screen and (max-width: 600px) {
    .column {
      width: 50%;
      display: block;
      margin-bottom: 20px;
    }
  }

  /* Style the counter cards */
  .card {
    box-shadow: 0 4px 8px 0 #999;
    padding: 16px;
    text-align: center;
    background: rgb(254,84,0);
  background: linear-gradient(90deg, rgba(254,84,0,1) 0%, rgba(222,80,33,1) 35%, rgba(209,40,40,1) 100%);
    border-radius: 25px;
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
  .options{
    margin: 100px auto;
  }
  </style>
  </head>
  <body>
    <div class="container">

      <h1>To Do App</h1>

    <div class="options">

    <br/>
    <br/>
    <div class="row">
      <div class="column">
        <a href="add.php"><div class="card">
          <h3><i class="fa fa-plus" aria-hidden="true"></i></h3>
          <p>Add Task</p>
        </div></a>
      </div>

      <div class="column">
        <a href="view.php"><div class="card">
          <h3><i class="fa fa-list" aria-hidden="true"></i></h3>
          <p>View Task</p>
        </div></a>
      </div>

    </div>
    <br/>
    <br/><br/><br/><br/>
    <table class="table">
    <thead>
      <tr>
        <th>Title</th>
        <th>Category</th>
        <th>Due Date</th>
      </tr>
    </thead>
    <tbody>
      <?php
       $q = mysqli_query($bd,"SELECT * FROM `task` WHERE uid = '$uname' AND status = '' ORDER BY Due ASC Limit 5");
       while($row = mysqli_fetch_assoc($q)){
         $id = $row['id'];
           $title = $row['title'];
           $description = $row['description'];
           $category = $row['category'];
           $due = $row['Due'];
           $date = $row['Date'];
           echo "<tr>
             <td>{$title}</td>
             <td>{$category}</td>
             <td>{$due}</td>
           </tr>";

       }
      ?>


    </tbody>
  </table>

    <br/>
    </div>
    </div>

  </body>
  </html>
<?php } ?>
