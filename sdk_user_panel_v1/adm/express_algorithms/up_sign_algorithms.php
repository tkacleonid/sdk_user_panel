<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	if(empty($_POST['id_sign_algorithm']))
	{
		exit("Возникла проблема при получении информации о модуле условных обозначений");
	}
	
	$id = intval($_POST['id_sign_algorithm']);
	
	$query = "select * from $tbl_sign_algorithms where id = $id limit 1";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.");
	}
	
	if(!($res = mysql_fetch_array($res)))
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.");
	}
	
	$key_type_board = mysql_real_escape_string($res["key_type_board"]);
	
	
	
	
	$query = "select position from $tbl_sign_algorithms where id = $id limit 1";
	
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
	
	$query = "select position,id from $tbl_sign_algorithms where position < $cur_pos  and key_type_board='$key_type_board' order by position DESC";
	
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
	
	$query = "update $tbl_sign_algorithms set position=$pos_prev where id=$id  and key_type_board='$key_type_board';";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.");
	}
	
	$query = "update $tbl_sign_algorithms set position=$cur_pos where id=$id_prev  and key_type_board='$key_type_board';";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.");
	}
	
	echo "1";
?>