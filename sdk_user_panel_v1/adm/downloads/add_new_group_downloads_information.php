<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin = intval($_SESSION['id_user_adm']);
	
	$name_group_downloads = mysql_real_escape_string($_POST["name_group_downloads"]);
	$visibility_group_downloads = mysql_real_escape_string($_POST["visibility_group_downloads"]);
	$short_description_group_downloads = mysql_real_escape_string($_POST["short_description_group_downloads"]);
	$long_description_group_downloads = mysql_real_escape_string($_POST["long_description_group_downloads"]);
	
	

	$query = "select max(position) from $tbl_group_downloads";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
	}
	
	$res = mysql_fetch_array($res);
	
	$position = 1;
	
	if(!$res)
	{
		$position = 1;
	}
	else
	{
		$position = intval($res[0]);
		$position++;
	}
	
	
	$query = "insert into $tbl_group_downloads(name,short_description,long_description,status,date_add,date_last_modified,id_admin_add,id_admin_last_modified,position)
		values(
				'$name_group_downloads',
				'$short_description_group_downloads',
				'$long_description_group_downloads',
				'$visibility_group_downloads',
				NOW(),
				NOW(),
				$id_admin,
				$id_admin,
				$position
	)";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.".mysql_error());
	}
	
	echo "1";

?>