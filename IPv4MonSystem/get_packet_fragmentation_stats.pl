#!/usr/bin/perl

use Net::SNMP;
use DBI;
use DBD::mysql;
use POSIX;

$community_string = $ARGV[0];
$probe_time = $ARGV[1];

$ipReasmrqds ='1.3.6.1.2.1.4.14.0';
$ipReasmOks ='1.3.6.1.2.1.4.15.0';
$ipReasmFails = '1.3.6.1.2.1.4.16.0';
$ipFragCreates = '1.3.6.1.2.1.4.19.0';
$flag = 0;
while(1){ 
undef(@host);
undef(@addresses);
$db = DBI->connect ("DBI:mysql:PG06","pg06","et2439") or die "Cannot connect to databse" ;
$sth = $db->prepare("SELECT ipaddress FROM host_table");
$sth->execute;
while(@host=$sth->fetchrow_array()){
push(@addresses,$host[0]);
}
$sth->finish;



foreach $host (@addresses){
($sess,$error)= Net::SNMP->session(
Hostname  => $host,
Community => $community_string,
Timeout => 1,
Translate =>0,
Version => 2); die "session error: $error" unless ($sess);

$res = $sess->get_request(-varbindlist=>[$ipReasmrqds,$ipReasmOks,$ipReasmFails,$ipFragCreates],);

if($res){
if($flag == 0){

$Ip_Reasmble_Receives1 = $res->{$ipReasmrqds};
$Ip_Reasmble_oks1 = $res->{$ipReasmOks};
$Ip_Reasmble_fails1 = $res->{$ipReasmFails};
$Ip_Tll_Frag_Created1 = $res->{$ipFragCreates};
$flag = 1;
}else{

$Ip_Reasmble_Receives2 = $res->{$ipReasmrqds};
$Ip_Reasmble_oks2 = $res->{$ipReasmOks};
$Ip_Reasmble_fails2 = $res->{$ipReasmFails};
$Ip_Tll_Frag_Created2 = $res->{$ipFragCreates};
if($Ip_Reasmble_Receives2 >= $Ip_Reasmble_Receives1 ){
$Ip_Reasmble_Receives2  =$Ip_Reasmble_Receives2 - $Ip_Reasmble_Receives1 ;
}else{
$Ip_Reasmble_Receives2  =$Ip_Reasmble_Receives2 - $Ip_Reasmble_Receives1 + 2^32;
}

if($Ip_Reasmble_oks2 >= $Ip_Reasmble_oks1){
$Ip_Reasmble_oks2 =$Ip_Reasmble_oks2 - $Ip_Reasmble_oks1;
}else{
$Ip_Reasmble_oks2 =$Ip_Reasmble_oks2 - $Ip_Reasmble_oks1 + 2^32;
}

if($Ip_Reasmble_fails2 >= $Ip_Reasmble_fails1){
$Ip_Reasmble_fails2 =$Ip_Reasmble_fails2 - $Ip_Reasmble_fails1;
}else{
$Ip_Reasmble_fails2 =$Ip_Reasmble_fails2 - $Ip_Reasmble_fails1 + 2^32;
}

if($Ip_Tll_Frag_Created2 >= $Ip_Tll_Frag_Created1){
$Ip_Tll_Frag_Created2 =$Ip_Tll_Frag_Created2 - $Ip_Tll_Frag_Created1;
}else{
$Ip_Tll_Frag_Created2 =$Ip_Tll_Frag_Created2 - $Ip_Tll_Frag_Created1 + 2^32;
}
$Ip_Reasmble_Receives1 = $res->{$ipReasmrqds};
$Ip_Reasmble_oks1 = $res->{$ipReasmOks};
$Ip_Reasmble_fails1 = $res->{$ipReasmFails};
$Ip_Tll_Frag_Created1 = $res->{$ipFragCreates};

$db->do('INSERT INTO packet_fragmentation_stats(`id` ,`ipaddress` ,`ip_frag_creates` ,`ip_reasmble_oks` ,`ip_reasmble_fails` ,`ip_reasmble_rqds` ,`date_time`) 
values(NULL,?,?,?,?,?,CURRENT_TIMESTAMP)',undef,$host,$Ip_Tll_Frag_Created2,$Ip_Reasmble_oks2,$Ip_Reasmble_fails2,$Ip_Reasmble_Receives2);
}
}
$sess->close();
}
$db->disconnect();
sleep($probe_time);
}