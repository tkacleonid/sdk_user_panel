<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	require_once("../../config/config.php");

	require_once("../utils/authorized.php");

	
	if(!empty($_GET["key_type_board"]))
	{
		$key_type_board = mysql_real_escape_string($_GET["key_type_board"]);
	}
	
	
	$toolbar_html = "";
	$toolbar_html_hide = "";
	$toolbar_script = "";
	$toolbar_qtip_script = "";
	$toolbar_style = "";
	$sign_table = "";
	$is_sign_algorithms = false;
	$left_sign_menu = "";
	
	
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
				$left_sign_menu .= "<ul style='list-style-type:none;width:100%;padding:0px;overflow:hidden;margin:0px;'>";

				$query= "select * from $tbl_sign_algorithms where key_type_board='$key_type_board' and status='1' order by position";
	
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
						
						$name_sign_short = mb_substr($name_sign_algorithms,0,50,"utf8");
		
						if(mb_strlen($name_sign_algorithms,"utf8") > 50)
						{
							$name_sign_short .= "...";
						}
						
						if($count_sign_algorithms == 1)
						{
							$style_li = " 
								  class='li_menu_sign_algorithms_current' style=\"cursor:pointer;padding:10px;border:1px solid #efec9f;\" onmouseout=\"$(this).removeClass('li_menu_sign_algorithms_mouseover'); \" onmouseover=\"$(this).addClass('li_menu_sign_algorithms_mouseover');\"
							";
							
							$contain_current_sign = $text_sign;
						}
						else
						{
							$style_li = " 
								  class='li_menu_sign_algorithms' style=\"cursor:pointer;padding:10px;border:1px solid #efec9f;\"  onmouseout=\"$(this).removeClass('li_menu_sign_algorithms_mouseover'); \" onmouseover=\"$(this).addClass('li_menu_sign_algorithms_mouseover');\"
							";
						}

						$left_sign_menu .= "
							<li title='$name_sign_algorithms. $description_sign_algorithms' id='li_sign_algorithm_$count_sign_algorithms' $style_li onclick='fn_click_sign_algorithms(this,$count_sign_algorithms);' >$name_sign_short</li>";
						
						$toolbar_qtip_script .= "
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
							
						";
						
						
						$tabs_sign_algorithms_div .= "<div id='div_tabs_sign_algorithms_$count_sign_algorithms'>$text_sign_sign_algorithms</div>";
						
					}
					if($count_sign_algorithms > 0)
					{
						$is_sign_algorithms = true;
					}

				}
		
				$tabs_sign_algorithms_div .= "</div>";
				$left_sign_menu .= "</ul>";
				
				if($is_sign_algorithms)
				{
					$toolbar_html_hide .= "<div id='tabs_sign_algorithms' style='display:none;'>".$tabs_sign_algorithms_div."</div>";
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
	
	
	$toolbar_script .= "});";
	
		
	if($is_sign_algorithms)
	{
		$toolbar_script .= "
			function fn_click_sign_algorithms(el,num_div)
			{
				$('#left_sign_menu ul li').removeClass('li_menu_sign_algorithms_current');
				$('#left_sign_menu ul li').addClass('li_menu_sign_algorithms');
				$(el).removeClass('li_menu_sign_algorithms');
				$(el).addClass('li_menu_sign_algorithms_current');
				
				
				//$('#td_menu_sign_algorithms_dialog ul li').css('background','#4f4221');
				//$(el).css('background','#675423');
				
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
			  
			.li_menu_sign_algorithms_mouseover
			{
				background: #675423;
			}
			  
			.li_menu_sign_algorithms_current
			{
				background:#4f4221 url('../../styles/default/jquery-ui/images/ui-bg_diamond_10_4f4221_10x8.png');
			}
			  
			.li_menu_sign_algorithms_mouseout
			{
				background:#4f4221;
			}
			  
			.li_menu_sign_algorithms_click
			{
				background: #261803;
			}
			  
			.li_menu_sign_algorithms_li
			{
				background: #4f4221;
			}
		</style>";
		
	$toolbar_script .= "</script>";
	
	
	$title_adm= "Условные обозначения, признаки и готовности";
	
	include_once("../utils/top_html.php");
	
?>

<script type="text/javascript">
	
</script>

</head>
<body>
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
						<td style="text-align:right;vertical-align:middle;padding:0px;float:right;">
							<table style="height:100%;" cellspacing=0 cellpadding=0>
								<tr>
									<td title='Русский' id="rus_lang_header" style="width:30px;text-align:right;background:#443113;color:white;cursor:pointer;border-left:1px solid #efec9f;padding: 0px 5px;"  onmouseover="this.style.background='#675423'" onmouseout="this.style.background='#443113'">
										<a href='./'><img src="../../styles/images/ru_lang_icon.gif" style="height: 20px;"></a>
									</td>
									<td title='Выход из пользовательской панели' id="logout_header" style="width:30px;text-align:right;background:#443113;color:white;cursor:pointer;border-left:1px solid #efec9f;padding: 0px 5px;" onmouseover="this.style.background='#675423'" onmouseout="this.style.background='#443113'" onclick="document.location= '<?php echo("./index.php?logout=".(true))?>';">
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
						<div id="block_company_information" style='height:130px;padding-top:10px;padding-bottom:10px;vertical-align:middle;color:#e3ddc9;'>
								<img src="../../styles/images/dia_logo_light.gif" style="height: 110px;">
								<!--ЗАО ДИАГНОСТИКА-->
						</div>
						<table id="block_menu" style='width:100%;' cellspacing=0 cellpadding=0>
							<tr>
								<td id="left_sign_menu" style='text-align:left;font-size:0.9em;'>
									<?php
										echo $left_sign_menu;
									?>
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
							<tr style="display:none;">
								<td >
									<?php
										echo $toolbar_html_hide.$toolbar_script.$toolbar_style;	
									?>							
								</td>
							</tr>
							<tr>
								<td id='td_container_sign_algorithms' style="vertical-align:top;background: #FFFFFF;padding-bottom: 50px;padding-top: 10px;padding-left: 15px;">

								
								
<?php
	echo $contain_current_sign;
	
	include_once("../utils/bottom_page.php");
	
?>
								
	
