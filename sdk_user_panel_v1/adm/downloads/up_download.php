<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	if(empty($_POST['id_download']))
	{
		exit("Возникла проблема при получении информации о загрузке");
	}
	
	$id = intval($_POST['id_download']);
	
	$query = "select position,id_group from $tbl_downloads where id = $id limit 1";
	
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
	$id_group = $res["id_group"];
	
	$query = "select position,id from $tbl_downloads where position < $cur_pos and id_group=$id_group  order by position DESC";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.");
	}
	
	if(!($res = mysql_fetch_array($res)))
	{
		exit("1");
	}
	
	$id_prev = $res['id'];
	$pos_prev = $res['position'];
	
	$query = "update $tbl_downloads set position=$pos_prev  where id=$id and id_group=$id_group;";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.");
	}
	
	$query = "update $tbl_downloads set position=$cur_pos where id=$id_prev and id_group=$id_group;";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.");
	}
	
	echo "1";
?>