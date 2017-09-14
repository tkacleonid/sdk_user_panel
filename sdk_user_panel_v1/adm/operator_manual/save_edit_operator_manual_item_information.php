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
	


	
	$query= "update $tbl_operator_manual_items_ru set 
		key_operator_manual_item= '$key_operator_manual_item',
		name= '$name_operator_manual_item',
		ref_html_text= '$path_html_operator_manual_item',
		comment= '$comment_operator_manual_item',
		text= '$text_operator_manual_item',
		status='$status',
		use_html_text='$use_ref_html_operator_manual_item',
		id_admin_last_modified=$id_admin,
		date_last_modified=NOW()
		
		where id=$id_operator_manual_item
	";
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
	}
	
	echo "1";
	
	

?>