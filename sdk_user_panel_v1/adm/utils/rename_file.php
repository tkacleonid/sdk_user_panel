<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin = intval($_SESSION['id_user_adm']);
	
	if(empty($_POST['path_file']))
	{
		exit('Ошибка определения пути к элементу');
	}
	
	if(empty($_POST['new_name']))
	{
		exit('Ошибка определения нового имени элемента');
	}
	
	$path_file = $_POST['path_file'];
	$new_name = $_POST['new_name'];
	$ext = $_POST['ext'];
	$path = $_POST['path'];
	
	if(!rename($path_file,$path.$new_name.$ext))
	{
		exit('Произошла ошибка при переименовании элемента');
	}
	else
	{
		echo "1";
	}


	
	
	
?>