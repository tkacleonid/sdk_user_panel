<?php
	error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	include_once("../../config/config.php");
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin = intval($_SESSION['id_user_adm']);
	
	$id_setting = intval($_POST['id']);
	$status_setting = mysql_real_escape_string($_POST['status']);
	
	$query = "update $tbl_common_checkbox_settings SET status='$status_setting', date_install=NOW() where id=$id_setting";
	
	if(!mysql_query($query))
	{
		exit("Произошла ошибка при изменении настройки.".mysql_error());
	}
	
	echo "1";
	
?>