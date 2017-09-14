<?php

	error_reporting(E_ALL & ~E_NOTICE);
	
	include_once('../../config/config.php');
	

	if(!empty($_POST["key_type_board"]))
	{
		$key_type_board = mysql_real_escape_string($_POST["key_type_board"]);
	}
	else if(!empty($key_type_board_get))
	{
		$key_type_board =  mysql_real_escape_string($key_type_board_get);
	}

	$toolbar_html = "";
	$toolbar_html_hide = "";
	$toolbar_script = "";
	$toolbar_qtip_script = "";
	$toolbar_style = "";
	$sign_table = "";
	$is_pdf_algorithms = false;
	$is_sign_algorithms = false;
	
	
	
	$tabs_sign_algorithms_ul = "";
	$tabs_sign_algorithms_div = "<div style='display:none;'>";
	$is_sign_algorithms = false;
	
	
	if(($key_type_board != ""))
	{
		$query = "select * from $tbl_type_boards where key_type_board='$key_type_board'";
		
		$res = @mysql_query($query);
		
		if(!$res)
		{
			echo "";
		}
		else
		{
			$type_board = @mysql_fetch_array($res);
			
			if(!$type_board)
			{
				echo "";
			}
			else
			{
				$ref_pdf = $type_board['ref_pdf_algorithm'];
				$show_pdf = $type_board['status_show_pdf_algorithm'];
				
				if(($ref_pdf != "") && ($show_pdf == "1"))
				{
					$toolbar_html .= "<a href='$ref_pdf' target='_blank'><button id='btn_ref_pdf_algorithms'>pdf</button></a>";
					$is_pdf_algorithms = true;
				}
				
				
	
				$sign_table .= "
					<div id='tabs_sign_algorithms_dialog' style='display:none;'>
						<table style='height:100%;width:1000px' cellspacing=0 cellpadding=0>
							<tr>	
								<td id='td_menu_sign_algorithms_dialog' style=\"vertical-align:top;width:300px;color:white;background: #261803 url('../../styles/default/jquery-ui/images/ui-bg_diamond_8_261803_10x8.png');\">
									<ul style='list-style-type:none;width:300px;padding:0px;overflow:hidden;margin:0px;'>
						
						
						";

				$query= "select * from $tbl_sign_algorithms where key_type_board='$key_type_board' and status='1'";
	
				$res= @mysql_query($query);
				
				$count_sign_algorithms = 0;
				$contain_current_sign = "";
		
				if($res)
				{
					
					
					while($sign_algorithms= mysql_fetch_array($res))
					{
						$count_sign_algorithms++;
					
						$id_sign_algorithms = $sign_algorithms["id"];
						$name_sign_algorithms = $sign_algorithms["name"];
						$description_sign_algorithms = $sign_algorithms["description"];
						$ref_web_page_text_sign_algorithms = $sign_algorithms["ref_web_page_text"];
						$status_use_web_page_text_sign_algorithms = $sign_algorithms["status_use_web_page_text"];
						$ref_pdf_text_sign_algorithms = $sign_algorithms["ref_pdf_text"];
						$status_show_pdf_text_sign_algorithms = $sign_algorithms["status_show_pdf_text"];
						$text_sign_sign_algorithms = $sign_algorithms["text_sign"];
						$status_sign_algorithms = $sign_algorithms["status"];
						$position_sign_algorithms = $sign_algorithms["position"];
						$admin_add_sign_algorithms = $sign_algorithms["admin_add"];
						$date_add_sign_algorithms = $sign_algorithms["date_add"];
						$admin_last_modified_sign_algorithms = $sign_algorithms["admin_last_modified"];
						$date_last_modified_sign_algorithms = $sign_algorithms["date_last_modified"];
						$key_type_board_sign_algorithms = $sign_algorithms["key_type_board"];
						
						
						
						$style_li = "";
						
						$text_sign = $text_sign_sign_algorithms;
						$name_sign_short = $name_sign_algorithms;
						
						$name_sign_short = mb_substr($name_sign_algorithms,0,20,"utf8");
		
						if(mb_strlen($name_sign_algorithms,"utf8") > 20)
						{
							$name_sign_short .= "...";
						}
						
						if($count_sign_algorithms == 1)
						{
							$style_li = " 
								  style='cursor:pointer;width:300px;padding:5px;border:1px solid #efec9f;' onmouseout=\"$(this).css('background',''); \" onmouseover=\"$(this).css('background','#675423');\"
							";
							
							$contain_current_sign = $text_sign;
						}
						else
						{
							$style_li = " 
								  style='cursor:pointer;width:300px;padding:5px;border:1px solid #efec9f;'  onmouseout=\"$(this).css('background',''); \" onmouseover=\"$(this).css('background','#675423');\"
							";
						}

						$sign_table .= "
							<li title='$name_sign_algorithms. $description_sign_algorithms' id='li_sign_algorithm_$count_sign_algorithms' $style_li onclick='fn_click_sign_algorithms(this,$count_sign_algorithms);' >$name_sign_short</li>";
						
						$toolbar_qtip_script .= "
						/*
							$('#li_sign_algorithm_$count_sign_algorithms').qtip({
								content: {
									text: '$description_sign_algorithms',
									title: {text:'$name_sign_algorithms'}
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
									classes: '',
									width: 300
								},
								position: {
									my: 'bottom center',  // Position my top left...
									at: 'top center' // at the bottom right of...
								}
							});
							*/
						";
						
						
						$tabs_sign_algorithms_div .= "<div id='div_tabs_sign_algorithms_$count_sign_algorithms'>$text_sign_sign_algorithms</div>";
						
					}
					
					if($count_sign_algorithms > 0)
					{
						$is_sign_algorithms = true;
					}
					
				}
		
				$tabs_sign_algorithms_div .= "</div>";
				$sign_table .= "</ul></td><td style='vertical-align:top;padding-left:5px;'><div id='td_container_sign_algorithms' style='width:900px;height:800px;overflow:auto;'>$contain_current_sign</div></td></tr></table>";
				
				if($is_sign_algorithms)
				{
					$toolbar_html .= "<a href='./show_sign.php?key_type_board=$key_type_board' target='_blank'><button id='btn_open_sign_algorithms'>s</button></a>";
					$toolbar_html_hide .= "$sign_table</div><div id='tabs_sign_algorithms' style='display:none;'>".$tabs_sign_algorithms_div."</div>";
				}
			}
		}
	}
	else
	{
		echo "";
	}
	
	
	
	$toolbar_script = "<script type='text/javascript'> ";
	
	$toolbar_script .= "$(function(){   ";
	
	//$toolbar_script .= $toolbar_qtip_script;
	
	if($is_pdf_algorithms)
	{
		$toolbar_script .= " $('#btn_ref_pdf_algorithms').button(); ";
	}
	
	if($is_sign_algorithms)
	{
		$toolbar_script .= "
			$('#tabs_sign_algorithms_dialog').dialog({
								autoOpen: false,
								height: 850,
								width: 1220,
								modal: true,
								resizable:false,
								dialogClass:'sign_algorithms_dialog_class',
								title: 'Условные обозначения',
								close:function(){
										//fn_clear_tinymce();					
									}
							});
							
			$('#btn_open_sign_algorithms').button().click('on',function(){
				//$('#tabs_sign_algorithms_dialog').dialog('open');
			});
		";
	}
	
	$toolbar_script .= "});";
	
	$toolbar_script .= " 
		function fn_load_new_document(path)
		{
			document.location = path;
		} 
		";
		
	if($is_sign_algorithms)
	{
		$toolbar_script .= "
			function fn_click_sign_algorithms(el,num_div)
			{
				//$('#td_menu_sign_algorithms_dialog ul li').removeClass('td_menu_sign_algorithms_current');
				//$('#td_menu_sign_algorithms_dialog ul li').addClass('td_menu_sign_algorithms_li');
				//$(el).removeClass('td_menu_sign_algorithms_li');
				//$(el).addClass('td_menu_sign_algorithms_current');
				
				
				$('#td_menu_sign_algorithms_dialog ul li').css('background','#4f4221');
				$(el).css('background','#675423');
				
				//$('#td_menu_sign_algorithms_dialog ul li').click;
				//$(el).css('background','#675423');
											
				$('#td_container_sign_algorithms').html('');
				$('#td_container_sign_algorithms').html($(('#div_tabs_sign_algorithms_'+num_div)).html());
			}
		";
	}
	
	$toolbar_style .= "
		<style>
			.sign_algorithms_dialog_class
			{
				padding:0px;
			}
			  
			#tabs_sign_algorithms_dialog
			{
				padding:0px;
			}
			  
			#td_menu_sign_algorithms_dialog a,#td_menu_sign_algorithms_dialog a:link,#td_menu_sign_algorithms_dialog a:active,#td_menu_sign_algorithms_dialog a:visited
			{
				color: #FFFFFF;
			}
			  
			.td_menu_sign_algorithms_mouseover
			{
				background: #675423;
			}
			  
			.td_menu_sign_algorithms_current
			{
				background: #675423;
			}
			  
			.td_menu_sign_algorithms_mouseout
			{
				background: none;
			}
			  
			.td_menu_sign_algorithms_click
			{
				background: #261803;
			}
			  
			.td_menu_sign_algorithms_li
			{
				background: #4f4221;
			}
		</style>";
		
	$toolbar_script .= "</script>";
	
	
	//echo $toolbar_html.$toolbar_html_hide.$toolbar_script.$toolbar_style;
	echo $toolbar_html.$toolbar_script.$toolbar_style;
	

	
	

		
?>
	
	