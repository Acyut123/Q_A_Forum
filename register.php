<?php
session_start();
include("includes/connection.php");
if(isset($_SESSION['access'])){
	header("Location:index.php");
	exit();
}
?>
<?php
$msg="";
if(isset($_POST['register'])){
	$arr = array("First Name"=>"fname","Last Name"=>"lname","Username"=>'username',"Password"=>'password');
	foreach($arr as $key=>$value){
		if(!isset($_POST[$value])){
			$msg = $msg.",".$key;
		}
	}
	if($_POST['password']!=$_POST['rpassword'])
		$msg = $msg + " Passwords do not match";
	
	if($msg!=""){
		echo($msg);
	}else{
		$name = $_POST['fname']." ".$_POST['lname'];
		$password = md5($_POST['password']);
		$username = $_POST['username'];
		$query = mysql_query("INSERT INTO users(id,name,username,password) VALUES('','$name','$username','$password')");
		if($query){
			header("Location:login.php");
		}
	}
	
	
}

?>
<head>
<script>
var i=1;
function changefunc(){
if(i==1){
	document.getElementById("alumni").style.visibility="visible";
	i=-1;
}else if(i==-1){
    document.getElementById("alumni").style.visibility="hidden";
	i=1;
}
}

</script>
<style>
	label {
	float: left;
	text-align: right;
	margin-right: 15px;
	width: 140px;
}
textarea:focus, input:focus {
	border: 2px solid #900;
}
</style>
</head>
<body>
<form action="register.php" method="post">
<label>First Name:</label><input type="text" name="fname" /><br/>
<label>Last Name:</label><input type="text" name="lname" /><br/>
<label>Username:</label><input type="text" name="username" /><br/>
<label>Password:</label><input type="password" name="password" /><br/>
<label>Retype Password:</label><input type="password" name="rpassword" /><br/>
<!--<label>You are?</label><select name="type" onchange="changefunc()"><br/>
	<option value="student" >Student</option>
	<option value="alumni"  >Alumni</option>
</select><br/>
<div id="alumni" style="visibility:hidden">
<label>Year of Passing:</label><input type="text" name="yop" /><br/>
<label>Department:</label><input type="dep" /><br/><br/>
</div> -->

<input type="submit" value="Register" name="register" />
</form>
</body>