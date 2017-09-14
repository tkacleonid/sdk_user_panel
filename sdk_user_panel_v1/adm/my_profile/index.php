<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	include_once("../../config/config.php");
	
	include_once("../utils/menu.php");
	
	include_once("../utils/top_html.php");
	
	if(empty($_SESSION['id_user_adm']))
	{
		//exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin = intval($_SESSION['id_user_adm']);
	
	$query = "select * from $tbl_adm_accounts where id=$id_admin";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		//exit("Возникла ошибка при обращении к базе данных");
	}
	
	$res = @mysql_fetch_array($res);
	
	if(!$res)
	{
		//exit("Возникла ошибка при обращении к базе данных");
	}
	
	
	$login = $res["login"];
	$status = $res["status"];
	$name = $res["name"];
	$last_name = $res["last_name"];
	$patronym = $res["patronym"];
	$company = $res["company"];
	$job_title = $res["job_title"];
	$tel = $res["tel"];
	$tel = $res["tel"];
	$email = $res["email"];
	$desc = $res["description"];
	$image_profile = $res["image_profile"];
	$date_reg = $res["date_reg"];
	
	$title_adm = "Мой профиль";
	
	include_once("../utils/top_page.php");

?>	
<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/jquery.tinymce.min.js"></script>
<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/plugins/tiny_mce_wiris/core/display.js"></script>
<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/plugins/tiny_mce_wiris/integration/WIRISplugins.js?viewer=image"></script>
	
<script type="text/javascript" src="./main_script.js">
</script>


<table cellspacing=0 cellpadding=0 style="padding:20px;">
	<tr>
		<td>
			<table>
				<tr>
					<td id="my_profile_picture">
						<img src="<?php if($image_profile == "") {echo "../../pictures/general/my_profile.png";} else {echo $image_profile;} ?>" style="width:200px; overflow:hidden;border:1px solid #5a1f08;">
					</td>
					<td style="vertical-align:top;text-align:center;font-size:0.6em;">
						<button id="btn_delete_profile_picture">Удалить</button>
						<button id="btn_choice_profile_picture">Изменить</button>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table cellspacing=0 cellpadding=0 style="padding:0px;width:1000px;">
						<tr>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:bold;width:300px;background:#f8baa1;padding:10px;vertical-align:middle;">
								Логин:
							</td>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:normal;text-align:left;vertical-align:middle;padding:10px;">
								<div style="width:100%;">
									<?php
										echo $login;
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:bold;width:300px;background:#f8baa1;padding:10px;vertical-align:middle;">
								Имя:
							</td>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:normal;text-align:left;vertical-align:middle;padding:10px;">
								<div style="width:100%;">
									<?php
										echo $name;
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:bold;width:300px;background:#f8baa1;padding:10px;vertical-align:middle;">
								Фамилия:
							</td>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:normal;text-align:left;vertical-align:middle;padding:10px;">
								<div style="width:100%;">
									<?php
										echo $last_name;
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:bold;width:300px;background:#f8baa1;padding:10px;vertical-align:middle;">
								Отчество:
							</td>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:normal;text-align:left;vertical-align:middle;padding:10px;">
								<div style="width:100%;">
									<?php
										echo $patronym;
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:bold;width:300px;background:#f8baa1;padding:10px;vertical-align:middle;">
								Компания:
							</td>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:normal;text-align:left;vertical-align:middle;padding:10px;">
								<div style="width:100%;">
									<?php
										echo $company;
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:bold;width:300px;background:#f8baa1;padding:10px;vertical-align:middle;">
								Должность:
							</td>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:normal;text-align:left;vertical-align:middle;padding:10px;">
								<div style="width:100%;">
									<?php
										echo $job_title;
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:bold;width:300px;background:#f8baa1;padding:10px;vertical-align:middle;">
								Телефон:
							</td>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:normal;text-align:left;vertical-align:middle;padding:10px;">
								<div style="width:100%;">
									<?php
										echo $tel;
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:bold;width:300px;background:#f8baa1;padding:10px;vertical-align:middle;">
								E-mail:
							</td>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:normal;text-align:left;vertical-align:middle;padding:10px;">
								<div style="width:100%;">
									<?php
										echo $email;
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:bold;width:300px;background:#f8baa1;padding:10px;vertical-align:middle;">
								Дополнительная информация:
							</td>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:normal;text-align:left;vertical-align:middle;padding:10px;">
								<div style="width:100%;">
									<?php
										echo $desc;
									?>
								</div>
							</td>
						</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td style="vertical-align:top;border:none;font-weight:bold;font-size:0.6em;padding-top:10px;">
			<button id="btn_edit_profile_user_information" class="btn_edit">Редактировать</button>
		</td>
		<td></td>
	</tr>
</table>				


<div id="edit_profile_user_information" style="border:1px solid #5a1f08;width:850px;display:none;">
	<table style="">
		<tr>
			<td colspan=2>
				<p id="error_edit_profile_user_information_dialog" style="color:red;"></p>
			</td>
		</tr>
		<tr style="">
			<td style="font-weight:bold;border:1px solid black;background:#f8baa1;">Логин:</td>
			<td style="border:1px solid black;"><input id="login_edit_profile_user_information_dialog" type="textbox" style="width: 500px;" value="<?php  echo $login; ?>"></td>
		</tr>
		<tr style="">
			<td style="font-weight:bold;border:1px solid black;background:#f8baa1;">Текущий пароль:</td>
			<td style="border:1px solid black;"><input id="old_psw_edit_profile_user_information_dialog" type="password" style="width: 500px;"></td>
		</tr>
		<tr style="">
			<td style="font-weight:bold;border:1px solid black;background:#f8baa1;">Новый пароль:</td>
			<td style="border:1px solid black;"><input id="new_psw_edit_profile_user_information_dialog" type="password" style="width: 500px;"></td>
		</tr>
			<tr style="">
				<td style="font-weight:bold;border:1px solid black;background:#f8baa1;">Повторите новый пароль:</td>
				<td style="border:1px solid black;"><input id="repeat_new_psw_edit_profile_user_information_dialog" type="password" style="width: 500px;"></td>
		</tr>
		<tr style="">
			<td style="vertical-align:middle;font-weight:bold;border:1px solid black;background:#f8baa1;">Изображение:</td>
			<td style="vertical-align:top;border:1px solid black; padding: 5px;text-align:center;">
				<div style="height:25px;">
					<div style="height:25px;">
						<div id="image_preview_edit_profile_user_information_dialog" style="width:25px; height:100%;padding:0px;margin:0px;float:left;display:inline;background:#f0efee url('../../styles/images/preview_icon.png') center no-repeat;border:1px solid black;border-right:none;cursor:pointer;">
						</div>
						<div style="padding:0px;margin:0px;float:left;height:100%;">
							<input id="path_image_edit_profile_user_information_dialog" type="textbox" style="width: 300px;height:100%;padding:0px;background: #f0efee;border:none;border:1px solid black;padding:0px;margin:0px;" value="<?php  echo $image_profile; ?>" disabled>
						</div>
						<div style="float:left;height:100%;padding:0px">
							<button style="height:100%;padding:0px;vertical-align:middle;margin:0px;font-size:0.6em;" id="btn_choice_image_edit_profile_user_information_dialog">Выбрать</button>
						</div>
						<div style="float:left;">
						</div>
					</div>
				</div>
			</td>
		</tr>
		<tr style="">
			<td style="font-weight:bold;border:1px solid black;background:#f8baa1;">Имя:</td>
			<td style="border:1px solid black;"><input id="name_edit_profile_user_information_dialog" type="textbox" style="width: 500px;" value="<?php  echo $name; ?>"></td>
		</tr>
		<tr style="">
			<td style="font-weight:bold;border:1px solid black;background:#f8baa1;">Фамилия:</td>
			<td style="border:1px solid black;"><input id="last_name_edit_profile_user_information_dialog" type="textbox" style="width: 500px;" value="<?php  echo $last_name; ?>"></td>
		</tr>
		<tr style="">
			<td style="font-weight:bold;border:1px solid black;background:#f8baa1;">Отчество:</td>
			<td style="border:1px solid black;"><input id="patronym_edit_profile_user_information_dialog" type="textbox" style="width: 500px;" value="<?php  echo $patronym; ?>"></td>
		</tr>
		<tr style="">
			<td style="font-weight:bold;border:1px solid black;background:#f8baa1;">Компания:</td>
			<td style="border:1px solid black;"><input id="company_edit_profile_user_information_dialog" type="textbox" style="width: 500px;" value="<?php  echo $company; ?>"></td>
		</tr>
		<tr style="">
			<td style="font-weight:bold;border:1px solid black;background:#f8baa1;">Должность:</td>
			<td style="border:1px solid black;"><input id="job_title_edit_profile_user_information_dialog" type="textbox" style="width: 500px;" value="<?php  echo $job_title; ?>"></td>
		</tr>
		<tr style="">
			<td style="font-weight:bold;border:1px solid black;background:#f8baa1;">Телефон:</td>
			<td style="border:1px solid black;"><input id="tel_edit_profile_user_information_dialog" type="textbox" style="width: 500px;" value="<?php  echo $tel; ?>"></td>
		</tr>
		<tr style="">
			<td style="font-weight:bold;border:1px solid black;background:#f8baa1;">E-mail:</td>
			<td style="border:1px solid black;"><input id="email_edit_profile_user_information_dialog" type="textbox" style="width: 500px;" value="<?php  echo $email; ?>"></td>
		</tr>
		<tr style="font-weight:bold;">
			<td style="border:1px solid black;background:#f8baa1;">Дополнительная информация:</td>
			<td style="border:1px solid black;"><textarea id="desc_edit_profile_user_information_dialog" style="width: 500px;"><?php  echo $desc; ?></textarea></td>
		</tr>
		<tr style="font-weight:bold;">
			<td style="text-align:center;padding-top:20px;"  colspan=2><button id="btn_edit_profile_user_information_dialog">Сохранить</button></td>
		</tr>
	</table>
</div>
					
					
<div id="pic" style="border:1px solid #5a1f08;width:850px;display:none;">
					
</div>
<div id="status_loading" style="display:none;">
			<div id="loading">	
			</div>
</div>
<div id="error_dialog" style="text-align:center; display: none;">
	<p id="p_error_dialog" style="width:100%"></p>
	<hr>
	<button id="btn_error_dialog" style="margin:20px";>OK</button>
<div>



<?php
	require_once("../utils/bottom_page.php");
?>
							
							