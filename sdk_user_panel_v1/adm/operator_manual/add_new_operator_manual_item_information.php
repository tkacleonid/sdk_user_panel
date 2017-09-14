<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin= intval($_SESSION['id_user_adm']);
	

	$key_operator_manual_item= mysql_real_escape_string($_POST["key_operator_manual_item"]);
	$name_operator_manual_item= mysql_real_escape_string($_POST["name_operator_manual_item"]);
	$path_html_operator_manual_item= mysql_real_escape_string($_POST["path_html_operator_manual_item"]);
	$comment_operator_manual_item= mysql_real_escape_string($_POST["comment_operator_manual_item"]);
	$text_operator_manual_item= mysql_real_escape_string($_POST["text_operator_manual_item"]);
	$use_ref_html_operator_manual_item= mysql_real_escape_string($_POST["use_ref_html_operator_manual_item"]);
	$status= mysql_real_escape_string($_POST["status"]);
	

	$query= "select max(position) from $tbl_operator_manual_items_ru";
	
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
	

		
	$query= "insert into $tbl_operator_manual_items_ru(
			key_operator_manual_item,
			name,
			ref_html_text,
			comment,
			text,
			status,
			use_html_text,
			position,
			id_admin_add,
			date_add,
			id_admin_last_modified,
			date_last_modified
		)
		
		values(
				'$key_operator_manual_item',
				'$name_operator_manual_item',
				'$path_html_operator_manual_item',
				'$comment_operator_manual_item',
				'$text_operator_manual_item',
				'$status',
				'$use_ref_html_operator_manual_item',
				$position,
				$id_admin,
				NOW(),
				$id_admin,
				NOW()				
	)";
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.".mysql_error());
	}
	
	
	echo "1";
	
	

?>