<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	require_once("../utils/authorized.php");

	if(!empty($_SESSION['key_id']) and !empty($_GET['key_hasp_contain']))
	{
		$id_key = intval($_SESSION['key_id']);
		$key_hasp_contain = mysql_real_escape_string($_GET['key_hasp_contain']);
		
		$query = "update $tbl_hasp set
			text_contain = '$key_hasp_contain',
			date_last_program_open=NOW()
			
		where id=$id_key";
		
		if(!mysql_query($query))
		{
			exit("Возникла ошибка при обращении к базе данных");
		}
		
		echo "1";
	}
	else
	{
		echo "-1";
	}
	
	

?>