<?php
$serverName = "localhost";
$dbUsername = "slgeek";
$dbPassword = "u3P2J!XoZolYuFS_";
$dbName = "slgeek";

$conn = mysqli_connect($serverName,$dbUsername,$dbPassword,$dbName);

if(!$conn){
	die("Conection failed : ".mysqli_connect_error());
}