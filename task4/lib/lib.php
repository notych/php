<?php
function tabletohtml($data)
{
	$html = "<table border=1><tr>";
	foreach($data[0] as $key => $value ) $html.="<th>".$key."</th>";
	$html.="</tr>";  
	foreach($data as $data1 ) 
    {  
		$html.="<tr>";
		foreach($data1 as $value) $html.="<td>".$value."</td>";
	    $html .="</tr>";
	}
	$html.="</table>";
	return $html;
}
?>
