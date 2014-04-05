<?php
session_start();
include("includes/connection.php");
include("includes/functions.php");
?>
<?php
if(isset($_POST['login'])){
	$user = $_POST['username'];
	$pass = md5($_POST['password']);
	if(!isset($_POST['username'])||$_POST['username']==''){
		echo("<span style='color:red'>Please enter the username</span>");
	}
	else if(!isset($_POST['password'])||$_POST['password']==''){
		echo("<span style='color:red'>Please enter the password</span>");
	}else{
		$query = mysql_query("SELECT * FROM users WHERE username = '$user'");
		if(!$query){
		echo("No such username");
		}else{
		$row = mysql_fetch_array($query);
		if ($pass==$row['password']){
			$_SESSION['access']="yes";
			$_SESSION['username']=$user;
			mysql_query("UPDATE sessions SET id=id+1");
			header("Location:index.php");
			exit();
			}
		else{
			echo("Username Password combination Incorrect");
		}
		}
	
	}



}


?>
<form action="login.php" method="POST">
	Username:<input type="text" name="username" /><br/>
	Password:<input type="password" name="password" />
	<input type="submit" name="login" value="login" />
</form>

