<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin = intval($_SESSION['id_user_adm']);
	
	$id_group_downloads = intval($_POST["id_current_group_downloads"]);
	
	$name_group_downloads = mysql_real_escape_string($_POST["name_group_downloads"]);
	$visibility_group_downloads = mysql_real_escape_string($_POST["visibility_group_downloads"]);
	$short_description_group_downloads = mysql_real_escape_string($_POST["short_description_group_downloads"]);
	$long_description_group_downloads = mysql_real_escape_string($_POST["long_description_group_downloads"]);
		
	$query = "update $tbl_group_downloads 
		SET
				name = '$name_group_downloads',
				short_description = '$short_description_group_downloads',
				long_description = '$long_description_group_downloads',
				status = '$visibility_group_downloads',
				date_last_modified = NOW(),
				id_admin_last_modified = $id_admin
		WHERE id=$id_group_downloads 
	";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
	}
	
	echo "1";

?>