#!/usr/bin/perl
use DBI;
use DBD::mysql;
require('conf.pl'); 
$db = DBI->connect("DBI:mysql",$username,$password) or die("Cannot connect to databse") ;

$db->do('CREATE DATABASE IF NOT EXISTS ProNMS') or die("Cannot create the databse") ;

$db->do('USE ProNMS');

$db->do('CREATE TABLE IF NOT EXISTS `host_table` (
  `ipaddress` varchar(15) NOT NULL,
  `hostname` varchar(50) NOT NULL,
  `sys_description` text NOT NULL,
  `sys_uptime` bigint(10) unsigned NOT NULL,
  `no_of_inf` int(2) unsigned NOT NULL,
  `ip_forwarding` int(11) NOT NULL,
  `community_string` varchar(15) NOT NULL,
  PRIMARY KEY (`ipaddress`)
)');
$db->do('CREATE TABLE IF NOT EXISTS `host_int_info` (
  `ifindex` int(2) NOT NULL,
  `ipaddress` varchar(15) NOT NULL,
  `if_descr` text NOT NULL,
  `if_status` int(1) NOT NULL
)');
$db->do('CREATE TABLE IF NOT EXISTS `host_ip_table` (
  `ipaddress` varchar(15) NOT NULL,
  `ifindex` int(2) NOT NULL,
  `address` varchar(15) NOT NULL,
  `netmask` varchar(15) NOT NULL,
  `reassmble` int(10) NOT NULL
)');
$db->do('CREATE TABLE IF NOT EXISTS `packet_forwarding_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ipaddress` varchar(15) NOT NULL,
  `ip_in_receives` int(11) NOT NULL,
  `ip_in_discards` int(11) NOT NULL,
  `ipInUnknownProtos` int(11) NOT NULL,
  `ipInAddrErrors` int(11) NOT NULL,
  `ipInHdrErrors` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)');
$db->do('CREATE TABLE IF NOT EXISTS `packet_forwarding_stats_daily` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ipaddress` varchar(15) NOT NULL,
  `ip_in_receives` int(11) NOT NULL,
  `ip_in_discards` int(11) NOT NULL,
  `ipInUnknownProtos` int(11) NOT NULL,
  `ipInAddrErrors` int(11) NOT NULL,
  `ipinHdrErrors` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)');
$db->do('CREATE TABLE IF NOT EXISTS `packet_forwarding_stats_monthly` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ipaddress` varchar(15) NOT NULL,
  `ip_in_receives` int(11) NOT NULL,
  `ip_in_discards` int(11) NOT NULL,
  `ipInUnknownProtos` int(11) NOT NULL,
  `ipInAddrErrors` int(11) NOT NULL,
  `ipinHdrErrors` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)');
$db->do('CREATE TABLE IF NOT EXISTS `packet_forwarding_stats_yearly` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ipaddress` varchar(15) NOT NULL,
  `ip_in_receives` int(11) NOT NULL,
  `ip_in_discards` int(11) NOT NULL,
  `ipInUnknownProtos` int(11) NOT NULL,
  `ipInAddrErrors` int(11) NOT NULL,
  `ipInHdrErrors` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)');
$db->do('ICREATE TABLE IF NOT EXISTS `packet_fragmentation_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ipaddress` varchar(15) NOT NULL,
  `ip_frag_creates` int(11) NOT NULL,
  `ip_reasmble_oks` int(11) NOT NULL,
  `ip_reasmble_fails` int(11) NOT NULL,
  `ip_reasmble_rqds` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)');
$db->do('CREATE TABLE IF NOT EXISTS `packet_fragmentation_stats_daily` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ipaddress` varchar(15) NOT NULL,
  `ip_frag_creates` int(11) NOT NULL,
  `ip_reasmble_oks` int(11) NOT NULL,
  `ip_reasmble_fails` int(11) NOT NULL,
  `ip_reasmble_rqds` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)');
$db->do('CREATE TABLE IF NOT EXISTS `packet_fragmentation_stats_daily` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ipaddress` varchar(15) NOT NULL,
  `ip_frag_creates` int(11) NOT NULL,
  `ip_reasmble_oks` int(11) NOT NULL,
  `ip_reasmble_fails` int(11) NOT NULL,
  `ip_reasmble_rqds` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)');

$db->do('CREATE TABLE IF NOT EXISTS `packet_fragmentation_stats_daily` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ipaddress` varchar(15) NOT NULL,
  `ip_frag_creates` int(11) NOT NULL,
  `ip_reasmble_oks` int(11) NOT NULL,
  `ip_reasmble_fails` int(11) NOT NULL,
  `ip_reasmble_rqds` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)');

$db->do('CREATE TABLE IF NOT EXISTS `packet_fragmentation_stats_yearly` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ipaddress` varchar(15) NOT NULL,
  `ip_frag_creates` int(11) NOT NULL,
  `ip_reasmble_oks` int(11) NOT NULL,
  `ip_reasmble_fails` int(11) NOT NULL,
  `ip_reasmble_rqds` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)');

$db->do('CREATE TABLE IF NOT EXISTS `packet_fragmentation_stats_monthly` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ipaddress` varchar(15) NOT NULL,
  `ip_frag_creates` int(11) NOT NULL,
  `ip_reasmble_oks` int(11) NOT NULL,
  `ip_reasmble_fails` int(11) NOT NULL,
  `ip_reasmble_rqds` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)');

$db->do('CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
)');
$db->do('INSERT INTO `users` (`name`, `password`, `level`) VALUES (md5(`admin`), md5(`admin`), 1)');
$db->disconnect();
