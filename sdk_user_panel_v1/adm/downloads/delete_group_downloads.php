<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	if(empty($_POST['id_current_group_downloads']))
	{
		exit("Возникла проблема при получении информации о группе загрузок.");
	}
	
	$id = intval($_POST['id_current_group_downloads']);
	
	$query = "select position from $tbl_group_downloads where id = $id limit 1";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.");
	}
	
	if(!($res = mysql_fetch_array($res)))
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.");
	}
	
	$cur_pos = $res["position"];
	
	$query = "update $tbl_group_downloads SET position = position - 1 where position > $cur_pos";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.");
	}
	
	$query = "DELETE FROM $tbl_downloads where id_group=$id;";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.");
	}
	
	$query = "DELETE FROM $tbl_group_downloads where id=$id;";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.");
	}
	
	echo "1";
?>