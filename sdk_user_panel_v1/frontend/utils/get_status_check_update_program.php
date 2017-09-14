<?php

	error_reporting(E_ALL & ~E_NOTICE);
	
	include_once("../../config/config.php");
	
	$query = "select * from $tbl_common_checkbox_settings where id=1";

	
	$res = mysql_query($query);
	
	if(!$res)
	{
		exit("".mysql_error());
	}
	
	$setting = mysql_fetch_array($res);
	
	if(!$setting)
	{
		exit("");
	}
	
	$id_setting = $setting['id'];
	$name_setting = $setting['name_setting'];
	$status_setting = $setting['status'];
	$date_install_setting = $setting['date_install'];
	$comment = $setting['comment'];
	
	if($status_setting=="1")
	{
		$query = "select * from $tbl_common_textbox_settings where id=1";
	
		$res = mysql_query($query);
		
		if(!$res)
		{
			exit("".mysql_error());
		}
		
		$setting = mysql_fetch_array($res);
		
		if(!$setting)
		{
			exit("");
		}
		
		$id_setting = $setting['id'];
		$name_setting = $setting['name_setting'];
		$value_setting = $setting['value'];
		$date_change_setting = $setting['date_change'];
		$comment = $setting['comment'];
		
		echo "$value_setting;$date_change_setting";
	}
	else
	{
		echo "";
	}
	
?>