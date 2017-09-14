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
		exit("Возникла проблема при получении информации об алгоритме");
	}
	
	$id = intval($_POST['id_algorithm']);
	
	$query = "select position,key_type_board from $tbl_sdk_express_algorithms where id = $id limit 1";
	
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
	
	$query = "select position,id from $tbl_sdk_express_algorithms where position < $cur_pos AND  key_type_board='$key_type_board' order by position DESC";
	
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
	
	$query = "update $tbl_sdk_express_algorithms set position=$pos_prev where id=$id AND  key_type_board='$key_type_board';";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.");
	}
	
	$query = "update $tbl_sdk_express_algorithms set position=$cur_pos where id=$id_prev AND  key_type_board='$key_type_board';";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.");
	}
	
	echo "1";
?>