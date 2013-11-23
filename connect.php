<<<<<<< HEAD
<?php

$myServer = "localhost";
$myUser = "root";
$myPass = "ferret2391";
$myDB = "savadaba";

$dbhandle = mysql_connect($myServer, $myUser, $myPass)
  or die("Couldn't connect to SQL Server on $myServer");
  
mysql_select_db($myDB) or die(mysql_error());

=======
<?php

$myServer = "localhost";
$myUser = "root";
$myPass = "ferret2391";
$myDB = "savadaba";

$dbhandle = mysql_connect($myServer, $myUser, $myPass)
  or die("Couldn't connect to SQL Server on $myServer");
  
mysql_select_db($myDB) or die(mysql_error());

>>>>>>> 9ca939f5193499f4616048a155369d97448fb46d
?>