<<<<<<< HEAD
<?php
	include("connect.php");

	mysql_query("INSERT INTO chapters (name, subtitle, projectid) VALUES ('".$_POST['name']."', '".$_POST['subtitle']."', '".$_POST['projectid']."')") or die (mysql_error());

	echo mysql_insert_id();
=======
<?php
	include("connect.php");

	mysql_query("INSERT INTO chapters (name, subtitle, projectid) VALUES ('".$_POST['name']."', '".$_POST['subtitle']."', '".$_POST['projectid']."')") or die (mysql_error());

	echo mysql_insert_id();
>>>>>>> 9ca939f5193499f4616048a155369d97448fb46d
?>