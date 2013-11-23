<<<<<<< HEAD
<?php
	include("connect.php");
	
	$result = mysql_query("SELECT content FROM notes WHERE id=".$_POST['noteid']."") or die(mysql_error());
	
	
		while($row = mysql_fetch_array($result))
		{
			echo $row['content'];
		}

=======
<?php
	include("connect.php");
	
	$result = mysql_query("SELECT content FROM notes WHERE id='".$_POST['noteid']."'") or die(mysql_error());
	
	
		while($row = mysql_fetch_array($result))
		{
			echo $row['content'];
		}

>>>>>>> 9ca939f5193499f4616048a155369d97448fb46d
?>