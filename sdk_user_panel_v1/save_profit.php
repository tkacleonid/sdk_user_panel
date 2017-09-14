<?php


	$profit = $_GET['profit'];
	$tm = $_GET['time'];
	
	//echo "hello";
	
	$filename = "profit.txt";
	$data = "".$tm.";".$profit;

	file_put_contents( $filename , $data , FILE_APPEND );



?>