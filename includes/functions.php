<?php
function questions(){
	
}
function get_posts($query){
		
		while($row = mysql_fetch_array($query)){
			$id = $row['id'];
			echo ("<li><a href='question.php?id={$id}'".'>'.$row['question'].'</a>'.'   '. '<span class="details">'.'   Votes:'.$row['votes'].'  Answers'.$row['answers'].'  Asked By:'.$row['asker'].'</span></li>');
		}

}
function getanswers($query){
	while($row=mysql_fetch_array($query)){
	$id = $row['id'];
		echo("<li>".$row['answer'].'<span class="details">'.'  Answered By :'.$row['answerer'].'  Votes  '."<span id='{$id}'".">".$row['votes'].'</span>'."<img onclick='upvote({$id})'"." "." src='images/up.png' />"."<img onclick='downvote({$id})' src = 'images/down.png'/>"."</li></span>");
	}

}
function q_likes($id){
	$found = 0;
	$username = $_SESSION['username'];
    $query = mysql_query("SELECT * FROM users WHERE username = '$username' LIMIT 1");
	if(!$query)echo(mysql_error());
	if($query){
		$row = mysql_fetch_array($query);
		$ar = $row['qlikes'];
		$arr = unserialize($ar);
		foreach ($arr as $value) {
		if($id==$value) {
			$found = 1;
			break;
			}
		}
	}
	if($found==0){
	$id=(int)$id;
	 array_push($arr,$id);
	 $array = serialize($arr);
	 mysql_query("UPDATE users SET qlikes='$array' WHERE username = '$username' ");
	}
	return $found;
}

function a_likes(){
}

function sessions(){
  $query = mysql_query("SELECT * FROM sessions");
  $rows = mysql_num_rows($query);
  return $rows;
}
function data_validation($arr){
	foreach($arr as $key=>$value){
		
	}

}
?>