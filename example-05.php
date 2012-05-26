<?php
// multiples memory handles

print "mem limit: ".ini_get("memory_limit")."\n";

$membuffer = 10 * 1024 * 1024;
#$membuffer = 50 * 1024 * 1024;
#$membuffer = 100 * 1024 * 1024;
#$membuffer = 54 * 1024 * 1024;

$fp1 = fopen("php://temp/maxmemory:$membuffer", "rw+");
$fp2 = fopen("php://temp/maxmemory:$membuffer", "rw+");
$fp3 = fopen("php://temp/maxmemory:$membuffer", "rw+");

$bp1 = fopen("bacon-ipsum.txt", "r");
$bp2 = fopen("bacon-ipsum.txt", "r");
$bp3 = fopen("bacon-ipsum.txt", "r");

print "peak use after fopen: ".round(memory_get_peak_usage()/1048576,2)."M\n";

stream_copy_to_stream($bp1,$fp1);
stream_copy_to_stream($bp2,$fp2);
stream_copy_to_stream($bp3,$fp3);

print "peak use after fputs: ".round(memory_get_peak_usage()/1048576,2)."M\n";

rewind($fp1);
rewind($fp2);
rewind($fp3);

print "[".str_word_count(stream_get_contents($fp1))."]\n";
print "peak use 1: ".round(memory_get_peak_usage()/1048576,2)."M\n";
print "[".str_word_count(stream_get_contents($fp2))."]\n";
print "peak use 2: ".round(memory_get_peak_usage()/1048576,2)."M\n";
print "[".str_word_count(stream_get_contents($fp3))."]\n";
print "peak use 3: ".round(memory_get_peak_usage()/1048576,2)."M\n";

fclose($fp1);
fclose($fp2);
fclose($fp3);
fclose($bp1);
fclose($bp2);
fclose($bp3);

print "current mem usage: ".round(memory_get_usage()/1048576,2)."M\n";

print "peak use : ".round(memory_get_peak_usage()/1048576,2)."M\n";
?>
