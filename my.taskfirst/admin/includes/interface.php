<div id="taskfirst-container">
<?php 
    
		
    $name_array=array();
	
    while ($stat = $arStat->fetch())
    {
		$stat['link'] = urldecode($stat['link']);
		array_push($name_array, $stat);
    }
	//print_r($name_array);
	echo "<h2>".GetMessage("OUTPUT_TABLE_HEADER")."</h2>";
	printf("<pre>%s</pre>", print_r($name_array, true));
?>
</div>