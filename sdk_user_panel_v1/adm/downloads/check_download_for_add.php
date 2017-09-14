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

	
	$str_error = "";

	
	if($str_error != "")
	{
		echo $str_error;
	}
	else
	{
		echo "1";
	}
?>