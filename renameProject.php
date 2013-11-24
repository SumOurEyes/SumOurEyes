<?php
	include('connect.php');
    
    $updateProject = "UPDATE projects SET projects.name = '".$_POST['newName']."' WHERE projects.id = '".$_POST['project']."'"; 
        mysql_query($updateProject) or die (mysql_error());

    echo mysql_insert_id();
?>