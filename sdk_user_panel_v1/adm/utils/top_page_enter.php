<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Панель администрирования программного комплекса СДК-8</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
		<link rel="StyleSheet" type="text/css" href="../../scripts/js/jquery-ui-1.11.2.custom/jquery-ui.min.css">
		<link rel="StyleSheet" type="text/css" href="../../scripts/js/jquery-ui-1.11.2.custom/jquery-ui.theme.min.css">
		<link rel="StyleSheet" type="text/css" href="../../scripts/js/jquery-ui-1.11.2.custom/jquery-ui.structure.min.css">
		<link rel="StyleSheet" type="text/css" href="../../scripts/js/jquery.qtip.min.css">
		<link rel="StyleSheet" type="text/css" href="../../styles/default/responsiveslides.css">
		<link rel="StyleSheet" type="text/css" href="../utils/adm_enter.css">
		<script type="text/javascript" src="../../scripts/js/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="../../scripts/js/jquery.qtip.min.js"></script>
		<script type="text/javascript" src="../../scripts/js/responsiveslides.min.js"></script>
		<script type="text/javascript" src="../../scripts/js/jquery-ui-1.11.2.custom/jquery-ui.min.js"></script>
		<script src="./enter_adm_script.js" type="text/javascript"></script>
	</head>
	<body>
		<div id="content">
			<div id="block_login">
				<div id="title_block_login">
					<div id="logo">
						<img src="../../styles/images/dia_logo.gif" width=300px style="margin:0px;">
					</div>
					<hr style="width:80%;color:white;border:2px solid black;">
				</div>
              <div id="error_enter_adm" style="width: 100%, text-align:center; padding-left: 60px;">
                
              </div>
				<div id="form_block_login">
                  <form id="form_enter" method="POST" action="../index.php">
						<fieldset id="input" style="border:none;">
							<input type="textbox" value='Логин' class="login" onBlur="if(this.value == '') this.value = 'Логин'" onFocus="if(this.value == 'Логин') this.value = ''" id="login_enter_adm"  name="login_enter_adm">
							<br>
							<input type="password" class="password" value="Пароль" onBlur="if(this.value == '') this.value = 'Пароль'" onFocus="if(this.value == 'Пароль') this.value = ''" id="psw_enter_adm" name="psw_enter_adm">
						</fieldset>
						<fieldset style="border:none;color:white;">
							<label>Запомнить?</label>
							<input type="checkbox" value='true' id="remember_adm" name="remember_adm">
						</fieldset>
						<fieldset style="border:none;">
							<input type="submit" value='Войти' class="jquery_btn" id="enter_adm">
						</fieldset>
						<fieldset style="border:none;">
							<input type="button" value='Забыли пароль' id="reс" class="jquery_btn">
							<input type="button" value='Регистрация' id="reg" class="jquery_btn">
						</fieldset>
					</form>
				</div>
				<div>
					<div id="form_block_reg">
						<form id="form_reg" class="div_table">
							<div  id="error_reg" style="padding-bottom:30px;">
							</div>
							<div  style="padding-bottom:30px;">
								Поля, отмеченные *, обязательны для заполнения.
							</div>
							<fieldset id="input" style="border:1px solid white;border-radius:20px;background: #bdbbb9;">
							<div  class="div_row">
								<label for="login_reg" class="div_cell">Логин:* </label>
								<input type="textbox" value=''  class="div_cell" id="login_reg">
							</div>
							<div  class="div_row">
								<label for="psw_reg" class="div_cell">Пароль:* </label>
								<input type="password"  class="div_cell" value="" id="psw_reg">
							</div>
							<div  class="div_row">
								<label for="last_name_reg" class="div_cell">Фамилия: </label>
								<input type="textbox"  class="div_cell" value="" id="last_name_reg">
							</div>
							<div  class="div_row">
								<label for="name_reg" class="div_cell">Имя: </label>
								<input type="textbox"  class="div_cell" value="" id="name_reg">
							</div>
							<div  class="div_row">
								<label for="patronym_reg" class="div_cell">Отчество: </label>
								<input type="textbox"  class="div_cell" value="" id="patronym_reg">
							</div>
							<div  class="div_row">
								<label for="company_reg" class="div_cell">Компания: </label>
								<input type="textbox"  class="div_cell" value="" id="company_reg">
							</div>
							<div  class="div_row">
								<label for="prof_reg" class="div_cell">Должность: </label>
								<input type="textbox"  class="div_cell" value="" id="prof_reg">
							</div>
							<div  class="div_row">
								<label for="phone_reg" class="div_cell">Тел.: </label>
								<input type="textbox"  class="div_cell" value="" id="phone_reg">
							</div>
							<div  class="div_row">
								<label for="email_reg" class="div_cell">E-mail:* </label>
								<input type="textbox"  class="div_cell" value="" id="email_reg">
							</div>
							</fieldset>
                          
                          
                          	<fieldset style="text-align:center;border: none;">
                              <p>Введите код с картинки:</p>
                              <p><img title="Если Вы не видите число на картинке, нажмите на картинку мышкой" onclick="this.src=this.src+'&amp;'+Math.round(Math.random())" src="captcha/imaga.php?<?php echo session_name()?>=<?php echo session_id()?>"  id="captcha_reg_img">	
                              <p><input type="text" name="keystring" id="captcha_reg"></p>
                              <p style="font-size:10px;">Если не видите код - кликните по картинке</p>
                              </fieldset>
                          
                          
							<fieldset style="text-align:center;border: none;">
								<input type="button" id="btn_reg_submit" class="jquery_btn" value="Зарегистрироваться" onclick="fn_reg();">
							</fieldset>
						</form>
					</div>
				</div>
              
              
              
              
                 <div>
					<div id="form_block_recovery_password" style='display:none;'>
						<form id="form_recovery_password" class="div_table">
							<div  id="error_rec" style="padding-bottom:30px;">
							</div>
							<div  style="padding-bottom:30px;">
								Пожалуйста, введите E-mail, указанный вами при регистрации, на него придет письмо с вашими регистрационными данными.
							</div>
							<fieldset id="input_email_for_rec" style="border:1px solid white;border-radius:20px;background: #bdbbb9;">
								<div style="text-align:center;">
									<label for="email_rec">E-mail: </label>
									<input type="textbox"  value="" id="email_rec" style="width: 300px;">
								</div>
							</fieldset>
                                                    
                          	<fieldset style="text-align:center;border: none;">
                              <p>Введите код с картинки:</p>
                              <p><img title="Если Вы не видите число на картинке, нажмите на картинку мышкой" onclick="this.src=this.src+'&amp;'+Math.round(Math.random())" src="captcha/imaga.php?<?php echo session_name()?>=<?php echo session_id()?>"  id="captcha_rec_img">	
                              <p><input type="text" name="keystring" id="captcha_rec"></p>
                              <p style="font-size:10px;">Если не видите код - кликните по картинке</p>
                              </fieldset>
                          
                          
							<fieldset style="text-align:center;border: none;">
								<input type="button" id="btn_reс_submit" class="jquery_btn" value="Отправить" onclick="fn_rec();">
							</fieldset>
						</form>
					</div>
				</div>
			</div>
			<div id="status_loading" style='display:none;'>
				<div id="loading">	
				</div>
			</div>
			<div id="error_check_user" style="text-align:justify;" style='display:none;'>
				<p>
					<img src="../../styles/images/icon-alert.png" style="float:left;margin:10px;">
					Произошла ошибка при регистрации. Пожалуйста, попробуйте позже.
				</p>
			</div>
          
          <div id="error_check_user_enter" style="text-align:justify;" style='display:none;'>
				<p>
					<img src="../../styles/images/icon-alert.png" style="float:left;margin:10px;">
					Произошла ошибка при входе. Пожалуйста, попробуйте позже.
				</p>
			</div>
          
          <div id="error_check_user_rec" style="text-align:justify;" style='display:none;'>
				<p>
					<img src="../../styles/images/icon-alert.png" style="float:left;margin:10px;">
					Произошла ошибка при восстановлении пароля. Пожалуйста, попробуйте позже.
				</p>
			</div>
          
          
          
          <div id="success_reg_user" style="text-align:justify;" style='display:none;'>
				<p>
					Регистрация прошла успешна. На почту, указанную при регистрации, выслано письмо с регистрационными данными. Как только администратор одобрит вашу заявку, вы получите уведомление на вашу почту и сможете войти в панель администрирования.
				</p>
		  </div>
          
          <div id="success_rec_user" style="text-align:justify;" style='display:none;'>
				<p>
					Восстановление пароля прошло успешно. На почту, указанную при регистрации, выслано письмо с регистрационными данными.
				</p>
		  </div>
          
          
		</div>
		<div class="ui-widget-overlay ui-front" style="z-index: 1000; display:none;" id="front_hide"></div>
	
<?php
unset($_SESSION['captcha_keystring']);
?>
  </body>
</html>