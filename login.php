<?php
  session_start();
//Database Configuration File
include('config.php');
error_reporting(0);

  if(isset($_POST['login']))
  {

//Genrating random number for salt
if(@$_SESSION['randnmbr']==""){

        $Alpha22=range("A","Z");
        $Alpha12=range("A","Z");
        $alpha22=range("a","z");
        $alpha12=range("a","z");
        $num22=range(1000,9999);
        $num12=range(1000,9999);
        $numU22=range(99999,10000);
        $numU12=range(99999,10000);
        $AlphaB22=array_rand($Alpha22);
        $AlphaB12=array_rand($Alpha12);
        $alphaS22=array_rand($alpha22);
        $alphaS12=array_rand($alpha12);
        $Num22=array_rand($num22);
        $NumU22=array_rand($numU22);
        $Num12=array_rand($num12);
        $NumU12=array_rand($numU12);
        $res22=$Alpha22[$AlphaB22].$num22[$Num22].$Alpha12[$AlphaB12].$numU22[$NumU22].$alpha22[$alphaS22].$num12[$Num12];
        $text22=str_shuffle($res22);
         $_SESSION['randnum']= $text22;
}


    // Getting username/ email and password
    $uname=$_POST['username'];
     $password=hash('sha256',$_POST['password']);

     // Hashing with Random Number
     $saltedpasswrd=hash('sha256',$password.$_SESSION['randnum']);
    // Fetch stored password  from database on the basis of username/email 
    $sql ="SELECT UserName,UserEmail,LoginPassword,LoginType FROM userdata WHERE (UserName=:usname || UserEmail=:usname)";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':usname', $uname, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
  if($query->rowCount() > 0)
  {
foreach ($results as $result) {
 $fetchpassword=$result->LoginPassword;
 // hashing for stored password
   $storedpass= hash('sha256',$fetchpassword.$_SESSION['randnum']);
}
//You can configure your cost value according to your server configuration.By Default value is 10.
  $options = [
              'cost' => 12,
              ];
  // Hashing of the post password
  $hash= password_hash($saltedpasswrd,PASSWORD_DEFAULT, $options);
  // Verifying Post password againt stored password
   if(password_verify($storedpass,$hash)){


    $ucheck = $_POST['username'];
    $q = mysqli_query($bd,"SELECT * FROM `userdata` WHERE UserName = '$ucheck' OR UserEmail = '$ucheck' LIMIT 1");
  while($row = mysqli_fetch_assoc($q)){
      $uid= $row['UserName'];
      $email = $row['UserEmail'];}
   $_SESSION['userlogin']=$uid;
   setcookie("ul", $uid, strtotime( '+30 days' ), "/", "", "", TRUE);
    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
  }
else {
  $err = '<b>Wrong Password</b><br/>';

}

   }


  else{
     $err = '<b>Invalid Details</b><br/>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>B2B</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <style>
    body {
      background-color: orange;
      display: flex;
			justify-content: center;
		  align-items: center;
			min-height: 100vh;
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
input[type=text], input[type=password]{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 1px solid #aaa;
  outline: none;
  border-radius: 8px;
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
  background-color: lightblue;
}
</style>
</head>
<body>
                  <div class="col-xs-12">
                          <form id="loginForm" method="post">
                              <h1 style="color:white;">Log In</h1>
<br/>
                                  <input type="text"  id="username" name="username" title="Please enter you username or Email-id" placeholder="Username / Email id" required>

                                  <input type="password"  id="password" name="password" placeholder="Password" title="Please enter your password" required>
                                  <br/>
                                  <p align="center" style="color: red;"><?php echo $err; ?></p>

 <button name="login" class="btn btn btn-lg btn-block" type="submit">Login</button>

<br/>
                                  <p align="center" style="color:white;">Don't have an account?<a href="signup.php"> <mark><b>Sign Up</b></mark></a></p>

                          </form>

                  </div>

</body>
</html>
