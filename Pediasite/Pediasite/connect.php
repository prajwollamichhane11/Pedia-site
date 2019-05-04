<?php

//connection in the database
$host = "localhost";
$username = "root";
$password = "";
$db = "forumseries";

$dbconn = mysqli_connect($host, $username, $password) or die(mysql_error());
mysqli_select_db($dbconn,$db);


?>