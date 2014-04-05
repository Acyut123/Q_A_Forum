
<?php
session_start(); include_once("includes/connection.php");?>
<?php include_once("includes/functions.php");?>
<?php
if(!isset($_SESSION['access'])){

die("<div id='popup'> You Need to Login in order to Vote</div>");
}

$id = $_GET['id'];
$sign = $_GET['sign'];
$liked = q_likes($id);

$username = $_SESSION['username'];
if(($sign=="positive")&&($liked==0)){
$query = mysql_query("UPDATE questions SET votes = votes+1 WHERE id = '$id'");
}
else if ($sign =="negative"){
$query = mysql_query("UPDATE questions SET votes = votes-1 WHERE id = '$id'");
}
$query = mysql_query("SELECT * FROM questions WHERE id = '$id'");
if(!$query) echo(mysql_error());
$row = mysql_fetch_array($query);
echo($row['votes']);
?>