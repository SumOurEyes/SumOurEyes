<<<<<<< HEAD
<?php
	include("connect.php");

	$result = mysql_query("SELECT username FROM users WHERE id=".$_POST["userid"]."") 
	or die (mysql_error());


		while($row = mysql_fetch_array($result))
		{
			echo $row["username"];
		}


=======
<?php
	include("connect.php");

	$result = mysql_query("SELECT username FROM users WHERE id=".$_POST["userid"]."") 
	or die (mysql_error());


		while($row = mysql_fetch_array($result))
		{
			echo $row["username"];
		}


>>>>>>> 9ca939f5193499f4616048a155369d97448fb46d
?>