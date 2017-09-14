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
	
	$query = "select position from $tbl_blocks_menu_ru where id = $id limit 1";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.".mysql_error());
	}
	
	if(!($res = mysql_fetch_array($res)))
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.".mysql_error());
	}
	
	$cur_pos = $res["position"];
	
	$query = "select position,id from $tbl_blocks_menu_ru where position < $cur_pos order by position DESC";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.".mysql_error());
	}
	
	if(!($res = mysql_fetch_array($res)))
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.".mysql_error());
	}
	
	$id_prev = $res['id'];
	$pos_prev = $res['position'];
	
	$query = "update $tbl_blocks_menu_ru set position=$pos_prev where id=$id;";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.".mysql_error());
	}
	
	$query = "update $tbl_blocks_menu_ru set position=$cur_pos where id=$id_prev;";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.".mysql_error());
	}
	
	echo "1";
?>