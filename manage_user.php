<?php
require_once 'webroot.php';
if (!isset($_SESSION['username'])) {
header('index.php');
}
$user_with_option  = preg_split('/:/',$_GET['manage']);
$user = $user_with_option[0];
$option = $user_with_option[1];
switch($option){
case 'delete':
$ack = delete_user($user);
if(!preg_match("/failed/",$ack)){
redirect_to('useradmin.php?admin_flag=0');
}
else{
redirect_to('index.php');
}
break;
case 'edit':
$edit_data = show_users($user);
$user_array = mysql_fetch_array($edit_data);
if($edit_data){
redirect_to('useradmin.php?admin_flag=1&user='.$user_array['name'].'&password='.$user_array['password'].'&level='.$user_array['level']);
}
else{
redirect_to('index.php');
}
}