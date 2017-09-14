<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	if(empty($_SESSION['id_user_adm']))
	{
		//exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin = intval($_SESSION['id_user_adm']);
	
	$id = intval($_POST["id"]);
	
	$query = "select * from $tbl_adm_accounts where id=$id";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Возникла ошибка при обращении к базе данных");
	}
	
	$adm = @mysql_fetch_array($res);
	
	if(!$adm)
	{
		exit("Возникла ошибка при обращении к базе данных");
	}
	
	$login = $adm["login"];
	$status = $adm["status"];
	$name = $adm["name"];
	$last_name = $adm["last_name"];
	$patronym = $adm["patronym"];
	$company = $adm["company"];
	$job_title = $adm["job_title"];
	$tel = $adm["tel"];
	$description = $adm["description"];
	$email = $adm["email"];
	$date_reg = $adm["date_reg"];
	$image_profile = $adm["image_profile"];
	$date_last_enter = $adm["date_last_enter"];
	$date_last_activity = $adm["date_last_activity"];
		
	
	$sel = "";
	
	if($status == "0")
	{
		$sel .= "<option value=0 selected>Полный администратор</option>";
	}
	else
	{
		$sel .= "<option value=0>Полный администратор</option>";
	}
	
	if($status == "1")
	{
		$sel .= "<option value=1 selected>Ожидающий подтверждения</option>";
	}
	else
	{
		$sel .= "<option value=1>Ожидающий подтверждения</option>";
	}
	
	if($status == "2")
	{
		$sel .= "<option value=2 selected>Заблокированный</option>";
	}
	else
	{
		$sel .= "<option value=2>Заблокированный</option>";
	}
	
	if($status == "3")
	{
		$sel .= "<option value=3 selected>Ограниченный администратор</option>";
	}
	else
	{
		$sel .= "<option value=3>Ограниченный администратор</option>";
	}
	
?>	
<table style="width:100%;">
		<tr>
			<td colspan=2>
				<p id="error_edit_profile_admin_information_dialog" style="color:red;"></p>
			</td>
		</tr>
		<tr style="">
			<td style="font-weight:bold;border:1px solid black;background:#f8baa1;">Логин:</td>
			<td style="border:1px solid black;"><input id="login_edit_profile_admin_information_dialog" type="textbox" style="width:98%;" value="<?php  echo $login; ?>"></td>
		</tr>
		<tr style="">
			<td style="font-weight:bold;border:1px solid black;background:#f8baa1;">Новый пароль:</td>
			<td style="border:1px solid black;"><input id="new_psw_edit_profile_admin_information_dialog" type="password" style="width:98%;" value=""></td>
		</tr>
			<tr style="">
				<td style="font-weight:bold;border:1px solid black;background:#f8baa1;">Повторите новый пароль:</td>
				<td style="border:1px solid black;"><input id="repeat_new_psw_edit_profile_admin_information_dialog" type="password" style="width:98%;" value=""></td>
		</tr>
		<tr style="">
			<td style="vertical-align:middle;font-weight:bold;border:1px solid black;background:#f8baa1;">Изображение:</td>
			<td style="vertical-align:top;border:1px solid black; padding: 5px;text-align:center;">
				<div style="height:25px;">
					<div style="height:25px;">
						<div id="image_preview_edit_profile_admin_information_dialog" style="width:25px; height:100%;padding:0px;margin:0px;float:left;display:inline;background:#f0efee url('../../styles/images/preview_icon.png') center no-repeat;border:1px solid black;border-right:none;cursor:pointer;">
						</div>
						<div style="padding:0px;margin:0px;float:left;height:100%;">
							<input id="path_image_edit_profile_admin_information_dialog" type="textbox" style="width: 300px;height:100%;padding:0px;background: #f0efee;border:none;border:1px solid black;padding:0px;margin:0px;" value="<?php  echo $image_profile; ?>" disabled>
						</div>
						<div style="float:left;height:100%;padding:0px">
							<button style="height:100%;padding:0px;vertical-align:middle;margin:0px;font-size:0.6em;" id="btn_choice_image_edit_profile_admin_information_dialog">Выбрать</button>
						</div>
						<div style="float:left;">
						</div>
					</div>
				</div>
			</td>
		</tr>
		<tr style="">
			<td style="font-weight:bold;border:1px solid black;background:#f8baa1;">Имя:</td>
			<td style="border:1px solid black;"><input id="name_edit_profile_admin_information_dialog" type="textbox" style="width:98%;" value="<?php  echo $name; ?>"></td>
		</tr>
		<tr style="">
			<td style="font-weight:bold;border:1px solid black;background:#f8baa1;">Фамилия:</td>
			<td style="border:1px solid black;"><input id="last_name_edit_profile_admin_information_dialog" type="textbox" style="width:98%;" value="<?php  echo $last_name; ?>"></td>
		</tr>
		<tr style="">
			<td style="font-weight:bold;border:1px solid black;background:#f8baa1;">Отчество:</td>
			<td style="border:1px solid black;"><input id="patronym_edit_profile_admin_information_dialog" type="textbox" style="width:98%;" value="<?php  echo $patronym; ?>"></td>
		</tr>
		<tr style="">
			<td style="font-weight:bold;border:1px solid black;background:#f8baa1;">Компания:</td>
			<td style="border:1px solid black;"><input id="company_edit_profile_admin_information_dialog" type="textbox" style="width:98%;" value="<?php  echo $company; ?>"></td>
		</tr>
		<tr style="">
			<td style="font-weight:bold;border:1px solid black;background:#f8baa1;">Должность:</td>
			<td style="border:1px solid black;"><input id="job_title_edit_profile_admin_information_dialog" type="textbox" style="width:98%;" value="<?php  echo $job_title; ?>"></td>
		</tr>
		<tr style="">
			<td style="font-weight:bold;border:1px solid black;background:#f8baa1;">Телефон:</td>
			<td style="border:1px solid black;"><input id="tel_edit_profile_admin_information_dialog" type="textbox" style="width:98%;" value="<?php  echo $tel; ?>"></td>
		</tr>
		<tr style="">
			<td style="font-weight:bold;border:1px solid black;background:#f8baa1;">E-mail:</td>
			<td style="border:1px solid black;"><input id="email_edit_profile_admin_information_dialog" type="textbox" style="width:98%;" value="<?php  echo $email; ?>"></td>
		</tr>
		<tr style="">
			<td style="font-weight:bold;border:1px solid black;background:#f8baa1;">Статус:</td>
			<td style="border:1px solid black;">
				<select name="status_edit_profile_admin_information_dialog" id="status_edit_profile_admin_information_dialog" style="width:600px;">
					<?php
						echo $sel; 
					?>
				</select>
			</td>
		</tr>
		<tr style="font-weight:bold;">
			<td style="border:1px solid black;background:#f8baa1;">Дополнительная информация:</td>
			<td style="border:1px solid black;"><textarea id="desc_edit_profile_admin_information_dialog" style="width:98%;"><?php  echo $desc; ?></textarea></td>
		</tr>
		<tr style="font-weight:bold;">
			<td style="text-align:center;padding-top:20px;"  colspan=2><button id="btn_edit_profile_admin_information_dialog">Сохранить</button></td>
		</tr>
	</table>
	<input id="hdn_id_admin" type="hidden" value=<?php  echo $id; ?>>
	<script type="text/javascript">
		$(function(){
			$("#status_edit_profile_admin_information_dialog").selectmenu();
			
			$("#image_preview_edit_profile_admin_information_dialog").mouseover("on",function(e){
				this.t = this.title;
				this.title = '';	
				var c = (this.t != '') ? "<br/>" + this.t : '';
				$("body").append("<p id='image_preview'><span>Отсутствует изображение</span></p>");
				$("#image_preview")
				.css("top",(e.pageY - xOffset) + "px")
				.css("left",(e.pageX + yOffset) + "px")
				.fadeIn("fast");
				var img = new Image();
				img.onload = function(){
				var w = this.width;
				var h = this.height;
				var n_w = w;
				var n_h = h;
				if((w >= h) && (w > 400))
				{
					n_w = 400;
					n_h = parseInt((400/w)*h);
				}
				else if((h > w) && (h > 400))
				{
					n_h = 400;
					n_w = parseInt((400/h)*w);
				}
					$("#image_preview img").remove();
					$("#image_preview span").remove();
					$("#image_preview").append("<img style='width:"+n_w+"px;height:"+n_h+"px;' src="+($('#path_image_edit_profile_admin_information_dialog').val())+ " alt='Отсутствует изображение' />");
				}
				img.src = $('#path_image_edit_profile_admin_information_dialog').val();	

				var w = img.width;
				var h = img.height;
				var n_w = w;
				var n_h = h;
				if((w > 0) && (h > 0))
				{
					if((w >= h) && (w > 400))
					{
						n_w = 400;
						n_h = parseInt((400/w)*h);
					}
					else if((h > w) && (h > 400))
					{
						n_h = 400;
						n_w = parseInt((400/h)*w);
					}
					$("#image_preview img").remove();
					$("#image_preview span").remove();
					$("#image_preview").append("<img style='width:"+n_w+"px;height:"+n_h+"px;' src="+($('#path_image_edit_profile_admin_information_dialog').val())+ " alt='Отсутствует изображение' />");
				}	
			});
			$('#image_preview_edit_profile_admin_information_dialog').mouseout("on",function(){
				this.title = this.t;	
				$("#image_preview").remove();
			});	
			$("#image_preview_edit_profile_admin_information_dialog").mousemove(function(e){
				$("#image_preview")
					.css("top",(e.pageY - xOffset) + "px")
					.css("left",(e.pageX + yOffset) + "px");
			});	
			
			$("#btn_choice_image_edit_profile_admin_information_dialog").button().click("on",function(){
				fn_show_choice_picture();
				$( "#pic" ).dialog( "open" ).dialog( "moveToTop" );
			
			});
			
			$("#btn_edit_profile_admin_information_dialog").button().click("on",function(){
				var login = $("#login_edit_profile_admin_information_dialog").val();
				var new_psw = $("#new_psw_edit_profile_admin_information_dialog").val();
				var repeat_new_psw = $("#repeat_new_psw_edit_profile_admin_information_dialog").val();
				var image_profile = $("#path_image_edit_profile_admin_information_dialog").val();
				var name = $("#name_edit_profile_admin_information_dialog").val();
				var last_name = $("#last_name_edit_profile_admin_information_dialog").val();
				var patronym = $("#patronym_edit_profile_admin_information_dialog").val();
				var company = $("#company_edit_profile_admin_information_dialog").val();
				var job_title = $("#job_title_edit_profile_admin_information_dialog").val();
				var tel = $("#tel_edit_profile_admin_information_dialog").val();
				var email = $("#email_edit_profile_admin_information_dialog").val();
				var status = $("#status_edit_profile_admin_information_dialog").val();
				var description = $("#desc_edit_profile_admin_information_dialog").val();
				var id = $("#hdn_id_admin").val();

				
				var str_error = "";
							
				var exp_login = RegExp("^[a-zA-Z0-9_]{3,25}$");
				var exp_psw = RegExp("^[a-zA-Z0-9_]{6,25}$");
				var exp_email = RegExp("^[a-zA-Z0-9_.\-]+@[a-zA-Z0-9\-._]+[a-zA-Z]{1,4}$");
							
				if(!exp_login.test(login))
				{
					str_error += "Логин не соответствует требованиям<br>";
				}

				if(!(exp_login.test(new_psw) || (new_psw == "")))
				{
					str_error += "Новый пароль не соответствует требованиям<br>";
				}
				if(!(exp_login.test(repeat_new_psw) || (repeat_new_psw == "")))
				{
					str_error += "Повторенный новый пароль не соответствует требованиям<br>";
				}
				if(!exp_email.test(email))
				{
					str_error += "E-mail не соответствует требованиям<br>";
				}
				if((new_psw != repeat_new_psw) || (!((new_psw == "") && (repeat_new_psw == ""))))
				{
					str_error += "Пароли не совпадают<br>";
				}
							
							
				fn_clear_status_loading();
				if(str_error !== "")
				{
					$("#error_edit_profile_admin_information_dialog").html(str_error);
				}
				else
				{
					fn_set_status_loading();
                       
					jqXHR = $.post("./save_edit_profile_admin_information.php","login="+encodeURIComponent(login)+"&id="+encodeURIComponent(id)+"&company="+encodeURIComponent(company)+"&name="+encodeURIComponent(name)+"&last_name="+encodeURIComponent(last_name)+"&patronym="+encodeURIComponent(patronym)+"&new_psw="+encodeURIComponent(new_psw)+"&description="+encodeURIComponent(description)+"&tel="+encodeURIComponent(tel)+"&email="+encodeURIComponent(email)+"&image_profile="+encodeURIComponent(image_profile)+"&company="+encodeURIComponent(company)+"&job_title="+encodeURIComponent(job_title)+"&status="+encodeURIComponent(status),fn_success_edit_profile_admin_information);
					jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при сохранении информации профиля администратора");
					$( "#error_dialog" ).dialog("open");});
				}
							
							
			});
			
			
			
			
			
			
			
			
		});
		
		function fn_success_edit_profile_admin_information(data, textStatus,jqXHR)
		{
			fn_clear_status_loading();
			if(data != "1")
			{
				$("#p_error_dialog").html(data);
				$("#error_dialog" ).dialog("open");
			}
			else
			{
				$("#edit_profile_admin_information").dialog("close");
				$("#p_error_dialog").html("Данные администратора успешно отредактированы");
				$("#error_dialog" ).dialog("open");
				location.reload(true);
			}
		}
		
		
	</script>