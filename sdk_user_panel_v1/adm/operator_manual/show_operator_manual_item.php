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
		exit("Возникла проблема при получении информации о пункте руководства оператора.");
	}
	
	$id = intval($_POST['id_operator_manual_item']);
	
	
	$query = "update $tbl_operator_manual_items_ru set status='1' where id=$id;";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позже.");
	}
	
	echo "1";
?>