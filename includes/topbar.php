<div id="topbar" >
<?php if(isset($_SESSION['access'])){
	echo("Hello ".$_SESSION['username']."</br>");
}
?>
	<a href="ask.php">Ask</a>
	<a href="index.php">Home</a>
	<a>Notifications</a>
	<?php  if(!isset($_SESSION['access'])){
	echo('<a href="profile.php">Profile</a>');
	}
	?>
	<?php
	if(isset($_SESSION['access'])){
		echo("<a href='logout.php'>Logout</a>");
	}else{
		echo("<a href='login.php'>Login</a>");
	}
	
	?>
</div>