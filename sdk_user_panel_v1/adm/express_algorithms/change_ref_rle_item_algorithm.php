<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin = intval($_SESSION['id_user_adm']);
	$id_algorithm = intval($_POST['id_algorithm']);
	$id_rle_item = intval($_POST['id_rle_item']);
	$key_rle_item = mysql_real_escape_string($_POST['key_rle_item']);
		

	$query = "select key_rle,key_algorithm from $tbl_sdk_express_algorithms where id = $id_algorithm";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
	}
	
	$res = mysql_fetch_array($res);
	
	$old_key_rle = $res['key_rle'];
	$key_algorithm = $res['key_algorithm'];
	
	$query = "select * from $tbl_rle_items where id = $id_rle_item";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
	}
	
	$res = mysql_fetch_array($res);
	
	$old_algorithm = $res['key_algorithm'];
	
	$query = "update $tbl_sdk_express_algorithms set 
	
		key_rle = ''
		
		where key_algorithm = '$old_algorithm'
	";
	
	if(!mysql_query($query))
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
	}

	
	$query = "update $tbl_rle_items set key_algorithm='' where key_rle_item='$old_key_rle '";
		
	if(!mysql_query($query))
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
	}
	
	$query = "update $tbl_rle_items set key_algorithm='$key_algorithm' where key_rle_item='$key_rle_item'";
		
	if(!mysql_query($query))
	{
		exit("Произошла ошибка при свзязывании алгоритма с пунктом РЛЭ. Попробуйте позднее.");
	}

	
	$query = "update $tbl_sdk_express_algorithms set 
	
		key_rle = '$key_rle_item'
		
		where id = $id_algorithm
	";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
	}
	
	echo "1";
		
		