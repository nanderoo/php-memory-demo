<?php
// read, write, seek

print "mem limit: ".ini_get('memory_limit')."\n";

$fp = fopen("php://memory", 'rw+');

fputs($fp, "hello,");

fputs($fp, " world.");

rewind($fp);

print "[".stream_get_contents($fp)."]\n";

print "[".stream_get_contents($fp)."]\n";

rewind($fp);

fputs($fp, "this is an example.");

print "[".stream_get_contents($fp)."]\n";

rewind($fp);
#fseek($fp, -1, SEEK_END);

print "[".stream_get_contents($fp)."]\n";

fclose($fp);

print "mem usage: ".round(memory_get_usage()/1048576,2)."M\n";

print "peak use : ".round(memory_get_peak_usage()/1048576,2)."M\n";
?>
