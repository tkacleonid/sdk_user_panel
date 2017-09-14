<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin = intval($_SESSION['id_user_adm']);
	
	$id_type_board = intval($_POST["id_current_type_board"]);
	
	$key_type_board = mysql_real_escape_string($_POST["key_type_board"]);
	$name_type_board = mysql_real_escape_string($_POST["name_type_board"]);
	$visibility_type_board = mysql_real_escape_string($_POST["visibility_type_board"]);
	$short_description_type_board = mysql_real_escape_string($_POST["short_description_type_board"]);
	$long_description_type_board = mysql_real_escape_string($_POST["long_description_type_board"]);
	
	$str_error = "";
	
	$query = "select count(*) from $tbl_type_boards where key_type_board='$key_type_board' and id<>$id_type_board";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
	}
	
	$res = @mysql_fetch_array($res);
	
	$res = $res[0];
	
	if($res > 0)
	{
		$str_error .= "Тип борта с указанным идентификатором уже существует<br>";
	}
	
	$query = "select count(*) from $tbl_type_boards where name='$name_type_board' and id<>$id_type_board";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
	}
	
	$res = @mysql_fetch_array($res);
	
	$res = $res[0];
	
	if($res > 0)
	{
		$str_error .= "Тип борта с указанным именем уже существует<br>";
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