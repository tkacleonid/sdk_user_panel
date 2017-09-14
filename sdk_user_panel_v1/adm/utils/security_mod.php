<?php
/**
	*@package	SDK
	*@copyright	Copyright (C) 2014 Leonid Y. Tkachenko. All rights reserved.
*/

	//Level of Analysis errors
	error_reporting(E_ALL & ~E_NOTICE);
	
	//If user is not authorized then it's authorized
	if(!isset($_SERVER['PHP_AUTH_USER']) || (!empty($_GET['logout']) && $_SERVER['PHP_AUTH_USER'] == $_GET['logout']))
	{
		header("WWW-Authenticate: Basic realm=\"Control Page\"");
		header("HTTP/1.0 401 Unauthorized");
		exit();
	}
	else
	{
		if(!get_magic_quotes_gpc())
		{
			$_SERVER['PHP_AUTH_USER'] = mysql_real_escape_string($_SERVER['PHP_AUTH_USER']);
			$_SERVER['PHP_AUTH_PW'] = mysql_real_escape_string($_SERVER['PHP_AUTH_PW']);
		}
		
		$query = "SELECT * FROM $tbl_adm_accounts WHERE login='".$_SERVER['PHP_AUTH_USER']."'";
		$res = @mysql_query($query);
		
		//IF Error in sql query
		if(!$res)
		{
			header("WWW-Authenticate: Basic realm=\"Control Page\"");
			header("HTTP/1.0 401 Unauthorized");
			exit();
		}
		
		//If user not found
		if(mysql_num_rows($res) == 0)
		{
			header("WWW-Authenticate: Basic realm=\"Control Page\"");
			header("HTTP/1.0 401 Unauthorized");
			exit();
		}
		
		//Equal passwords
		$account = @mysql_fetch_array($res);
		if(md5($_SERVER['PHP_AUTH_PW']) != $account['psw'])
		{
			header("WWW-Authenticate: Basic realm=\"Control Page\"");
			header("HTTP/1.0 401 Unauthorized");
			exit();
		}
	}



?>