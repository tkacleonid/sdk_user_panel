<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	if(empty($_POST['id']))
	{
		exit("Возникла проблема при получении информации о блоке меню.");
	}
	
	$id = intval($_POST['id']);
	
	$name = $_POST["name"];						
	$directory = $_POST["directory"];
	$status_debug = $_POST["status_debug"];
	$visibility = $_POST["visibility"];
	$short_desc = $_POST["short_desc"];
	$long_desc =  $_POST["long_desc"];
	$id_admin = intval($_SESSION['id_user_adm']);
	$status_visibility_without_authorized =  $_POST["status_visibility_without_authorized"];
	
							
						
	$name = mysql_real_escape_string($name);					
	$directory = mysql_real_escape_string($directory);	
	$status_debug = mysql_real_escape_string($status_debug);	
	$visibility = mysql_real_escape_string($visibility);
	$short_desc = mysql_real_escape_string($short_desc);
	$long_desc =  mysql_real_escape_string($long_desc);
	$status_visibility_without_authorized =  mysql_real_escape_string($status_visibility_without_authorized);
	
	$query = "select max(position) from $tbl_blocks_menu_ru";
	
	$res = @mysql_query($query);
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.");
	}
	
	$res = @mysql_fetch_array($res);
	$position = intval($res[0])+1;
	
	$query = "update $tbl_blocks_menu_frontend_ru SET 
		name = '$name',
		short_desc = '$short_desc',
		status_debug = '$status_debug',
		status = '$visibility',
		url_folder = '$directory',
		large_desc = '$long_desc',
		date_last_modified = NOW(),
		id_admin_last_modified = $id_admin,
        status_visibility_without_authorized='$status_visibility_without_authorized'
		
		where id=$id
	";
	
	$res = @mysql_query($query);
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.".mysql_error());
	}

	echo 1;
?>