<?php
    include 'config.php';
    include 'function.php';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       $rez = my_uploadfile();
    } else 
    if ($_SERVER['REQUEST_METHOD'] === 'GET') 
          if(isset($_GET["filedel"])) $rez = del_file();   
            
    $tab_file = viewdir();

    include 'templates/index.php';
?>
