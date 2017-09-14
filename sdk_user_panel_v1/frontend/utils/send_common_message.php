<?php
	session_start();

	error_reporting(E_ALL & ~E_NOTICE);
	
	include_once("../../config/config.php");
include_once("../../adm/utils/utils.emails.php");
	
	$error = "";

	$name = $_POST["name"];
	$theme = $_POST["theme"];
	$email = $_POST["email"];
	$message = $_POST["message"];


	if(!isset($_SESSION['captcha_keystring']) || (isset($_SESSION['captcha_keystring']) && strtolower($_SESSION['captcha_keystring']) !== strtolower($_POST['keystring'])))
    {
      $error .= "Вы неверно ввели код с картинки<br>";
    }


if($error == "")
{
  
  
  	$to =  ('=?'."utf8".'?B?' . base64_encode("SDK").'?=') . "<tkacleonid@ya.ru>,";
	$from = " ".('=?'."utf8".'?B?' . base64_encode("$name").'?='). "<$email>";
  $copy = " ".('=?'."utf8".'?B?' . base64_encode("Служба поддержки сайта администрирования компании ЗАО Диагностика").'?='). "<support@sdk-8.com>";

	$subject = "$theme";
  /*
	$message = '
			<html>
				<head>
					<title>Birthday Reminders for August</title>
					<meta http-equiv="Content-type" content="text/html;charset=utf-8">
				</head>
				<body>
					<h3 style="text-align: justify;"><img style="display: block; margin-left: auto; margin-right: auto;" src="http://sdk.avia-diagnostics.com/styles/images/dia_logo.gif" alt="" width="175" height="73" /><span style="color: #0000ff;"><strong>Спасибо за регистрацию в портале администрирования компании ЗАО "Диагностика". После одобрения администратором вашей заявки, Вы сможете войти на сайт по вашему логину и паролю.</strong></span></h3>
			<p style="text-align: left;">&nbsp;</p>
			<table style="margin-left: auto; margin-right: auto;">
			<tbody>
			<tr>
			<td>
			<h3><strong>Ваш логин:</strong></h3>
			</td>
			<td>##login##</td>
			</tr>
			<tr>
			<td>
			<h3><strong>Ваш пароль:</strong></h3>
			</td>
			<td>##psw##</td>
			</tr>
			</tbody>
			</table>
			<p>&nbsp;</p>
				</body>
			</html>';

	$message = str_replace("##login##",$login,$message);
	$message = str_replace("##psw##",$psw,$message);

	*/
	$status_send_email = send_registration_informaion($to,$from,$copy,$subject,$message);
	
  
  
  
  
  
  
  $error = $status_send_email;
}
	echo $error;

unset($_SESSION['captcha_keystring']);
?>