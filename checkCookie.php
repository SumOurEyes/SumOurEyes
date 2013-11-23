<<<<<<< HEAD
<?php
	include("connect.php");

	$result = mysql_query("SELECT userid FROM cookies WHERE userid='".$_POST["userid"]."' && token='".md5($_POST["token"])."'") 
	or die (mysql_error());

	if  (mysql_num_rows($result)>0)
	{
		while($row = mysql_fetch_array($result))
		{
			echo $row["userid"];
		}
	}else{
		echo "Nothing.";
	}

=======
<?php
	include("connect.php");

	$result = mysql_query("SELECT userid FROM cookies WHERE userid='".$_POST["userid"]."' && token='".md5($_POST["token"])."'") 
	or die (mysql_error());

	if  (mysql_num_rows($result)>0)
	{
		while($row = mysql_fetch_array($result))
		{
			echo $row["userid"];
		}
	}else{
		echo "Nothing.";
	}

>>>>>>> 9ca939f5193499f4616048a155369d97448fb46d
?>