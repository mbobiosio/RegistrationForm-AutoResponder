<?php
$hostmysql = "localhost";
$username = "regis_test";
$password = "123456";
$database = "regist_db";

$conn = @mysql_connect("$hostmysql","$username","$password");

if (!$conn) die ("Connection Failed");
mysql_select_db($database,$conn) or die ("Database Not Found on Server"); 
?>