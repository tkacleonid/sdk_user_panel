<?php
	//
	error_reporting(E_ALL & ~E_NOTICE);

	include_once("./utils.emails.php");
	
	$str_error = ($_POST["str_error"]);


	$to =  ('=?'."utf8".'?B?' . base64_encode("TREND-18").'?=') . "<tkacleonid@ya.ru>,";
	$from = " ".('=?'."utf8".'?B?' . base64_encode("TREND-18").'?='). "<support@sdk-8.com>";
	$copy = " ".('=?'."utf8".'?B?' . base64_encode("TREND-18").'?='). "<l.tkachenko@sdk-8.com>";

	$subject = "TREND-18. ERROR!";
	
	$message = '
			<html>
				<head>
					<title>TREND-18</title>
					<meta http-equiv="Content-type" content="text/html;charset=utf-8">
				</head>
				<body>'.
					htmlentities($str_error)
				.'</body>
			</html>';

	$message = str_replace("##error##",htmlentities($str_error),$message);


	
	$status_send_email = send_registration_informaion($to,$from,$copy,$subject,$message);
	
	echo $status_send_email;


	
	

?>
