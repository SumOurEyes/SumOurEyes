<<<<<<< HEAD
<?php
	include('connect.php');

    $query = "INSERT INTO projects (name, userid) VALUES ('".$_POST['name']."', '".$_POST['user']."')";
    mysql_query($query) or die (mysql_error());

    echo mysql_insert_id();
    
=======
<?php
	include('connect.php');

    $query = "INSERT INTO projects (name, userid) VALUES ('".$_POST['name']."', '".$_POST['user']."')";
    mysql_query($query) or die (mysql_error());

    echo mysql_insert_id();
    
>>>>>>> 9ca939f5193499f4616048a155369d97448fb46d
?>