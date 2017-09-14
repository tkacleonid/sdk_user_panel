<?php
	
	error_reporting(E_ALL & ~E_NOTICE);
	
	function send_registration_informaion($email_to, $email_from, $email_copy, $subject, $message)
	{
		$to  = $email_to; 
		
		$subject = $subject;
		
		$headers  = "Content-type: text/html; charset=utf-8 \r\n";
		$headers .= "From: ".($email_from)."\r\n";
		$headers .= "BCC: ".($email_copy)."\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		
		return mail($to, $subject, $message, $headers);
		
	}



?>