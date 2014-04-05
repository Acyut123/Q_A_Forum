<?php  include_once("includes/connection.php");?>
<?php
$id = $_GET['id'];
$sign = $_GET['sign'];
if($sign=="positive")
$query = mysql_query("UPDATE answers SET votes = votes+1 WHERE id = '$id'");
else if ($sign =="negative"){
$query = mysql_query("UPDATE answers SET votes = votes-1 WHERE id = '$id'");
}
$query = mysql_query("SELECT * FROM answers WHERE id = '$id'");
$row = mysql_fetch_array($query);
echo($row['votes']);
?>