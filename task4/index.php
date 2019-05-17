<?php
include 'config.php';
include 'lib/NmySQL.php';
include 'lib/lib.php';
$t = new NmySQL(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$t->addFild("id");
$t->addFild("book_title");
$t->addFild("short_description");
$t->addFild("price");
$t->addTable("books");
$t->setLimit("10");
$html1= $t->prepSelect().'<br>';
$t->querySQL();
$html1.=tabletohtml($t->getData());

$t->clear();
$t->addFild("book_title","1");
$t->addFild("short_description","2");
$t->addFild("price", "2");
$t->addTable("books");
$html2=$t->prepInsert()."<br>";
$t->querySQL();

$t->clear();
$t->addFild("id");
$t->addFild("book_title");
$t->addFild("short_description");
$t->addFild("price");
$t->addTable("books");
$html3=$t->prepSelect();
$t->querySQL();
$html3.=tabletohtml($t->getData());

$t->clear();
$t->addFild("book_title","1");
$t->addFild("short_description","44444442222");
$t->addFild("price", "4442222");
$t->addTable("books");
$t->addWhere("id=29");
$html4=$t->prepUpdate()."<br>";
$t->querySQL();

$t->clear();
$t->addFild("id");
$t->addFild("book_title");
$t->addFild("short_description");
$t->addFild("price");
$t->addTable("books");
$html5=$t->prepSelect();
$t->querySQL();
$html5.=tabletohtml($t->getData());

$t->clear();
$t->addTable("books");
$t->addWhere("id=7");
$html6=$t->prepDelete()."<br>";
$t->querySQL();

$t->clear();
$t->addFild("id");
$t->addFild("book_title");
$t->addFild("short_description");
$t->addFild("price");
$t->addTable("books");
$html7=$t->prepSelect();
$t->querySQL();
$html7.=tabletohtml($t->getData());

include 'templates/index.php';

?>
