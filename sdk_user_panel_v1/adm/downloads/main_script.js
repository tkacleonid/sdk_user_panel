xOffset= 10;
yOffset= 30;

type_choice_file= 0;

$(function(){

	$("#ref_icon_preview_add_new_download_dialog").mouseover("on",function(e){
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
			$("#image_preview").append("<img style='width:"+n_w+"px;height:"+n_h+"px;' src="+($('#path_icon_add_new_download_dialog').val())+ " alt='Отсутствует изображение' />");
		}
		img.src = $('#path_icon_add_new_download_dialog').val();	

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
			$("#image_preview").append("<img style='width:"+n_w+"px;height:"+n_h+"px;' src="+($('#path_icon_add_new_download_dialog').val())+ " alt='Отсутствует изображение' />");
		}	
	});
	$('#ref_icon_preview_add_new_download_dialog').mouseout("on",function(){
		this.title = this.t;	
		$("#image_preview").remove();
	});	
	$("#ref_icon_preview_add_new_download_dialog").mousemove(function(e){
		$("#image_preview")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px");
	});	
						
						
			
	$( "#add_new_download_dialog" ).dialog({
		autoOpen: false,
		height: 900,
		width: 900,
		modal: true,
		resizable:false,
		dialogClass:"none_header_dialog",
		title: "Добавление новой загрузки",
		close:function(){
				tinyMCE.editors["long_description_add_new_download_dialog"].remove();				
			}
	});	

	$( "#edit_download_dialog" ).dialog({
		autoOpen: false,
		height: 900,
		width: 900,
		modal: true,
		resizable:false,
		dialogClass:"none_header_dialog",
		title: "Редактирование загрузки",
		close:function(){
				tinyMCE.editors["long_description_edit_download_dialog"].remove();				
			}
	});		
	
	$( "#download_full_information_dialog" ).dialog({
		autoOpen: false,
		height: 900,
		width: 900,
		modal: true,
		resizable:false,
		dialogClass:"none_header_dialog",
		title: "Просмотр информации о загрузке",
		close:function(){
				tinyMCE.editors["long_description_download_full_information_dialog"].remove();				
			}
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
	
	$( "#choice_file_dialog" ).dialog({
		autoOpen: false,
		height: 700,
		width: 750,
		modal: true,
		resizable:false,
		dialogClass:"none_header_dialog",
		close:function(){			
			}
	});
	
	$( "#profile_admin_information_dialog" ).dialog({
		autoOpen: false,
		height: 910,
		width: 900,
		modal: true,
		resizable:false,
		title:"Профиль позователя",
	});
	
	
	$( "#add_new_group_downloads_dialog" ).dialog({
		autoOpen: false,
		height: 800,
		width: 900,
		modal: true,
		resizable:false,
		dialogClass:"none_header_dialog",
		title: "Добавление новой группы загрузок",
		close:function(){
				tinyMCE.editors["long_description_add_new_group_downloads_dialog"].remove();				
			}
	});
	
	$( "#edit_group_downloads_dialog" ).dialog({
		autoOpen: false,
		height: 800,
		width: 900,
		modal: true,
		resizable:false,
		dialogClass:"none_header_dialog",
		title: "Редактирование группы загрузок",
		close:function(){
				tinyMCE.editors["long_description_edit_group_downloads_dialog"].remove();				
			}
	});
	
	$( "#full_group_downloads_information_dialog" ).dialog({
		autoOpen: false,
		height: 800,
		width: 900,
		modal: true,
		resizable:false,
		dialogClass:"none_header_dialog",
		title: "Подробная информация",
		close:function(){			
			}
	});
		
	$("#menu_group_downloads").menu();
						
	$(".btn_edit").button({
		icons:{primary:"ui-icon-pencil",},
		text:false,	
	});
	$(".btn_del").button({
		icons:{primary:"ui-icon-close",},
		text:false,	
	});
	$(".btn_add").button({
		icons:{primary:"ui-icon-plus",},
		text:false,	
	});
	$(".btn_update").button({
		icons:{primary:"ui-icon-refresh",},
		text:false,	
	});
	
	$(".btn_show_full_information").button({
		icons:{primary:"ui-icon-disk",},
		text:false,	
	});
	
	$(".btn_show_files").button({
		icons:{primary:"ui-icon-note",},
		text:false,	
	});
	
	$(".btn_preview").button({
		icons:{primary:"ui-icon-newwin",},
		text:false,	
	});
	
	
	$(".btn").button();
	
	$('.btn_up').button({
		icons:{primary:'ui-icon-arrowthick-1-n'},text:false,
	});
	
	$('.btn_down').button({
		icons:{primary:'ui-icon-arrowthick-1-s'},text:false,
	});
	
	$("#td_content_block").css("display","table-cell");
});

					
function fn_tinymce_for_add_group_downloads()
{
	tinymce.init({
		selector: "#long_description_add_new_group_downloads_dialog",
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

function fn_tinymce_for_add_download()
{
	tinymce.init({
		selector: "#long_description_add_new_download_dialog",
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


function fn_add_new_group_downloads()
{

	$('#error_add_group_downloads_add_new_group_downloads_dialog').html("");


	var name_group_downloads= $('#name_group_downloads_add_new_group_downloads_dialog').val();
	var visibility_group_downloads= $('#visibility_group_downloads_add_new_group_downloads_dialog').get(0).checked;
	var short_description_group_downloads= $('#short_description_add_new_group_downloads_dialog').val();
	var long_description_group_downloads=   tinyMCE.editors["long_description_add_new_group_downloads_dialog"].getContent();
	
	var exp_name_group_downloads= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	
	var str_error= "";
	
	if(visibility_group_downloads)
	{
		visibility_group_downloads= "1";
	}
	else
	{
		visibility_group_downloads= "0";
	}

	if(!exp_name_group_downloads.test(name_group_downloads))
	{
		str_error += "Название группы загрузок не соответствует требованиям<br>";
	}
	
	if(str_error != "")
	{
		$('#error_add_group_downloads_add_new_group_downloads_dialog').html(str_error);
	}
	else
	{
		fn_set_status_loading();
                       
		jqXHR= $.post("./check_group_downloads_information_for_add.php","name_group_downloads="+encodeURIComponent(name_group_downloads)+"&visibility_group_downloads="+encodeURIComponent(visibility_group_downloads)+"&short_description_group_downloads="+encodeURIComponent(short_description_group_downloads)+"&long_description_group_downloads="+encodeURIComponent(long_description_group_downloads),fn_success_check_group_downloads_information_for_add);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при обавлении новой группы загрузок");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

	function fn_success_check_group_downloads_information_for_add(data,textStatus,jqXHR)
	{
		$('#error_add_group_downloads_add_new_group_downloads_dialog').html("");
		
		var name_group_downloads= $('#name_group_downloads_add_new_group_downloads_dialog').val();
		var visibility_group_downloads= $('#visibility_group_downloads_add_new_group_downloads_dialog').get(0).checked;
		var short_description_group_downloads= $('#short_description_add_new_group_downloads_dialog').val();
		var long_description_group_downloads= tinyMCE.editors["long_description_add_new_group_downloads_dialog"].getContent();
		
		if(visibility_group_downloads)
		{
			visibility_group_downloads= "1";
		}
		else
		{
			visibility_group_downloads= "0";
		}

		
		fn_clear_status_loading();
		
		if(data != "1")
		{
			$('#error_add_group_downloads_add_new_group_downloads_dialog').html(data);
		}
		else
		{
			fn_set_status_loading();
                       
			jqXHR= $.post("./add_new_group_downloads_information.php","name_group_downloads="+encodeURIComponent(name_group_downloads)+"&visibility_group_downloads="+encodeURIComponent(visibility_group_downloads)+"&short_description_group_downloads="+encodeURIComponent(short_description_group_downloads)+"&long_description_group_downloads="+encodeURIComponent(long_description_group_downloads),fn_success_add_new_group_downloads);
			jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при обавлении новой группы загрузок");
				$( "#error_dialog" ).dialog("open");
			});
		}
	}

function fn_success_add_new_group_downloads(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	if(data== "1")
	{
		fn_get_group_downloads($('#id_current_group_downloads').val());
		$("#add_new_group_downloads_dialog").dialog("close");
		$("#p_error_dialog").html("Новая группа загрузок успешно добавлена");
		$("#error_dialog" ).dialog("open");
		fn_get_group_downloads($('#id_current_group_downloads').val());	
	}
	else
	{
		$("#p_error_dialog").html(data);
		$("#error_dialog" ).dialog("open");
	}
}



function fn_save_edit_group_downloads()
{

	$('#error_edit_group_downloads_edit_group_downloads_dialog').html("");
	
	var id_group_downloads= $("#hdn_id_edit_group_downloads").val();

	var name_group_downloads= $('#name_group_downloads_edit_group_downloads_dialog').val();
	var visibility_group_downloads= $('#visibility_group_downloads_edit_group_downloads_dialog').get(0).checked;
	var short_description_group_downloads= $('#short_description_edit_group_downloads_dialog').val();
	var long_description_group_downloads= tinyMCE.editors["long_description_edit_group_downloads_dialog"].getContent();
	
	var exp_name_group_downloads= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	
	var str_error= "";
	
	if(visibility_group_downloads)
	{
		visibility_group_downloads= "1";
	}
	else
	{
		visibility_group_downloads= "0";
	}
	

	if(!exp_name_group_downloads.test(name_group_downloads))
	{
		str_error += "Название группы загрузок не соответствует требованиям<br>";
	}
	
	if(str_error != "")
	{
		$('#error_edit_group_downloads_edit_group_downloads_dialog').html(str_error);
	}
	else
	{
		fn_set_status_loading();
                       
		jqXHR= $.post("./check_group_downloads_information_for_edit.php","id_current_group_downloads="+encodeURIComponent(id_group_downloads)+"&name_group_downloads="+encodeURIComponent(name_group_downloads)+"&visibility_group_downloads="+encodeURIComponent(visibility_group_downloads)+"&short_description_group_downloads="+encodeURIComponent(short_description_group_downloads)+"&long_description_group_downloads="+encodeURIComponent(long_description_group_downloads),fn_success_check_group_downloads_information_for_edit);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при редактировании группы загрузок");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

	function fn_success_check_group_downloads_information_for_edit(data,textStatus,jqXHR)
	{
		$('#error_edit_group_downloads_edit_group_downloads_dialog').html("");
		
		var id_group_downloads= $("#hdn_id_edit_group_downloads").val();
		
		var name_group_downloads= $('#name_group_downloads_edit_group_downloads_dialog').val();
		var visibility_group_downloads= $('#visibility_group_downloads_edit_group_downloads_dialog').get(0).checked;
		var short_description_group_downloads= $('#short_description_edit_group_downloads_dialog').val();
		var long_description_group_downloads= tinyMCE.editors["long_description_edit_group_downloads_dialog"].getContent();
		
		if(visibility_group_downloads)
		{
			visibility_group_downloads= "1";
		}
		else
		{
			visibility_group_downloads= "0";
		}
		

		fn_clear_status_loading();
		
		if(data != "1")
		{
			$('#error_edit_group_downloads_edit_group_downloads_dialog').html(data);
		}
		else
		{
			fn_set_status_loading();
                       
			jqXHR= $.post("./save_edit_group_downloads_information.php","id_current_group_downloads="+encodeURIComponent(id_group_downloads)+"&name_group_downloads="+encodeURIComponent(name_group_downloads)+"&visibility_group_downloads="+encodeURIComponent(visibility_group_downloads)+"&short_description_group_downloads="+encodeURIComponent(short_description_group_downloads)+"&long_description_group_downloads="+encodeURIComponent(long_description_group_downloads),fn_success_edit_group_downloads);
			jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при редактировании группы загрузок");
				$( "#error_dialog" ).dialog("open");
			});
		}
	}

function fn_success_edit_group_downloads(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	if(data== "1")
	{
		$("#edit_group_downloads_dialog").dialog("close");
		$("#p_error_dialog").html("Группа загрузок успешно отредактирована");
		$("#error_dialog" ).dialog("open");
		fn_get_group_downloads($('#id_current_group_downloads').val());
	}
	else
	{
		$("#p_error_dialog").html(data);
		$("#error_dialog" ).dialog("open");
	}
}








function fn_get_show_full_information_group_downloads(id_current_group_downloads)
{
	fn_set_status_loading();
    if((id_current_group_downloads== "") || (id_current_group_downloads== undefined))
	{
	 	
	}	
	else
	{
		jqXHR= $.post("./get_group_downloads_full_information.php","id_current_group_downloads="+encodeURIComponent(id_current_group_downloads),fn_success_get_show_full_information_group_downloads);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при получении информации по текущей группе загрузок");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

function fn_success_get_show_full_information_group_downloads(data,textStatus,jqXHR)
{
	$("#full_group_downloads_information" ).html(data);
	fn_clear_status_loading();
	$("#full_group_downloads_information_dialog" ).dialog("open");
}

function fn_get_profile_admin_information(id)
{
	fn_set_status_loading();
    jqXHR= $.post("../adm_accounts/get_profile_admin_information.php","id="+encodeURIComponent(id),fn_success_get_profile_admin_information);
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

function fn_get_edit_group_downloads(id_current_group_downloads)
{
	fn_set_status_loading();
    if((id_current_group_downloads== "") || (id_current_group_downloads== undefined))
	{
	 	jqXHR= $.post("./get_edit_group_downloads.php","",fn_success_get_edit_group_downloads);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при получении информации по текущей группе загрузок");
			$( "#error_dialog" ).dialog("open");
		});
	}	
	else
	{
		jqXHR= $.post("./get_edit_group_downloads.php","id_current_group_downloads="+encodeURIComponent(id_current_group_downloads),fn_success_get_edit_group_downloads);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при получении информации по текущей группе загрузок");
			$( "#error_dialog" ).dialog("open");
		});
	}
}
function fn_success_get_edit_group_downloads(data,textStatus,jqXHR)
{
	$( "#edit_group_downloads_dialog" ).html(data);
	fn_clear_status_loading();
	$( "#edit_group_downloads_dialog" ).dialog("open");
}

	
	
function fn_delete_group_downloads(id_current_group_downloads)
{
	if(confirm("Вы действительно хотите удалить текущую группы загрузок?"))
	{
		fn_set_status_loading();
		if((id_current_group_downloads== "") || (id_current_group_downloads== undefined))
		{
			
		}	
		else
		{
			jqXHR= $.post("./delete_group_downloads.php","id_current_group_downloads="+encodeURIComponent(id_current_group_downloads),fn_success_delete_group_downloads);
			jqXHR.fail(function()
			{
				fn_clear_status_loading();
				$("#p_error_dialog").html("Ошибка при удалении группы загрузок");
				$( "#error_dialog" ).dialog("open");
			});
		}
	}
}

function fn_success_delete_group_downloads(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	var id_group_downloads = $("#hdn_id_group_downloads_tbl_downloads").val();
	if(data== "1")
	{
		$('#id_current_group_downloads').val("");
		$("#p_error_dialog").html("Текущая группа загрузок успешно удалена");
		$("#error_dialog" ).dialog("open");
		fn_get_group_downloads("");
	}
	else
	{
		$("#p_error_dialog").html(data);
		$("#error_dialog" ).dialog("open");
	}
}



function fn_file_preview(path)
{

	if(path)
	{
		window.open(path);
	}

}
		
function fn_get_group_downloads(id_current_group_downloads)
{	
	fn_set_status_loading();
    if((id_current_group_downloads== "") || (id_current_group_downloads== undefined))
	{
	 	jqXHR= $.post("./get_group_downloads.php","",fn_success_get_group_downloads);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при получении списка групп загрузок");
			$( "#error_dialog" ).dialog("open");
		});
	}	
	else
	{
		jqXHR= $.post("./get_group_downloads.php","id_current_group_downloads="+encodeURIComponent(id_current_group_downloads),fn_success_get_group_downloads);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при получении списка типов бортов");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

function fn_success_get_group_downloads(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	$("#td_group_downloads").html(data);
}
	
function fn_up_group_downloads(id_current_group_downloads)
{
	var jqXHR;
	if((id_current_group_downloads != "") && (id_current_group_downloads != undefined))
	{
		fn_set_status_loading();
		jqXHR = $.post("./up_group_downloads.php","id_current_group_downloads="+encodeURIComponent(id_current_group_downloads),fn_success_up_group_downloads);
		jqXHR.fail(function(){
			fn_clear_status_loading();
			$("#p_error_dialog").html("Ошибка при изменении позиции текущей группы загрузок");
			$( "#error_dialog" ).dialog("open");
		});
	}

}

function fn_success_up_group_downloads(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	if(data==1)
	{
		fn_get_group_downloads($('#id_current_group_downloads').val());
		$("#p_error_dialog").html("Позиция группы загрузок успешно изменена");
		$( "#error_dialog" ).dialog("open");
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
}
	
	
function fn_down_group_downloads(id_current_group_downloads)
{
	var jqXHR;
	if((id_current_group_downloads != "") && (id_current_group_downloads != undefined))
	{
		fn_set_status_loading();
		jqXHR = $.post("./down_group_downloads.php","id_current_group_downloads="+encodeURIComponent(id_current_group_downloads),fn_success_down_group_downloads);
		jqXHR.fail(function(){
			fn_clear_status_loading();
			$("#p_error_dialog").html("Ошибка при изменении позиции текущей группы загрузок");
			$( "#error_dialog" ).dialog("open");
		});
	}

}

function fn_success_down_group_downloads(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	if(data==1)
	{
		fn_get_group_downloads($('#id_current_group_downloads').val());
		$("#p_error_dialog").html("Позиция группы загрузок успешно изменена");
		$( "#error_dialog" ).dialog("open");
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
}
	
	
	
function fn_show_choice_picture(main_folder)
{
	fn_set_status_loading();
	
	if($("#dialog_create_folder").dialog("instance"))
	{
		$("#dialog_create_folder").dialog("destroy")
	}

	if(main_folder== undefined)
	{
		jqXHR= $.post("./../utils/get_pictures.php","",fn_success_get_pictures);
	}
	else
	{
		jqXHR= $.post("./../utils/get_pictures.php","main_folder="+encodeURIComponent(main_folder),fn_success_get_pictures);
	}

	jqXHR.fail(function(){fn_clear_status_loading();});
}
					
function fn_success_get_pictures(data,textStatus,jqXHR)
{
	$('#pic button').qtip('destroy');
	$('#pic .image_image').qtip('destroy');
	$('#pic .folder_image').qtip('destroy');
						
	fn_clear_status_loading();
	$("#pic").html(data);
	$("#pic").dialog("open");
}


function fn_show_choice_file(main_folder)
{
	$('#choice_file_dialog button').qtip('hide');
	$('#choice_file_dialog .file_get_files').qtip('hide');
	$('#choice_file_dialog .folder_file_get_files').qtip('hide');
	
	if($("#dialog_create_folder_get_files").dialog("instance"))
	{
		$("#dialog_create_folder_get_files").dialog("destroy")
	}
	
	fn_set_status_loading();

	if(main_folder== undefined)
	{
		jqXHR= $.post("./../utils/get_files.php","",fn_success_get_files);
	}
	else
	{
		jqXHR= $.post("./../utils/get_files.php","main_folder="+encodeURIComponent(main_folder),fn_success_get_files);
	}

	jqXHR.fail(function(){fn_clear_status_loading();});
}
					
function fn_success_get_files(data,textStatus,jqXHR)
{
	$('#choice_file_dialog button').qtip('destroy');
	$('#choice_file_dialog .file_get_files').qtip('destroy');
	$('#choice_file_dialog .folder_file_get_files').qtip('destroy');
						
	fn_clear_status_loading();
	$("#choice_file_dialog").html(data);
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

function fn_press_btn_choice_file(path_file)
{
	switch(type_choice_file)
	{
		case 1:
			$('#path_file_add_new_download_dialog').val($('#path_choice_file').val());
			break;
		case 2:
			$('#path_file_edit_download_dialog').val($('#path_choice_file').val());
			break;

	}
	$('#path_choice_file').val("");
	$("#choice_file_dialog").dialog('close');
}

function fn_show_dialog_add_new_download(id_current_group_downloads)
{
	if((id_current_group_downloads == "") || (id_current_group_downloads == undefined))
	{
		alert("Отсутствует выбранная группа загрузок");
	}
	else
	{
		$("#id_group_downloads_add_new_download_dialog").val(id_current_group_downloads);
		fn_tinymce_for_add_download()
		$("#add_new_download_dialog").dialog("open");
	}
}

function fn_btn_choice_icon_add_new_download_dialog()
{
	fn_show_choice_picture("");
}

function fn_press_btn_choice_image()
{
	if($("#add_new_download_dialog").dialog("isOpen"))
	{
		$("#path_icon_add_new_download_dialog").val(fn_get_path_image());
	}
	else if($("#edit_download_dialog").dialog("isOpen"))
	{
		$("#path_icon_edit_download_dialog").val(fn_get_path_image());
	}
	$("#pic").dialog("close");
}

function fn_get_path_image()
{
	var path = $("#path_choice_image").val();
	var pattern = new RegExp("((.jpg)||(.JPG)||(.gif)||(.GIF)||(.png)||(.PNG))$");
						
	if(!pattern.test(path))
	{
		return "";
	}
	else
	{
		return path;
	}
}

function fn_btn_choice_file_add_new_download_dialog()
{
	type_choice_file= 1;
	fn_show_choice_file();
	$( '#choice_file_dialog' ).dialog('open');
}

function fn_add_new_download()
{
	$("#error_add_new_download_dialog").html("");
	
	var id_group_downloads = $("#id_group_downloads_add_new_download_dialog").val();
	var name = $("#name_add_new_download_dialog").val();
	var status = $("#visibility_add_new_download_dialog").get(0).checked;
	var short_description = $("#short_description_add_new_download_dialog").val();
	var long_description = tinymce.editors["long_description_add_new_download_dialog"].getContent();
	var path_icon = $("#path_icon_add_new_download_dialog").val();
	var path_download = $("#path_file_add_new_download_dialog").val();
	var comment = $("#comment_add_new_download_dialog").val();
	
	var exp_name_download= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	var exp_path_download= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	
	var str_error = "";
	
	if(!exp_name_download.test(name))
	{
		str_error += "Название загрузки не соответствует требованиям<br>";
	}
	if(!exp_path_download.test(path_download))
	{
		str_error += "Не выбран файл загрузки<br>";
	}
	
	if(status)
	{
		status = "1";
	}
	else
	{
		status = "0";
	}
	
	var jqXHR;
	
	if(str_error != "")
	{
		$("#error_add_new_download_dialog").html(str_error);
	}
	else
	{
		fn_set_status_loading();
		jqXHR = $.post("./check_download_for_add.php","id_group_downloads="+encodeURIComponent(id_group_downloads)+"&name="+encodeURIComponent(name)+"&status="+encodeURIComponent(status)+"&short_description="+encodeURIComponent(short_description)+"&long_description="+encodeURIComponent(long_description)+"&path_icon="+encodeURIComponent(path_icon)+"&path_download="+encodeURIComponent(path_download)+"&comment="+encodeURIComponent(comment),fn_success_check_download_for_add);
		jqXHR.fail(function(){
			fn_clear_status_loading();
			$("#p_error_dialog").html("Ошибка при добавлении загрузки");
			$( "#error_dialog" ).dialog("open");
		});
	}	
}

function fn_success_check_download_for_add(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	
	
	$("#error_add_new_download_dialog").html("");
	
	var id_group_downloads = $("#id_group_downloads_add_new_download_dialog").val();
	var name = $("#name_add_new_download_dialog").val();
	var status = $("#visibility_add_new_download_dialog").get(0).checked;
	var short_description = $("#short_description_add_new_download_dialog").val();
	var long_description = tinymce.editors["long_description_add_new_download_dialog"].getContent();
	var path_icon = $("#path_icon_add_new_download_dialog").val();
	var path_download = $("#path_file_add_new_download_dialog").val();
	var comment = $("#comment_add_new_download_dialog").val();
	

	
	if(status)
	{
		status = "1";
	}
	else
	{
		status = "0";
	}
	
	var jqXHR;

	fn_set_status_loading();
	jqXHR = $.post("./add_download.php","id_group_downloads="+encodeURIComponent(id_group_downloads)+"&name="+encodeURIComponent(name)+"&status="+encodeURIComponent(status)+"&short_description="+encodeURIComponent(short_description)+"&long_description="+encodeURIComponent(long_description)+"&path_icon="+encodeURIComponent(path_icon)+"&path_download="+encodeURIComponent(path_download)+"&comment="+encodeURIComponent(comment),fn_success_add_download);
	jqXHR.fail(function(){
		fn_clear_status_loading();
		$("#p_error_dialog").html("Ошибка при добавлении загрузки");
		$( "#error_dialog" ).dialog("open");
	});
		
}

function fn_success_add_download(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	
	var id_group_downloads = $("#hdn_id_group_downloads_tbl_downloads").val();
	var page = $("#hdn_page_tbl_downloads").val();
	var num = $("#hdn_num_tbl_downloads").val();
	
	
	if(data == "1")
	{
		$("#p_error_dialog").html("Загрузка успешно добавлена");
		$( "#error_dialog" ).dialog("open");
		$("#add_new_download_dialog").dialog("close");
		fn_get_downloads(id_group_downloads,page,num);
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
}

function fn_get_downloads(id_current_group_downloads,page,num)
{
	var jqXHR;
	
	if((page == "") || (page == undefined))
	{
		page = 1;
	}
	
	if((num == "") || (num == undefined))
	{
		num = 10;
	}
	
	
	if((id_current_group_downloads != "") && (id_current_group_downloads != undefined))
	{
		fn_set_status_loading();
		jqXHR = $.post("./get_downloads.php","id_current_group_downloads="+encodeURIComponent(id_current_group_downloads)+"&page="+encodeURIComponent(page)+"&num="+encodeURIComponent(num),fn_success_get_downloads);
		jqXHR.fail(function(){
			fn_clear_status_loading();
			$("#p_error_dialog").html("Ошибка при получении списка загрузок");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

function fn_success_get_downloads(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	$("#td_downloads").html(data);
}


function fn_edit_download(id_download)
{
	fn_set_status_loading();
	jqXHR = $.post("./get_edit_download.php","id_download="+encodeURIComponent(id_download),fn_success_get_edit_download);
	jqXHR.fail(function(){
		fn_clear_status_loading();
		$("#p_error_dialog").html("Ошибка при получении информации о загрузке");
		$( "#error_dialog" ).dialog("open");
	});
}

function fn_success_get_edit_download(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	$("#edit_download_dialog").html(data);
	$("#edit_download_dialog").dialog('open');
}

function fn_btn_choice_file_edit_download_dialog()
{
	type_choice_file= 2;
	fn_show_choice_file();
	$( '#choice_file_dialog' ).dialog('open');
}

function fn_btn_choice_icon_edit_download_dialog()
{
	fn_show_choice_picture("");
}


//SAVE EDIT DOWNLOAD
function fn_save_edit_download(id_download)
{
	$("#error_edit_download_dialog").html("");
	
	if(id_download == undefined)
	{
		return;
	}
	
	var id_group_downloads = $("#id_group_downloads_edit_download_dialog").val();
	var name = $("#name_edit_download_dialog").val();
	var status = $("#visibility_edit_download_dialog").get(0).checked;
	var short_description = $("#short_description_edit_download_dialog").val();
	var long_description = tinymce.editors["long_description_edit_download_dialog"].getContent();
	var path_icon = $("#path_icon_edit_download_dialog").val();
	var path_download = $("#path_file_edit_download_dialog").val();
	var comment = $("#comment_edit_download_dialog").val();
	
	var exp_name_download= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	var exp_path_download= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	
	var str_error = "";
	
	if(!exp_name_download.test(name))
	{
		str_error += "Название загрузки не соответствует требованиям<br>";
	}
	if(!exp_path_download.test(path_download))
	{
		str_error += "Не выбран файл загрузки<br>";
	}
	
	if(status)
	{
		status = "1";
	}
	else
	{
		status = "0";
	}
	
	var jqXHR;
	
	if(str_error != "")
	{
		$("#error_edit_download_dialog").html(str_error);
	}
	else
	{
		fn_set_status_loading();
		jqXHR = $.post("./check_download_for_edit.php","id_download="+encodeURIComponent(id_download)+"&id_group_downloads="+encodeURIComponent(id_group_downloads)+"&name="+encodeURIComponent(name)+"&status="+encodeURIComponent(status)+"&short_description="+encodeURIComponent(short_description)+"&long_description="+encodeURIComponent(long_description)+"&path_icon="+encodeURIComponent(path_icon)+"&path_download="+encodeURIComponent(path_download)+"&comment="+encodeURIComponent(comment),fn_success_check_download_for_edit);
		jqXHR.fail(function(){
			fn_clear_status_loading();
			$("#p_error_dialog").html("Ошибка при сохранении загрузки");
			$( "#error_dialog" ).dialog("open");
		});
	}	
}

function fn_success_check_download_for_edit(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	
	var id_download = $("#hdn_id_download").val();
	
	if(id_download == undefined)
	{
		return;
	}
	
	$("#error_edit_download_dialog").html("");
	
	var id_group_downloads = $("#id_group_downloads_edit_download_dialog").val();
	var name = $("#name_edit_download_dialog").val();
	var status = $("#visibility_edit_download_dialog").get(0).checked;
	var short_description = $("#short_description_edit_download_dialog").val();
	var long_description = tinymce.editors["long_description_edit_download_dialog"].getContent();
	var path_icon = $("#path_icon_edit_download_dialog").val();
	var path_download = $("#path_file_edit_download_dialog").val();
	var comment = $("#comment_edit_download_dialog").val();
	

	
	if(status)
	{
		status = "1";
	}
	else
	{
		status = "0";
	}
	
	var jqXHR;

	fn_set_status_loading();
	jqXHR = $.post("./save_edit_download.php","id_download="+encodeURIComponent(id_download)+"&id_group_downloads="+encodeURIComponent(id_group_downloads)+"&name="+encodeURIComponent(name)+"&status="+encodeURIComponent(status)+"&short_description="+encodeURIComponent(short_description)+"&long_description="+encodeURIComponent(long_description)+"&path_icon="+encodeURIComponent(path_icon)+"&path_download="+encodeURIComponent(path_download)+"&comment="+encodeURIComponent(comment),fn_success_save_edit_download);
	jqXHR.fail(function(){
		fn_clear_status_loading();
		$("#p_error_dialog").html("Ошибка при сохранении загрузки");
		$( "#error_dialog" ).dialog("open");
	});
		
}

function fn_success_save_edit_download(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	
	var id_group_downloads = $("#hdn_id_group_downloads_tbl_downloads").val();
	var page = $("#hdn_page_tbl_downloads").val();
	var num = $("#hdn_num_tbl_downloads").val();
	
	if(data == "1")
	{
		$("#p_error_dialog").html("Загрузка успешно отредактирована");
		$( "#error_dialog" ).dialog("open");
		$("#edit_download_dialog").dialog("close");
		fn_get_downloads(id_group_downloads,page,num);
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
}


function fn_get_show_full_information_download(id_download)
{
	fn_set_status_loading();
	jqXHR = $.post("./get_full_information_download.php","id_download="+encodeURIComponent(id_download),fn_success_get_show_full_information_download);
	jqXHR.fail(function(){
		fn_clear_status_loading();
		$("#p_error_dialog").html("Ошибка при получении информации о загрузке");
		$( "#error_dialog" ).dialog("open");
	});
}

function fn_success_get_show_full_information_download(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	$("#download_full_information").html(data);
	$("#download_full_information_dialog").dialog('open');
}




function fn_up_download(id_download)
{
	var jqXHR;
	if((id_download != "") && (id_download != undefined))
	{
		fn_set_status_loading();
		jqXHR = $.post("./up_download.php","id_download="+encodeURIComponent(id_download),fn_success_up_download);
		jqXHR.fail(function(){
			fn_clear_status_loading();
			$("#p_error_dialog").html("Ошибка при изменении позиции загрузки");
			$( "#error_dialog" ).dialog("open");
		});
	}

}

function fn_success_up_download(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	var id_group_downloads = $("#hdn_id_group_downloads_tbl_downloads").val();
	var page = $("#hdn_page_tbl_downloads").val();
	var num = $("#hdn_num_tbl_downloads").val();
	if(data==1)
	{
		fn_get_downloads(id_group_downloads,page,num);
		$("#p_error_dialog").html("Позиция загрузки успешно изменена");
		$( "#error_dialog" ).dialog("open");
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
}
	
	
function fn_down_download(id_download)
{
	var jqXHR;
	if((id_download != "") && (id_download != undefined))
	{
		fn_set_status_loading();
		jqXHR = $.post("./down_download.php","id_download="+encodeURIComponent(id_download),fn_success_down_download);
		jqXHR.fail(function(){
			fn_clear_status_loading();
			$("#p_error_dialog").html("Ошибка при изменении позиции загрузки");
			$( "#error_dialog" ).dialog("open");
		});
	}

}

function fn_success_down_download(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	
	var id_group_downloads = $("#hdn_id_group_downloads_tbl_downloads").val();
	var page = $("#hdn_page_tbl_downloads").val();
	var num = $("#hdn_num_tbl_downloads").val();
	
	if(data==1)
	{
		fn_get_downloads(id_group_downloads,page,num);
		$("#p_error_dialog").html("Позиция загрузки успешно изменена");
		$( "#error_dialog" ).dialog("open");
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
}

function fn_show_download(id_download)
{
	fn_set_status_loading();
	jqXHR= $.post("./show_download.php","id_download="+encodeURIComponent(id_download),fn_success_show_download);
	jqXHR.fail(function()
	{
		fn_clear_status_loading();
		$("#p_error_dialog").html("Ошибка при изменении видимости загрузки");
		$( "#error_dialog" ).dialog("open");
	});
}
					
function fn_success_show_download(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	
	var id_group_downloads = $("#hdn_id_group_downloads_tbl_downloads").val();
	var page = $("#hdn_page_tbl_downloads").val();
	var num = $("#hdn_num_tbl_downloads").val();
	
	if(data== "1")
	{
		fn_get_downloads(id_group_downloads,page,num);
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
						
}
					
function fn_hide_download(id_download)
{
	fn_set_status_loading();
	jqXHR= $.post("./hide_download.php","id_download="+encodeURIComponent(id_download),fn_success_hide_download);
	jqXHR.fail(function()
	{
		fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при изменении видимости загрузки");
		$( "#error_dialog" ).dialog("open");
	});
}
					
function fn_success_hide_download(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	
	var id_group_downloads = $("#hdn_id_group_downloads_tbl_downloads").val();
	var page = $("#hdn_page_tbl_downloads").val();
	var num = $("#hdn_num_tbl_downloads").val();
	
	if(data== "1")
	{
		fn_get_downloads(id_group_downloads,page,num);
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
}

function fn_delete_download(id_download)
{
	if(confirm("Вы действительно хотите удалить данную загрузку?"))
	{
		fn_set_status_loading();
		jqXHR= $.post("./delete_download.php","id_download="+encodeURIComponent(id_download),fn_success_delete_download);
		jqXHR.fail(function()
		{
			fn_clear_status_loading();
			$("#p_error_dialog").html("Ошибка при удалении загрузки");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

function fn_success_delete_download(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	
	var id_group_downloads = $("#hdn_id_group_downloads_tbl_downloads").val();
	var page = $("#hdn_page_tbl_downloads").val();
	var num = $("#hdn_num_tbl_downloads").val();
	
	if(data== "1")
	{
		fn_get_downloads(id_group_downloads,page,num);
		$("#p_error_dialog").html("Загрузка успешно удалена");
		$( "#error_dialog" ).dialog("open");
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
}