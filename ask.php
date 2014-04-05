<!--Page for posting  a new question -->
<?php session_start();?>
<?php include("includes/connection.php");?>
<head>
<?php include("includes/head.php");?>
</head>
<body>
			<?php include("includes/topbar.php");?>
<span class="bold">Ask a question</span><br/>
<?php
if(!isset($_SESSION['access'])){
	echo("Please <a href='login.php'>Login</a> Or <a href='register.php'>Register</a> to ask questions");
	die();
}
if(isset($_SESSION['access'])){
	$username = $_SESSION['username'];
}else{
	$username="anonymous";
}

if(isset($_GET['submit'])){
    
	if(!isset($_GET['question'])||$_GET['question']==''){
	echo("<span class='error'>Please enter the question</span>");
	}else{
	$question = $_GET['question'];
	$query = mysql_query("INSERT INTO questions(id,question,answers,asker) VALUES('','$question','','$username')");
		if(!$query){
			echo("Try submitting the question again ".mysql_error());
		}else{
			echo("question submitted");
		}
	}
}

?>

<form action ="ask.php" method="get">
Question:<input name="question" id="text_input" type="text"/><br/>
<input name="submit" class="input_button" type="submit" value="Ask" />
</form>
</body>