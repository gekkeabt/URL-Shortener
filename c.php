<?php
mysql_connect("localhost","root","") or die(mysql_error()); //connects to the db
mysql_select_db("url") or die(mysql_error()); // selects the right db

// The Query for the database
// CREATE TABLE IF NOT EXISTS `url` (
//  `id` int(255) NOT NULL,
//  `path` varchar(1000) NOT NULL,
//  `expire` int(255) NOT NULL,
//  `short` varchar(255) NOT NULL
//) ENGINE=InnoDB DEFAULT CHARSET=latin1;

?>
