#!/usr/bin/perl
use Net::IP;
use Net::Ping;
use Net::SNMP;
use DBI;
use DBD::mysql;
 
$sysName ='1.3.6.1.2.1.1.5.0';
$sysDescr ='1.3.6.1.2.1.1.1.0';
$sysUp='1.3.6.1.2.1.1.3.0';
$ifNumber = '1.3.6.1.2.1.2.1.0';
$ifDescr ='1.3.6.1.2.1.2.2.1.2.';
$ifType ='1.3.6.1.2.1.2.2.1.3.';
$ifStatus ='1.3.6.1.2.1.2.2.1.8.';
$ipv4enablestatus = '1.3.6.1.2.1.4.28.1.3';
$ipv4forwarding = '1.3.6.1.2.1.4.1.0';

$ipaddress = $ARGV[0];
$CommStr = $ARGV[1];
$probe_time = $ARGV[2];

while(1){
$ip = new Net::IP($ipaddress) or die "\nAddress not valid";
$p = new Net::Ping("udp",1) or die "\n Ping failed";
$db = DBI->connect ("DBI:mysql:PG06","pg06","et2439") 
		or die "Cannot connect to databse" ;
undef(@addrlist);
while($ip){
	if($p->ping($ip->ip())){
		push (@addrlist,$ip->ip());
		}
	$ip++;
	}
foreach $address (@addrlist){
($sess,$error)= Net::SNMP->session(
Hostname  => $address,
Community => $CommStr,
Timeout => 1,
Translate =>0,
Version => 2);
die "session error: $error" unless ($sess);

if($sess){
$res = $sess->get_request(-varbindlist=>[$sysName,$sysDescr,$sysUp,$ifNumber,$ipv4forwarding],);
if($res){
$SysName = $res->{$sysName};
$Descr = $res->{$sysDescr};
$UpTime = $res->{$sysUp};
$IfNo = $res->{$ifNumber};
$isForwarding = $res->{$ipv4forwarding};


$db->do('INSERT INTO host_table (ipaddress,hostname,sys_description,sys_uptime,no_of_inf,ip_forwarding,community_string) 
		VALUES(?,?,?,?,?,?,?) ON DUPLICATE KEY UPDATE hostname=VALUES(hostname),sys_description=VALUES(sys_description),sys_uptime=VALUES(sys_uptime),
		no_of_inf=VALUES(no_of_inf),ip_forwarding=VALUES(ip_forwarding),community_string=VALUES(community_string)',undef,$address,$SysName,$Descr,$UpTime,$IfNo,$isForwarding,$CommStr);

$db->do('DELETE FROM host_int_info WHERE ipaddress=?',undef,$address);


for($i=1;$i<=$IfNo;$i++){
$ifDescr = $ifDescr . "$i";
$ifType = $ifType . "$i";
$ifStatus = $ifStatus . "$i";
$ram = $sess->get_request(-varbindlist=>[$ifDescr,$ifType,$ifStatus],);
$if_Descr = $ram->{$ifDescr};
$Type = $ram->{$ifType};
$Status = $ram->{$ifStatus};
$db->do('INSERT INTO host_int_info(ifindex,ipaddress,if_descr,if_status) VALUES(?,?,?,?)',undef,$i,$address,$if_Descr,$Status);
chop ($ifDescr);
chop ($ifType);
chop ($ifStatus);
}
}
}   
}
$sess->close();
$db->disconnect();
sleep($probe_time)
}
