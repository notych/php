<?php

function file_per_read($file){
   if(!file_exists($file)) return false; 
   $fu = fileowner($file);
   $fg = filegroup($file);
   $userinfo = posix_getpwuid(posix_getuid());
   $p = fileperms($file);
   //echo  "Not permissins ". $file."fu=".$fu.",fg=".$fg.", ". var_dump($userinfo).", per=".decoct($p);
  
   if ($fu==$userinfo["uid"]) {
       if(($p & 0600)==0600) {
           return true;
        } else {
            return false;
        } 
   } else if ( $fg==$userinfo["gid"]){
              if (($p & 060)==060) {
                 return true;     
              } else {
                 return false;  
              }
           } else if (($p & 06) == 06) {
                     return true;
                   } else { 
                       return false; 
                    }
}

function file_per_write($file){
   if(!file_exists($file)) return false; 
   $fu = fileowner($file);
   $fg = filegroup($file);
   $userinfo = posix_getpwuid(posix_getuid());
   $p = fileperms($file);
   // echo  "Not permissins ". $file."fu=".$fu.",fg=".$fg.", ". var_dump($userinfo).", per=".decoct($p);
  
   if  ($fu==$userinfo["uid"]) {
       if ( ($p & 0400)==0400 ) {
           return true;
        } else {
            return false;
        } 
   } else if ( $fg==$userinfo["gid"]){
              if (($p & 040)==040) {
                 return true;     
              } else {
                 return false;  
              }
           } else if (($p & 04) == 04  ) {
                     return true;
                   } else {
                       return false; 
                    }
}

?>

