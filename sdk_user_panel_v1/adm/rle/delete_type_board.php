<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin = intval($_SESSION['id_user_adm']);
	
		$id_current_type_board = -1;
	
	if(!empty($_POST['id_current_type_board']))
	{
		$id_current_type_board = intval($_POST['id_current_type_board']);
	}
	
	if($id_current_type_board < 1)
	{
		$id_current_type_board = -1;
	}
	
	if($id_current_type_board == -1)
	{
		exit("Произошла ошибка при определении типа борта");
	}
		
	$query = "update $tbl_type_boards 
		SET
				status = '2'
		WHERE id=$id_current_type_board 
	";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
	}
	
	echo "1";

?>