#!/usr/bin/perl
use DBI;
use DBD::mysql;
use POSIX;

 
$db = DBI->connect ("DBI:mysql:PG06","pg06","et2439") or die "Cannot connect to databse" ;
$sth = $db->prepare("SELECT ipaddress FROM host_table");
$sth->execute();
undef(@host);
undef(@addresses);
while(@host=$sth->fetchrow_array()){
push(@addresses,$host[0]);
}
$sth->finish();
foreach $host (@addresses){
$sth1 = $db->prepare_cached('SELECT date_time FROM packet_forwarding_stats_monthly WHERE ipaddress=? ORDER BY date_time DESC LIMIT 1');
$sth1->execute($host);
undef(@date_time);
@date_time = $sth1->fetchrow_array();
$sth1->finish();
$sth = $db->prepare_cached('SELECT sum(ip_in_receives),sum(ip_in_discards),sum(ipInUnknownProtos),sum(ipInAddrErrors),sum(ipInHdrErrors) FROM packet_forwarding_stats_monthly WHERE ipaddress=?');
$sth->execute($host);
undef(@values);
@values = $sth->fetchrow_array();
$sth->finish();
$db->do('INSERT INTO packet_forwarding_stats_yearly(`id` ,`ipaddress` ,`ip_in_receives` ,`ip_in_discards` ,`ipInUnknownProtos` ,`ipInAddrErrors` ,`ipInHdrErrors` ,`date_time`)
VALUES(NULL,?,?,?,?,?,?,?)',undef,$host,$values[0],$values[1],$values[2],$values[3],$values[4],$date_time[0]) or die("Database error");
}
$db->do('TRUNCATE TABLE packet_forwarding_stats_monthly');
$db->disconnect();
