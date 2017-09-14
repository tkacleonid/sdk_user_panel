<?php

	error_reporting(E_ALL & ~E_NOTICE);
	
	require_once("../utils/authorized.php");
	
	require_once("../../config/config.php");

	
	$title_adm= "Алгоритмы экспресс-анализа";
	
	include_once("../utils/top_html.php");
	
	include_once("../utils/top_page.php");
	
	
	
	$is_type_board= false;
	$is_algorithm= false;
	$is_algorithm_preview= false;
	
	$key_type_board_get= "";
	$key_algorithm_get= "";
	
	$algorithms_html= "";
	
	if(!empty($_GET['key_type_board']))
	{
		$key_type_board_get= mysql_real_escape_string($_GET['key_type_board']);
		$is_type_board= true;
	}
	if(!empty($_GET['key_algorithm']))
	{
		$key_algorithm_get= mysql_real_escape_string($_GET['key_algorithm']);
		$is_algorithm= true;
	}
	if(!empty($_POST['algorithm_preview']))
	{
		if(intval($_POST['algorithm_preview'])== 1)
		{
			$is_algorithm_preview= true;
			
			$id_type_board_preview= mysql_real_escape_string($_POST["id_type_board"]);
			$id_algorithm_preview= mysql_real_escape_string($_POST["id_algorithm"]);
			$name_algorithm_preview= mysql_real_escape_string($_POST["name_algorithm"]);
			$path_html_algorithm_preview= mysql_real_escape_string($_POST["path_html_algorithm"]);
			$path_pdf_algorithm_preview= mysql_real_escape_string($_POST["path_pdf_algorithm"]);
			$visibility_ref_pdf_algorithm_preview= mysql_real_escape_string($_POST["visibility_ref_pdf_algorithm"]);
			$path_rle_algorithm_preview= mysql_real_escape_string($_POST["path_rle_algorithm"]);
			$visibility_ref_rle_algorithm_preview= mysql_real_escape_string($_POST["visibility_ref_rle_algorithm"]);
			$comment_algorithm_preview= mysql_real_escape_string($_POST["comment_algorithm"]);
			$text_algorithm_preview= mysql_real_escape_string($_POST["text_algorithm"]);
			$use_ref_html_algorithm_preview= mysql_real_escape_string($_POST["use_ref_html_algorithm"]);
			
			
			
			
		}
	}
	
	
	
	$query= "select * from $tbl_type_boards where status='1' order by position";
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit('Произошла ошибка при обращении к базе данных. Попробуйте позднее.');
	}
	
	if(!$is_type_board)
	{
		$select_type_boards= "<select id='select_type_boards' onchange='fn_select_type_board(this.value);' style='width:300px;'>
		<option value='none' id='type_board_none_selected' selected>Выберите тип борта...</option>
		";
	}
	else
	{
		$select_type_boards= "<select id='select_type_boards' onchange='fn_select_type_board(this.value);' style='width:300px;'>
		<option value='none'>Выберите тип борта...</option>
		";
	}
	
	$count_type_boards= 0;
	$select_index_type_board= 0;
	
	while(($type_board= @mysql_fetch_array($res)))	
	{
		$count_type_boards++;
		
		$id_type_board= $type_board['id'];
		$name_type_board= $type_board['name'];
		$short_description_type_board= $type_board['short_description'];
		$long_description_type_board= $type_board['long_description'];
		$date_add_type_board= $type_board['date_add'];
		$date_last_modified_type_board= $type_board['date_last_modified'];
		$id_admin_add_type_board= $type_board['id_admin_add'];
		$id_admin_modified_type_board= $type_board['id_admin_modified'];
		$key_type_board_type_board= $type_board['key_type_board'];
		$position_type_board= $type_board['position'];
		
		
		if($key_type_board_get== $key_type_board_type_board)
		{
			$select_index_type_board= $count_type_boards;
		}
		
		$select_type_boards .= "<option value='$key_type_board_type_board'>$name_type_board</option>";
		
	}
	
	$script_select_index_type_board= "$('#select_type_boards').get(0).selectedIndex= $select_index_type_board;";
	
	$select_type_boards .= "</select>";
	
	
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
	
	if($select_index_type_board > 0)
	{
	
		
		
		$key_type_board = $key_type_board_get;
		
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

	
	}
	
	
	
	if(!$is_algorithm)
	{
		$select_algorithms= "<select id='select_algorithms' onchange='fn_select_algorithm(this.value);' style='width:300px;'>
		<option value='none' id='algorithm_none_selected' selected>Выберите алгоритм...</option>
		";
	}
	else
	{
		$select_algorithms= "<select id='select_algorithms' onchange='fn_select_algorithm(this.value);' style='width:300px;'>
		<option value='none' id='algorithm_none_selected'>Выберите алгоритм...</option>
		";
	}
	

	$count_algorithms= 0;
	$select_index_algorithm= 0;
	
	if($select_index_type_board > 0)
	{
		$query= "select * from $tbl_sdk_express_algorithms where status='1' and key_type_board='$key_type_board_get' order by position ";
	
		$res= @mysql_query($query);
		
		if(!$res)
		{
			exit('Произошла ошибка при обращении к базе данных. Попробуйте позднее.');
		}
		
		while(($algorithm= @mysql_fetch_array($res)))	
		{
			$count_algorithms++;
			
			$id_algorithm= $algorithm['id'];
			$key_algorithm_algorithm= $algorithm['key_algorithm'];
			$key_type_board_algorithm= $algorithm['key_type_board'];
			$name_algorithm_algorithm= $algorithm['name_algorithm'];
			$ref_web_page_text_algorithm_algorithm= $algorithm['ref_web_page_text_algorithm'];
			$ref_pdf_text_algorithm_algorithm= $algorithm['ref_pdf_text_algorithm'];
			$status_show_pdf_algorithm= $algorithm['status_show_pdf'];
			$key_rle_algorithm= $algorithm['key_rle'];
			$status_show_rle_algorithm= $algorithm['status_show_rle'];
			$comment_algorithm= $algorithm['comment'];
			$status_use_web_page_algorithm_algorithm= $algorithm['status_use_web_page_algorithm'];
			$admin_add_algorithm= $algorithm['admin_add'];
			$admin_last_modified_algorithm= $algorithm['admin_last_modified'];
			$date_add_algorithm= $algorithm['date_add'];
			$date_last_modified_algorithm= $algorithm['date_last_modified'];
			$position_algorithm= $algorithm['position'];
			$status_algorithm= $algorithm['status'];

			if($key_algorithm_get== $key_algorithm_algorithm)
			{
				$select_index_algorithm= $count_algorithms;
			}
			
			$select_algorithms .= "<option value='$key_algorithm_algorithm'>$name_algorithm_algorithm</option>";
			
		}
	}
	

	
	$script_select_index_algorithm= "$('#select_algorithms').get(0).selectedIndex= $select_index_algorithm;";
	
	$select_algorithms .= "</select>";
	
	$is_preview= false;
	
	
	if(!empty($_POST['algorithm_preview']))
	{
		$is_preview= true;
		$algorithms_html= $_POST['data'];
	}
	
?>
<script type="text/javascript">
			$(function(){			
				<?php
					echo $script_select_index_type_board;
					echo $script_select_index_algorithm;
				?>				
					
				<?php
					if(!$is_preview)
					{
						echo "fn_select_algorithm($('#select_algorithms').val());";
						
					}
				?>
			});
		</script>
		<input id="hdn_key_type_board" type='hidden' value='$key_type_board_get'>
		<table style='width:100%;background:#675423;'>
										<tr>
											<td style="width:300px;padding:20px;">
												<table>
													<tr>
														<td  style='text-align:center;color:white;'>
															Тип борта
														</td>
													</tr>
													<tr>
							
														<td style='text-align:center;'>
															
															<?php
																echo $select_type_boards;
															?>
															
														</td>
													</tr>
												</table>
											</td>
											<td>
												<table>
													<tr>
														<td colspan=2 style='text-align:center;color:white;'>
															Алгоритм
														</td>
													</tr>
													<tr>
														<td style='text-align:center;' id='select_td_type_boards'>
															<?php
																echo $select_algorithms;
															?>
														</td>
														<td colspan=1 id="td_top_type_board_toolbar" style="padding-left:5px; font-size:0.6em;background:#675423;">
															<?php echo $toolbar_html.$toolbar_script.$toolbar_style; ?>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>

									<div id="accordion_algorithms">
									<?php
										if($is_preview)
										{
											echo $algorithms_html;
										}
										
									?>
									</div>
									<?php
										if($is_preview)
										{
											echo "<script type='text/javascript'>
												$('#accordion_algorithms .btn_'+('')).button();
												$('#accordion_algorithms .btn_close_'+('')).button({
														icons:{
														primary:'ui-icon-close',
													},
													text:false,
												});
											</script>";
										}
										
									?>

<?php
	
	include_once("../utils/bottom_page.php");
	
?>
