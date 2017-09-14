<?php
	session_start();

	error_reporting(E_ALL & ~E_NOTICE);
	
	include_once("../../config/config.php");
	
	$login = mysql_real_escape_string($_POST['login']);
	$psw = mysql_real_escape_string($_POST['psw']);
	$error = "";
	$query = "SELECT * from $tbl_adm_accounts WHERE login = '$login'";
	$res = mysql_query($query);
	if(!$res){
		echo "Ошибка при попытке входа. Пожалуйста попробуйте войти позже";
		exit;
	}	
	if(!mysql_num_rows($res)){
		$error .= "Пользователь, с указанным логином не обнаружен<br>";
	}
	else
    {
      $query = "SELECT * from $tbl_adm_accounts WHERE psw = '$psw'";
      $res = mysql_query($query);
      if(!$res){
          echo "Ошибка при попытке входа. Пожалуйста попробуйте войти позже";
          exit;
      }	
      if(!mysql_num_rows($res)){
          $error .= "Вы ввели неверный пароль<br>";
      }
    }
	echo $error;

?>