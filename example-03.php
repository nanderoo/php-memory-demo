<?php
// store somewhere besides in memory

print "mem limit: ".ini_get("memory_limit")."\n";

$fp = fopen("php://temp", "rw+");

$bp = fopen("bacon-ipsum.txt", "r");
#$bp = fopen("bacon-ipsum-small.txt", "r");

#print "peak use : ".round(memory_get_peak_usage()/1048576,2)."M\n";

fputs($fp, stream_get_contents($bp));

/*
while (!feof($bp)) {
  fputs($fp, fread($bp, 8192));
}
*/

rewind($fp);

#print "peak use : ".round(memory_get_peak_usage()/1048576,2)."M\n";

print "[".str_word_count(stream_get_contents($fp))."]\n";

fclose($fp);
fclose($bp);

print "mem usage: ".round(memory_get_usage()/1048576,2)."M\n";

print "peak use : ".round(memory_get_peak_usage()/1048576,2)."M\n";
?>
