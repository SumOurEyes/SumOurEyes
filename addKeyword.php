<<<<<<< HEAD
<?php
	include("connect.php");

	mysql_query("INSERT INTO keywords (word, noteid, chapterid, projectid) 
		VALUES ('".$_POST['word']."', '".$_POST['noteid']."', '".$_POST['chapterid']."', '".$_POST['projectid']."')") 
	or die (mysql_error());

	echo mysql_insert_id();

=======
<?php
	include("connect.php");

	mysql_query("INSERT INTO keywords (word, noteid, chapterid, projectid) 
		VALUES ('".$_POST['word']."', '".$_POST['noteid']."', '".$_POST['chapterid']."', '".$_POST['projectid']."')") 
	or die (mysql_error());

	echo mysql_insert_id();

>>>>>>> 9ca939f5193499f4616048a155369d97448fb46d
?>