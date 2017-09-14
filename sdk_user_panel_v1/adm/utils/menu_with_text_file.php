<?php 
/**
	*@package		SDK
	*@copyright	Copyright (C) 2014	Leonid Y. Tkachenko. All right reserved.
*/

	//Level of analysis report
	error_reporting(E_ALL & ~E_NOTICE);
	
	//Analysis catalogues
	
	//Open adm catalogue
	$dir = opendir("../");
	
	$blocks_name_arr = array();
	$blocks_description_arr = array();
	$blocks_icon_arr = array();
	$count_block = 0;
	$style = '';
	$cur_block  = -1;
	
	//Analysis all files and ctalogues in cycle
	while(($file = readdir($dir)) !== false)
	{
		//Only catalogues
		if(is_dir("../$file"))
		{
			//Without '.', '..' and 'utils'
			if(($file != '.') && ($file != '..') && ($file != 'utils'))
			{
				//Find description file .htdir
				if(file_exists("../$file/.htdir"))
				{
					//Read block name and its description
					$block_icon = -1;
					list($block_name,$block_description,$block_icon) = file("../$file/.htdir");
					$blocks_name_arr[] = $block_name;
					$blocks_description_arr[] = $block_description;
					$count_block++;
					//Current block style
					if(strpos($_SERVER['PHP_SELF'],$file) !== false)
					{
						$cur_block = ($count_block) - 1;;
					}
				}
			}
		}
	}
	//Close catalogue
	closedir($dir);

	$menu = "";
	for($i = 0; $i < $count_block; $i++)
	{
		$menu = "<div class='div_row'>
	}
	
?>