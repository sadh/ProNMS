#!/bin/sh
network='194.47.155.128/25'
community_string='public'
/usr/bin/perl -x ./discovery.pl  $network $community_string 300&
/usr/bin/perl -x ./IPenInfo.pl $community_string 300&
/usr/bin/perl -x  ./get_packet_forwarding_stats.pl $community_string 300&
/usr/bin/perl -x ./get_packet_fragmentation_stats.pl $community_string 300&
/usr/bin/perl -x ./periodic_database_updater.pl 120&
exit 0