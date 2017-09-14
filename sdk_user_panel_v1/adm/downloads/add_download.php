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
	$name = mysql_real_escape_string($_POST["name"]);
	$short_description = mysql_real_escape_string($_POST["short_description"]);
	$long_description = mysql_real_escape_string($_POST["long_description"]);
	$status = mysql_real_escape_string($_POST["status"]);
	$path_icon = mysql_real_escape_string($_POST["path_icon"]);
	$path_download = mysql_real_escape_string($_POST["path_download"]);
	$comment = mysql_real_escape_string($_POST["comment"]);

	
	$query= "select max(position) from $tbl_downloads where id_group=$id_group_downloads";
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
	}
	
	$res= mysql_fetch_array($res);
	
	$position= 1;
	
	if(!$res)
	{
		$position= 1;
	}
	else
	{
		$position= intval($res[0]);
		$position++;
	}
	
	$query = "insert into $tbl_downloads(
			id_group,
			name,
			short_description,
			long_description,
			ref_download,
			icon_download,
			comment,
			date_add,
			id_admin_add,
			date_last_modified,
			id_admin_last_modified,
			status,
			position
		)
		
		VALUES(
			$id_group_downloads,
			'$name',
			'$short_description',
			'$long_description',
			'$path_download',
			'$path_icon',
			'$comment',
			NOW(),
			$id_admin,
			NOW(),
			$id_admin,
			'$status',
			$position
		)";
		
		if(!mysql_query($query))
		{
			exit("Произошла ошибка при добавлении загрузки в базу данных. ".mysql_error());
		}
		
		echo "1";
?>