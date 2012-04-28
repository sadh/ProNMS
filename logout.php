<?php
require_once 'webroot.php';
mysql_close($connection);
unset($_SESSION['username']);
unset($_SESSION['ipaddress']);
session_destroy();
header('Location:index.php');
exit;