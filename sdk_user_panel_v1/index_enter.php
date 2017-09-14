<?php

	error_reporting(E_ALL & ~E_NOTICE);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Пользовательская панель программного комплекса СДК-8</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 

		<script type="text/javascript" src="./scripts/js/jquery-1.11.2.min.js"></script>
		<script type="text/javascript" src="./scripts/js/coin-slider.min.js"></script>
		<script type="text/javascript" src="./styles/default/jquery-ui/jquery-ui.js"></script>
		
		<link rel="StyleSheet" type="text/css" href="./styles/default/main.css">
		<link rel="StyleSheet" type="text/css" href="./styles/default/coin-slider-styles.css">
		<link rel="StyleSheet" type="text/css" href="./styles/default/jquery-ui/jquery-ui.min.css">
		<link rel="StyleSheet" type="text/css" href="./styles/default/jquery-ui/jquery-ui.theme.min.css">
		<link rel="StyleSheet" type="text/css" href="./styles/default/jquery-ui/jquery-ui.structure.min.css">
		<link rel="shortcut icon" href="./styles/images/dia_logo_icon.gif">
		<link rel="StyleSheet" type="text/css" href="./scripts/js/jquery.qtip.min.css">

		<script type="text/javascript" src="./scripts/js/jquery.qtip.min.js"></script>

		<script type="text/javascript">
			$(function(){
			  $.widget("ui.dialog", $.ui.dialog, {
					_allowInteraction: function(event) {
							return !!$(event.target).closest(".mce-container").length || this._super( event );
						}
				});
				$('#list_left_menu').menu();
				
				$("#enter_to_user_panel_dialog" ).dialog({
					autoOpen: false,
					height: 400,
					width: 500,
					modal: true,
					resizable:false,
					title:"Вход",
					open: function(){
					},
				});
				
				$('.btn').button();
				
				$("#login_enter_user_panel").qtip({
						 content: {
							text: 'Для поля "Логин" допускается ввод чисел от 0 до 9, а также букв латинского алфавита и символа "_". Длина логина должна быть не менее 3 и не более 25 символов',
							title: {
								text: 'Логин'
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
							classes: "qtip-dark",
							width: 300
						}
					});
					
			
			$("#psw_enter_user_panel").qtip({
						 content: {
							text: 'Для поля "Пароль" допускается ввод чисел от 0 до 9, а также букв латинского алфавита и символа "_". Длина пароля должна быть не менее 6 и не более 25 символов',
							title: {
								text: 'Пароль'
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
							classes: "qtip-dark",
							width: 300
						}
					});
					
			});

		  function enter_user_panel()
          {
            fn_set_status_loading();
            
            $("#error_enter_user_panel").html("");
            
            var reg_exp_login = RegExp("^[a-zA-Z0-9_]{3,25}$");
			var reg_exp_psw = RegExp("^[a-zA-Z0-9_]{6,25}$");
			
			
			var str_error = "<div style='color:red;'>";
			
			
			if(!reg_exp_login.test($("#login_enter_user_panel").val())){
				str_error += "Логин не соответствует требованиям<br>";
			}
			if(!reg_exp_psw.test($("#psw_enter_user_panel").val())){
				str_error += "Пароль не соответствует требованиям<br>";
			}
			
			
			fn_clear_status_loading();
			str_error += "</div>";
			if(str_error !== "<div style='color:red;'></div>"){
				$("#error_enter_user_panel").html(str_error);
			}
			else{
			
				fn_check_user_enter($("#login_enter_user_panel").val(),$("#psw_enter_user_panel").val());
			}
            
            return false;
            
          }
          
          function fn_check_user_enter(login,psw)
		  {
			fn_set_status_loading();
                       
            
			jqXHR = $.post("./check_user_enter.php","login="+encodeURIComponent(login)+"&psw="+encodeURIComponent(psw),fn_success_check_user_enter);
			jqXHR.fail(function(){fn_clear_status_loading();$( "#error_enter_user_panel_dialog" ).dialog("open");});
			
		  }
          
           function fn_success_check_user_enter(data,textStatus,jqXHR)
		  {
			fn_clear_status_loading();
			var str_error = "<div style='color:red;'>";
			
			if(data !== "")
			{
				str_error += data;
			}
			
			str_error += "</div>";
			
			if(str_error !== "<div style='color:red;'></div>"){
				$("#error_enter_user_panel").html(str_error);
			}
			else{
			
				fn_user_enter_user_panel();
			}
            
            
            
		  }
          
          function fn_user_enter_user_panel()
          {
            $("#form_enter_to_user_panel").submit();
          }



function fn_set_status_loading()
{
	var zi = 0;
	var i = 0; 
	var dlg = $(".ui-dialog");
	for(i=0; i < dlg.length; i++)
	{
		if(zi < dlg.eq(i).zIndex())
		{
			zi = dlg.eq(i).zIndex();
		}
	}
	
	$("#front_hide").css("z-index",zi+1);
	$("#status_loading").css("z-index",zi+2);
	$("#front_hide").show();
	$("#status_loading").css("display","block");
}
					  
function fn_clear_status_loading()
{
	$("#front_hide").css("z-index","100");
	$("#status_loading").css("z-index","100");
	$("#status_loading").css("display","none");
	$("#front_hide").hide();
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
					
			$("#login_header").qtip({
				content: {
					text: 'Вход в пользовательскую панель',
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
	<script type="text/javascript">
		$(document).ready(function () {
			$('#coin-slider').coinslider({ height: 500, width: 1025, navigation: true, delay: 5000, links: false, opacity: 0.7, });
			$('#coin-slider').show();
		});
	</script>
	<table cellspacing=0 cellpadding=0 style='height:1500px;width:100%;'>
		<tr>
			<td style='height:30px;'>
				<table class="header_1" cellspacing=0 cellpadding=0>
					<tr style="padding:0px;">
						<td style="padding:0px;vertical-align:middle;">
							<div id="welcome_admin" style="vertical-align:middle;height:100%;">
								Добро пожаловать, <?php  echo "Посетитель"; ?>. <span style='cursor:pointer;text-decoration:underline;' onmouseover="this.style.background='#675423'" onmouseout="this.style.background='#443113'"  onclick="$('#enter_to_user_panel_dialog').dialog('open');">Войдите в пользовательскую панель.</span>
							</div>
						</td>
						<td style="text-align:center;vertical-align:middle;padding:0px;float:right;">
							<table style="width:100%;height:100%;" cellspacing=0 cellpadding=0>
								<tr>
									<td>
											
									</td>
									<td id="rus_lang_header" style="text-align:right;background:#443113;color:white;cursor:pointer;border-left:1px solid #efec9f;padding: 0px 5px;"  onmouseover="this.style.background='#675423'" onmouseout="this.style.background='#443113'">
										<a href='./index.php'><img src="./styles/images/ru_lang_icon.gif" style="height: 20px;"></a>
									</td>
									<td id="login_header" style="text-align:right;background:#443113;color:white;cursor:pointer;border-left:1px solid #efec9f;padding: 0px 5px;" onmouseover="this.style.background='#675423'" onmouseout="this.style.background='#443113'" onclick="$('#enter_to_user_panel_dialog').dialog('open');">
										<img src='./styles/default/images/login.png' height="100%">
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
		<td style="vertical-align:top;text-align:center;padding-top:50px;background: #675423 url('styles/default/jquery-ui/images/ui-bg_diamond_25_675423_10x8.png');">
          <img src='./styles/default/images/slide/0001.jpg' >
						<!--
						<div style="width:100%;text-align:center;">
						<div id="coin-slider" style="text-align:center;">
							<a href="#" >
								<img src='styles/default/images/slideshow/GEDC0001.jpg' >
								<span>
									Оборудование вертолетов Ми-8 современным бортовым регистратором СДК-8
								</span>
							</a>
							<a href="#">
								<img src='styles/default/images/slideshow/GEDC0002.jpg' >
								<span>
									Разработка программного обеспечения объективного контроля
								</span>
							</a>
							<a href="#">
								<img src='styles/default/images/slideshow/GEDC0003.jpg' >
								<span>
									Разработка программного обеспечения для диагностики и контроля авиационных двигателей
								</span>
							</a>
						   <a href="#">
								<img src='styles/default/images/slideshow/GEDC0004.jpg' >
								<span>
									Разработка сетевых приложений и веб-сайтов для управления жизненным циклом авиационной техники
								</span>
							</a>
						</div>
						</div>
						-->
		</td>
	</tr>
	<tr>
		<td style='border:3px solid blue;vertical-align:middle;border:1px solid #efec9f;height:50px;'>
			<div id="bottom">
				<div id="footer_text">CMS SDK-8 2014 Leonid Y. Tkachenko. All rights reserved.</div>
			</div>
		</td>
	</tr>
</table>
<div id="enter_to_user_panel_dialog" style="display:none;">
	<form id="form_enter_to_user_panel" method="POST" action="./frontend/index.php">
		<table style='width:100%;'>
			<tr>
				<td style='padding:10px;' colspan=2 id='error_enter_user_panel'></td>
			</tr>
			<tr>
				<td style='padding:10px;'>Логин:</td>
				<td style='padding:10px;'><input style='width:300px;' type="textbox" value='Логин' class="login" onBlur="if(this.value == '') this.value = 'Логин'" onFocus="if(this.value == 'Логин') this.value = ''" id="login_enter_user_panel"  name="login_enter_user_panel"></td>
			</tr>
			<tr>
				<td style='padding:10px;'>Пароль:</td>
				<td style='padding:10px;'><input style='width:300px;' type="password" class="password" value="Пароль" onBlur="if(this.value == '') this.value = 'Пароль'" onFocus="if(this.value == 'Пароль') this.value = ''" id="psw_enter_user_panel" name="psw_enter_user_panel"></td>
			</tr>
			<tr>
				<td colspan=2 style='text-align:center;padding:10px;'>Запомнить? <input type="checkbox" value='true' id="remember_adm" name="remember_enter_to_user_panel"></td>
			</tr>
			<tr>
				<td colspan=2 style='text-align:center;padding:10px;'><input type="submit" value='Войти' class="btn" id="btn_enter_to_user_panel" onclick='enter_user_panel();return false;'></td>
			</tr>
		</table>
	</form>
</div>
<div class="ui-widget-overlay ui-front" style="z-index: 10000; display:none;" id="front_hide"></div>
<div id="status_loading" style="display:none;">
	<div id="loading">	
	</div>
</div>
<div id="error_dialog" style="text-align:center; display: none;">
	<p id="p_error_dialog" style="width:100%"></p>
	<hr>
	<button id="btn_error_dialog" class="btn" style="margin:20px;" onclick="$('#error_dialog').dialog('close');">OK</button>
<div>
</body>
</html>
