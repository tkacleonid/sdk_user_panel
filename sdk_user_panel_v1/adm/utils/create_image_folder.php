<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	$folder_name = $_POST['folder_name'];
	$folder_parent = $_POST['folder_parent'];
	
	$folder_parent_short = "./../../pictures/images_short/".$folder_parent;
	$folder_parent_full = "./../../pictures/images_full/".$folder_parent;
	
	mkdir($folder_parent_short.$folder_name,0600);
	mkdir($folder_parent_full.$folder_name,0600);



?>