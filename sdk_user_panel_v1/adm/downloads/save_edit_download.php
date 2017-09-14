<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin = intval($_SESSION['id_user_adm']);
	
	$id_group_downloads = intval($_POST["id_group_downloads"]);
	$id_download = intval($_POST["id_download"]);
	$name = mysql_real_escape_string($_POST["name"]);
	$short_description = mysql_real_escape_string($_POST["short_description"]);
	$long_description = mysql_real_escape_string($_POST["long_description"]);
	$status = mysql_real_escape_string($_POST["status"]);
	$path_icon = mysql_real_escape_string($_POST["path_icon"]);
	$path_download = mysql_real_escape_string($_POST["path_download"]);
	$comment = mysql_real_escape_string($_POST["comment"]);

	
	
	$query = "update $tbl_downloads SET 
			id_group=$id_group_downloads,
			name='$name',
			short_description='$short_description',
			long_description='$long_description',
			ref_download='$path_download',
			icon_download='$path_icon',
			comment='$comment',
			date_last_modified=NOW(),
			id_admin_last_modified=$id_admin,
			status='$status'
			
			where id=$id_download
		";
		
		if(!mysql_query($query))
		{
			exit("Произошла ошибка при сохранении загрузки в базе данных. ".mysql_error());
		}
		
		echo "1";
?>