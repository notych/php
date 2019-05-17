<?php
include 'file_perms.php';
class Fileclass{
    protected $row;
    protected $file_name;
    function __construct($file_n){
        if(file_exists($file_n) && file_per_read($file_n)) {
			$this->file_name=$file_n; 
			if(file_per_read($file_n)) $this->row = file($file_n);
        } else echo "No file".$file_n;
    }
    function countRow(){
        if(!isset($this->row)) return false;
		return count($this->row);
    }
    function isRow($nrow){
        if(!isset($this->row)) return false;
		if(($nrow>0) && ($nrow<=count($this->row))) return true; 
    }
    function getRow($nrow){
        if(!isset($this->row)) return false;
		if($this->isRow($nrow)){ 
			return $this->row[$nrow-1];
		}
	} 
    function delRow($nrow){
        if(!isset($this->row)) return false;
		if($this->isRow($nrow)){ 
			unset($this->row[$nrow-1]);
		}
    } 
    function setRow($nrow,$str){
        if(!isset($this->row)) return false;
        if($this->isRow($nrow)){ 
			$this->row[$nrow-1]=$str;
        }
    } 
    function getRowChar($nrow,$nchar){
        if(!isset($this->row)) return false;
		if($this->isRow($nrow)){ 
        if($nchar<= strlen($this->row[$nrow-1])) 
            return $this->row[$nrow-1][$nchar-1];
		}
	} 
	function setRowChar($nrow,$nchar,$char){
        if(!isset($this->row)) return false;
	    if($this->isRow($nrow)) 
	        if($nchar<= strlen($this->row[$nrow-1]))  $this->row[$nrow-1][$nchar-1]=$char;
    } 
    function delRowChar($nrow,$nchar){
        if(!isset($this->row)) return false;
	    if($this->isRow($nrow)) 
	        if($nchar<= strlen($this->getRow($nrow))) 
                $this->setRow($nrow, substr($this->getRow($nrow),0,$nchar-1) . substr($this->getRow($nrow),$nchar));
    } 


    function printRows(){
        if(!isset($this->row)) return false;
        for($i=1;$i<$this->countRow();$i++)  $s .= $this->getRow($i)."<br>"; 
        return $s;
    }
    function printRowChar(){
       if(!isset($this->row)) return false;
	   for($i=1;$i<$this->countRow();$i++) {
         for($j=1;$j<=strlen($this->getRow($i));$j++) $s .= $this->getRowChar($i,$j);
         $s.="<br>";
         }
		return $s;
    }
    function savefileRows($fn){
        if(!isset($this->row)) return false;
         $fp = fopen($fn, 'wt');
         if(!$fp) return "No create file ".$fn;
         for($i=1;$i<$this->countRow();$i++)  fwrite($fp, $this->getRow($i));
         fclose($fp); 
    }
    function savefileChar($fn){
        if(!isset($this->row)) return false;
        $fp = fopen($fn, 'wt');
        if(!$fp) return "No create file ".$fn;
        for($i=1;$i<$this->countRow();$i++) {
             for($j=1;$j<=strlen($this->getRow($i));$j++) fwrite($fp,$this->getRowChar($i,$j));
        }
        fclose($fp); 
    }
    function __destruct(){
        $this->savefileRows( $this->file_name . '.bak');
    }        
}
?>

