<?php
	//
	error_reporting(E_ALL & ~E_NOTICE);
	
	include_once("../../config/config.php");
	include_once("./utils.emails.php");	

	$email = mysql_real_escape_string($_POST["email"]);
	
	$query = "select * from $tbl_adm_accounts  where email='$email' limit 1";

	$res = @mysql_query($query);


	if(!$res)
	{
		die("Произошла ошибка при восстановлении пароля. Пожалуйста, попробуйте позже!");
	}
	
	$res = mysql_fetch_array($res);

	echo $res["email"];
      
	$name = $res["name"];
    $last_name = $res["last_name"];
    $login = $res["login"];
    $psw = $res["psw"];

	$to =  ('=?'."utf8".'?B?' . base64_encode("$name $last_name").'?=') . "<$email>,";
	$from = " ".('=?'."utf8".'?B?' . base64_encode("Служба поддержки сайта администрирования компании ЗАО Диагностика").'?='). "<support@avia-diagnostics.com>";
	$copy = " ".('=?'."utf8".'?B?' . base64_encode("Служба поддержки сайта администрирования компании ЗАО Диагностика").'?='). "<tkacleonid@ya.ru>";

	$subject = "Регистрация нового пользователя";
	
	$message = '
			<html>
				<head>
					<title>Birthday Reminders for August</title>
					<meta http-equiv="Content-type" content="text/html;charset=utf-8">
				</head>
				<body>
					<h3 style="text-align: justify;"><img style="display: block; margin-left: auto; margin-right: auto;" src="http://sdk.avia-diagnostics.com/styles/images/dia_logo.gif" alt="" width="175" height="73" /><span style="color: #0000ff;"><strong>Вы запросили восстановление пароля к панели администрирования ЗАО Диагностика. Ниже представлены ваш логин и пароль.</strong></span></h3>
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

	
	$status_send_email = send_registration_informaion($to,$from,$copy,$subject,$message);
	
	echo $status_send_email;

?>