#!/usr/bin/perl

use POSIX;

$probe_time = $ARGV[0];
($sec_pre,$min_pre,$hour_pre,$mday_pre,$mon_pre,$year_pre,$wday_pre,$yday_pre,$isdst_pre) = localtime(time);
  
while(1){
($sec,$min,$hour,$mday,$mon,$year,$wday,$yday,$isdst) = localtime(time);

if(($hour > $hour_pre || $hour == 0) && (0 <$min && $min <= 2)){
`/usr/bin/perl -x  ./get_packet_forwarding_stats_hourly.pl`;
`/usr/bin/perl -x ./get_packet_fragmentation_stats_hourly.pl`;

if(($mday > $mday_pre || $mday == 0) && ($hour == 0)){
`/usr/bin/perl -x  ./get_packet_forwarding_stats_daily.pl`;
`/usr/bin/perl -x ./get_packet_fragmentation_stats_daily.pl`;
if(($mon > $mon_pre || $mon == 0) && ($mday == 0)){
`/usr/bin/perl -x  ./get_packet_forwarding_stats_monthly.pl`;
`/usr/bin/perl -x  ./get_packet_fragmentation_stats_monthly.pl`;
$mon_pre = $mon;
}
$mday_pre = $mday;
}
$hour_pre = $hour;
}
sleep($probe_time);
}