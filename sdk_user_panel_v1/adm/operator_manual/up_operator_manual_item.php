<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	if(empty($_POST['id_operator_manual_item']))
	{
		exit("Возникла проблема при получении информации о пункте руководства оператора");
	}
	
	$id = intval($_POST['id_operator_manual_item']);
	
	$query = "select position from $tbl_operator_manual_items_ru where id = $id limit 1";
	
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
	
	$query = "select position,id from $tbl_operator_manual_items_ru where position < $cur_pos order by position DESC";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.");
	}
	
	if(!($res = mysql_fetch_array($res)))
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.");
	}
	
	$id_prev = $res['id'];
	$pos_prev = $res['position'];
	
	$query = "update $tbl_operator_manual_items_ru set position=$pos_prev where id=$id;";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.");
	}
	
	$query = "update $tbl_operator_manual_items_ru set position=$cur_pos where id=$id_prev;";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.");
	}
	
	echo "1";
?>