<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	$folder_name = $_POST['folder_name'];
	$folder_parent = $_POST['folder_parent'];
	
	$folder_parent = "./../../documents/general_adm/".$folder_parent;
	
	mkdir($folder_parent.$folder_name,0600);




?>