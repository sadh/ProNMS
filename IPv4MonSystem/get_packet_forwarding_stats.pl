#!/usr/bin/perl

use Net::SNMP;
use DBI;
use DBD::mysql;
use POSIX;

$community_string = $ARGV[0];
$probe_time = $ARGV[1];


$ipInReceives ='1.3.6.1.2.1.4.3.0';
$ipInDiscards ='1.3.6.1.2.1.4.8.0';
$ipHdrInErr ='1.3.6.1.2.1.4.4.0';
$ipInAddrErr ='1.3.6.1.2.1.4.5.0';
$ipUnknownProto = '1.3.6.1.2.1.4.7.0';
$flag = 0;
while(1){
undef(@host);
undef(@addresses);
$db = DBI->connect ("DBI:mysql:PG06","pg06","et2439") or die "Cannot connect to databse" ;
$sth = $db->prepare("SELECT ipaddress FROM host_table");
$sth->execute();
while(@host=$sth->fetchrow_array()){
push(@addresses,$host[0]);
}
$sth->finish();

foreach $host (@addresses){
($sess,$error)= Net::SNMP->session(
Hostname  => $host,
Community => $community_string,
Timeout => 1,
Translate =>0,
Version => 2); die "session error: $error" unless ($sess);



$res = $sess->get_request(-varbindlist=>[$ipInReceives,$ipInDiscards,$ipHdrInErr,$ipInAddrErr,$ipUnknownProto],);



if($res){
if($flag == 0){
$Ip_In_Receives1 = $res->{$ipInReceives};
$Ip_In_Discards1 = $res->{$ipInDiscards};
$Ip_Hd_Err1 = $res->{$ipHdrInErr};
$Ip_In_AddrErr1 = $res->{$ipInAddrErr};
$Ip_UnknownProto1 = $res->{$ipUnknownProto};
$flag = 1;
}else{

$Ip_In_Receives2 = $res->{$ipInReceives};
$Ip_In_Discards2 = $res->{$ipInDiscards};
$Ip_Hd_Err2 = $res->{$ipHdrInErr};
$Ip_In_AddrErr2 = $res->{$ipInAddrErr};
$Ip_UnknownProto2 = $res->{$ipUnknownProto};
if($Ip_In_Receives2 >= $Ip_In_Receives1){
$Ip_In_Receives2 =$Ip_In_Receives2 - $Ip_In_Receives1;
}else{
$Ip_In_Receives2 =$Ip_In_Receives2 - $Ip_In_Receives1 + 2^32;
}

if($Ip_In_Discards2 >= $Ip_In_Discards1){
$Ip_In_Discards2 =$Ip_In_Discards2 - $Ip_In_Discards1;
}else{
$Ip_In_Discards2 =$Ip_In_Discards2 - $Ip_In_Discards1 + 2^32;
}

if($Ip_Hd_Err2 >= $Ip_Hd_Err1){
$Ip_Hd_Err2 =$Ip_Hd_Err2 - $Ip_Hd_Err1;
}else{
$Ip_Hd_Err2 =$Ip_Hd_Err2 - $Ip_Hd_Err1 + 2^32;
}

if($Ip_In_AddrErr12 >= $Ip_In_AddrErr1){
$Ip_In_AddrErr12 =$Ip_In_AddrErr12 - $Ip_In_AddrErr1;
}else{
$Ip_In_AddrErr12 =$Ip_In_AddrErr12 - $Ip_In_AddrErr1 + 2^32;
}

if($Ip_UnknownProto2 >= $Ip_UnknownProto1){
$Ip_UnknownProto2 =$Ip_UnknownProto2 - $Ip_UnknownProto1;
}else{
$Ip_UnknownProto2 =$Ip_UnknownProto2 - $Ip_UnknownProto1 + 2^32;
}

$Ip_In_Receives1 = $res->{$ipInReceives};
$Ip_In_Discards1 = $res->{$ipInDiscards};
$Ip_Hd_Err1 = $res->{$ipHdrInErr};
$Ip_In_AddrErr1 = $res->{$ipInAddrErr};
$Ip_UnknownProto1 = $res->{$ipUnknownProto};

$db->do('INSERT INTO packet_forwarding_stats(`id` ,`ipaddress` ,`ip_in_receives` ,`ip_in_discards` ,`ipInUnknownProtos` ,`ipInAddrErrors` ,`ipInHdrErrors` ,`date_time`) 
VALUES(NULL,?,?,?,?,?,?,CURRENT_TIMESTAMP)',undef,$host,$Ip_In_Receives2,$Ip_In_Discards2,$Ip_Hd_Err2,$Ip_In_AddrErr2,$Ip_UnknownProto2) or die("SQL error..");
}


}
$sess->close();
}
$db->disconnect();
sleep($probe_time);

}


















