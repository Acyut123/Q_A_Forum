<?php
$connection = mysql_connect("localhost","root","");
if(!$connection){
	die("database connection failed".mysql_error());
}
else{
	$db_select = mysql_select_db("blog",$connection);
	if(!$db_select){
		die("database selection failed");
	}	
}
?>