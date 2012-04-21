<?php

$fp = fopen("php://memory", 'r+');

fputs($fp, "hello, ");
fputs($fp, "world.\n");

rewind($fp);

print stream_get_contents($fp);
print "-----\n";
print stream_get_contents($fp);
print "-----\n";
rewind($fp);

fputs($fp, "this is an example\n");

print stream_get_contents($fp);

rewind($fp);

print stream_get_contents($fp);


?>
