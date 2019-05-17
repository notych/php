<?php
class Fileclass {
   protected $row;
   function __constructor1($name_file){
      $this->row = file($name_file);
      echo $name_file;
      //echo var_dump($this->row);
   }
   function getRow($n){
     return $this->row["$n"];    
   } 
}
?>

