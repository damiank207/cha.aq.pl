<?php
$mysql_db_hostname = "_HOSTNAME_";
$mysql_db_user = "_USER_";
$mysql_db_password = "_PASSWORD_";
$mysql_db_database = "_DATABASE_";

$con = mysql_connect($mysql_db_hostname, $mysql_db_user, $mysql_db_password) or die("Could not connect database");
mysql_select_db($mysql_db_database, $con) or die("Could not select database");
$mysqli = new mysqli($mysql_db_hostname, $mysql_db_user, $mysql_db_password, $mysql_db_database);
?>