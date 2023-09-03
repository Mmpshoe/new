<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "fintechdb";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
