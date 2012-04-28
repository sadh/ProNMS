<?php
session_start();
require_once("includes/basics.php");
$hostname = 'localhost';
$username = 'root';
$password = '';
$db = 'PG06';
$connection = mysql_connect($hostname,$username,$password) or die ("Database Service is unavailable");
mysql_select_db($db,$connection);