<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin= intval($_SESSION['id_user_adm']);
	
	
	$id_operator_manual_item= intval($_POST["id_operator_manual_item"]);
	
	
	$key_operator_manual_item= mysql_real_escape_string($_POST["key_operator_manual_item"]);
	$name_operator_manual_item= mysql_real_escape_string($_POST["name_operator_manual_item"]);
	$path_html_operator_manual_item= mysql_real_escape_string($_POST["path_html_operator_manual_item"]);
	$comment_operator_manual_item= mysql_real_escape_string($_POST["comment_operator_manual_item"]);
	$text_operator_manual_item= mysql_real_escape_string($_POST["text_operator_manual_item"]);
	$use_ref_html_operator_manual_item= mysql_real_escape_string($_POST["use_ref_html_operator_manual_item"]);
	$status= mysql_real_escape_string($_POST["status"]);

	
	$str_error= "";
	
	$query= "select count(*) from $tbl_operator_manual_items_ru where key_operator_manual_item='$key_operator_manual_item' and id<>$id_operator_manual_item";
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
	}
	
	$res= @mysql_fetch_array($res);
	
	$res= $res[0];
	
	if($res > 0)
	{
		$str_error .= "Пункт руководства пользователя с указанным идентификатором уже существует<br>";
	}
	
	$query= "select count(*) from $tbl_operator_manual_items_ru where name='$name_operator_manual_item' and id<>$id_operator_manual_item";
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
	}
	
	$res= @mysql_fetch_array($res);
	
	$res= $res[0];
	
	if($res > 0)
	{
		$str_error .= "Пункт руководства пользователя с указанным именем с указанным именем уже существует<br>";
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