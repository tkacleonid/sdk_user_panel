<?php 
/**
	*@package		SDK
	*@copyright	Copyright (C) 2014	Leonid Y. Tkachenko. All right reserved.
*/

	//Level of analysis report
	error_reporting(E_ALL & ~E_NOTICE);
	
	//Analysis catalogues
	
	//Open adm catalogue
	//$dir = opendir("../");

	session_start();
	
	$blocks_name_arr = array();
	$blocks_description_arr = array();
	$count_block = 0;
	$style = '';
	$cur_block  = -1;
	
	$query = "select * from $tbl_blocks_menu_frontend_ru where status='1' and status_debug='0' order by position";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		header("Location: ../utils/error_message.php");
		exit;
	}
	
	$script = "<script type='text/javascript'>
	
		$(function(){
	";
					
	$menu = "<ul id='list_left_menu' style='list-style:none;padding-left:0px;'>";
	
	while($block = @mysql_fetch_array($res))
	{
		$id = $block['id'];
		$name = $block['name'];
		$short_desc = $block['short_desc'];
		$url_folder = $block['url_folder'];
      	$status_visibility_without_authorized = $block['status_visibility_without_authorized'];
      
      	if(($status_visibility_without_authorized=="0") && ($type_user==3))
        {
          continue;
        }
		
		$short_name = mb_substr($name,0,50,"utf8");
		
		if(mb_strlen($name,"utf8") > 50)
		{
			$short_name .= "...";
		}
		
		if(strpos($_SERVER['PHP_SELF'],"/".$url_folder))
		{
			$style = " class=' li_menu_current ' ";
			
		}
		else
		{
			$style = " class=' li_menu ' ";
		}
		
		$menu .= "
					<a href=\"./../{$url_folder}/\" ><li $style id='block_$id' style=\"padding-left:10px;padding-bottom:10px;padding-top:10px;color:white;border:1px solid #efec9f; \"     onmouseover=\"$(this).removeClass('li_menu').addClass('li_menu_mouseover');\" onmouseout=\"$(this).removeClass('li_menu_mouseover').addClass('li_menu');\">$short_name</li></a>
				";
		
		$script .= "$('#block_$id').qtip({
						 content: {
							text: \"$short_desc\",
							title: {
								text: \"$name\"
							}
						},
						show: {
							when: 'mouseover focus',
							solo: false,
							ready : false
						},
						style: {
							tip: true,
							border: {
								width: 0,
								radius: 3
							},
							classes: 'qtip-dark',
							width: 300
						}
					});";
		
		
					
	}
	$menu .= "</ul>";
	$script .= "});</script>";
	
	echo $menu.$script;
?>