<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	$data = $_POST["data"];
	
	$fp = fopen('page_preview_algorithm.html', 'w');
	
	if(fwrite($fp,$data))
	{
		echo "1";
	}
	else
	{
		echo "0";
	}	

	fclose($fp);
?>