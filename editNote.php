<<<<<<< HEAD
<?php
	include("connect.php");

	mysql_query("UPDATE notes SET content='".$_POST['content']."' WHERE id = ".$_POST['noteid']."") or die (mysql_error());
	echo $_POST['content']." - ".$_POST['noteid'];
=======
<?php
	include("connect.php");

	mysql_query("UPDATE notes SET content='".$_POST['content']."' WHERE id = ".$_POST['noteid']."") or die (mysql_error());
	echo $_POST['content']." - ".$_POST['noteid'];
>>>>>>> 9ca939f5193499f4616048a155369d97448fb46d
?>