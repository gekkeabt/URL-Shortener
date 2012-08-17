<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8 />
<title>Short URL Generator</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<style type="text/css">
* {
	margin:0px;
	font-family:arial;
}
form {
	text-align:center;
	-webkit-border-radius:0px 0px 20px 20px;
	background-color:#E6E6E6;
	width:500px;
	border-left:2px solid black;
	border-right:2px solid black;
	border-bottom:2px solid black;
	padding:20px;
	display:none;
}
input {
	width:97%;
}
#div {
	display:none;
}
</style>
</head>
<body>
<center>
<form id="form" method="get" action="#">
<?php 
require("c.php"); // Require the file to connect to database
if(!isset($_GET["p"])||$_GET["p"]==""){ // Check if it is set
	
}else {
	$path = $_GET["p"]; // Define $path
	$short = substr(number_format(time() * rand(),0,'',''),0,5);
	$idrandom = substr(number_format(time() * rand(),0,'',''),0,5);
	$expire = date("d-m-y")+1;
	$select = mysql_query("SELECT * FROM url WHERE short = $short") or die(mysql_error()); // Select the table
	$rows = mysql_fetch_assoc($select);
	function create(){
		$path = $_GET["p"]; // Define $path
		$short = substr(number_format(time() * rand(),0,'',''),0,5);
		$idrandom = substr(number_format(time() * rand(),0,'',''),0,5);
		$expire = date("d") +1;
		$now = date("d");
		mysql_query("INSERT INTO  `url`.`url` (`id` ,`path` ,`expire` ,`short`)VALUES ('$idrandom',  '$path',  '$expire',  '$short')");	
		echo "<a target=_blank href=http://localhost/url/s.php?p=$short><b style=color:blue;>http://localhost/url/s.php?p=$short</b></a><br>";
		mysql_query("DELETE FROM url WHERE expire < $now");
	}
	if($short == $rows["short"]||$idrandom == $rows["id"]){
		$short = substr(number_format(time() * rand(),0,'',''),0,5);
		$idrandom = substr(number_format(time() * rand(),0,'',''),0,5);
		create();
	}
	else {
		create();
	}
}

?>
<hr><br>
<div id="div">
The website to generate a short url of.<br>( Don't forget the http:// or https:// )<br><br>
<input name="p" type="text" /><br>
<input type="submit" value="Generate" /><br><br>
<a href="http://www.abakay.zxq.net">By Ahmed Bakay</a>
</div>
</form>
<script type="text/javascript">
$(document).ready(function(){
	$("#form").slideDown(1000);
	$("#div").delay(1000).slideDown(1000);
});
</script>
</center>
</body>
</html>
