<?php
include 'config.php';
include 'libs/Json.php';
include 'libs/IniFile.php';
include 'libs/Mysql.php';
include 'libs/Cookies.php';
include 'libs/Session.php';
include 'libs/function.php';


$json = new Json(JSON_FILE);
$a = get($json,"k1");
delete($json,"k2");
save($json,"k1",$a."j1");
$html1 = "Json:<br>".$a."<br>";


$inifile = new IniFile(INI_FILE);
$b =get($inifile,"rrrr");
delete($inifile,"ffff");
save($inifile,"rrrr",$b."2");
$html1.="IniFile:<br>".$b."<br>";


$cooki = new Cookies();
$c = get($cooki,"re");
delete($cooki,"ffyyyff");
save($cooki,"re",$c."5");
$html1 .= "Cookies:<br>".$c."<br>";

session_start();
$ses = new Session();
$s = get($ses,"sss");
delete($ses,"ffyyyff");
save($ses,"sss",$s."s5s");
$html1 .= "Session:<br>".$s."<br>";

$mysql = new MySQL(HOST,DB,USER,PASS,TABLE);
$m= get($mysql,"eee"); 
delete($mysql,"wer");
save($mysql,"eee",$m."sD");
$html1 .= "MySQL<br>".$m."<br>";

include 'templates/index.php';

?>
