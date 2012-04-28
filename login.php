<?php
require_once "webroot.php";
$login = get_user_by_username_and_password($_POST['username'],$_POST['password']);
if(mysql_num_rows($login) == 1){
$_SESSION['username']=$_POST['username'];
redirect_to('networkmonitor.php');
}
else{
redirect_to('index.php');
}
