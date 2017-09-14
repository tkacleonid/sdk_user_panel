<?php
	//
	error_reporting(E_ALL & ~E_NOTICE);

	include_once("./utils.emails.php");
	
	$mes = ($_POST["mes"]);


	$file = fopen("close_from_program_history.txt","a");
	
	fwrite($file,$mes."\r\n");
	
	fclose($file);
	
	echo 1;

?>
