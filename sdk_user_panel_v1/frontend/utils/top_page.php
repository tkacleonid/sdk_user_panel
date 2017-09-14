<?php
	if(!empty($_SESSION['key_hasp_id']))
	{
		$welcome = $_SESSION['key_hasp_id'];
		$type_user = 0;
	}
	else if(!empty($_SESSION['login_user']))
	{
		$welcome = $_SESSION['login_user'];
		$type_user = 1;
	}
	else if(!empty($_SESSION['login_adm']))
	{
		$welcome = $_SESSION['login_adm'];
		$type_user = 2;
	}
	else
	{
      $type_user = 3;
      //header("Location: ../home/index.php");
	}
	
?>
<head>
<script type="text/javascript">
  
function fn_tinymce_for_send_common_mail()
{
	tinymce.init({
		selector: "#textarea_send_common_message_dialog",
		theme: "modern",
		
		plugins: [
					"advlist autolink lists link image charmap print preview hr anchor pagebreak",
					"searchreplace wordcount visualblocks visualchars code fullscreen",
					"insertdatetime media nonbreaking save table contextmenu directionality",
					"emoticons template paste textcolor colorpicker textpattern tiny_mce_wiris"
		],
		toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
		toolbar2: "print preview media | forecolor backcolor emoticons | tiny_mce_wiris_formulaEditor",
		image_advtab: true,
		dialog_type : "modal",
		templates: [
					{title: 'Test template 1', content: 'Test 1'},
					{title: 'Test template 2', content: 'Test 2'}
				]
		});
}
  
  $(function(){
				
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
	$(function(){
		//$('#list_left_menu').menu();
		
		$(".btn").button();
		
		$("#error_dialog" ).dialog({
			autoOpen: false,
			height: 200,
			width: 600,
			modal: true,
			resizable:false,
			dialogClass:"none_header_dialog"
		});
      
      $("#btn_send_common_message").button({
        icons:{
          primary:"ui-icon-mail-closed"
        },
        text:false
      }).show();
      
      $("#send_common_message_dialog").dialog({
        autoOpen: false,
		height: 800,
		width: 900,
		modal: true,
		resizable:false,
		title:"Отправка сообщения",
		open: function(){
		},
        close:function(){
          tinyMCE.editors["textarea_send_common_message_dialog"].remove();		
        }
      });
      
      $("#btn_send_common_email").button();
      
		
	});
	
	function fn_set_status_loading()
	{
		var zi= 0;
		var i= 0; 
		var dlg= $(".ui-dialog");
		for(i=0; i < dlg.length; i++)
		{
			if(zi < dlg.eq(i).zIndex())
			{
				zi= dlg.eq(i).zIndex();
			}
		}
			
		$("#front_hide").css("z-index",zi+10);
		$("#status_loading").css("z-index",zi+20);
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
  
  function fn_show_dialog_send_common_message()
  {
    fn_tinymce_for_send_common_mail();
    $("#captcha_send_common_email_img").click();
    $("#send_common_message_dialog").dialog("open");
  }
  
  function fn_send_common_email()
  {
    $("#error_send_common_message_dialog").html("");
    
    var theme = $("#theme_send_common_message_dialog").val();
    var name = $("#name_send_common_message_dialog").val();
    var email = $("#email_from_send_common_message_dialog").val().trim();
    var message = tinyMCE.editors["textarea_send_common_message_dialog"].getContent();	
    var keystring = $("#captcha_send_common_email").val();
    
    var name_reg_exp = new RegExp("[0-9A-Za-zА-Яа-я]+");
    var email_reg_exp = new RegExp("^([0-9A-Za-zА-Яа-я\._\-]+)@([0-9A-Za-zА-Яа-я\._\-]+)\.([0-9A-Za-zА-Яа-я]{2,})$");
    var message_reg_exp = new RegExp("[0-9A-Za-zА-Яа-я]{10,}");
    
    var str_error = "";
    
    if(!name_reg_exp.test(name))
    {
      str_error += "Проверьте корректность ввода имени<br>";
    }
    
    if(!email_reg_exp.test(email))
    {
      str_error += "Проверьте корректность ввода e-mail<br>";
    }
    
    if(!message_reg_exp.test(message))
    {
      str_error += "Сообщение должно содержать не менее 10 символов<br>";
    }
    
    if(str_error != "")
    {
      $("#error_send_common_message_dialog").html(str_error);
    }
    else
    {
      fn_set_status_loading();
      var jqXHR = $.post("../utils/check_send_common_message.php","theme="+encodeURIComponent(theme)+"&name="+encodeURIComponent(name)+"&email="+encodeURIComponent(email)+"&message="+encodeURIComponent(message)+"&keystring="+encodeURIComponent(keystring),fn_success_check_send_common_message);
      jqXHR.error(function(){
        fn_clear_status_loading();
        $("#captcha_send_common_email_img").click();
        $("#p_error_dialog").html("Произошла ошибка при отправке сообщения. Попробуйте позже");
        $("#error_dialog").dialog("open");
      });
    }
   	
  }
  
  function fn_success_check_send_common_message(data,textStatus,jqXHR)
  {
    if(data != "")
    {
      fn_clear_status_loading();
      $("#captcha_send_common_email_img").click();
      $("#error_send_common_message_dialog").html(data);  
    }
    else
    {
      $("#error_send_common_message_dialog").html("");
    
      var theme = $("#theme_send_common_message_dialog").val();
      var name = $("#name_send_common_message_dialog").val();
      var email = $("#email_from_send_common_message_dialog").val().trim();
      var message = tinyMCE.editors["textarea_send_common_message_dialog"].getContent();	
      var keystring = $("#captcha_send_common_email").val();
      
      var jqXHR = $.post("../utils/send_common_message.php","theme="+encodeURIComponent(theme)+"&name="+encodeURIComponent(name)+"&email="+encodeURIComponent(email)+"&message="+encodeURIComponent(message)+"&keystring="+encodeURIComponent(keystring),fn_success_send_common_message);
      jqXHR.error(function(){
        fn_clear_status_loading();
        $("#captcha_send_common_email_img").click();
        $("#p_error_dialog").html("Произошла ошибка при отправке сообщения. Попробуйте позже");
        $("#error_dialog").dialog("open");
      });
    
    }
  }
  
   function fn_success_send_common_message(data,textStatus,jqXHR)
  {
    
    if(data != "1")
    {
      fn_clear_status_loading();
      $("#captcha_send_common_email_img").click();
      $("#error_send_common_message_dialog").html(data);  
    }
    else
    {
      $("#send_common_message_dialog").dialog("close");
      $("#captcha_send_common_email_img").click();
      $("#p_error_dialog").html("Сообщение успешно оправлено");
      $("#error_dialog").dialog("open");
    }
    fn_clear_status_loading();
    
  }
  
</script>
<style type="text/css">
	.li_menu_mouseover
	{
		background: #675423;
	}
			  
	.li_menu_current
	{
		background:#675423 url('../../styles/default/jquery-ui/images/ui-bg_diamond_25_675423_10x8.png');
	}
			  
	.li_menu
	{
		background:#4f4221 url('../../styles/default/jquery-ui/images/ui-bg_diamond_10_4f4221_10x8.png');
	}
	
	#left_menu a, #left_menu a:link,#left_menu a:visited,#left_menu a:active
	{
		text-decoration:none;
		color: #efec9f;
	}
</style>
</head>
<body>
	 <div id="error_dialog" style="text-align:center; display: none;">
	<p id="p_error_dialog" style="width:100%"></p>
	<hr>
	<button id="btn_error_dialog" class="btn" style="margin:20px;" onclick="$('#error_dialog').dialog('close');">OK</button>
  </div>
  <div id="send_common_message_dialog" style="display:none;">
    <table style="width:100%;">
      <tr>
        <td colspan=2>
          <p style="color:red;" id="error_send_common_message_dialog"></p>
        </td>
      </tr>
      <tr>
        <td style="width:300px; background:#d5ac5d;border:1px solid #443113;padding:5px;">
          Тема сообщения:
        </td>
        <td style="border:1px solid #443113;text-align:center;padding:5px;">
          <input id="theme_send_common_message_dialog" style="width:90%; ">
        </td>
      </tr>
      <tr>
        <td style="width:300px; background:#d5ac5d;border:1px solid #443113;padding:5px;">
          Ваше имя:
        </td>
        <td style="border:1px solid #443113;text-align:center;padding:5px;">
          <input id="name_send_common_message_dialog" style="width:90%; ">
        </td>
      </tr>
      <tr>
        <td style="width:300px; background:#d5ac5d;border:1px solid #443113;padding:5px;">
          Ваш E-mail:
        </td>
        <td style="border:1px solid #443113;text-align:center;padding:5px;">
          <input id="email_from_send_common_message_dialog" style="width:90%; ">
        </td>
      </tr>
      <tr>
        <td style="width:300px; background:#d5ac5d;border:1px solid #443113;padding:5px;">
          Текст сообщения:
        </td>
        <td style="border:1px solid #443113;text-align:center;padding:5px;">
          <textarea id="textarea_send_common_message_dialog" style="height:150px;"></textarea>
        </td>
      </tr>
      <tr>
        <td colspan=2 style="text-align:center;">
           <p>Введите код с картинки:</p>
          <p><img title="Если Вы не видите число на картинке, нажмите на картинку мышкой" onclick="this.src=this.src+'&amp;'+Math.round(Math.random())" src="../../adm/utils/captcha/imaga.php?<?php echo session_name()?>=	                             <?php echo session_id()?>"  id="captcha_send_common_email_img">	
           <p><input type="text" name="keystring" id="captcha_send_common_email"></p>
            <p style="font-size:10px;">Если не видите код - кликните по картинке</p>
        </td>
      </tr>
      <tr>
        <td colspan=2 style="text-align:center;">
          <button id="btn_send_common_email" onclick="fn_send_common_email();">Отправить</button>
        </td>
      </tr>
    </table>
  </div>
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

			<table cellspacing=0 cellpadding=0 id="body">
		<tr>
			<td>
              <?php if($type_user != 3) { ?>
				<table class="header_1" cellspacing=0 cellpadding=0>
					<tr style="padding:0px;">
						<td style="padding:0px;vertical-align:middle;">
							<div id="welcome_admin" style="vertical-align:middle;height:100%;">
								Добро пожаловать, <?php  echo "<a href='../my_profile/'>$welcome</a>"; ?>
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
                          <?php }else { ?>
                          
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
                                      <a href='./index.php'><img src="../../styles/images/ru_lang_icon.gif" style="height: 20px;"></a>
									</td>
									<td id="login_header" style="text-align:right;background:#443113;color:white;cursor:pointer;border-left:1px solid #efec9f;padding: 0px 5px;" onmouseover="this.style.background='#675423'" onmouseout="this.style.background='#443113'" onclick="$('#enter_to_user_panel_dialog').dialog('open');">
                                      <img src='../../styles/default/images/login.png' height="100%">
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
                          <?php } ?>
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
                            <td style='text-align:left;font-size:0.9em;padding-left:10px;'>
                                  <button id="btn_send_common_message" style="display:none;font-size:0.8em;" onclick="fn_show_dialog_send_common_message();">Отправить письмо нам</button>
								</td>
							</tr>
							<tr>
								<td style='text-align:left;font-size:0.9em;'>
									<?php
										require_once("../utils/menu.php");
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
								<!--
								<tr style="">
									<td colspan=1 id="td_top_type_board_toolbar" style="font-size:0.6em;padding-left:20px;height:20px;background:#675423;border-bottom:1px solid #efec9f;">
																
									</td>

								</tr>-->
							<tr>
								<td style="vertical-align:top;background: #FFFFFF;">

								
	
