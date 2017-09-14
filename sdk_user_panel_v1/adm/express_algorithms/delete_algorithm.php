<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	if(empty($_POST['id_algorithm']))
	{
		exit("Возникла проблема при получении информации об алгоритме.");
	}
	
	$id = intval($_POST['id_algorithm']);
	
	$query = "select position from $tbl_sdk_express_algorithms where id = $id limit 1";
	
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
	
	$query = "update $tbl_sdk_express_algorithms SET position = position - 1 where position > $cur_pos";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.");
	}
	
	$query = "select key_rle from $tbl_sdk_express_algorithms where id = $id";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
	}
	
	$res = mysql_fetch_array($res);
	
	$old_key_rle = $res['key_rle'];
	
	$query = "update $tbl_rle_items set key_algorithm='' where key_rle_item='$old_key_rle '";
		
	if(!mysql_query($query))
	{
		exit("Произошла ошибка при обрщении к базе данных. Попробуйте позднее.");
	}
	
	
	$query = "DELETE FROM $tbl_sdk_express_algorithms where id=$id;";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.");
	}
	
	echo "1";
?>