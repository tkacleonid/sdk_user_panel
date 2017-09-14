			var set_int;
		  $(function() {
					dialog = $( "#form_block_reg" ).dialog({
					autoOpen: false,
					height: 800,
					width: 650,
					modal: true,
					resizable:false,
					title:"Регистрация пользователя",
					open: function(){
						$("#psw_reg").val("");
					},
						
					});
            
            		dialog_rec = $( "#form_block_recovery_password" ).dialog({
					autoOpen: false,
					height: 500,
					width: 650,
					modal: true,
					resizable:false,
					title:"Восстановление пароля"
					});

					$( "#reg" ).button().on( "click", function() {
					dialog.dialog( "open" );
					});
            
            		$( "#reс" ).button().on( "click", function() {
					 $( "#form_block_recovery_password" ).dialog( "open" );
					});
            
            		$("#enter_adm" ).button().on( "click", enter_adm);
            
            
					
					$( ".jquery_btn" ).button();
					
					$("#btn_login_reg_help" ).button({
					icons: {
					primary: "ui-icon-help"
					},
					text:false
					});
					
					$("#login_reg").qtip({
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
            
            	$("#login_enter_adm").qtip({
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
            
					
					$("#psw_reg").qtip({
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
            
            
					$("#psw_enter_adm").qtip({
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
            
					
					$("#last_name_reg").qtip({
						 content: {
							text: 'Для поля "Фамилия" допускается ввод любых символов',
							title: {
								text: 'Фамилия'
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
					
					$("#name_reg").qtip({
						 content: {
							text: 'Для поля "Имя" допускается ввод любых символов',
							title: {
								text: 'Имя'
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
					
					$("#patronym_reg").qtip({
						 content: {
							text: 'Для поля "Отчество" допускается ввод любых символов',
							title: {
								text: 'Отчество'
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
					
					$("#company_reg").qtip({
						 content: {
							text: 'Для поля "Компания" допускается ввод любых символов. В это поле вы должны ввести наименование компании, в которой в настоящий момент работаете',
							title: {
								text: 'Компания'
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
					
					$("#prof_reg").qtip({
						 content: {
							text: 'Для поля "Должность" допускается ввод любых символов. В это поле вы должны ввести текущую занимаемую вами должность',
							title: {
								text: 'Должность'
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
					
					$("#phone_reg").qtip({
						 content: {
							text: 'Для поля "Телефон" допускается ввод до 10-ти цифр. В это поле вы должны ввести ваш контактный телефон',
							title: {
								text: 'Телефон'
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
            
            
					
					$("#email_reg").qtip({
						 content: {
							text: "Для поля 'E-mail' допускается ввод цифр,латинских букв и символов '-','_','.'. В это поле вы должны ввести ваш e-mail, на который вам придет статус проверки вашей заявки на регистрацию. E-mail должен соответствовать формату some@some.domain",
							title: {
								text: 'E-mail'
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
					
					$("#email_rec").qtip({
						 content: {
							text: "Для поля 'E-mail' допускается ввод цифр,латинских букв и символов '-','_','.'. В это поле вы должны ввести ваш e-mail, на который вам придет статус проверки вашей заявки на регистрацию. E-mail должен соответствовать формату some@some.domain",
							title: {
								text: 'E-mail'
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
					
					
					 $( "#error_check_user" ).dialog({
						modal: true,
						autoOpen: false,
						dialogClass: "alert",
						
						width: 400,
					});
            
            $( "#error_check_user_enter" ).dialog({
						modal: true,
						autoOpen: false,
						dialogClass: "alert",
						
						width: 400,
					});
            
            $( "#error_check_user_rec" ).dialog({
						modal: true,
						autoOpen: false,
						dialogClass: "alert",
						
						width: 400,
					});
            
            
            		$( "#success_reg_user" ).dialog({
						modal: true,
						autoOpen: false,
						dialogClass: "alert",
						
						width: 400,
					});
            
            		$( "#success_rec_user" ).dialog({
						modal: true,
						autoOpen: false,
						dialogClass: "alert",
						
						width: 400,
					});
					
					
					$( "#error_check_user" ).dialog( "option", "dialogClass", "alert" );
		  });
          
          function enter_adm()
          {
            fn_set_status_loading();
            
            $("#error_enter_adm").html("");
            
            var reg_exp_login = RegExp("^[a-zA-Z0-9_]{3,25}$");
			var reg_exp_psw = RegExp("^[a-zA-Z0-9_]{6,25}$");
			
			
			var str_error = "<div style='color:red;'>";
			
			
			if(!reg_exp_login.test($("#login_enter_adm").val())){
				str_error += "Логин не соответствует требованиям<br>";
			}
			if(!reg_exp_psw.test($("#psw_enter_adm").val())){
				str_error += "Пароль не соответствует требованиям<br>";
			}
			
			
			fn_clear_status_loading();
			str_error += "</div>";
			if(str_error !== "<div style='color:red;'></div>"){
				$("#error_enter_adm").html(str_error);
			}
			else{
			
				fn_check_user_enter($("#login_enter_adm").val(),$("#psw_enter_adm").val());
			}
            
            return false;
            
          }
          
          function fn_check_user_enter(login,psw)
		  {
			fn_set_status_loading();
                       
            
			jqXHR = $.post("./check_user_enter.php","login="+encodeURIComponent(login)+"&psw="+encodeURIComponent(psw),fn_success_check_user_enter);
			jqXHR.fail(function(){fn_clear_status_loading();$( "#error_check_user_enter" ).dialog("open");});
			
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
				$("#error_enter_adm").html(str_error);
			}
			else{
			
				fn_user_enter_adm();
			}
            
            
            
		  }
          
          function fn_user_enter_adm()
          {
            $("#form_enter").submit();
          }
          
          
          
		  function fn_change_load(){
		  
		  }
		  
		  function fn_set_status_loading(){
			$("#front_hide").show();
			$("#status_loading").css("display","block");
		  }
		  
		  function fn_clear_status_loading(){
			$("#status_loading").css("display","none");
			$("#front_hide").hide();
		  }
		  function fn_reg()
		  {
			fn_set_status_loading();
			
			$("#error_reg").html("");
			
			var reg_exp_login = RegExp("^[a-zA-Z0-9_]{3,25}$");
			var reg_exp_psw = RegExp("^[a-zA-Z0-9_]{6,25}$");
			var reg_exp_email = RegExp("^[a-zA-Z0-9_.\-]+@[a-zA-Z0-9\-._]+[a-zA-Z]{1,4}$");
			
			
			var str_error = "<div style='color:red;'>";
			
			
			if(!reg_exp_login.test($("#login_reg").val())){
				str_error += "Логин не соответствует требованиям<br>";
			}
			if(!reg_exp_psw.test($("#psw_reg").val())){
				str_error += "Пароль не соответствует требованиям<br>";
			}
			if(!reg_exp_email.test($("#email_reg").val())){
				str_error += "E-mail не соответствует требованиям<br>";
			}
			
			
			fn_clear_status_loading();
			str_error += "</div>";
			if(str_error !== "<div style='color:red;'></div>"){
				$("#error_reg").html(str_error);
			}
			else{
			
				fn_check_user($("#login_reg").val(),$("#psw_reg").val(),$("#email_reg").val());
			}
			
			
		  }
		  
		  function fn_check_user(login,psw,email)
		  {
			fn_set_status_loading();
            
            var keystring = $("#captcha_reg").val();
           
            
			jqXHR = $.post("./check_user.php","login="+encodeURIComponent(login)+"&psw="+encodeURIComponent(psw)+"&email="+encodeURIComponent(email)+"&keystring="+encodeURIComponent(keystring),fn_success_check_user);
			jqXHR.fail(function(){fn_clear_status_loading();$( "#error_check_user" ).dialog("open");});
			
		  }
		  
		  function fn_success_check_user(data,textStatus,jqXHR)
		  {
			fn_clear_status_loading();
			var str_error = "<div style='color:red;'>";
			
			if(data !== "")
			{
				str_error += data;
			}
			
			str_error += "</div>";
			
			if(str_error !== "<div style='color:red;'></div>"){
				$("#error_reg").html(str_error);
                $("#captcha_reg_img").click();
			}
			else{
			
				fn_reg_user();
			}
            
            
            
		  }
		  
		  function fn_reg_user(){
			fn_set_status_loading();
			
			var login = $("#login_reg").val();
			var psw = $("#psw_reg").val();
			var last_name = $("#last_name_reg").val();
			var name = $("#name_reg").val();
			var patronym = $("#patronym_reg").val();
			var job_title = $("#prof_reg").val();
			var company = $("#company_reg").val();
			var email = $("#email_reg").val();
			var tel = $("#phone_reg").val();
            var keystring = $("#captcha_reg").val();
			
			
			jqXHR = $.post("./reg_user.php","login="+encodeURIComponent(login)+"&psw="+encodeURIComponent(psw)+"&email="+encodeURIComponent(email)+"&name="+encodeURIComponent(name)+"&last_name="+encodeURIComponent(last_name)+"&patronym="+encodeURIComponent(patronym)+"&company="+encodeURIComponent(company)+"&job_title="+encodeURIComponent(job_title)+"&tel="+encodeURIComponent(tel)+"&keystring="+encodeURIComponent(keystring),fn_success_reg_user);
			jqXHR.fail(function(){fn_clear_status_loading();$( "#error_check_user" ).dialog("open");});
		  }
		  
		  function fn_success_reg_user(data,textStatus,jqXHR)
		  {
			fn_clear_status_loading();
			
			$("#form_block_reg").dialog("close");
            $("#success_reg_user").dialog("open");
            
		  }
          
          
          
          
          
          function fn_rec()
		  {
			fn_set_status_loading();
			
			$("#error_rec").html("");
			

			var rec_exp_email = RegExp("^[a-zA-Z0-9_.\-]+@[a-zA-Z0-9\-._]+[a-zA-Z]{1,4}$");
			
			
			var str_error = "<div style='color:red;'>";
			
			

			if(!rec_exp_email.test($("#email_rec").val())){
				str_error += "E-mail не соответствует требованиям<br>";
			}
			
			
			fn_clear_status_loading();
			str_error += "</div>";
			if(str_error !== "<div style='color:red;'></div>"){
				$("#error_rec").html(str_error);
			}
			else{
			
				fn_check_user_rec($("#email_rec").val());
			
			}
			
			
		  }
		  
		  function fn_check_user_rec(email)
		  {
			fn_set_status_loading();
            
            var keystring = $("#captcha_rec").val();
           
            
			jqXHR = $.post("./check_user_rec.php","email="+encodeURIComponent(email)+"&keystring="+encodeURIComponent(keystring),fn_success_check_user_rec);
			jqXHR.fail(function(){fn_clear_status_loading();$( "#error_check_user_rec" ).dialog("open");});
			
		  }
		  
		  function fn_success_check_user_rec(data,textStatus,jqXHR)
		  {
			fn_clear_status_loading();
			var str_error = "<div style='color:red;'>";
			
			if(data !== "")
			{
				str_error += data;
			}
			
			str_error += "</div>";
			
			if(str_error !== "<div style='color:red;'></div>"){
				$("#error_rec").html(str_error);
                $("#captcha_rec_img").click();
			}
			else{
			
				fn_rec_user();
			}
            
            
            
		  }
		  
		  function fn_rec_user(){
			fn_set_status_loading();
			
			var email = $("#email_rec").val();
            var keystring = $("#captcha_rec").val();
			
			
			jqXHR = $.post("./rec_user.php","email="+encodeURIComponent(email)+"&keystring="+encodeURIComponent(keystring),fn_success_rec_user);
			jqXHR.fail(function(){fn_clear_status_loading();$( "#error_check_user_rec" ).dialog("open");});
		  }
		  
		  function fn_success_rec_user(data,textStatus,jqXHR)
		  {
			fn_clear_status_loading();
			
			$("#form_block_rec").dialog("close");
            $("#success_rec_user").dialog("open");
            
		  }