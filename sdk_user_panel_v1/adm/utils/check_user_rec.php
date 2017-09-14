<?php
	session_start();

	error_reporting(E_ALL & ~E_NOTICE);
	
	include_once("../../config/config.php");
	
	$email = mysql_real_escape_string($_POST['email']);
	$error = "";
	
	$query = "SELECT * from $tbl_adm_accounts WHERE email = '$email'";
	$res = mysql_query($query);
	if(!$res){
		echo "0";
		exit;
	}	
	if(!mysql_num_rows($res)){
		$error .= "Пользователь с таким e-mail не обнаружен<br>";
	}

	if(!isset($_SESSION['captcha_keystring']) || (isset($_SESSION['captcha_keystring']) && strtolower($_SESSION['captcha_keystring']) !== strtolower($_POST['keystring'])))
    {
      $error .= "Вы неверно ввели код с картинки<br>";
    }
	echo $error;

unset($_SESSION['captcha_keystring']);
?>