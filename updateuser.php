<?php
require_once 'webroot.php';
if (!isset($_SESSION['username'])) {
header('index.php');
}
$name = $_GET['name'];
$new_name = $_GET['username'];
$new_password  = $_GET['password'];
$new_level = $_GET['level'];
$ack = update_user($name,$new_name,$new_password,$new_level);
if(!preg_match("/failed/",$ack)){
redirect_to('useradmin.php?admin_flag=0');
}
else{
redirect_to('index.php');
}