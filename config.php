<?php
// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','todolist');
// Establish database connection.
$bd = mysqli_connect(DB_HOST, DB_USER, DB_PASS) or die("Could not connect database");
mysqli_select_db($bd, DB_NAME) or die("Could not select database");
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS);
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>
