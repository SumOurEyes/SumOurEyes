<?php
	include("connect.php");
	
	$result = mysql_query("SELECT content FROM notes WHERE id=".$_POST['noteid']."") or die(mysql_error());
	
	
		while($row = mysql_fetch_array($result))
		{
			echo $row['content'];
		}

?>