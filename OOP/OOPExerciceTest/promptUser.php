<?php 

print "Type your message. Type '.' on a line by itself when you're done.\n";
$php_errormsg = "There is an error";

$fh = fopen('php://stdin','r') or die($php_errormsg);
$last_line = false;  $message = '';
while (! $last_line) {
    $next_line = fgets($fh,1024);
    if (".\n" == $next_line) {
        $last_line = true;
    } else {
        $message .= $next_line;
    }
}

print "\nYour message is:\n$message\n";