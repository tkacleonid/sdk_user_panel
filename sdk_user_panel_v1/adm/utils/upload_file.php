<?php

	error_reporting(E_ALL & ~E_NOTICE);
	

	$allowedExts = array("gif", "jpeg", "jpg", "png","GIF","JPEG","JPG","PNG");
    $temp = explode(".", $_FILES["file_for_upload_get_files"]["name"]);
	$main_folder = $_POST['main_folder'];
    $extension = end($temp);

	echo move_uploaded_file($_FILES["file_for_upload_get_files"]["tmp_name"],"../../documents/general_adm/$main_folder".$_FILES["file_for_upload_get_files"]["name"]);
	
	
?>