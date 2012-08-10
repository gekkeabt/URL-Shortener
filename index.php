<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8 />
<title>Short URL Generator</title>
<style type="text/css">
body {
	background:lightblue;
	font-family:arial;
	font-weight:bold;
}
form {
	background-color:gray;
	-webkit-opacity:0.6;
	width:400px;
	margin:0px auto;
	padding:20px;
	-webkit-border-radius:20px;
	margin-top:250px;;
}
</style>
</head>
<body>
<form method="get" action="#">
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
The website to generate a short url of ( Don't forget the http:// !)<br>
<input name="p" type="site" />
<input type="submit" value="Generate" /><br><br>
<a href="http://www.abakay.zxq.net">By Ahmed Bakay</a>
</form>
</body>
</html>
