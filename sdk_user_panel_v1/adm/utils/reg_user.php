<?php
	//
	error_reporting(E_ALL & ~E_NOTICE);
	
	include_once("../../config/config.php");
	include_once("./utils.emails.php");
	
	$login = mysql_real_escape_string($_POST["login"]);
	$psw = mysql_real_escape_string($_POST["psw"]);
	$last_name = mysql_real_escape_string($_POST["last_name"]);
	$name = mysql_real_escape_string($_POST["name"]);
	$patronym = mysql_real_escape_string($_POST["patronym"]);
	$job_title = mysql_real_escape_string($_POST["job_title"]);
	$company = mysql_real_escape_string($_POST["company"]);
	$email = mysql_real_escape_string($_POST["email"]);
	$tel = mysql_real_escape_string($_POST["tel"]);
	
	$query = "insert into $tbl_adm_accounts VALUES(NULL,'$login','$psw','0','$name','$last_name','$patronym','$company','$job_title','$tel',' ','$email',NOW(),'',NULL,NULL)";

if(!@mysql_query($query))
{
	die("Произошла ошибка при регистрации. Пожалуйста, попробуйте позже!");
}
	

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

	
	$status_send_email = send_registration_informaion($to,$from,$copy,$subject,$message);
	
	echo $status_send_email;

?>