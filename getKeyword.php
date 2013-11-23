<<<<<<< HEAD
<?php
	include("connect.php");
	
	$result = mysql_query("SELECT noteid FROM keywords WHERE word='".$_POST['word']."' AND projectid='".$_POST['projectid']."'") or die(mysql_error());
	
	if(mysql_num_rows($result)>0){
		while($row = mysql_fetch_array($result))
		{
			echo $row['noteid'];
		}
	}else{
		echo false;
	}

=======
<?php
	include("connect.php");
	
	$result = mysql_query("SELECT noteid FROM keywords WHERE word='".$_POST['word']."' AND projectid='".$_POST['projectid']."'") or die(mysql_error());
	
	if(mysql_num_rows($result)>0){
		while($row = mysql_fetch_array($result))
		{
			echo $row['noteid'];
		}
	}else{
		echo false;
	}

>>>>>>> 9ca939f5193499f4616048a155369d97448fb46d
?>