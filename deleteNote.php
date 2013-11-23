<<<<<<< HEAD
<?php
	include("connect.php");

	mysql_query("DELETE FROM notes WHERE id = ".$_POST['noteid']." LIMIT 1") or die (mysql_error());
=======
<?php
	include("connect.php");

	mysql_query("DELETE FROM notes WHERE id = ".$_POST['noteid']." LIMIT 1") or die (mysql_error());
>>>>>>> 9ca939f5193499f4616048a155369d97448fb46d
?>