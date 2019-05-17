<?php 
 //echo exec('whoami')."<br>";
 //echo get_current_user()."<br>";
 //echo $_SERVER['REMOTE_USER'];
$userinfo = posix_getpwuid(posix_getuid());
var_dump($userinfo);
echo fileowner("./file")."<br>";

echo filegroup("./file");

?>
