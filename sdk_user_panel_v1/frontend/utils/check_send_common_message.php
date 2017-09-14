<?php
	session_start();

	error_reporting(E_ALL & ~E_NOTICE);
	
	include_once("../../config/config.php");
	
	$error = "";
/*
	if(!isset($_SESSION['captcha_keystring']) || (isset($_SESSION['captcha_keystring']) && strtolower($_SESSION['captcha_keystring']) !== strtolower($_POST['keystring'])))
    {
      $error .= "Вы неверно ввели код с картинки<br>";
    }
    */
	echo $error;

?>