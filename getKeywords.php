<<<<<<< HEAD
<?php
	include("connect.php");
	
	$results = mysql_query("SELECT noteid, word FROM keywords WHERE projectid=".$_POST['projectid']) or die(mysql_error());
	
	$rows = array();
	while($r = mysql_fetch_assoc($results)) 
	{
	    $rows[] = $r;
	}

	echo json_encode($rows);

=======
<?php
	include("connect.php");
	
	$results = mysql_query("SELECT noteid, word FROM keywords WHERE projectid='".$_POST['projectid']."'") or die(mysql_error());
	
	$rows = array();
	while($r = mysql_fetch_assoc($results)) 
	{
	    $rows[] = $r;
	}

	echo json_encode($rows);

>>>>>>> 9ca939f5193499f4616048a155369d97448fb46d
?>