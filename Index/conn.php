<?php

$serverName = "localhost";
$usrName = "root";
$password = "";
$dbName = "minor";

$con = mysqli_connect($serverName, $usrName, $password, $dbName) or die("error while connecting");