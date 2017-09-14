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
	
	$query= "select max(position) from $tbl_sign_algorithms where key_type_board='$key_type_board'";
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
	}
	
	$res= mysql_fetch_array($res);
	
	$position= 1;
	
	if(!$res)
	{
		$position= 1;
	}
	else
	{
		$position= intval($res[0]);
		$position++;
	}
	
	
	
	$query= "insert into $tbl_sign_algorithms(
		name,
		description,
		comment,
		ref_web_page_text,
		status_use_web_page_text,
		ref_pdf_text,
		status_show_pdf_text,
		text_sign,
		status,
		position,
		admin_add,
		date_add,
		admin_last_modified,
		date_last_modified,
		key_type_board
		)
		
		values(
			'$name',
			'$description',
			'$comment',
			'$ref_web_page_text',
			'$status_use_web_page_text',
			'$ref_pdf_text',
			'$status_show_pdf_text',
			'$text_sign',
			'$status',
			$position,
			$id_admin,
			NOW(),
			$id_admin,
			NOW(),
			'$key_type_board'				
	)";
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.".mysql_error());
	}
	
	echo "1";
	
	

?>