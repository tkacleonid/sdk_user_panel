<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin = intval($_SESSION['id_user_adm']);
	
	$name_group_downloads = mysql_real_escape_string($_POST["name_group_downloads"]);
	$visibility_group_downloads = mysql_real_escape_string($_POST["visibility_group_downloads"]);
	$short_description_group_downloads = mysql_real_escape_string($_POST["short_description_group_downloads"]);
	$long_description_group_downloads = mysql_real_escape_string($_POST["long_description_group_downloads"]);
	
	$str_error = "";

	$query = "select count(*) from $tbl_group_downloads where name='$name_group_downloads'";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
	}
	
	$res = @mysql_fetch_array($res);
	
	$res = $res[0];
	
	if($res > 0)
	{
		$str_error .= "Группа загрузок с указанным именем уже существует<br>";
	}
	
	if($str_error != "")
	{
		echo $str_error;
	}
	else
	{
		echo "1";
	}
?>