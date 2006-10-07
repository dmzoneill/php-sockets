<?php
set_time_limit(0);

// list ports service names

for($q=1;$q<65000;$q++){
$value=getservbyport($q, "tcp"); 
$value2=getservbyport($q, "udp");
if(!$value==""){
print "Port $q = $value TCP<br>";
}
if(!$value2==""){
print "Port $q = $value UDP<br>";
}
}


?> 