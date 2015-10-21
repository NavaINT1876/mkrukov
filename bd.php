<?php 
$db=mysql_connect ("repsblog.mysql.ukraine.com.ua","repsblog_db","2vbvrsku");
mysql_query('SET NAMES "utf8"', $db);
//mysql_query("set character_set_connection=utf8"); 
//mysql_query("set names utf8");
mysql_select_db ("repsblog_db",$db);
?>