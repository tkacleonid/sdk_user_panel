<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin = intval($_SESSION['id_user_adm']);
	
	$id = intval($_POST['id']);

	$status = mysql_real_escape_string($_POST["status"]);
	$send_email = $_POST["send_email"];

	
	$str_error = "";
	
	if($status != "0")
	{
		$query = "select count(*) from $tbl_adm_accounts where status='0' and id <> $id";
	
		$res = @mysql_query($query);
		
		if(!$res)
		{
			exit("Ошибка обращения к базе данных. Попробуйте позднее.");
		}
		
		$res = @mysql_fetch_array($res);
		
		if(!$res)
		{
			exit("Ошибка обращения к базе данных. Попробуйте позднее.");
		}
		
		if($res[0] == 0)
		{
			$str_error = "В системе должен существовать хотя-бы один пользователь с полными правами администратора<br>";
		}
	}
	

	if($str_error != "")
	{
		echo $str_error;
	}
	else
	{
		$query = "update $tbl_adm_accounts set 
			status = '$status'
			where id=$id";
	
		$res = @mysql_query($query);
		
		if(!$res)
		{
			exit("Ошибка обращения к базе данных. Попробуйте позднее. ");
		}
		
		
		if($send_email == "1")
		{
			
		}
		
		echo "1";
		
		
	}
	
	
	
?>