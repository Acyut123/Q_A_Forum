<script>
function add_voting_ability(){

	var len = document.getElementsByClassName("vote").length;
	
	
	for(var i =0;i<len;i++){
		var element2 = document.createElement("img");
	    element2.setAttribute("src","images/down.png");
		element2.setAttribute("onclick","downvote()");
		var element1=document.createElement("img");
		element1.setAttribute("src","images/up.png");
		var div = document.createElement("div");
		div.setAttribute("style","display:inline-block");
		element2.setAttribute("onclick","downvote()");
		div.appendChild(element1);
		div.appendChild(element2);
		document.getElementsByClassName("vote")[i].appendChild(div);
	}
}

//window.onload=add_voting_ability();

function upvote(id){

	answer(id,"positive");
}
function downvote(id){

     answer(id,"negative");
}
function answer(id,sign){
var xhr;
if(window.XMLHttpRequest){
xhr = new XMLHttpRequest();
}
else{
xhr = new ActiveXObject("Microsoft.XMLHTTP");
}

xhr.onreadystatechange = function(){
	if(xhr.readyState==4 && xhr.status==200){
		document.getElementById(id).innerHTML=xhr.responseText;
	}
}

xhr.open("GET","change_vote.php?id="+id+"&sign="+sign,true);
xhr.send();
}
//functions to upvote or downvote questions begin here.
function question_upvote(id){
 
	var xhr;
	var qid = "q"+id;
	if(window.XMLHttpRequest){
		xhr = new XMLHttpRequest();
	}
	else{
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xhr.onreadystatechange = function(){
		if(xhr.readyState==4 && xhr.status==200){
			document.getElementById(qid).innerHTML=xhr.responseText;
		}
	}

	xhr.open("GET","change_question_vote.php?id="+id+"&sign="+"positive",true);
	xhr.send();
}
function question_downvote(id){
var xhr;
if(window.XMLHttpRequest){
xhr = new XMLHttpRequest();
}
else{
xhr = new ActiveXObject("Microsoft.XMLHTTP");
}

xhr.onreadystatechange = function(){
	if(xhr.readyState==4 && xhr.status==200){
		document.getElementById("q"+id).innerHTML=xhr.responseText;
	}
}

xhr.open("GET","change_question_vote.php?id="+id+"&sign="+"negative",true);
xhr.send();
}
</script>