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
	$icon = $_POST["icon"];
	$visibility = $_POST["visibility"];
	$short_desc = $_POST["short_desc"];
	$long_desc =  $_POST["long_desc"];
	$id_admin = $_SESSION['id_user_adm'];
	
	
							
						
	$name = mysql_real_escape_string($name);					
	$directory = mysql_real_escape_string($directory);	
	$icon = mysql_real_escape_string($icon);	
	$visibility = mysql_real_escape_string($visibility);
	$short_desc = mysql_real_escape_string($short_desc);
	$long_desc =  mysql_real_escape_string($long_desc);
	
	$query = "select max(position) from $tbl_blocks_menu_ru";
	
	$res = @mysql_query($query);
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.");
	}
	
	$res = @mysql_fetch_array($res);
	$position = intval($res[0])+1;
	
	$query = "insert into $tbl_blocks_menu_ru values(
		NULL,
		'$name',
		'$short_desc',
		'$icon',
		'$visibility',
		'$directory',
		'$long_desc',
		$position,
		NOW(),
		NOW(),
		$id_admin
	)";
	
	$res = @mysql_query($query);
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.");
	}

	echo 1;
?>