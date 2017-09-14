<?php
	error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	include_once("../../config/config.php");
	
	if(empty($_SESSION['key_id']))
	{
		exit("Произошла ошибка авторизации пользователя. Попробуйте обновить страницу");
	}
	
	if(empty($_POST['hasp_id']))
	{
		exit("Произошла ошибка идентификации пользователя.");
	}
	
	$hasp_id = intval($_POST['hasp_id']);
	$company_name = mysql_real_escape_string($_POST['company_name']);
	$company_address = mysql_real_escape_string($_POST['company_address']);
	$company_email = mysql_real_escape_string($_POST['company_email']);
	$company_tel = mysql_real_escape_string($_POST['company_tel']);
	$company_comment = mysql_real_escape_string($_POST['company_comment']);

	$query = "select * from $tbl_hasp where id=$hasp_id";
	
	$res = mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных.");
	}
	
	$hasp = mysql_fetch_array($res);
	
	if(!$hasp)
	{
		exit("Ключ не обнаружен в базе данных.");
	}
	
	$id_company = $hasp['id_company'];
	$is_company = false;
	if($id_company != "")
	{
		$id_company = intval($id_company);
		
		$query = "select * from $tbl_company where id=$id_company";
	
		$res = mysql_query($query);
		
		if(!$res)
		{
			exit("Произошла ошибка при обращении к базе данных.");
		}
		
		$company = mysql_fetch_array($res);
		
		if($company)
		{
			$is_company = true;
		}
	}
	
	if(!$is_company)
	{
		$query = "insert into $tbl_company(
				name,
				address,
				email,
				tel,
				comment
			)
			
			VALUES(
				'$company_name',
				'$company_address',
				'$company_email',
				'$company_tel',
				'$company_comment'	
			)";
			
		if(!mysql_query($query))
		{
			exit("Произошла ошибка при обращении к базе данных.");
		}
		
		$query = "select MAX(id) from $tbl_company";
	
		$res = mysql_query($query);
		
		if(!$res)
		{
			exit("Произошла ошибка при обращении к базе данных.");
		}
		
		$company_max_id = mysql_fetch_array($res);
		
		if($company_max_id)
		{
			$company_id = $company_max_id[0];
			
			$query = "update $tbl_hasp SET id_company=$company_id where id=$hasp_id";
	
			$res = mysql_query($query);
			
			if(!$res)
			{
				exit("Произошла ошибка при обращении к базе данных.");
			}
		}
		else
		{
			exit("Произошла ошибка при обращении к базе данных.");
		}
	}
	else
	{
		$query = "update $tbl_company SET 
				name = '$company_name',
				address = '$company_address',
				email = '$company_email',
				tel = '$company_tel',
				comment = '$company_comment'
			
			where id=$id_company";
			
		if(!mysql_query($query))
		{
			exit("Произошла ошибка при обращении к базе данных.".mysql_error());
		}
	}
	
	echo "1";
?>