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

    
    $query= "select max(position) from $tbl_sdk_express_algorithms where key_type_board='$key_type_board'";
	
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
	
	
	
	
	$query= "insert into $tbl_sdk_express_algorithms(
		key_algorithm,
		key_type_board,
		name_algorithm,
		ref_web_page_text_algorithm,
		ref_pdf_text_algorithm,
		status_show_pdf,
		key_rle,
		status_show_rle,
		comment,
		text_algorithm,
		status_use_web_page_algorithm,
		admin_add,
		admin_last_modified,
		date_add,
		date_last_modified,
		position,
		status)
		
		values(
				'$id_algorithm',
				'$key_type_board',
				'$name_algorithm',
				'$path_html_algorithm',
				'$path_pdf_algorithm',
				'$visibility_ref_pdf_algorithm',
				'$path_rle_algorithm',
				'$visibility_ref_rle_algorithm',
				'$comment_algorithm',
				'$text_algorithm',
				'$use_ref_html_algorithm',
				$id_admin,
				$id_admin,
				NOW(),
				NOW(),
				$position,
				'$status'				
	)";
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.".mysql_error());
	}
	
	if($path_rle_algorithm != "")
	{
		$query= "select * from $tbl_rle_items where key_rle_item= '$path_rle_algorithm'";
	
		$res= mysql_query($query);
	
		if(!$res)
		{
			exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.".mysql_error());
		}
	
		$res= mysql_fetch_array($res);
	
		$old_algorithm= $res['key_algorithm'];
		$key_rle_item= $res["key_rle_item"];
	
		
		$query= "update $tbl_sdk_express_algorithms set key_rle='' where key_algorithm='$old_algorithm'";
		
		if(!mysql_query($query))
		{
			exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
		}
		
		
		$query= "update $tbl_rle_items set key_algorithm='$id_algorithm' where key_rle_item='$path_rle_algorithm'";
		
		if(!mysql_query($query))
		{
			exit("Произошла ошибка при свзязывании алгоритма с пунктом РЛЭ. Попробуйте позднее.".mysql_error());
		}
	}
	
	echo "1";
	
	

?>