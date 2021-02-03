<?php 
$DB = array(
"hostname"=>"localhost",
"dbname"=>"bolog2",
"dbuser"=>"root",
"dbpass"=>""
);

$Dbconnect = mysql_connect($DB['hostname'],$DB['dbuser'],$DB['dbpass']) or die(mysql_error()) ;
$Dbselect = mysql_select_db($DB['dbname']) or die(mysql_error());


?>