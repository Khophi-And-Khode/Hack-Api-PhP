<?php
$server ="localhost";
$user ="root";
$password ="root";
$database ="hackdb";

$conn = mysqli_connect($server,$user,$password,$database);

if(!$conn){
    $errMsg="There was an error connecting to the database, please check the connection and try again.";
	die("Not connected" . $errMsg);
	//mysqli_connect_error()
}