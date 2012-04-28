<?php
require_once ('webroot.php');
if (!isset($_SESSION['username'])) {
    redirect_to('index.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>IP Monitoring System | Home</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui-1.8.15.custom.css"/>
<link  href="http://fonts.googleapis.com/css?family=Ubuntu:300,300italic,regular,italic,500,500italic,bold,bolditalic" rel="stylesheet" type="text/css" />
<link media="screen" rel="stylesheet" href="css/colorbox.css" />
<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</head>
<body>
<div class="header">
<div class="container">
<div class="nav">
<ul>
<li><a class="faq" href="#">FAQ</a></li>
<li><form action="useradmin.php"><input type="hidden" name="admin_flag" value="0"/><input type="submit" value="Useradministration"/></form></li>
<li><form action="logout.php"><input type="submit" value="Logout"/></form></li>
</ul>
</div>

<h1>IP Monitoring System | View Router Info</h1>

</div><!--Container-->

</div><!--Header-->

<div class="content">

<div class="container">

<div class="box">

<div class="help">

<h1 class="head">Search Suggestions</h1>

<ul>
<li>For searching an individual host e.g. 192.168.1.1/32 .</li>
<li>For entire network  e.g. 172.16.1.0/16 .</li>
</ul>

</div>

<h1 class="head">Quick Search</h1>

<p>Enter a IP:</p>
<form action="networkmonitor.php" method="post">
<p>
<input type="text" name="searchaddress" />
<input type="submit"  name="submit" value="Search" />
</p>
</form>
<div class="clear"></div>

</div>

<div class="DisplayIP">
<?php
if(isset($_POST["submit"])) {

$ip = strtok($_POST['searchaddress'],"/");
$netmask = strtok("/");
if($netmask != false){
$ip_stack = array();
if($netmask<=30) {//For more then one host.
$ip_long = ip2long($ip);
$ip_bin =decbin($ip_long);
$ip_bin_net=substr($ip_bin,0,$netmask);
$number_of_host = pow(2,(32-$netmask))-2;
$ip_bin = $ip_bin_net;
$ip_bin = str_pad($ip_bin,32,"0");
for($i=1;$i<=$number_of_host;$i++) {
$host = decbin($i);
$ip_bin =substr_replace($ip_bin,$host,32-strlen($host));
$ip_long = bindec($ip_bin);
$ip=long2ip($ip_long);
$host_info = get_host_info($ip);
$row = mysql_fetch_array($host_info);
if($row) {
array_push($ip_stack,$row);
}

}

$no_of_hosts = count($ip_stack);
if($no_of_hosts >= 1) {
echo "<div id=\"accordion\">";
for($i=1;$i<=$no_of_hosts;$i++) {
$host_info = array_pop($ip_stack);
echo "<h3><a href=\"#\">".$host_info['ipaddress']."</a></h3>";
echo "<div>";
echo "<p>";
echo "<table class=\"host_table\">";
echo "<tr><td><b>Hostname</b></td><td>".$host_info['hostname']."</td></tr>";
echo "<tr><td><b>System Information</b></td><td>";
echo $host_info['sys_description']."</td></tr>";
echo "<tr><td><b>System Uptime</b></td><td>".translate_sysuptime($host_info['sys_uptime'])."</td></tr>";
echo "<tr><td><b>Nomber Of interfaces<b/></td><td>";
echo $host_info['no_of_inf']."</td></tr>";
if($host_info['ip_forwarding']) {
echo "<tr><td>Packet Forwarding</td><td>Enabled</td></tr>";
}else {
echo "<tr><td>Packet Forwarding</td><td>Disabled</td></tr>";
}
$host_int_info = get_interface_info($host_info['ipaddress']);
$host_ip_info = get_interface_ipaddress($host_info['ipaddress']);
if($host_int_info) {
while($row = mysql_fetch_array($host_int_info)) {
echo "<tr><td><b>".$row['if_descr']."</b>:";
if($row['if_status']==1) {
echo "Up</td>";
}else {
echo "Down</td>";
}
if($host_ip_info) {
$row2 = mysql_fetch_array($host_ip_info);
echo "<td><table class=\"ip_table\">
<tr><td class=\"heading\" >IP:".$row2['address'].":</td>
<td class=\"heading\">Netmask:".$row2['netmask']."</td>
<td class=\"heading\">Reassmble".$row2['reassmble']."</td>
</tr></table></td></tr>";

}
}
}
echo "</table>";
echo "<a href='showgraph.php?address=".$host_info['ipaddress']."&recent=true&option=false'>Click Here to see graphs</a>";
echo "</p>";
echo "</div>";
}
echo "</div>";
}
}

else {//For single host.
$host_info = get_host_info($ip);
$row = mysql_fetch_array($host_info);
if($row) {
$host_info = $row;
echo "<div id=\"accordion\">";
echo "<h3><a href=\"#\">".$host_info['ipaddress']."</a></h3>";
echo "<div>";
echo "<p>";
echo "<table class=\"host_table\">";
echo "<tr><td><b>Hostname</b></td><td>".$host_info['hostname']."</td></tr>";
echo "<tr><td><b>System Information</b></td><td>";
echo $host_info['sys_description']."</td></tr>";
echo "<tr><td><b>System Uptime</b></td><td>".translate_sysuptime($host_info['sys_uptime'])."</td></tr>";
echo "<tr><td><b>Nomber Of interfaces<b/></td><td>";
echo $host_info['no_of_inf']."</td></tr>";
$host_int_info = get_interface_info($ip);
$host_ip_info = get_interface_ipaddress($ip);
if($host_int_info) {
while($row = mysql_fetch_array($host_int_info)) {
echo "<tr><td><b>".$row['if_descr']."</b>:";
if($row['if_status']==1) {
echo "Up</td>";
}else {
echo "Down</td>";
}
if($host_ip_info) {
$row2 = mysql_fetch_array($host_ip_info);
echo "<td><table class='ip_table'>
<tr><td class=\"heading\">IP:".$row2['address'].":</td>
<td class=\"heading\">Netmask:".$row2['netmask']."</td>
<td class=\"heading\">Reassmble".$row2['reassmble']."</td>
</tr></table></td></tr>";

}
}
}
echo "</table>";
echo "<a href='showgraph.php?address=".$host_info['ipaddress']."&recent=true&option=false'>Click Here to see graphs</a>";
echo "</p>";
echo "</div>";
echo "</div>";
}
}

}else{
    echo '<h2>Use xxx.xxx.xxx.xxx/xx formate for searching</h2>';
}
}
?>
</div>

</div><!--Container-->

</div><!--Content-->


<div class="footer">

<div class="container">

<p>2011 &copy; IP Monitoring System</p>

</div><!--Container-->

</div><!--Footer-->

</body>

</html>