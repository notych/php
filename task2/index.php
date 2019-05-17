<?php
	include 'calculator.php';
    $calk = new Calculator;
    $calk->pushS(3);
    $calk->pushS(4);
    $calk->add();
    $html = $calk->getS()."<br>";
    $calk->setMfromS();
    $calk->pushS(13);
    $calk->pushS(14);
    $calk->add();
    $html .= $calk->getS()."<br>";
    $calk->add_MfromS();
    $html.=$calk->getM();
	include 'templates/index.php';
?>
