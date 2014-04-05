<?php
session_start();
include("includes/connection.php");
if(!isset($_SESSION['access'])||$_SESSION['access']!="yes"){
	header("Location:index.php");
			exit();
}
?>