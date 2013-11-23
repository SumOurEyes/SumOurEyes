<<<<<<< HEAD
<?php

include("connect.php");

$query = mysql_query("SELECT id FROM users WHERE username='".$_GET['username']."'") or die (mysql_error());
if(mysql_num_rows($query)!=0){
	echo json_encode($_GET['username']." is not available.");
}else{
	echo json_encode(true);
}

=======
<?php

include("connect.php");

$query = mysql_query("SELECT id FROM users WHERE username='".$_GET['username']."'") or die (mysql_error());
if(mysql_num_rows($query)!=0){
	echo json_encode($_GET['username']." is not available.");
}else{
	echo json_encode(true);
}

>>>>>>> 9ca939f5193499f4616048a155369d97448fb46d
?>