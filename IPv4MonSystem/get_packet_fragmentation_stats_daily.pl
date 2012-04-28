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
$sth1 = $db->prepare_cached('SELECT date_time FROM packet_fragmentation_stats_daily WHERE ipaddress=? ORDER BY date_time DESC LIMIT 1');
$sth1->execute($host);
undef(@date_time);
@date_time = $sth1->fetchrow_array();
$sth1->finish();
$sth = $db->prepare_cached('SELECT sum(ip_frag_creates),sum(ip_reasmble_oks),sum(ip_reasmble_fails),sum(ip_reasmble_rqds) FROM packet_fragmentation_stats_daily WHERE ipaddress=?');
$sth->execute($host);
undef(@values);
@values = $sth->fetchrow_array();
$sth->finish();
$db->do('INSERT INTO packet_fragmentation_stats_monthly(`id` ,`ipaddress` ,`ip_frag_creates` ,`ip_reasmble_oks` ,`ip_reasmble_fails` ,`ip_reasmble_rqds` ,`date_time`)
VALUES(NULL,?,?,?,?,?,?)',undef,$host,$values[0],$values[1],$values[2],$values[3],$date_time[0]) or die("Database error");
}
$db->do('TRUNCATE TABLE packet_fragmentation_stats_daily');
$db->disconnect();
