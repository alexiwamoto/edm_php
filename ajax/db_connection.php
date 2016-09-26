<?php

// Connection variables 
$host = "localhost"; // MySQL host name eg. localhost
$user = "root"; // MySQL user. eg. root ( if your on localserver)
//$user = "u461100401_root";
//$password = "root123";
//$database = "u461100401_work";
$password = "root"; // MySQL user password  (if password is not set for your root user then keep it empty )
$database = "workers"; // MySQL Database name  savorsys

// Connect to MySQL Database
$con = new mysqli($host, $user, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>