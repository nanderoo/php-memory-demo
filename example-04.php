<?php
// store in memory until it becomes scare

print "mem limit: ".ini_get("memory_limit")."\n";

#$membuffer = 10 * 1024 * 1024;
#$membuffer = 50 * 1024 * 1024;
#$membuffer = 100 * 1024 * 1024;
#$membuffer = 54 * 1024 * 1024;

#$fp = fopen("php://temp/maxmemory:$membuffer", "rw+");
$fp = fopen("php://temp/", "rw+");

/*
 Maximum amount of data to keep in memory before using a temporary file, in bytes. 
 Default = 2mb
*/

$bp = fopen("bacon-ipsum.txt", "r");
#$bp = fopen("bacon-ipsum-small.txt", "r");

print "peak use: ".round(memory_get_peak_usage()/1048576,2)."M\n";

fputs($fp, stream_get_contents($bp));

print "peak use: ".round(memory_get_peak_usage()/1048576,2)."M\n";

rewind($fp);

print "[".str_word_count(stream_get_contents($fp))."]\n";

fclose($fp);
fclose($bp);

print "mem usage: ".round(memory_get_usage()/1048576,2)."M\n";

print "peak use : ".round(memory_get_peak_usage()/1048576,2)."M\n";
?>
