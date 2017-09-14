<?php

	error_reporting(E_ALL & ~E_NOTICE);
	$title_adm = "Алгоритмы экспресс-анализа";
	
	include_once('../../config/config.php');
	
	$is_type_board = false;
	$is_algorithm = false;
	
	$key_type_board_get = "";
	$key_algorithm_get = "";
	
	if(!empty($_GET['key_type_board']))
	{
		$key_type_board_get = mysql_real_escape_string($_GET['key_type_board']);
		$is_type_board = true;
	}
	if(!empty($_GET['key_algorithm']))
	{
		$key_algorithm_get = mysql_real_escape_string($_GET['key_algorithm']);
		$is_algorithm = true;
	}
	
	
	
	$query = "select * from $tbl_type_boards where status='1' order by position";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit('Произошла ошибка при обращении к базе данных. Попробуйте позднее.');
	}
	
	if(!$is_type_board)
	{
		$select_type_boards = "<select id='select_type_boards' onchange ='fn_select_type_board(this.value);' style='width:300px;'>
		<option value='none' id='type_board_none_selected' selected>Выберите тип борта...</option>
		";
	}
	else
	{
		$select_type_boards = "<select id='select_type_boards' onchange ='fn_select_type_board(this.value);' style='width:300px;'>
		<option value='none'>Выберите тип борта...</option>
		";
	}
	
	$count_type_boards = 0;
	$select_index_type_board = 0;
	
	while(($type_board = @mysql_fetch_array($res)))	
	{
		$count_type_boards++;
		
		$id_type_board = $type_board['id'];
		$name_type_board = $type_board['name'];
		$short_description_type_board = $type_board['short_description'];
		$long_description_type_board = $type_board['long_description'];
		$date_add_type_board = $type_board['date_add'];
		$date_last_modified_type_board = $type_board['date_last_modified'];
		$id_admin_add_type_board = $type_board['id_admin_add'];
		$id_admin_modified_type_board = $type_board['id_admin_modified'];
		$key_type_board_type_board = $type_board['key_type_board'];
		$position_type_board = $type_board['position'];
		
		
		if($key_type_board_get == $key_type_board_type_board)
		{
			$select_index_type_board = $count_type_boards;
		}
		
		$select_type_boards .= "<option value='$key_type_board_type_board'>$name_type_board</option>";
		
	}
	
	$script_select_index_type_board = "$('#select_type_boards').get(0).selectedIndex = $select_index_type_board;";
	
	$select_type_boards .= "</select>";
	
	
	
	
	
	if(!$is_algorithm)
	{
		$select_algorithms = "<select id='select_algorithms' onchange ='fn_select_algorithm(this.value);' style='width:300px;'>
		<option value='none' id='algorithm_none_selected' selected>Выберите алгоритм...</option>
		";
	}
	else
	{
		$select_algorithms = "<select id='select_algorithms' onchange ='fn_select_algorithm(this.value);' style='width:300px;'>
		<option value='none' id='algorithm_none_selected'>Выберите алгоритм...</option>
		";
	}
	

	$count_algorithms = 0;
	$select_index_algorithm = 0;
	
	if($select_index_type_board > 0)
	{
		$query = "select * from $tbl_sdk_express_algorithms where status='1' and key_type_board='$key_type_board_get' order by position ";
	
		$res = @mysql_query($query);
		
		if(!$res)
		{
			exit('Произошла ошибка при обращении к базе данных. Попробуйте позднее.');
		}
		
		while(($algorithm = @mysql_fetch_array($res)))	
		{
			$count_algorithms++;
			
			$id_algorithm = $algorithm['id'];
			$key_algorithm_algorithm = $algorithm['key_algorithm'];
			$key_type_board_algorithm = $algorithm['key_type_board'];
			$name_algorithm_algorithm = $algorithm['name_algorithm'];
			$ref_web_page_text_algorithm_algorithm = $algorithm['ref_web_page_text_algorithm'];
			$ref_pdf_text_algorithm_algorithm = $algorithm['ref_pdf_text_algorithm'];
			$status_show_pdf_algorithm = $algorithm['status_show_pdf'];
			$key_rle_algorithm = $algorithm['key_rle'];
			$status_show_rle_algorithm = $algorithm['status_show_rle'];
			$comment_algorithm = $algorithm['comment'];
			$status_use_web_page_algorithm_algorithm = $algorithm['status_use_web_page_algorithm'];
			$admin_add_algorithm = $algorithm['admin_add'];
			$admin_last_modified_algorithm = $algorithm['admin_last_modified'];
			$date_add_algorithm = $algorithm['date_add'];
			$date_last_modified_algorithm = $algorithm['date_last_modified'];
			$position_algorithm = $algorithm['position'];
			$status_algorithm = $algorithm['status'];

			if($key_algorithm_get == $key_algorithm_algorithm)
			{
				$select_index_algorithm = $count_algorithms;
			}
			
			$select_algorithms .= "<option value='$key_algorithm_algorithm'>$name_algorithm_algorithm</option>";
			
		}
	}
	

	
	$script_select_index_algorithm = "$('#select_algorithms').get(0).selectedIndex = $select_index_algorithm;";
	
	$select_algorithms .= "</select>";
	
	
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Пользовательская панель программного комплекса СДК-8</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 

		<script type="text/javascript" src="../../scripts/js/jquery-1.11.2.min.js"></script>
		<script type="text/javascript" src="../../styles/default/jquery-ui/jquery-ui.js"></script>
		
		<link rel="StyleSheet" type="text/css" href="../../styles/default/main.css">
		<link rel="StyleSheet" type="text/css" href="../../styles/default/jquery-ui/jquery-ui.min.css">
		<link rel="StyleSheet" type="text/css" href="../../styles/default/jquery-ui/jquery-ui.theme.min.css">
		<link rel="StyleSheet" type="text/css" href="../../styles/default/jquery-ui/jquery-ui.structure.min.css">
		<link rel="shortcut icon" href="../../styles/images/dia_logo_icon.gif">
		<link rel="StyleSheet" type="text/css" href="../../scripts/js/jquery.qtip.min.css">

		<script type="text/javascript" src="../../scripts/js/jquery.qtip.min.js"></script>
		 <style>
		.custom-combobox 
		{
			position: relative;
			display: inline-block;
		}
		.custom-combobox-toggle 
		{
			position: absolute;
			top: 0;
			bottom: 0;
			margin-left: -1px;
			padding: 0;
		}
		.custom-combobox-input
		{
			margin: 0;
			padding: 5px 10px;
		}
		</style>
		<script type="text/javascript">
			$(function(){
			  $.widget("ui.dialog", $.ui.dialog, {
					_allowInteraction: function(event) {
							return !!$(event.target).closest(".mce-container").length || this._super( event );
						}
				});
				
				<?php
					echo $script_select_index_type_board;
					echo $script_select_index_algorithm;
				?>				
				
				$('#list_left_menu').menu();
						
			});
			
			function fn_select_type_board(key_board)
			{
				if(key_board == 'none')
				{
					$('#select_td_type_boards').html("<select id='select_algorithms' onchange ='alert(this.value);' style='width:300px;'><option value='none' id='algorithm_none_selected' selected>Выберите алгоритм...</option></select>");
				}
				else
				{
					//fn_set_status_loading();
                       
            
					jqXHR = $.post("./get_select_algorithms.php","key_type_board="+encodeURIComponent(key_board),fn_success_get_select_algorithms);
					jqXHR.fail(function(){
						//fn_clear_status_loading();$( "#error_enter_user_panel_dialog" ).dialog("open");
					});
			
				}
			}
			
			function fn_success_get_select_algorithms(data,textStatus,jqXHR)
			{
				//fn_clear_status_loading();
				$('#select_td_type_boards').html(data)
			}
			
			function fn_select_algorithm(key_algorithm)
			{
				if(key_algorithm == 'none')
				{
					//$('#select_td_type_boards').html("<select id='select_algorithms' onchange ='alert(this.value);' style='width:300px;'><option value='none' id='algorithm_none_selected' selected>Выберите алгоритм...</option></select>");
				}
				else
				{
					//fn_set_status_loading();
                       
            
					jqXHR = $.post("./get_algorithm.php","key_algorithm="+encodeURIComponent(key_algorithm),fn_success_get_algorithm);
					jqXHR.fail(function(){
						//fn_clear_status_loading();$( "#error_enter_user_panel_dialog" ).dialog("open");
					});
			
				}
			}
			
			function fn_success_get_algorithm(data,textStatus,jqXHR)
			{
				//fn_clear_status_loading();
				$(function(){
					if($('#accordion_algorithms').accordion('instance'))
					{
						$('#accordion_algorithms').accordion('destroy');
					}
					$('#accordion_algorithms').html(""+data+$('#accordion_algorithms').html());
					$('#accordion_algorithms').accordion();		
				});
			}
		</script>
		</head>
<body>

	<script type="text/javascript">
		$(function(){				
			$("#rus_lang_header").qtip({
				content: {
					text: 'Русский',
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
					classes: "qtip-dark",
					width: 100
				},
				position: {
					my: 'top right',  // Position my top left...
					at: 'bottom center' // at the bottom right of...
				}
			});
					
			$("#logout_header").qtip({
				content: {
					text: 'Выход из пользовательской панели',
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
					classes: "qtip-dark",
					width: 300
				},
				position: {
					my: 'top right',  // Position my top left...
					at: 'bottom center' // at the bottom right of...
				}
			});
		});
	</script>
	<table cellspacing=0 cellpadding=0 id="body">
		<tr>
			<td>
				<table class="header_1" cellspacing=0 cellpadding=0>
					<tr style="padding:0px;">
						<td style="padding:0px;vertical-align:middle;">
							<div id="welcome_admin" style="vertical-align:middle;height:100%;">
								Добро пожаловать, <?php  echo "<a href='../my_profile/'>админ</a>"; ?>
							</div>
						</td>
						<td style="text-align:center;vertical-align:middle;padding:0px;float:right;">
							<table style="width:100%;height:100%;" cellspacing=0 cellpadding=0>
								<tr>
									<td>
											
									</td>
									<td id="rus_lang_header" style="text-align:right;background:#443113;color:white;cursor:pointer;border-left:1px solid #efec9f;padding: 0px 5px;"  onmouseover="this.style.background='#675423'" onmouseout="this.style.background='#443113'">
										<a href='./index.php'><img src="../../styles/images/ru_lang_icon.gif" style="height: 20px;"></a>
									</td>
									<td id="logout_header" style="text-align:right;background:#443113;color:white;cursor:pointer;border-left:1px solid #efec9f;padding: 0px 5px;" onmouseover="this.style.background='#675423'" onmouseout="this.style.background='#443113'" onclick="document.location = '<?php echo("./index.php?logout=".(true))?>';">
										<img src='../../styles/default/images/logout.png' height="100%">
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
		<td>
			<table style="height:1000px;width:100%;"; cellspacing=0 cellpadding=0>
				<tr>
					<td id="left_menu" style="vertical-align:top;">
						<div id="block_company_information" style='height:100px;padding-top:50px;vertical-align:middle;color:#e3ddc9;'>
								<!--<img src="./styles/images/dia_logo.gif" style="height: 110px;">-->
								ЗАО ДИАГНОСТИКА
						</div>
						<table id="block_menu" style='width:100%;' cellspacing=0 cellpadding=0>
							<?php
								//echo "Меню";
							?>
							<tr>
								<td style='text-align:left;font-size:0.9em;'>
									<ul id='list_left_menu' style='list-style:none;'>
										<li style="color:white;border:1px solid #efec9f;background:#4f4221 url('../../styles/default/jquery-ui/images/ui-bg_diamond_10_4f4221_10x8.png');"  onmouseover="this.style.background = '#675423 url(../../styles/default/jquery-ui/images/ui-bg_diamond_25_675423_10x8.png)'; "     onmouseout="this.style.background = '#4f4221 url(../../styles/default/jquery-ui/images/ui-bg_diamond_10_4f4221_10x8.png)';">Мой профиль</li>
										<li style="color:white;border:1px solid #efec9f;background:#4f4221 url('../../styles/default/jquery-ui/images/ui-bg_diamond_10_4f4221_10x8.png');"  onmouseover="this.style.background = '#675423 url(../../styles/default/jquery-ui/images/ui-bg_diamond_25_675423_10x8.png)'; "     onmouseout="this.style.background = '#4f4221 url(../../styles/default/jquery-ui/images/ui-bg_diamond_10_4f4221_10x8.png)';" >Алгоритмы экспресс-анализа</li>
									</ul>
								</td>
							</tr>
						</table>
					</td>
					<td style="vertical-align:top;background:#FFFFFF;">
						<table cellpadding=0 cellspacing=0 style="height:100%;color:#000;width:100%;background: #fbd08a url('../../styles/default/jquery-ui/images/ui-bg_diamond_8_fbd08a_10x8.png');">
							<tr>
								<td style="height:30px;color:#FFF; width:100%; background: #261803 url('../../styles/default/jquery-ui/images/ui-bg_diamond_8_261803_10x8.png'); font-weight: bold;font-size:1.2em; font-family: Arial;border-bottom:1px solid #efec9f;">
									<table cellpadding=0 cellspacing=0>
										<tr>
										<!--
											<td style=" width:30px; background:none;cursor:pointer;" onmouseover="this.style.background='#f7a585'" onmouseout="this.style.background='none'" >
												<img src="../../styles/images/hide_sow_menu_icon.gif" style="height:30px; width:30px;" style=" width:30px; background:#f37e50;" title="Скрыть меню">
											</td>-->
											<td style="padding: 10px;">
												<?php echo $title_adm; ?>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td style="vertical-align:top;background: #FFFFFF;">

									<table style='width:100%;background:#675423;'>
										<tr>
											<td style="width:300px;padding:20px;">
												<table>
													<tr>
														<td style='text-align:center;color:white;'>
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
														<td style='text-align:center;color:white;'>
															Алгоритм
														</td>
													</tr>
													<tr>
														<td style='text-align:center;' id='select_td_type_boards'>
															<?php
																echo $select_algorithms;
															?>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
									<div id="accordion_algorithms">

									</div>


<iframe style='width:500px;height:500px;color:black;' src="http://localhost/sdk/frontend/profile/">
		<!DOCTYPE html>
		<html>
			<head>
				<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'>
			</head>
			<body>
				$text_algorithm_algorithm
				Hello
			</body>
		</html>
	</iframe>

	<iframe id="text_algorithm_dialog_add_new_express_algorithm_ifr" frameborder="0" allowtransparency="true" title="Rich Text Area. Press ALT-F9 for menu. Press ALT-F10 for toolbar. Press ALT-0 for help" style="width: 100%; height: 300px; display: block;" src="javascript:""">
<!DOCTYPE html>
<html>
<head>
<body id="tinymce" class="mce-content-body " contenteditable="true" data-id="text_algorithm_dialog_add_new_express_algorithm" spellcheck="false">
fddfgdfgdfgdf
</body>
</html>
</iframe>


								
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<div id="bottom">
				<div id="footer_text">CMS SDK-8 2014 Leonid Y. Tkachenko. All rights reserved.</div>
			</div>
		</td>
	</tr>
</table>
<div class="ui-widget-overlay ui-front" style="z-index: 10000; display:none;" id="front_hide"></div>
</body>
</html>
