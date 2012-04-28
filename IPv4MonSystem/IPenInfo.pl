#!/usr/bin/perl
use Net::SNMP;
use DBI;
use DBD::mysql;

$ipinfo_oid ='1.3.6.1.2.1.4.20';
$ipaddresstable ='1.3.6.1.2.1.4.20.1.1';
$community_string = $ARGV[0];
$probe_time = $ARGV[1];
while(1){
$db = DBI->connect ("DBI:mysql:PG06","pg06","et2439") 
		or die "Cannot connect to databse" ;
		
$sth = $db->prepare("SELECT ipaddress FROM host_table");
$sth->execute();
undef(@addresses);
while(@host=$sth->fetchrow_array()){
push(@addresses,$host[0]);
}
$sth->finish();
foreach $host (@addresses)
{
($sess,$error)= Net::SNMP->session(
Hostname  => $host,
Community => $community_string,
Timeout => 1,
Translate =>0,
Version => 2);
die "session error: $error" unless ($sess); 
if($sess){
$res = $sess->get_table(-baseoid => $ipinfo_oid,) or die $sess->error();
$iptable= $res->{$ipaddress};
foreach $key ($sess->oid_lex_sort(keys %$res)){
if($key =~ /1.3.6.1.2.1.4.20.1.1/){
push(@ip,$res->{$key});
}
if($key =~ /1.3.6.1.2.1.4.20.1.2/){
push(@index,$res->{$key});
}
if($key =~ /1.3.6.1.2.1.4.20.1.3/){
push(@nmask,$res->{$key});
}
if($key =~ /1.3.6.1.2.1.4.20.1.5/){
push(@reassm,$res->{$key});
}
}
}
$no_item = @ip;
$i=1;
$db->do('DELETE FROM host_ip_table WHERE ipaddress = ?',undef,$host );
for ($i;$i<=$no_item;$i++){
$addr =pop(@ip);
$if_index =pop(@index);
$netmask =pop(@nmask);
$reassm =pop(@reassm);
$db->do('INSERT INTO host_ip_table values(?,?,?,?,?)',undef,$host,$if_index,$addr,$netmask,$reassm);
}
$sess->close();
}
$db->disconnect();
sleep($probe_time);
}