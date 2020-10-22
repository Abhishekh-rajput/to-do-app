<?php
	$q=$_GET['q'];
	$kw=$q;
	$conn=mysql_connect('localhost','root','') or die("Database Error");
	mysql_select_db('b2b',$conn);
	$sql="SELECT * FROM electronics WHERE kw LIKE '%$kw%' ORDER BY Id LIMIT 10";
	$result = mysql_query($sql) or die(mysql_error());

	if($result)
	{
		while($row=mysql_fetch_array($result))
		{
			echo $row['kw']."\n";
		}
	}
?>
