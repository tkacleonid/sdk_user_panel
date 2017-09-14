<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin = intval($_SESSION['id_user_adm']);
	
	$key_type_board = mysql_real_escape_string($_POST["key_type_board"]);
	$name_type_board = mysql_real_escape_string($_POST["name_type_board"]);
	$visibility_type_board = mysql_real_escape_string($_POST["visibility_type_board"]);
	$short_description_type_board = mysql_real_escape_string($_POST["short_description_type_board"]);
	$long_description_type_board = mysql_real_escape_string($_POST["long_description_type_board"]);
	$path_pdf_algorithm = mysql_real_escape_string($_POST["path_pdf_algorithm"]);
	$visibility_file_pdf_algorithm = mysql_real_escape_string($_POST["visibility_file_pdf_algorithm"]);
	
	

	$query = "select max(position) from $tbl_type_boards";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
	}
	
	$res = mysql_fetch_array($res);
	
	$position = 1;
	
	if(!$res)
	{
		$position = 1;
	}
	else
	{
		$position = intval($res[0]);
		$position++;
	}
	
	
	$query = "insert into $tbl_type_boards(name,short_description,long_description,status,key_type_board,date_add,date_last_modified,id_admin_add,id_admin_modified,position,ref_pdf_algorithm,status_show_pdf_algorithm)
		values(
				'$name_type_board',
				'$short_description_type_board',
				'$long_description_type_board',
				'$visibility_type_board',
				'$key_type_board',
				NOW(),
				NOW(),
				$id_admin,
				$id_admin,
				$position,
				'$path_pdf_algorithm',
				'$visibility_file_pdf_algorithm'
	)";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.".mysql_error());
	}
	
	echo "1";

?>