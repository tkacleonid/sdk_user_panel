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
		exit("Возникла проблема при получении информации об пункте РЛЭ.");
	}
	
	$id = intval($_POST['id_rle_item']);
	
	$query = "select position,key_type_board from $tbl_rle_items where id = $id limit 1";
	
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
	$key_type_board = $res["key_type_board"];
	
	$query = "select position,id from $tbl_rle_items where position > $cur_pos AND key_type_board='$key_type_board' order by position ASC";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.");
	}
	
	if(!($res = mysql_fetch_array($res)))
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.");
	}
	
	$id_next = $res['id'];
	$pos_next = $res['position'];
	
	$query = "update $tbl_rle_items set position=$pos_next where id=$id AND key_type_board='$key_type_board';";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.");
	}
	
	$query = "update $tbl_rle_items set position=$cur_pos where id=$id_next AND key_type_board='$key_type_board';";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.");
	}
	
	echo "1";
?>