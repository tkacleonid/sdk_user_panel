<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$name = $_POST["name"];						
	$directory = $_POST["directory"];
	$status_debug= $_POST["status_debug"];
	$visibility = $_POST["visibility"];
	$short_desc = $_POST["short_desc"];
	$long_desc =  $_POST["long_desc"];
	$id_admin = intval($_SESSION['id_user_adm']);
	$status_visibility_without_authorized = $_POST["status_visibility_without_authorized"];
	
	
							
						
	$name = mysql_real_escape_string($name);					
	$directory = mysql_real_escape_string($directory);	
	$status_debug = mysql_real_escape_string($status_debug);	
	$visibility = mysql_real_escape_string($visibility);
	$short_desc = mysql_real_escape_string($short_desc);
	$long_desc =  mysql_real_escape_string($long_desc);
	$status_visibility_without_authorized = mysql_real_escape_string($status_visibility_without_authorized);
	
	$query = "select max(position) from $tbl_blocks_menu_frontend_ru";
	
	$res = @mysql_query($query);
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.");
	}
	
	$res = @mysql_fetch_array($res);
	$position = intval($res[0])+1;
	
	$query = "insert into $tbl_blocks_menu_frontend_ru(
			name,
			short_desc,
			large_desc,
			status,
			url_folder,
			position,
			date_add,
			id_admin_add,
			date_last_modified,
			id_admin_last_modified,
			status_debug,
            status_visibility_without_authorized
		) 
		
		values(
		'$name',
		'$short_desc',
		'$long_desc',
		'$visibility',
		'$directory',
		$position,
		NOW(),
		$id_admin,
		NOW(),
		$id_admin,
		'$status_debug',
        '$status_visibility_without_authorized'
	)";
	
	$res = @mysql_query($query);
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.".mysql_error());
	}

	echo 1;
?>