<?php
include 'libs/GoogleSearch.php';

if(isset($_GET['request'])){
	$search = new GoogleSearch();
    $search->SearchRequest($_GET['request']);
    $html = $search->Parse();
}
include 'templates/index.tmpl.php';
?>
