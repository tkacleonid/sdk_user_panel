					xOffset = 10;
					yOffset = 30;
				
					$(function(){
                      
                      $("#td_content_block").css("display","table-cell");	
                      
						$("#image_preview_edit_profile_user_information_dialog").mouseover("on",function(e){
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
								$("#image_preview").append("<img style='width:"+n_w+"px;height:"+n_h+"px;' src="+($('#path_image_edit_profile_user_information_dialog').val())+ " alt='Отсутствует изображение' />");
							}
							img.src = $('#path_image_edit_profile_user_information_dialog').val();	

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
								$("#image_preview").append("<img style='width:"+n_w+"px;height:"+n_h+"px;' src="+($('#path_image_edit_profile_user_information_dialog').val())+ " alt='Отсутствует изображение' />");
							}	
						});
						$('#image_preview_edit_profile_user_information_dialog').mouseout("on",function(){
							this.title = this.t;	
							$("#image_preview").remove();
						});	
						$("#image_preview_edit_profile_user_information_dialog").mousemove(function(e){
							$("#image_preview")
								.css("top",(e.pageY - xOffset) + "px")
								.css("left",(e.pageX + yOffset) + "px");
						});	
					
					
					
					
					
					
					
					
					
						$( "#error_dialog" ).dialog({
							autoOpen: false,
							height: 200,
							width: 600,
							modal: true,
							resizable:false,
							dialogClass:"none_header_dialog"
						});
						
						$( "#pic" ).dialog({
							autoOpen: false,
							height: 700,
							width: 750,
							modal: true,
							resizable:false,
							dialogClass:"none_header_dialog",
							close:function(){							
							}
						});
						
						
						
						
						$( "#btn_choice_profile_picture" ).button({icons:{primary:'ui-icon-pencil'},text:false,}).on( "click", function() {
							fn_show_choice_picture();
							$( "#pic" ).dialog( "open" ).dialog( "moveToTop" );
						});
						
						
						$( "#btn_delete_profile_picture" ).button({icons:{primary:'ui-icon-close'},text:false,}).on( "click", function() {
							if(confirm("Вы действительно хотите удалить изображение профиля?"))
							{
								fn_set_status_loading();
                       
								jqXHR = $.post("./delete_image_profile.php","",fn_success_delete_image_profile);
								jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при удалении изображения профиля пользователя");
								$( "#error_dialog" ).dialog("open");});
							}						
						});
						
						
						$('.btn_edit').button({
				icons:{primary:'ui-icon-pencil'},text:false,
			});
						
						
						
						$("#btn_edit_profile_user_information" ).button().on( "click", function() {
							$("#edit_profile_user_information").dialog("open");
						});
						
						$( "#edit_profile_user_information" ).dialog({
							autoOpen: false,
							height: 700,
							width: 700,
							modal: true,
							resizable:false,
							title:"Редактирование профиля",
						});
						
						$( "#btn_choice_image_edit_profile_user_information_dialog" ).button().on( "click", function() {
							fn_show_choice_picture();
							$( "#pic" ).dialog( "open" ).dialog( "moveToTop" );
						});
						
						$( "#btn_edit_profile_user_information_dialog" ).button().on( "click", function() {
							
							fn_set_status_loading();
			
							$("#error_edit_profile_user_information_dialog").html("");
			
							var login = $("#login_edit_profile_user_information_dialog").val();
							var name = $("#name_edit_profile_user_information_dialog").val();
							var last_name = $("#last_name_edit_profile_user_information_dialog").val();
							var patronym = $("#patronym_edit_profile_user_information_dialog").val();
							var company = $("#company_edit_profile_user_information_dialog").val();
							var job_title = $("#job_title_edit_profile_user_information_dialog").val();
							var tel = $("#tel_edit_profile_user_information_dialog").val()
							var email = $("#email_edit_profile_user_information_dialog").val();
							var desc = $("#desc_edit_profile_user_information_dialog").val();
							var image_profile = $("#path_image_edit_profile_user_information_dialog").val();
							var old_psw = $("#old_psw_edit_profile_user_information_dialog").val();
							var new_psw = $("#new_psw_edit_profile_user_information_dialog").val();;
							var repeat_new_psw = $("#repeat_new_psw_edit_profile_user_information_dialog").val();
	
							
							var str_error = "";
							
							var exp_login = RegExp("^[a-zA-Z0-9_]{3,25}$");
							var exp_psw = RegExp("^[a-zA-Z0-9_]{6,25}$");
							var exp_email = RegExp("^[a-zA-Z0-9_.\-]+@[a-zA-Z0-9\-._]+[a-zA-Z]{1,4}$");
							
							if(!exp_login.test(login))
							{
								str_error += "Логин не соответствует требованиям<br>";
							}
							if(!exp_login.test(old_psw))
							{
								str_error += "Текущий пароль не соответствует требованиям<br>";
							}
							if(!exp_login.test(new_psw))
							{
								str_error += "Новый пароль не соответствует требованиям<br>";
							}
							if(!exp_login.test(repeat_new_psw))
							{
								str_error += "Повторенный новый пароль не соответствует требованиям<br>";
							}
							if(!exp_email.test(email))
							{
								str_error += "E-mail не соответствует требованиям<br>";
							}
							if(new_psw !== repeat_new_psw)
							{
								str_error += "Пароли не совпадают<br>";
							}
							
							
							fn_clear_status_loading();
							if(str_error !== "")
							{
								$("#error_edit_profile_user_information_dialog").html(str_error);
							}
							else
							{
								fn_set_status_loading();
                       
								jqXHR = $.post("./save_edit_profile_user_information.php","login="+encodeURIComponent(login)+"&company="+encodeURIComponent(company)+"&name="+encodeURIComponent(name)+"&last_name="+encodeURIComponent(last_name)+"&patronym="+encodeURIComponent(patronym)+"&old_psw="+encodeURIComponent(old_psw)+"&new_psw="+encodeURIComponent(new_psw)+"&desc="+encodeURIComponent(desc)+"&tel="+encodeURIComponent(tel)+"&email="+encodeURIComponent(email)+"&image_profile="+encodeURIComponent(image_profile)+"&company="+encodeURIComponent(company)+"&job_title="+encodeURIComponent(job_title),fn_success_edit_profile_user_information);
								jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при сохранении информации профиля пользователя");
								$( "#error_dialog" ).dialog("open");});
							}
						});
						
						$("#login_edit_profile_user_information_dialog").qtip({
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
            
					
					$("#old_psw_edit_profile_user_information_dialog,#new_psw_edit_profile_user_information_dialog,#repeat_new_psw_edit_profile_user_information_dialog").qtip({
						 content: {
							text: 'Для пароля допускается ввод чисел от 0 до 9, а также букв латинского алфавита и символа "_". Длина пароля должна быть не менее 6 и не более 25 символов',
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
            
            

            
					
					$("#name_edit_profile_user_information_dialog").qtip({
						 content: {
							text: 'Введите ваше имя',
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
					
					$("#last_name_edit_profile_user_information_dialog").qtip({
						 content: {
							text: 'Введите вашу фамилию',
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
									
					$("#patronym_edit_profile_user_information_dialog").qtip({
						 content: {
							text: 'Введите ваше отчество',
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
            
				$("#company_edit_profile_user_information_dialog").qtip({
						 content: {
							text: 'Введите название компании, в которой Вы работаете',
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
					
					$("#job_title_edit_profile_user_information_dialog").qtip({
						 content: {
							text: 'Введите вашу должность',
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
					
					$("#tel_edit_profile_user_information_dialog").qtip({
						 content: {
							text: 'Введите ваш контактный телефон',
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
					
					$("#desc_edit_profile_user_information_dialog").qtip({
						 content: {
							text: 'Введите дополнительную информацию о себе',
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
					
					$("#email_edit_profile_user_information_dialog").qtip({
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
						
						
					$("#td_content_block").css("display","table-cell");	
						
						
					});
					
					
					function fn_success_edit_profile_user_information(data,textStatus,jqXHR)
					{
						fn_clear_status_loading();
						if(data != "1")
						{
							$("#p_error_dialog").html(data);
							$("#error_dialog" ).dialog("open");
						}
						else
						{
							location.reload(true);
						}
						
					}
					
					function fn_press_btn_choice_image()
					{
						if($("#path_choice_image").val() != "")
						{
							if($( "#edit_profile_user_information" ).dialog("isOpen"))
							{
								$("#path_image_edit_profile_user_information_dialog").val($("#path_choice_image").val());
							}
							else
							{
									
								fn_set_status_loading();
                       
								jqXHR = $.post("./change_image_profile.php","image_profile="+encodeURIComponent($("#path_choice_image").val()),fn_success_change_image_profile);
								jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при изменении изображения профиля пользователя");
									$( "#error_dialog" ).dialog("open");
									$("#path_choice_image").val("");
								});
							}
									
						}
						else
						{
							if($( "#edit_profile_user_information" ).dialog("isOpen"))
							{
								$("#path_image_edit_profile_user_information_dialog").val("");
							}
							else
							{
								fn_set_status_loading();
                       
								jqXHR = $.post("./delete_image_profile.php","",fn_success_delete_image_profile);
								jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при удалении изображения профиля пользователя");
								$( "#error_dialog" ).dialog("open");});
							}
							$("#path_choice_image").val("");
						}
						
						$("#pic").dialog("close");
					}

					function fn_show_choice_picture(main_folder)
					{
						fn_set_status_loading();
						
						if($("#dialog_create_folder").dialog("instance"))
						{
							$("#dialog_create_folder").dialog("destroy")
						}
						
						while(false)
						{
							
						}
						if(main_folder == undefined)
						{
							jqXHR = $.post("./../utils/get_pictures.php","",fn_success_get_pictures);
						}
						else
						{
							jqXHR = $.post("./../utils/get_pictures.php","main_folder="+encodeURIComponent(main_folder),fn_success_get_pictures);
						}
						jqXHR.fail(function(){fn_clear_status_loading();$( "#error_check_user_enter" ).dialog("open");});
					}
					
					function fn_success_get_pictures(data,textStatus,jqXHR)
					{
						$('#pic button').qtip('destroy');
						$('#pic .image_image').qtip('destroy');
						$('#pic .folder_image').qtip('destroy');
						
						fn_clear_status_loading();
						$("#pic").html("");
						$("#pic").html(data);
					}
					
					
					
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
					
						function fn_success_delete_image_profile(data,textStatus,jqXHR)
						{
							fn_clear_status_loading();
							if(data == "1")
							{
								$("#my_profile_picture").html("<img src='../../pictures/general/my_profile.png' style='width:200px; overflow:hidden;border:1px solid silver;'>");
							}
							else
							{
								$("#p_error_dialog").html(data);
								$("#error_dialog" ).dialog("open");
							}
							$("#path_choice_image").val("");
						}
						
						function fn_success_change_image_profile(data,textStatus,jqXHR)
						{
							fn_clear_status_loading();
							if(data == "1")
							{
								$("#my_profile_picture").html("<img src='"+$("#path_choice_image").val()+"' style='width:200px; overflow:hidden;border:1px solid silver;'>");
							}
							else
							{
								$("#p_error_dialog").html(data);
								$("#error_dialog" ).dialog("open");
							}
							$("#path_choice_image").val("");
						}
						
						