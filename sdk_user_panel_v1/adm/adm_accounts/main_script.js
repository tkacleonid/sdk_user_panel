xOffset = 10;
yOffset = 30;

function fn_get_profile_admin_information(id)
{
	fn_set_status_loading();
    jqXHR = $.post("./get_profile_admin_information.php","id="+encodeURIComponent(id),fn_success_get_profile_admin_information);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при получении данных профиля администратора");
		$( "#error_dialog" ).dialog("open");
	});
}
function fn_success_get_profile_admin_information(data,textStatus,jqXHR)
{
	$( "#profile_admin_information" ).html(data);
	fn_clear_status_loading();
	$( "#profile_admin_information_dialog" ).dialog("open");
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



function fn_get_edit_profile_admin_information(id)
{

	if($( "#profile_admin_information_dialog" ).dialog("isOpen"))
	{
		$( "#profile_admin_information_dialog" ).dialog("close")
	}
	fn_set_status_loading();
    jqXHR = $.post("./get_edit_profile_admin_information.php","id="+encodeURIComponent(id),fn_success_get_edit_profile_admin_information);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при получении данных профиля пользователя");
		$( "#error_dialog" ).dialog("open");
	});
}
function fn_success_get_edit_profile_admin_information(data,textStatus,jqXHR)
{
	$( "#edit_profile_admin_information" ).html(data);
	fn_clear_status_loading();
	$( "#edit_profile_admin_information" ).dialog("open");
}


function fn_show_choice_picture(main_folder)
{
	fn_set_status_loading();
	
	if($("#dialog_create_folder").dialog("instance"))
	{
		$("#dialog_create_folder").dialog("destroy")
	}
	

	if(main_folder == undefined)
	{
		jqXHR = $.post("./../utils/get_pictures.php","",fn_success_get_pictures);
	}
	else
	{
		jqXHR = $.post("./../utils/get_pictures.php","main_folder="+encodeURIComponent(main_folder),fn_success_get_pictures);
	}
		jqXHR.fail(function(){
			fn_clear_status_loading();
			$("#p_error_dialog").html("Возникла ошибка при получении изображений");
			$("#error_dialog" ).dialog("open");
		
		});
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


function fn_press_btn_choice_image()
{
	if($("#path_choice_image").val() != "")
	{
		if($( "#edit_profile_admin_information" ).dialog("isOpen"))
		{
			$("#path_image_edit_profile_admin_information_dialog").val($("#path_choice_image").val());
		}
		else
		{

		}
									
	}
	else
	{
		if($( "#edit_profile_user_information" ).dialog("isOpen"))
		{
			$("#path_image_edit_profile_admin_information_dialog").val("");
		}
		else
		{
							
		}
			$("#path_choice_image").val("");
	}
						
	$("#pic").dialog("close");
}

function fn_change_status_admin_dialog_open(id)
{
	fn_set_status_loading();
    jqXHR = $.post("./get_status_dialog.php","id="+encodeURIComponent(id),fn_success_get_status_dialog);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при получении статуса администратора");
		$( "#error_dialog" ).dialog("open");
	});
}

function fn_success_get_status_dialog(data,textStatus,jqXHR)
{
	$( "#change_status_dialog" ).html(data);
	fn_clear_status_loading();
	$( "#change_status_dialog" ).dialog("open");
}

function fn_delete_profile_admin_information(id)
{
	if(confirm("Вы действительно хотите удалить аккаунт?"))
	{
		fn_set_status_loading();
		
		jqXHR = $.post("./delete_adm_account.php","id="+encodeURIComponent(id),fn_success_delete_profile_admin_information);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при удалении администратора");
			$( "#error_dialog" ).dialog("open");
		});
	}
}


function fn_success_delete_profile_admin_information(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	if(data != "1")
	{
		$("#p_error_dialog").html(data);
		$("#error_dialog" ).dialog("open");
	}
	else
	{
		$("#change_status_dialog").dialog("close");
		$("#p_error_dialog").html("Удаление прошло успешно");
		$("#error_dialog" ).dialog("open");
		location.reload(true);
	}
}




$(function(){

	$( "#change_status_dialog" ).dialog({
		autoOpen: false,
		height: 300,
		width: 900,
		modal: true,
		resizable:false,
		title:"Изменение статуса",
		dialogClass:"none_header_dialog"
	});
	
	
	
	$( "#error_dialog" ).dialog({
		autoOpen: false,
		height: 200,
		width: 600,
		modal: true,
		resizable:false,
		dialogClass:"none_header_dialog"
	});
	$( "#profile_admin_information_dialog" ).dialog({
		autoOpen: false,
		height: 910,
		width: 900,
		modal: true,
		resizable:false,
		title:"Профиль позователя",
	});
	$( "#edit_profile_admin_information" ).dialog({
		autoOpen: false,
		height: 700,
		width: 800,
		modal: true,
		resizable:false,
		title:"Редактирование профиля позователя",
	});
	$("#btn_error_dialog").button().click("on",
		function(){
			$( "#error_dialog" ).dialog("close");
		}
	);
	
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
	
	$("#td_content_block").css("display","table-cell");
});