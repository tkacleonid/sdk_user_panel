<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin= intval($_SESSION['id_user_adm']);
	
	
	
	$id_type_board= mysql_real_escape_string($_POST["id_type_board"]);
	$id_algorithm= mysql_real_escape_string($_POST["id_algorithm"]);
	$name_algorithm= mysql_real_escape_string($_POST["name_algorithm"]);
	$path_html_algorithm= mysql_real_escape_string($_POST["path_html_algorithm"]);
	$path_pdf_algorithm= mysql_real_escape_string($_POST["path_pdf_algorithm"]);
	$visibility_ref_pdf_algorithm= mysql_real_escape_string($_POST["visibility_ref_pdf_algorithm"]);
	$path_rle_algorithm= mysql_real_escape_string($_POST["path_rle_algorithm"]);
	$visibility_ref_rle_algorithm= mysql_real_escape_string($_POST["visibility_ref_rle_algorithm"]);
	$comment_algorithm= mysql_real_escape_string($_POST["comment_algorithm"]);
	$text_algorithm= mysql_real_escape_string($_POST["text_algorithm"]);
	$use_ref_html_algorithm= mysql_real_escape_string($_POST["use_ref_html_algorithm"]);
	$status= mysql_real_escape_string($_POST["status"]);

	
	$str_error= "";
	
	$query= "select count(*) from $tbl_sdk_express_algorithms where key_algorithm='$id_algorithm'";
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
	}
	
	$res= @mysql_fetch_array($res);
	
	$res= $res[0];
	
	if($res > 0)
	{
		$str_error .= "Алгоритм с указанным идентификатором уже существует<br>";
	}
	
	$query= "select count(*) from $tbl_sdk_express_algorithms where name_algorithm='$name_algorithm'";
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
	}
	
	$res= @mysql_fetch_array($res);
	
	$res= $res[0];
	
	if($res > 0)
	{
		$str_error .= "Алгоритм с указанным именем уже существует<br>";
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