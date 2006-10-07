<?php
set_time_limit(0);
ob_start();
flush();

$socket = socket_create(AF_INET,SOCK_STREAM,SOL_TCP); // Create the Socket
$connection = socket_connect($socket,'irc.freenode.net',6667); // Connect to freenode
socket_write($socket,"USER RHAP RHAP RHAP :RHAP\r\n"); // Send the Username to freenode
socket_write($socket,"NICK MyFirstSocket897 \r\n"); // Change our nickname
socket_write($socket,"JOIN #feedage \r\n"); // Join the channel PHPFREAKS!!!
while($data = socket_read($socket,2046)) // read whatever IRC is telling us
{
echo $data;
} 

?>