<!--The page for displaying the selected question and its answers -->
<?php session_start();?>
<?php include("includes/connection.php");?>
<?php include("includes/functions.php");?>
<head>
	<?php include("includes/head.php");?>
</head>
<body>
		<?php include("includes/topbar.php");?>

<?php
if (isset($_GET['id'])){
$id = $_GET['id'];
$qid = "q".$id;
$query = mysql_query("SELECT * FROM questions WHERE id = '$id' LIMIT 1");
$row = mysql_fetch_array($query);
echo('<span class="bold" id="question">'.$row['question'].'</span>'.'<span class="details">'.'Votes  '."<span id='{$qid}'".">".$row['votes'].'</span>'."<img onclick='question_upvote({$id})'"." "." src='images/up.png' />"."<img onclick='question_downvote({$id})' src = 'images/down.png'/><br/>'</span>");
}
?>

<?php
if (isset($_SESSION['access'])){
	$username = $_SESSION['username'];
}else{
	$username = "Anonymous";
}
if(isset($_GET['submit'])){
	if(!isset($_GET['reply'])||$_GET['reply']==''){
		echo("enter an answer");
	}else{
		$reply = $_GET['reply'];
		
		$qid = $_GET['id'];
		
		$query = mysql_query("INSERT INTO answers(id,q_id,answer,answerer) VALUES('','$qid','$reply','$username') ");
		
		if($query){
			echo("answer submitted");
				mysql_query("UPDATE questions SET answers = answers+1 WHERE id = '$qid'");
		}else{ 
			echo(mysql_error());
		}
	}
}
?>
<form id="replyarea" action="question.php" method="GET">
	<input type="hidden" value="<?php echo($id);?>" name="id" />
</form>
<div id="answers"><ol>
<?php
$query = mysql_query("SELECT * FROM answers WHERE q_id = '$id'");
getanswers($query);
?></ol>
</div>
<br/>
<script>
function showinputfield(){
	var element = document.getElementById("replyarea");
	var div = document.createElement('input');//the text area
	var div2 = document.createElement('input');//the button
	div.setAttribute("type","text");
	div2.setAttribute("type","submit");
	div2.setAttribute("value","reply");
	div2.setAttribute("name","submit");
	div.setAttribute("name","reply");
	element.appendChild(div);
	element.appendChild(div2);
	
	document.getElementById("input").style.visibility="hidden";
}

</script>
<input id="input" type="button" value="reply" onclick="showinputfield();" />
<?php include("includes/scripts.php");?>