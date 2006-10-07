<?php

set_time_limit(400);

// make sure output buffering is off before we start it
// this will ensure same effect whether or not ob is enabled already
while (ob_get_level()) {
   ob_end_flush();
}
// start output buffering
if (ob_get_length() === false) {
   ob_start();
flush();
ob_flush();

}


echo "<h2>TCP/IP UDP Connection</h2>\n";



$value=getservbyport('80', "tcp"); 
if(!$value==""){
$service_name = $value;
}
else {
die();
}



/* Get the port for the WWW service. */
$service_port = @getservbyname($service_name, 'tcp');

/* Get the IP address for the target host. */
$address = @gethostbyname('localhost');

/* Create a TCP/IP socket. */
$socket = @socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket < 0) {
   echo "socket_create() failed: reason: " . socket_strerror($socket) . "\n";
} else {
   echo "OK.\n";
}

echo "Attempting to connect to '$address' on port '$service_port'...";
$result = @socket_connect($socket, $address, $service_port);
if ($result < 0) {
   echo "socket_connect() failed.\nReason: ($result) " . socket_strerror($result) . "\n";
} else {
$in = "HEAD / HTTP/1.1\r\n";
$in .= "Host: www.example.com\r\n";
$in .= "Connection: Close\r\n\r\n";
$out = '';

echo "Sending HTTP HEAD request...";
@socket_write($socket, $in, strlen($in));
echo "OK.\n";

echo "Reading response:\n\n";
while ($out = @socket_read($socket, 2048)) {
   echo $out;
}

echo "Closing socket...";
@socket_close($socket);
echo "OK.\n\n";
   echo "OK.\n";

}


?> 