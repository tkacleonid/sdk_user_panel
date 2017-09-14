<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin = intval($_SESSION['id_user_adm']);
	
	$login = mysql_real_escape_string($_POST["login"]);
	$name = mysql_real_escape_string($_POST["name"]);
	$last_name = mysql_real_escape_string($_POST["last_name"]);
	$patronym = mysql_real_escape_string($_POST["patronym"]);
	$company = mysql_real_escape_string($_POST["company"]);
	$job_title = mysql_real_escape_string($_POST["job_title"]);
	$tel = mysql_real_escape_string($_POST["tel"]);
	$email = mysql_real_escape_string($_POST["email"]);
	$desc = mysql_real_escape_string($_POST["desc"]);
	$image_profile = mysql_real_escape_string($_POST["image_profile"]);
	$old_psw = mysql_real_escape_string($_POST["old_psw"]);
	$new_psw = mysql_real_escape_string($_POST["new_psw"]);

	
	$str_error = "";
	
	$query = "select count(*) from $tbl_adm_accounts where login='$login' and id <> $id_admin";
	
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
	
	if($res[0] != 0)
	{
		$str_error = "Указанный логин уже используется<br>";
	}
	
	$query = "select count(*) from $tbl_adm_accounts where email='$email' and id <> $id_admin";
	
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
	
	if($res[0] != 0)
	{
		$str_error = "Указанный e-mail уже используется<br>";
	}
	
	
	$query = "select * from $tbl_adm_accounts where id=$id_admin";
	
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
	
	if($res["psw"] != $old_psw)
	{
		$str_error = "Вы неверно ввели текущий пароль<br>";
	}
	
	if($str_error != "")
	{
		echo $str_error;
	}
	else
	{
		$query = "update $tbl_adm_accounts set 
			login = '$login',
			name = '$name',
			last_name = '$last_name',
			patronym = '$patronym',
			company = '$company',
			job_title = '$job_title',
			tel = '$tel',
			email = '$email',
			description = '$desc',
			image_profile = '$image_profile',
			psw = '$new_psw'
			where id=$id_admin";
	
		$res = @mysql_query($query);
		
		if(!$res)
		{
			exit("Ошибка обращения к базе данных. Попробуйте позднее. ".mysql_error());
		}
		
		echo "1";
	}
	
	
	
?>