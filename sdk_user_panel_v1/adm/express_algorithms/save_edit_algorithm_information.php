<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin= intval($_SESSION['id_user_adm']);
	$id_algorithm= intval($_POST['id_algorithm']);
	$id_type_board= intval($_POST["id_type_board"]);
	$key_algorithm= mysql_real_escape_string($_POST["key_algorithm"]);
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
	
	
	$query= "select key_type_board from $tbl_type_boards where id=$id_type_board";
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
	}
	
	$res= mysql_fetch_array($res);
	
	
	if(!$res)
	{
		exit("Произошла ошибка при идентификации типа борта");
	}
	else
	{
		$key_type_board= $res['key_type_board'];

	}
	
	$query= "select key_rle from $tbl_sdk_express_algorithms where id= $id_algorithm";
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
	}
	
	$res= mysql_fetch_array($res);
	
	$old_key_rle= $res['key_rle'];
	
	$query= "update $tbl_rle_items set key_algorithm='' where key_rle_item='$old_key_rle'";
		
	if(!mysql_query($query))
	{
		exit("Произошла ошибка при обрщении к базе данных. Попробуйте позднее.");
	}
	
	
	$query= "select * from $tbl_rle_items where key_rle_item= '$path_rle_algorithm'";
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
	}
	
	$res= mysql_fetch_array($res);
	
	$old_algorithm= $res['key_algorithm'];
	
	$query= "update $tbl_sdk_express_algorithms set key_rle='' where key_algorithm='$old_algorithm'";
		
	if(!mysql_query($query))
	{
		exit("Произошла ошибка при обрщении к базе данных. Попробуйте позднее.");
	}
	
	
	$query= "update $tbl_rle_items set key_algorithm='$key_algorithm' where key_rle_item='$path_rle_algorithm'";
		
	if(!mysql_query($query))
	{
		exit("Произошла ошибка при свзязывании алгоритма с пунктом РЛЭ. Попробуйте позднее.");
	}
	
	$query= "update $tbl_sdk_express_algorithms set 
		key_algorithm= '$key_algorithm',
		key_type_board= '$key_type_board',
		name_algorithm= '$name_algorithm',
		ref_web_page_text_algorithm= '$path_html_algorithm',
		ref_pdf_text_algorithm= '$path_pdf_algorithm',
		status_show_pdf= '$visibility_ref_pdf_algorithm',
		key_rle= '$path_rle_algorithm',
		status_show_rle= '$visibility_ref_rle_algorithm',
		comment= '$comment_algorith',
		text_algorithm= '$text_algorithm',
		status_use_web_page_algorithm= '$use_ref_html_algorithm' ,
		status= '$status'
		
		where id= $id_algorithm
	";
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
	}
	
	echo "1";
	
	

?>