<?php
require("c.php");
$short = $_GET["p"];
if( $select = mysql_query("SELECT * FROM url WHERE short = $short") or die(mysql_error())){
	$rows = mysql_fetch_assoc($select);
	header('Location: '.$rows["path"]);
} // Select the table
//if($rows["short"]=={
	
//}
?>