<?php

	//Level of analysis errors
	error_reporting(E_ALL & ~E_NOTICE);
	
	//Data Base host
	$db_host = "localhost";
	
	//Data Base name
	$db_name = "tkacleonid_sdk";
	
	//Data Base user
	$db_user = "tkacleonid_sdk";
	
	//Data Base user's password
	$db_pwd = "Universe2011";
	
	//Express Analysis Message table
	$tbl_sdk_express_algorithms = "sdk_express_algorithms";
	
	//Administrative accounts table
	$tbl_adm_accounts = "adm_accounts";
	
	//Russian blocks menu table
	$tbl_blocks_menu_ru = "blocks_menu_ru";
	
	//Table For check users who is online
	$tbl_check_user_online = "check_user_online";
	
	//Table type boards
	$tbl_type_boards = "type_boards";
	
	//Table users
	$tbl_users = "users";
	
	//Table rle items
	$tbl_rle_items = "rle_items";
	
	//Table algorithms signs
	$tbl_sign_algorithms = "sign_algorithms";
	
	//Russian frontend blocks menu table
	$tbl_blocks_menu_frontend_ru = "blocks_menu_frontend_ru";
	
	//Russian operator_manual_items
	$tbl_operator_manual_items_ru = "operator_manual_items";
	
	//hasp keys
	$tbl_hasp = "hasp";
	
	//companies
	$tbl_company = "company";
	
	//Common checkbox settings
	$tbl_common_checkbox_settings = "common_checkbox_settings";
	
	//Common textbox settings
	$tbl_common_textbox_settings = "common_textbox_settings";
	
	//Group Downloads
	$tbl_group_downloads = "group_downloads";
	
	//Downloads
	$tbl_downloads = "downloads";
	
	
	
	//Connecting to Data Base
	
	$db_desc = @mysql_connect($db_host,$db_user,$db_pwd);
	
	//If failed
	if(!$db_desc)
	{
		exit("<p>В настоящее время сервер базы данных не доступен. Попробуйте выполнить вход позже.</p>");
	}

	//If selecting data base failed
	if(!@mysql_select_db($db_name,$db_desc))
	{
		exit("<p>В настоящий момент база данных не доступна. Попробуйте выполнить вход позже</p>");
	}

	//Set coding names
	@mysql_query("SET NAMES 'utf8'");
	

	//Set magic quotes
	if(!function_exists("get_magic_quotes_gpc"))
	{
		function get_magic_quotes_gpc()
		{
			return false;
		}
	}

?>