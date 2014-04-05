<?php session_start();?>
<?php require_once("includes/connection.php");?>
<?php  require_once("includes/functions.php");?>
<html>
	<head>
		<?php include("includes/head.php");?>
	</head>
	<body>
	<?php
	    //processing will go here
	
	?>
		<?php include("includes/topbar.php");?>
		<div id="left" style="display:inline-block">
			<h2>Trending</h2><br/><ul>
			<?php
			//get all the trending posts
			$query = mysql_query("SELECT * FROM questions WHERE answers>5");
			get_posts($query);
			?></ul>
			<h2>Unanswered</h2><br/><ul>
			<?php
			//get all the unanswered posts
			$query= mysql_query("SELECT * FROM questions WHERE answers = 0");
			get_posts($query);
			?></ul>
		</div>
		<div id="right" style="display:inline-block">
			<h2>Recent</h2>
			<?php
			//get all the recent posts
			$query = mysql_query("SELECT * FROM questions ORDER BY timestamp DESC LIMIT 20 ");
			get_posts($query);
			?>
		</div>
	</body>
		<?php include("includes/scripts.php");?>
</html>