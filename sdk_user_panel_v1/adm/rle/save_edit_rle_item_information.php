<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin= intval($_SESSION['id_user_adm']);
	$id_rle_item= intval($_POST['id_rle_item']);
	$id_type_board= intval($_POST["id_type_board"]);
	$key_rle_item= mysql_real_escape_string($_POST["key_rle_item"]);
	$name_rle_item= mysql_real_escape_string($_POST["name_rle_item"]);
	$path_html_rle_item= mysql_real_escape_string($_POST["path_html_rle_item"]);
	$path_pdf_rle_item= mysql_real_escape_string($_POST["path_pdf_rle_item"]);
	$visibility_ref_pdf_rle_item= mysql_real_escape_string($_POST["visibility_ref_pdf_rle_item"]);
	$path_algorithm_rle_item= mysql_real_escape_string($_POST["path_algorithm_rle_item"]);
	$visibility_ref_algorithm_rle_item= mysql_real_escape_string($_POST["visibility_ref_algorithm_rle_item"]);
	$comment_rle_item= mysql_real_escape_string($_POST["comment_rle_item"]);
	$text_rle_item= mysql_real_escape_string($_POST["text_rle_item"]);
	$use_ref_html_rle_item= mysql_real_escape_string($_POST["use_ref_html_rle_item"]);
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
	
	
	
	
	$query= "select * from $tbl_rle_items where id= $id_rle_item";
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
	}
	
	$res= mysql_fetch_array($res);
	
	$old_key_algorithm= $res['key_algorithm'];
	
	$query= "update $tbl_sdk_express_algorithms set key_rle='' where key_algorithm='$old_key_algorithm'";
		
	if(!mysql_query($query))
	{
		exit("Произошла ошибка при обрщении к базе данных. Попробуйте позднее.");
	}
	

	$query= "select * from $tbl_sdk_express_algorithms where key_algorithm= '$path_algorithm_rle_item'";
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
	}
	
	$res= mysql_fetch_array($res);
	
	$old_rle_item= $res['key_rle'];

	
	$query= "update $tbl_rle_items set key_algorithm='' where key_rle_item='$old_rle_item'";
		
	if(!mysql_query($query))
	{
		exit("Произошла ошибка при обрщении к базе данных. Попробуйте позднее.");
	}
	

	$query= "update $tbl_sdk_express_algorithms set key_rle='$key_rle_item' where key_algorithm='$path_algorithm_rle_item'";
		
	if(!mysql_query($query))
	{
		exit("Произошла ошибка при свзязывании алгоритма с алгоритмом. Попробуйте позднее.");
	}
	
	
	
	
	$query= "update $tbl_rle_items set 
		key_rle_item= '$key_rle_item',
		key_type_board= '$key_type_board',
		name_rle_item= '$name_rle_item',
		ref_web_page_text_rle_item= '$path_html_rle_item',
		ref_pdf_text_rle_item= '$path_pdf_rle_item',
		status_show_pdf= '$visibility_ref_pdf_rle_item',
		key_algorithm= '$path_algorithm_rle_item',
		status_show_algorithm= '$visibility_ref_algorithm_rle_item',
		comment= '$comment_algorith',
		text_rle_item= '$text_rle_item',
		status_use_web_page_rle_item= '$use_ref_html_rle_item' ,
		status= '$status'
		
		where id= $id_rle_item
	";
	
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
	}
	
	echo "1";
	
	

?>