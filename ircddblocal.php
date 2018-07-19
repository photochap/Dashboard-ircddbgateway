<?php
// enter exact path to your log files.
//If your ver Linux is a standard Debian type install then the following will probably work.
//Adjust to suit
$logPath='/var/log/opendv';

// enter your gateway's callsign here between the single quotes
$callsign='F4HWB';
$registerURL = 'http://f4hwb.dstargateway.fr/';
$starLogPath = $logPath . '/STARnet.log';
$linkLogPath = $logPath . '/Links.log';
$hdrLogPath = $logPath . '/Headers.log';
$gatewayConfigPath = '/etc/ircddbgateway';
//
// Setting only needed if DD-Mode is in use:
// Location of dhcpd.leases file, use the line that your system requires:
// 20130405 commented out next line
// $dhcpd_leases_file = "/var/dhcpd/dhcpd.leases";
// $dhcpd_leases_file = "/var/lib/dhcp3/dhcpd.leases";
// 20130405 commented out next line
// $ddmode_log = $logPath . '/DDMode.log';
?>
