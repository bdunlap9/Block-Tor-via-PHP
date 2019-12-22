<?php
// https://check.torproject.org/cgi-bin/TorBulkExitList.py?ip=1.1.1.1

$tor_exit_nodes = "https://check.torproject.org/cgi-bin/TorBulkExitList.py?ip=1.1.1.1";
$ips = file_get_contents($tor_exit_nodes);
$tor_ips = "tor_ips.txt";
$handle = fopen($tor_ips, "w");
fwrite($handle, $ips);
fclose($handle);

$lines = file($tor_ips, FILE_IGNORE_NEW_LINES); 

if (in_array ($_SERVER['REMOTE_ADDR'], $lines)) {
   echo "You are using Tor! Now you will be redirected off site.";
   header("location: https://www.google.com/");
   exit();
}
?>
