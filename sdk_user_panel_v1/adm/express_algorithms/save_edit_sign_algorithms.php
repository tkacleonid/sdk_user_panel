<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin= intval($_SESSION['id_user_adm']);
	
	$id_sign_algorithm= intval($_POST['id_sign_algorithm']);
	
	$id_type_board= mysql_real_escape_string($_POST["id_type_board"]);
	$name= mysql_real_escape_string($_POST["name"]);
	$description= mysql_real_escape_string($_POST["description"]);
	$ref_web_page_text= mysql_real_escape_string($_POST["ref_web_page_text"]);
	$ref_pdf_text= mysql_real_escape_string($_POST["ref_pdf_text"]);
	$status_show_pdf_text= mysql_real_escape_string($_POST["status_show_pdf_text"]);
	$comment= mysql_real_escape_string($_POST["comment"]);
	$text_sign= mysql_real_escape_string($_POST["text_sign"]);
	$status_use_web_page_text= mysql_real_escape_string($_POST["status_use_web_page_text"]);
	$status= mysql_real_escape_string($_POST["status"]);
		
	
	
	$query= "select key_type_board from $tbl_type_boards where id=$id_type_board";
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.".mysql_error());
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
	



	
	$query= "update $tbl_sign_algorithms SET 
		name ='$name',
		description = '$description',
		comment = '$comment',
		ref_web_page_text = '$ref_web_page_text',
		status_use_web_page_text = '$status_use_web_page_text',
		ref_pdf_text = '$ref_pdf_text',
		status_show_pdf_text = '$status_show_pdf_text',
		text_sign = '$text_sign',
		status = '$status',
		admin_last_modified=$id_admin,
		date_last_modified=NOW(),
		key_type_board='$key_type_board'
		
		
		where id=$id_sign_algorithm
	";
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.".mysql_error());
	}
	
	echo "1";
	
	

?>