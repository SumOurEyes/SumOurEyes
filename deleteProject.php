<<<<<<< HEAD
<?php
	include("connect.php");

	mysql_query("DELETE FROM projects WHERE id = ".$_POST['id']." LIMIT 1") or die (mysql_error());
	mysql_query("DELETE FROM chapters WHERE projectid = ".$_POST['id']) or die (mysql_error());
	mysql_query("DELETE FROM notes WHERE projectid = ".$_POST['id']) or die (mysql_error());
=======
<?php
	include("connect.php");

	mysql_query("DELETE FROM projects WHERE id = ".$_POST['id']." LIMIT 1") or die (mysql_error());
	mysql_query("DELETE FROM chapters WHERE projectid = ".$_POST['id']) or die (mysql_error());
	mysql_query("DELETE FROM notes WHERE projectid = ".$_POST['id']) or die (mysql_error());
>>>>>>> 9ca939f5193499f4616048a155369d97448fb46d
?>