<?php
include 'config.php';
include 'fileclass.php';
$a = new Fileclass(FILENAME);
$html = $a->printRows();
$html .= "<br>----------------<br>";
$a->delRowChar(5,5);
$a->delRowChar(4,5);
$a->delRow(8);
$html .= $a->printRowChar();
$a->savefileRows(FILENAME.'.1');
include 'templates/index.php';?>
