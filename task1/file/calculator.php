<?php
class Calculator {
    protected $S=array();
    protected $m;

    function setM($m){
       $this->m = $m;
    }
    function getM(){
       return $this->m;
    }
    function clearM(){
      $this->m = 0;
    }
    function pushSfromM(){
        $this->pushS($this->m);
    }
    function setMfromS() {   
        $this->setM($this->getS());  
    } 
    function  add_MfromS(){
         $this->m = $this->m + $this->getS();
    }
    function  sub_MfromS(){
         $this->m = $this->m - $this->getS();
    }
    function pushS($b){
        $this->S[] =$b;
    }
    function popS(){
       if( count($this->S)>0){
           return array_pop($this->S);  
        }else {
          return "Error";
        }
    }
    function getS(){
       if( count($this->S)>0){
            return end($this->S);
         }else {
          return "Error";
         }
    }
    function add(){
        $b=$this->popS();
        $c=$this->popS();
	$this->pushS($b+$c);
    }
    function sub(){
        $b=$this->popS();
        $c=$this->popS();
	$this->pushS($b-$c);
    }
     function mult(){
        $b=$this->popS();
        $c=$this->popS();
	$this->pushS($b*$c);
    }
    function div(){
        $b=$this->popS();
        if($b!=0){ 
           $c=$this->popS();
	   $this->pushS($c+$b);
        }
    }
}
?>
