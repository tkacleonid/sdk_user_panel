<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	
	$content = $_POST["content"];						

 $file = fopen ("trend_18_ro_temp.html","w");
  $str = $content;
  
  $str = '<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">  <title>Руководство оператора программы Тренд-18</title></head><body style="">'.$str.'</body></html>';
$str = str_replace('\"','"',$str);
  if ( !$file )
  {
    echo("Ошибка открытия файла");
  }
  else
  {
    fputs ( $file,$str);
  }
  fclose ($file);
	


	echo 1;
?>
