<?php
include 'config.php';
include 'lib/NmySQL.php';
include 'lib/lib.php';

$t = new NmySQL(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$t->addFild("id")->addFild("book_title")->addFild("short_description")->addFild("price")->addTable("books")->setLimit("10")->prepSelect()->querySQL();
$html1 =$t->getSQL()."<br>"; 
$html1.=tabletohtml($t->getData());

$t->clear();
$t->addFild("book_title","1")->addFild("short_description","2")->addFild("price", "2")->addTable("books")->prepInsert()->querySQL();
$html2=$t->getSQL()."<br>";

$t->clear();
$t->addFild("id")->addFild("book_title")->addFild("short_description")->addFild("price")->addTable("books")->prepSelect()->querySQL();
$html3 = $t->getSQL()."<br>";
$html3.=tabletohtml($t->getData());

$t->clear();
$t->addFild("book_title","1")->addFild("short_description","44444442222")->addFild("price", "4442222")->addTable("books")->addWhere("id=29")->prepUpdate()->querySQL();
$html4 =$t->getSQL()."<br>";

$t->clear();
$t->addFild("id")->addFild("book_title")->addFild("short_description")->addFild("price")->addTable("books")->prepSelect()->querySQL();
$html5 = $t->getSQL()."<br>";
$html5.=tabletohtml($t->getData());

$t->clear();
$t->addTable("books")->addWhere("id=7")->prepDelete()->querySQL();
$html6 = $t->getSQL()."<br>";

$t->clear();
$t->addFild("id")->addFild("book_title")->addFild("short_description")->addFild("price")->addTable("books")->prepSelect()->querySQL();
$html7 =$t->getSQL()."<br>";
$html7.=tabletohtml($t->getData());

include 'templates/index.php';

?>
