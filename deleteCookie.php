<<<<<<< HEAD
<?php
	include("connect.php");

	mysql_query("DELETE FROM cookies WHERE userid = ".$_POST['userid']." AND token ='".md5($_POST['token'])."' LIMIT 1") or die (mysql_error());
	
=======
<?php
	include("connect.php");

	mysql_query("DELETE FROM cookies WHERE userid = ".$_POST['userid']." AND token ='".md5($_POST['token'])."' LIMIT 1") or die (mysql_error());
	
>>>>>>> 9ca939f5193499f4616048a155369d97448fb46d
?>