<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin = intval($_SESSION['id_user_adm']);
	
	
	
	$id_type_board = mysql_real_escape_string($_POST["id_type_board"]);
	$id_rle_item = mysql_real_escape_string($_POST["id_rle_item"]);
	$name_rle_item = mysql_real_escape_string($_POST["name_rle_item"]);
	$path_html_rle_item = mysql_real_escape_string($_POST["path_html_rle_item"]);
	$path_pdf_rle_item = mysql_real_escape_string($_POST["path_pdf_rle_item"]);
	$visibility_ref_pdf_rle_item = mysql_real_escape_string($_POST["visibility_ref_pdf_rle_item"]);
	$path_algorithm_rle_item = mysql_real_escape_string($_POST["path_algorithm_rle_item"]);
	$visibility_ref_algorithm_rle_item = mysql_real_escape_string($_POST["visibility_ref_algorithm_rle_item"]);
	$comment_rle_item = mysql_real_escape_string($_POST["comment_rle_item"]);
	$text_rle_item = mysql_real_escape_string($_POST["text_rle_item"]);
	$use_ref_html_rle_item = mysql_real_escape_string($_POST["use_ref_html_rle_item"]);
	$status = mysql_real_escape_string($_POST["status"]);

	
	$str_error = "";
	
	$query = "select count(*) from $tbl_rle_items where key_rle_item='$id_rle_item'";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
	}
	
	$res = @mysql_fetch_array($res);
	
	$res = $res[0];
	
	if($res > 0)
	{
		$str_error .= "Пункт РЛЭ с указанным идентификатором уже существует<br>";
	}
	
	$query = "select count(*) from $tbl_rle_items where name_rle_item='$name_rle_item'";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
	}
	
	$res = @mysql_fetch_array($res);
	
	$res = $res[0];
	
	if($res > 0)
	{
		$str_error .= "Пункт РЛЭ с указанным именем уже существует<br>";
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