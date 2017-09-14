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
	
	$blocks_name_arr = array();
	$blocks_description_arr = array();
	$blocks_icon_arr = array();
	$count_block = 0;
	$style = '';
	$cur_block  = -1;
	
	$query = "select * from $tbl_blocks_menu_ru where status='1' order by position";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		header("Location: ../utils/error_message.php");
		exit;
	}
	
	$script = "<script type='text/javascript'>";
					
	$menu = "";
	
	while($block = @mysql_fetch_array($res))
	{
		$id = $block['id'];
		$name = $block['name'];
		$short_desc = $block['short_desc'];
		$icon = $block['icon'];
		$url_folder = $block['url_folder'];
		
		$short_name = mb_substr($name,0,30,"utf8");
		
		if(mb_strlen($name,"utf8") > 30)
		{
			$short_name .= "...";
		}
		
		if(strpos($_SERVER['PHP_SELF'],"/".$url_folder))
		{
			$style = "style='background:#ec7f54'";
		}
		else
		{
			$style = "onmouseover='this.style.background=\"#ec7f54\"' onmouseout='this.style.background=\"#d95b29\"' style='background:#d95b29'";
		}
		
		$menu .= "<tr class='div_row' id='block_$id' onclick=\"document.location.href='./../{$url_folder}/';\"  $style>
							<td class='div_cell block_icon'><img src='$icon' class='block_icon_img'></td>
							<td class='div_cell block_name'>$short_name</td>
						</tr>";
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
	$script .= "</script>";
?>