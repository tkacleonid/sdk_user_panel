<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	if(empty($_POST['id_rle_item']))
	{
		exit("Возникла проблема при получении информации о пункте РЛЭ.");
	}
	
	$id = intval($_POST['id_rle_item']);
	
	$query = "select position from $tbl_rle_items where id = $id limit 1";
	
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
	
	$query = "update $tbl_rle_items SET position = position - 1 where position > $cur_pos";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.");
	}
	
	
	$query = "select * from $tbl_rle_items where id = $id";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
	}
	
	$res = mysql_fetch_array($res);
	
	$old_key_algorithm = $res['key_algorithm'];
	
	$query = "update $tbl_sdk_express_algorithms set key_rle='' where key_algorithm='$old_key_algorithm'";
		
	if(!mysql_query($query))
	{
		exit("Произошла ошибка при обрщении к базе данных. Попробуйте позднее.");
	}
	
	
	$query = "DELETE FROM $tbl_rle_items where id=$id;";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.");
	}
	
	echo "1";
?>