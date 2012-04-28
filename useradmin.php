<?php
require_once 'webroot.php';
if (!isset($_SESSION['username'])) {
header('index.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>IP Monitoring System | User Administration</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui-1.8.15.custom.css"/>
<link  href="http://fonts.googleapis.com/css?family=Ubuntu:300,300italic,regular,italic,500,500italic,bold,bolditalic" rel="stylesheet" type="text/css" />
<link media="screen" rel="stylesheet" href="css/colorbox.css" />
<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</script>
<style type="text/css">
xtd{
margin:20px;
padding:10px;
text-align:center;
font-size:15px;
}
</style>
</head>
<body>
<div class="header">
<div class="container">
<div class="nav">
<ul>
<li><a class="faq" href="#">FAQ</a></li>
<li><form action="networkmonitor.php"><input type="submit" value="Network Monitor"/></form></li>
<li><form action="logout.php"><input type="submit" value="Logout"/></form></li>
</ul>
</div>

<h1>IP Monitoring System | Manage Users</h1>

</div><!--Container-->

</div><!--Header-->
<div class="content">

<div class="container">

<div class="box">
<div class="help">

</div>
<p>
<?php
$flag = $_GET['admin_flag'];
if($flag){
if(isset($_GET['user'])&&isset($_GET['password'])&&isset($_GET['level'])){
$user = $_GET['user'];
$password = $_GET['password'];
$level = $_GET['level'];
echo "<h2>Update User</h2><br /><br />";
echo "<form name='updateuser' value='updateuser' action='updateuser.php'>";
echo "User name:<input type='text' name='username' value='".$user."'/>";
echo "Password <input type='password' name='password' value='".$password."'>";
echo "Admin Level <input type='text' name='level' value='".$level."'>";
echo "<input type='hidden' name='name' value='".$user."'>";
echo "<input type='submit' name='Update' value='Update User'>";
echo "</form>";
}else{
echo "<h2>Add new User</h2><br /><br />";
echo "<form name='adduser' value='adduser' action='addnewuser.php'>";
echo "User Name<input type='text' name='username' value='username'/>";
echo "Password <input type='password' name='password' value='password'>";
echo "Level <input type='text' name='level' value='5'>";
echo "<input type='submit' name='Add' value='Add User'>";
echo "</form>";
}
}else{
echo "<h2>Available Users</h2><br /><br />";
echo "<table class='host_table'><tr><th>User Name</th><th>Password</th><th>Level</th><th>Delete</th><th>Update</th><th>Action</th></tr>";
$user_list = show_users("all");
if($user_list){
while($each_user=mysql_fetch_array($user_list)){
echo "<form name='useradmin' value='useradmin' action='manage_user.php' method='get'>";
echo "<tr><td>".$each_user['name']."</td><td>".$each_user['password']."</td><td>".$each_user['level']."</td>";
echo "<td><input type='checkbox' name='manage' value='".$each_user['name'].":delete'/></td><td><input type='checkbox' name='manage' value='".$each_user['name'].":edit'/></td>";
echo "<td><input type='submit' value='manage'/></td></tr></form>";
}
echo "</table><br /><br />";
echo "<a href='useradmin.php?admin_flag=1'>Click Here to add new user...</a>";
}else{
echo "No User available..!";
}
}
?>

</p>
</div><!--Container-->

</div><!--Content-->


<div class="footer">

<div class="container">

<p>2011 &copy; IP Monitoring System</p>

</div><!--Container-->

</div><!--Footer-->

</body>

</html>