<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	function full_del_dir ($directory) 
	{ 
	  $dir = opendir($directory); 
	  while(($file = readdir($dir))) 
	  { 
		if ( is_file ($directory."/".$file)) 
		{ 
		  @unlink ($directory."/".$file); 
		} 
		else if ( is_dir ($directory."/".$file) && 
				 ($file != ".") && ($file != "..")) 
		{ 
		  if(!full_del_dir ($directory."/".$file))
		  {
			exit('Произошла ошибка при удалении элемента');
		  }
		} 
	  } 
	  closedir ($dir); 
	  return rmdir ($directory); 
	} 
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin = intval($_SESSION['id_user_adm']);
	
	if(empty($_POST['path_file']))
	{
		exit('Ошибка определения пути к элементу');
	}
	$path_file = $_POST['path_file'];
	
	if(is_dir($path_file))
	{
		if(!full_del_dir($path_file))
		{
			exit('Произошла ошибка при удалении элемента');
		}
		else
		{
			echo "1";
		}
	}
	else
	{
		if(!unlink($path_file))
		{
			exit('Произошла ошибка при удалении элемента');
		}
		else
		{
			echo "1";
		}
	}
	
	
	
?>