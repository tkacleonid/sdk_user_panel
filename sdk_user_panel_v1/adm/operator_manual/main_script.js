xOffset= 10;
yOffset= 30;

type_choice_file= 0;


$(function(){

			
	$("#add_new_operator_manual_item_dialog" ).dialog({
		autoOpen: false,
		height: 1300,
		width: 900,
		modal: true,
		resizable:false,
		dialogClass:"none_header_dialog",
		title: "Добавление нового пункта руководства пользователя",
		close:function(){
				tinyMCE.editors["text_operator_manual_item_dialog_add_new_operator_manual_item"].remove();					
			}
	});
	
	$("#dialog_show_information_operator_manual_item" ).dialog({
		autoOpen: false,
		height: 1300,
		width: 900,
		modal: true,
		resizable:false,
		dialogClass:"none_header_dialog",
		title: "Информация пункта руоводства пользователя",
		close:function(){
				tinyMCE.editors["text_operator_manual_item_dialog_show_full_information_operator_manual_item"].remove();					
			}

	});
	
	$("#dialog_edit_operator_manual_item" ).dialog({
		autoOpen: false,
		height: 1300,
		width: 900,
		modal: true,
		resizable:false,
		dialogClass:"none_header_dialog",
		title: "Редактирование пункта руководства пользователя",
		close:function(){
				tinyMCE.editors["text_operator_manual_item_dialog_edit_operator_manual_item"].remove();				
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
	
	
	$("#td_content_block").css("display","table-cell");

});
	

function fn_tinymce_for_show_full_information_operator_manual_item()
{
	tinymce.init({
		selector: "#text_operator_manual_item_dialog_show_full_information_operator_manual_item",
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

function fn_tinymce_for_add_new_operator_manual_item()
{
	tinymce.init({
		selector: "#text_operator_manual_item_dialog_add_new_operator_manual_item",
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
function fn_tinymce_for_edit_operator_manual_item()
{
	tinymce.init({
		selector: "#text_operator_manual_item_dialog_edit_operator_manual_item",
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


function fn_show_dialog_add_new_operator_manual_item()
{
	fn_tinymce_for_add_new_operator_manual_item();
	$("#add_new_operator_manual_item_dialog" ).dialog('open');
	
}

function fn_html_operator_manual_item_preview(path)
{
	var path_html= $('#path_html_operator_manual_item_dialog_add_new_operator_manual_item').val();
	if(path)
	{
		window.open(path);
	}
	else
	{
		window.open(path_html);
	}
}
	
function fn_get_operator_manual_items(page,num)
{

	fn_set_status_loading();
	
	jqXHR= $.post("./get_operator_manual_items.php","page="+encodeURIComponent(page)+"&num="+encodeURIComponent(num),fn_success_get_operator_manual_items);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при получении пунктов руководства пользователя");
		$( "#error_dialog" ).dialog("open");
	});
	
}

function fn_success_get_operator_manual_items(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	$("#div_operator_manual_items_table").html(data);
}
	
function fn_show_choice_picture(main_folder)
{
	fn_set_status_loading();

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
	
	if($("#dialog_create_folder").dialog("instance"))
	{
		$("#dialog_create_folder").dialog("destroy")
	}
	
						
	fn_clear_status_loading();
	$("#pic").html(data);
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
			$('#path_html_operator_manual_item_dialog_add_new_operator_manual_item').val($('#path_choice_file').val());
			break;
		case 2:
			$('#path_html_operator_manual_item_dialog_edit_operator_manual_item').val($('#path_choice_file').val());
			break;			

	}
	$('#path_choice_file').val("");
	$("#choice_file_dialog").dialog('close');
}

function fn_btn_choice_file_html_operator_manual_item_dialog_add_new_operator_manual_item()
{
	type_choice_file= 1;
	fn_show_choice_file();
	$( '#choice_file_dialog' ).dialog('open');
}


function fn_btn_choice_file_html_operator_manual_item_dialog_edit_operator_manual_item()
{
	type_choice_file= 2;
	fn_show_choice_file();
	$( '#choice_file_dialog' ).dialog('open');
}




function fn_add_new_operator_manual_item()
{

	$('#error_dialog_add_new_operator_manual_item').html("");
	
	var key_operator_manual_item= $('#key_operator_manual_item_dialog_add_new_operator_manual_item').val();
	var name_operator_manual_item= $('#name_operator_manual_item_dialog_add_new_operator_manual_item').val();
	var path_html_operator_manual_item= $('#path_html_operator_manual_item_dialog_add_new_operator_manual_item').val();
	var comment_operator_manual_item= $('#comment_operator_manual_item_dialog_add_new_operator_manual_item').val();
	var text_operator_manual_item= tinyMCE.editors["text_operator_manual_item_dialog_add_new_operator_manual_item"].getContent();
	var use_ref_html_operator_manual_item= $('#use_ref_html_operator_manual_item_dialog_add_new_operator_manual_item').get(0).checked;
	var visibility_operator_manual_item= $('#visibility_dialog_add_new_operator_manual_item').get(0).checked;
	
	var exp_key_operator_manual_item= new RegExp('^[a-zA-Z0-9_]{1,50}$');
	var exp_name_operator_manual_item= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	
	var str_error= "";
	
	
	if(use_ref_html_operator_manual_item)
	{
		use_ref_html_operator_manual_item= "1";
	}
	else
	{
		use_ref_html_operator_manual_item= "0";
	}
	
	if(visibility_operator_manual_item)
	{
		visibility_operator_manual_item= "1";
	}
	else
	{
		visibility_operator_manual_item= "0";
	}
	
	
	if(!exp_key_operator_manual_item.test(key_operator_manual_item))
	{
		str_error += "Идентификатор пункта не соответствует требованиям<br>";
	}
	if(!exp_name_operator_manual_item.test(name_operator_manual_item))
	{
		str_error += "Название пункта не соответствует требованиям<br>";
	}
	
	if(str_error != "")
	{
		$('#error_dialog_add_new_operator_manual_item').html(str_error);
	}
	else
	{
		fn_set_status_loading();
                       
		jqXHR= $.post("./check_operator_manual_item_information_for_add.php","status="+encodeURIComponent(visibility_operator_manual_item)+"&key_operator_manual_item="+encodeURIComponent(key_operator_manual_item)+"&name_operator_manual_item="+encodeURIComponent(name_operator_manual_item)+"&path_html_operator_manual_item="+encodeURIComponent(path_html_operator_manual_item)+"&comment_operator_manual_item="+encodeURIComponent(comment_operator_manual_item)+"&text_operator_manual_item="+encodeURIComponent(text_operator_manual_item)+"&use_ref_html_operator_manual_item="+encodeURIComponent(use_ref_html_operator_manual_item),fn_success_check_operator_manual_item_information_for_add);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при добавлении нового пункта руководства оператора");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

function fn_success_check_operator_manual_item_information_for_add(data,textStatus,jqXHR)
{
	$('#error_dialog_add_new_operator_manual_item').html("");
	
	var key_operator_manual_item= $('#key_operator_manual_item_dialog_add_new_operator_manual_item').val();
	var name_operator_manual_item= $('#name_operator_manual_item_dialog_add_new_operator_manual_item').val();
	var path_html_operator_manual_item= $('#path_html_operator_manual_item_dialog_add_new_operator_manual_item').val();
	var comment_operator_manual_item= $('#comment_operator_manual_item_dialog_add_new_operator_manual_item').val();
	var text_operator_manual_item= tinyMCE.editors["text_operator_manual_item_dialog_add_new_operator_manual_item"].getContent();
	var use_ref_html_operator_manual_item= $('#use_ref_html_operator_manual_item_dialog_add_new_operator_manual_item').get(0).checked;
	var visibility_operator_manual_item= $('#visibility_dialog_add_new_operator_manual_item').get(0).checked;
	
	var exp_key_operator_manual_item= new RegExp('^[a-zA-Z0-9_]{1,50}$');
	var exp_name_operator_manual_item= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	
	var str_error= "";
	
	
	if(use_ref_html_operator_manual_item)
	{
		use_ref_html_operator_manual_item= "1";
	}
	else
	{
		use_ref_html_operator_manual_item= "0";
	}
	
	if(visibility_operator_manual_item)
	{
		visibility_operator_manual_item= "1";
	}
	else
	{
		visibility_operator_manual_item= "0";
	}
	
	
	fn_clear_status_loading();
		
	if(data != "1")
	{
		$('#error_dialog_add_new_operator_manual_item').html(data);
	}
	else
	{
		fn_set_status_loading();
                       
		jqXHR= $.post("./add_new_operator_manual_item_information.php","status="+encodeURIComponent(visibility_operator_manual_item)+"&key_operator_manual_item="+encodeURIComponent(key_operator_manual_item)+"&name_operator_manual_item="+encodeURIComponent(name_operator_manual_item)+"&path_html_operator_manual_item="+encodeURIComponent(path_html_operator_manual_item)+"&comment_operator_manual_item="+encodeURIComponent(comment_operator_manual_item)+"&text_operator_manual_item="+encodeURIComponent(text_operator_manual_item)+"&use_ref_html_operator_manual_item="+encodeURIComponent(use_ref_html_operator_manual_item),fn_success_add_new_operator_manual_item);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при добавлении нового пункта руководства оператора");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

function fn_success_add_new_operator_manual_item(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	if(data== "1")
	{
		$("#add_new_operator_manual_item_dialog").dialog("close");
		$("#p_error_dialog").html("Новый пункт руководства оператора успешно добавлен");
		$("#error_dialog" ).dialog("open");
		fn_get_operator_manual_items($('#hdn_page_tbl_operator_manual_items').val(),$('#hdn_num_tbl_operator_manual_items').val());	
	}
	else
	{
		$("#p_error_dialog").html(data);
		$("#error_dialog" ).dialog("open");
	}
}

function fn_operator_manual_item_preview()
{
	$('#error_dialog_add_new_operator_manual_item').html("");
	
	var key_operator_manual_item= $('#key_operator_manual_item_dialog_add_new_operator_manual_item').val();
	var name_operator_manual_item= $('#name_operator_manual_item_dialog_add_new_operator_manual_item').val();
	var path_html_operator_manual_item= $('#path_html_operator_manual_item_dialog_add_new_operator_manual_item').val();
	var comment_operator_manual_item= $('#comment_operator_manual_item_dialog_add_new_operator_manual_item').val();
	var text_operator_manual_item= tinyMCE.editors["text_operator_manual_item_dialog_add_new_operator_manual_item"].getContent();
	var use_ref_html_operator_manual_item= $('#use_ref_html_operator_manual_item_dialog_add_new_operator_manual_item').get(0).checked;
	var visibility_operator_manual_item= $('#visibility_dialog_add_new_operator_manual_item').get(0).checked;
	
	var exp_key_operator_manual_item= new RegExp('^[a-zA-Z0-9_]{1,50}$');
	var exp_name_operator_manual_item= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	
	var str_error= "";
	
	
	if(use_ref_html_operator_manual_item)
	{
		use_ref_html_operator_manual_item= "1";
	}
	else
	{
		use_ref_html_operator_manual_item= "0";
	}
	
	if(visibility_operator_manual_item)
	{
		visibility_operator_manual_item= "1";
	}
	else
	{
		visibility_operator_manual_item= "0";
	}
	
	
	if(!exp_key_operator_manual_item.test(key_operator_manual_item))
	{
		str_error += "Идентификатор пункта не соответствует требованиям<br>";
	}
	if(!exp_name_operator_manual_item.test(name_operator_manual_item))
	{
		str_error += "Название пункта не соответствует требованиям<br>";
	}
	
	if(str_error != "")
	{
		$('#error_dialog_add_new_operator_manual_item').html(str_error);
	}
	else
	{
		fn_set_status_loading();
                       
		jqXHR= $.post("./check_operator_manual_item_information_for_add.php","status="+encodeURIComponent(visibility_operator_manual_item)+"&key_operator_manual_item="+encodeURIComponent(key_operator_manual_item)+"&name_operator_manual_item="+encodeURIComponent(name_operator_manual_item)+"&path_html_operator_manual_item="+encodeURIComponent(path_html_operator_manual_item)+"&comment_operator_manual_item="+encodeURIComponent(comment_operator_manual_item)+"&text_operator_manual_item="+encodeURIComponent(text_operator_manual_item)+"&use_ref_html_operator_manual_item="+encodeURIComponent(use_ref_html_operator_manual_item),fn_success_check_operator_manual_item_information_for_preview);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при добавлении нового пункта руководства оператора");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

function fn_success_check_operator_manual_item_information_for_preview(data,textStatus,jqXHR)
{
	$('#error_dialog_add_new_operator_manual_item').html("");
	
	var key_operator_manual_item= $('#key_operator_manual_item_dialog_add_new_operator_manual_item').val();
	var name_operator_manual_item= $('#name_operator_manual_item_dialog_add_new_operator_manual_item').val();
	var path_html_operator_manual_item= $('#path_html_operator_manual_item_dialog_add_new_operator_manual_item').val();
	var comment_operator_manual_item= $('#comment_operator_manual_item_dialog_add_new_operator_manual_item').val();
	var text_operator_manual_item= tinyMCE.editors["text_operator_manual_item_dialog_add_new_operator_manual_item"].getContent();
	var use_ref_html_operator_manual_item= $('#use_ref_html_operator_manual_item_dialog_add_new_operator_manual_item').get(0).checked;
	var visibility_operator_manual_item= $('#visibility_dialog_add_new_operator_manual_item').get(0).checked;
	
	var exp_key_operator_manual_item= new RegExp('^[a-zA-Z0-9_]{1,50}$');
	var exp_name_operator_manual_item= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	
	var str_error= "";
	
	
	if(use_ref_html_operator_manual_item)
	{
		use_ref_html_operator_manual_item= "1";
	}
	else
	{
		use_ref_html_operator_manual_item= "0";
	}
	
	if(visibility_operator_manual_item)
	{
		visibility_operator_manual_item= "1";
	}
	else
	{
		visibility_operator_manual_item= "0";
	}
	
	
	fn_clear_status_loading();
		
	if(data != "1")
	{
		$('#error_dialog_add_new_operator_manual_item').html(data);
	}
	else
	{
		/*
		fn_set_status_loading();
                       
		jqXHR= $.post("./add_new_operator_manual_item_information.php","status="+encodeURIComponent(visibility_operator_manual_item)+"&key_operator_manual_item="+encodeURIComponent(key_operator_manual_item)+"&name_operator_manual_item="+encodeURIComponent(name_operator_manual_item)+"&path_html_operator_manual_item="+encodeURIComponent(path_html_operator_manual_item)+"&comment_operator_manual_item="+encodeURIComponent(comment_operator_manual_item)+"&text_operator_manual_item="+encodeURIComponent(text_operator_manual_item)+"&use_ref_html_operator_manual_item="+encodeURIComponent(use_ref_html_operator_manual_item),fn_success_add_new_operator_manual_item);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при добавлении нового алгоритма");
			$( "#error_dialog" ).dialog("open");
		});
		*/
	}
}


function fn_get_show_full_information_operator_manual_item(id_operator_manual_item)
{
	fn_set_status_loading();
    if((id_operator_manual_item != "") && (id_operator_manual_item != undefined))
	{
	 	jqXHR= $.post("./get_operator_manual_item_full_information.php","id_operator_manual_item="+encodeURIComponent(id_operator_manual_item),fn_success_get_show_full_information_operator_manual_item);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при получении информации по данному пункту руководства оператора");
			$( "#error_dialog" ).dialog("open");
		});
	}	
	else
	{
		//
	}
}

function fn_success_get_show_full_information_operator_manual_item(data,textStatus,jqXHR)
{
	$("#show_information_operator_manual_item" ).html(data);
	fn_clear_status_loading();
	$("#dialog_show_information_operator_manual_item" ).dialog("open");
}


function fn_edit_operator_manual_item(id_operator_manual_item)
{
	fn_set_status_loading();
    if((id_operator_manual_item != "") || (id_operator_manual_item != undefined))
	{
	 	jqXHR= $.post("./get_edit_operator_manual_item.php","id_operator_manual_item="+encodeURIComponent(id_operator_manual_item),fn_success_get_edit_operator_manual_item);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при получении информации по выбранному пункту руководства пользователя");
			$( "#error_dialog" ).dialog("open");
		});
	}	
	else
	{
		//
	}
}
function fn_success_get_edit_operator_manual_item(data,textStatus,jqXHR)
{
	$( "#dialog_edit_operator_manual_item" ).html(data);
	fn_clear_status_loading();
	$("#dialog_show_information_operator_manual_item" ).dialog("close");
	$( "#dialog_edit_operator_manual_item" ).dialog("open");
}




function fn_save_edit_operator_manual_item(id_operator_manual_item)
{
	
	if(id_operator_manual_item == undefined)
	{
		$("#p_error_dialog").html("Ошибка при сохранении пункта руководства оператора");
		$( "#error_dialog" ).dialog("open");
		return;
	}
	
	$('#error_dialog_edit_operator_manual_item').html("");
	
	var key_operator_manual_item= $('#key_operator_manual_item_dialog_edit_operator_manual_item').val();
	var name_operator_manual_item= $('#name_operator_manual_item_dialog_edit_operator_manual_item').val();
	var path_html_operator_manual_item= $('#path_html_operator_manual_item_dialog_edit_operator_manual_item').val();
	var comment_operator_manual_item= $('#comment_operator_manual_item_dialog_edit_operator_manual_item').val();
	var text_operator_manual_item= tinyMCE.editors["text_operator_manual_item_dialog_edit_operator_manual_item"].getContent();
	var use_ref_html_operator_manual_item= $('#use_ref_html_operator_manual_item_dialog_edit_operator_manual_item').get(0).checked;
	var visibility_operator_manual_item= $('#visibility_dialog_edit_operator_manual_item').get(0).checked;
	
	var exp_key_operator_manual_item= new RegExp('^[a-zA-Z0-9_]{1,50}$');
	var exp_name_operator_manual_item= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	
	var str_error= "";
	
	
	if(use_ref_html_operator_manual_item)
	{
		use_ref_html_operator_manual_item= "1";
	}
	else
	{
		use_ref_html_operator_manual_item= "0";
	}
	
	if(visibility_operator_manual_item)
	{
		visibility_operator_manual_item= "1";
	}
	else
	{
		visibility_operator_manual_item= "0";
	}
	
	
	if(!exp_key_operator_manual_item.test(key_operator_manual_item))
	{
		str_error += "Идентификатор пункта не соответствует требованиям<br>";
	}
	if(!exp_name_operator_manual_item.test(name_operator_manual_item))
	{
		str_error += "Название пункта не соответствует требованиям<br>";
	}
	
	if(str_error != "")
	{
		$('#error_dialog_add_new_operator_manual_item').html(str_error);
	}
	else
	{
		fn_set_status_loading();
                       
		jqXHR= $.post("./check_operator_manual_item_information_for_edit.php","id_operator_manual_item="+encodeURIComponent(id_operator_manual_item)+"&status="+encodeURIComponent(visibility_operator_manual_item)+"&key_operator_manual_item="+encodeURIComponent(key_operator_manual_item)+"&name_operator_manual_item="+encodeURIComponent(name_operator_manual_item)+"&path_html_operator_manual_item="+encodeURIComponent(path_html_operator_manual_item)+"&comment_operator_manual_item="+encodeURIComponent(comment_operator_manual_item)+"&text_operator_manual_item="+encodeURIComponent(text_operator_manual_item)+"&use_ref_html_operator_manual_item="+encodeURIComponent(use_ref_html_operator_manual_item),fn_success_check_operator_manual_item_information_for_edit);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при сохранении пункта руководства оператора");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

function fn_success_check_operator_manual_item_information_for_edit(data,textStatus,jqXHR)
{
		
	$('#error_dialog_edit_operator_manual_item').html("");
	var id_operator_manual_item = $('#id_operator_manual_item_dialog_edit_operator_manual_item').val();
	
	var key_operator_manual_item= $('#key_operator_manual_item_dialog_edit_operator_manual_item').val();
	var name_operator_manual_item= $('#name_operator_manual_item_dialog_edit_operator_manual_item').val();
	var path_html_operator_manual_item= $('#path_html_operator_manual_item_dialog_edit_operator_manual_item').val();
	var comment_operator_manual_item= $('#comment_operator_manual_item_dialog_edit_operator_manual_item').val();
	var text_operator_manual_item= tinyMCE.editors["text_operator_manual_item_dialog_edit_operator_manual_item"].getContent();
	var use_ref_html_operator_manual_item= $('#use_ref_html_operator_manual_item_dialog_edit_operator_manual_item').get(0).checked;
	var visibility_operator_manual_item= $('#visibility_dialog_edit_operator_manual_item').get(0).checked;
	
	var exp_key_operator_manual_item= new RegExp('^[a-zA-Z0-9_]{1,50}$');
	var exp_name_operator_manual_item= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	
	var str_error= "";
	
	
	if(use_ref_html_operator_manual_item)
	{
		use_ref_html_operator_manual_item= "1";
	}
	else
	{
		use_ref_html_operator_manual_item= "0";
	}
	
	if(visibility_operator_manual_item)
	{
		visibility_operator_manual_item= "1";
	}
	else
	{
		visibility_operator_manual_item= "0";
	}
	
	fn_clear_status_loading();
		
	if(data != "1")
	{
		$('#error_dialog_edit_operator_manual_item').html(data);
	}
	else
	{
		fn_set_status_loading();
                       
		jqXHR= $.post("./save_edit_operator_manual_item_information.php","id_operator_manual_item="+encodeURIComponent(id_operator_manual_item)+"&status="+encodeURIComponent(visibility_operator_manual_item)+"&key_operator_manual_item="+encodeURIComponent(key_operator_manual_item)+"&name_operator_manual_item="+encodeURIComponent(name_operator_manual_item)+"&path_html_operator_manual_item="+encodeURIComponent(path_html_operator_manual_item)+"&comment_operator_manual_item="+encodeURIComponent(comment_operator_manual_item)+"&text_operator_manual_item="+encodeURIComponent(text_operator_manual_item)+"&use_ref_html_operator_manual_item="+encodeURIComponent(use_ref_html_operator_manual_item),fn_success_save_edit_operator_manual_item);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при сохранении пункта руководства оператора");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

function fn_success_save_edit_operator_manual_item(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	if(data== "1")
	{
		$("#dialog_edit_operator_manual_item").dialog("close");
		$("#p_error_dialog").html("Пункт руководства оператора успешно отредактирован");
		$("#error_dialog" ).dialog("open");
		fn_get_operator_manual_items($('#hdn_page_tbl_operator_manual_items').val(),$('#hdn_num_tbl_operator_manual_items').val());	
	}
	else
	{
		$("#p_error_dialog").html(data);
		$("#error_dialog" ).dialog("open");
	}
}

function fn_edit_operator_manual_item_preview(id_operator_manual_item)
{
	if(id_operator_manual_item == undefined)
	{
		$("#p_error_dialog").html("Ошибка при предпросмотре пункта руководства оператора");
		$( "#error_dialog" ).dialog("open");
		return;
	}
	
	$('#error_dialog_edit_operator_manual_item').html("");
	
	var key_operator_manual_item= $('#key_operator_manual_item_dialog_edit_operator_manual_item').val();
	var name_operator_manual_item= $('#name_operator_manual_item_dialog_edit_operator_manual_item').val();
	var path_html_operator_manual_item= $('#path_html_operator_manual_item_dialog_edit_operator_manual_item').val();
	var comment_operator_manual_item= $('#comment_operator_manual_item_dialog_edit_operator_manual_item').val();
	var text_operator_manual_item= tinyMCE.editors["text_operator_manual_item_dialog_edit_operator_manual_item"].getContent();
	var use_ref_html_operator_manual_item= $('#use_ref_html_operator_manual_item_dialog_edit_operator_manual_item').get(0).checked;
	var visibility_operator_manual_item= $('#visibility_dialog_edit_operator_manual_item').get(0).checked;
	
	var exp_key_operator_manual_item= new RegExp('^[a-zA-Z0-9_]{1,50}$');
	var exp_name_operator_manual_item= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	
	var str_error= "";
	
	
	if(use_ref_html_operator_manual_item)
	{
		use_ref_html_operator_manual_item= "1";
	}
	else
	{
		use_ref_html_operator_manual_item= "0";
	}
	
	if(visibility_operator_manual_item)
	{
		visibility_operator_manual_item= "1";
	}
	else
	{
		visibility_operator_manual_item= "0";
	}
	
	
	if(!exp_key_operator_manual_item.test(key_operator_manual_item))
	{
		str_error += "Идентификатор пункта не соответствует требованиям<br>";
	}
	if(!exp_name_operator_manual_item.test(name_operator_manual_item))
	{
		str_error += "Название пункта не соответствует требованиям<br>";
	}
	
	if(str_error != "")
	{
		$('#error_dialog_add_new_operator_manual_item').html(str_error);
	}
	else
	{
		fn_set_status_loading();
                       
		jqXHR= $.post("./check_operator_manual_item_information_for_edit.php","id_operator_manual_item="+encodeURIComponent(id_operator_manual_item)+"&status="+encodeURIComponent(visibility_operator_manual_item)+"&key_operator_manual_item="+encodeURIComponent(key_operator_manual_item)+"&name_operator_manual_item="+encodeURIComponent(name_operator_manual_item)+"&path_html_operator_manual_item="+encodeURIComponent(path_html_operator_manual_item)+"&comment_operator_manual_item="+encodeURIComponent(comment_operator_manual_item)+"&text_operator_manual_item="+encodeURIComponent(text_operator_manual_item)+"&use_ref_html_operator_manual_item="+encodeURIComponent(use_ref_html_operator_manual_item),fn_success_check_operator_manual_item_information_for_edit_preview);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при сохранении пункта руководства оператора");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

function fn_success_check_operator_manual_item_information_for_edit_preview(data,textStatus,jqXHR)
{

	$('#error_dialog_edit_operator_manual_item').html("");
	var id_operator_manual_item = $('#id_operator_manual_item_dialog_edit_operator_manual_item').val();
	var key_operator_manual_item= $('#key_operator_manual_item_dialog_edit_operator_manual_item').val();
	var name_operator_manual_item= $('#name_operator_manual_item_dialog_edit_operator_manual_item').val();
	var path_html_operator_manual_item= $('#path_html_operator_manual_item_dialog_edit_operator_manual_item').val();
	var comment_operator_manual_item= $('#comment_operator_manual_item_dialog_edit_operator_manual_item').val();
	var text_operator_manual_item= tinyMCE.editors["text_operator_manual_item_dialog_edit_operator_manual_item"].getContent();
	var use_ref_html_operator_manual_item= $('#use_ref_html_operator_manual_item_dialog_edit_operator_manual_item').get(0).checked;
	var visibility_operator_manual_item= $('#visibility_dialog_edit_operator_manual_item').get(0).checked;
	
	var exp_key_operator_manual_item= new RegExp('^[a-zA-Z0-9_]{1,50}$');
	var exp_name_operator_manual_item= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	
	var str_error= "";
	
	
	if(use_ref_html_operator_manual_item)
	{
		use_ref_html_operator_manual_item= "1";
	}
	else
	{
		use_ref_html_operator_manual_item= "0";
	}
	
	if(visibility_operator_manual_item)
	{
		visibility_operator_manual_item= "1";
	}
	else
	{
		visibility_operator_manual_item= "0";
	}
	
	
	if(!exp_key_operator_manual_item.test(key_operator_manual_item))
	{
		str_error += "Идентификатор пункта не соответствует требованиям<br>";
	}
	if(!exp_name_operator_manual_item.test(name_operator_manual_item))
	{
		str_error += "Название пункта не соответствует требованиям<br>";
	}
	
	fn_clear_status_loading();
		
	if(data != "1")
	{
		$('#error_dialog_edit_operator_manual_item').html(data);
	}
	else
	{
	/*
		fn_set_status_loading();
                       
		jqXHR= $.post("../../frontend/profile/get_algorithm.php","algorithm_preview="+encodeURIComponent("1")+"&status="+encodeURIComponent(visibility_algorithm)+"&id_type_board="+encodeURIComponent(id_type_board)+"&id_algorithm="+encodeURIComponent(id_algorithm)+"&name_algorithm="+encodeURIComponent(name_algorithm)+"&path_html_algorithm="+encodeURIComponent(path_html_algorithm)+"&path_pdf_algorithm="+encodeURIComponent(path_pdf_algorithm)+"&visibility_ref_pdf_algorithm="+encodeURIComponent(visibility_ref_pdf_algorithm)+"&path_rle_algorithm="+encodeURIComponent(path_rle_algorithm)+"&visibility_ref_rle_algorithm="+encodeURIComponent(visibility_ref_rle_algorithm)+"&comment_algorithm="+encodeURIComponent(comment_algorithm)+"&text_algorithm="+encodeURIComponent(text_algorithm)+"&use_ref_html_algorithm="+encodeURIComponent(use_ref_html_algorithm),fn_success_get_algorithm_preview);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при добавлении нового алгоритма");
			$( "#error_dialog" ).dialog("open");
		});
	*/
	}
}

function fn_up_operator_manual_item(id)
{
	fn_set_status_loading();
                       
	jqXHR= $.post("./up_operator_manual_item.php","id_operator_manual_item="+encodeURIComponent(id),fn_success_up_operator_manual_item);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при изменении позиции пункта руководства оператора");
	$( "#error_dialog" ).dialog("open");});
}

function fn_success_up_operator_manual_item(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	
	var page= $('#hdn_page_tbl_operator_manual_items').val();
	var num= $('#hdn_num_tbl_operator_manual_items').val();						
	if(data== "1")
	{
	
		fn_get_operator_manual_items(page,num);
		
		$("#p_error_dialog").html("Пункт руководства оператора успешно перемещен на одну позицию вверх");
		$( "#error_dialog" ).dialog("open");
							
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
						
}

function fn_down_operator_manual_item(id)
{
	fn_set_status_loading();
                       
	jqXHR= $.post("./down_operator_manual_item.php","id_operator_manual_item="+encodeURIComponent(id),fn_success_down_operator_manual_item);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при изменении позиции пункта руководства оператора");
	$( "#error_dialog" ).dialog("open");});
}

function fn_success_down_operator_manual_item(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	
	var page= $('#hdn_page_tbl_operator_manual_items').val();
	var num= $('#hdn_num_tbl_operator_manual_items').val();
						
	if(data== "1")
	{
	
		fn_get_operator_manual_items(page,num);
		
		$("#p_error_dialog").html("Пункт руководства оператора успешно перемещен на одну позицию вниз");
		$( "#error_dialog" ).dialog("open");
							
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
						
}

function fn_delete_operator_manual_item(id)
{
	if(confirm("Выдействительно хотите удалить данный пункт руководства оператора?"))
	{
		fn_clear_status_loading();
		jqXHR= $.post("./delete_operator_manual_item.php","id_operator_manual_item="+encodeURIComponent(id),fn_success_delete_operator_manual_item);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при удалении пункта руководства оператора");
		$( "#error_dialog" ).dialog("open");});
	}
}
					
function fn_success_delete_operator_manual_item(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	var page= $('#hdn_page_tbl_operator_manual_items').val();
	var num= $('#hdn_num_tbl_operator_manual_items').val();
	if(data== "1")
	{
		fn_get_operator_manual_items(page,num);
		$("#p_error_dialog").html("Пункт руководства оператора успешно удален");
		$( "#error_dialog" ).dialog("open");
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
						
}


function fn_show_operator_manual_item(id)
{
	fn_set_status_loading();
	jqXHR= $.post("./show_operator_manual_item.php","id_operator_manual_item="+encodeURIComponent(id),fn_success_show_operator_manual_item);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при изменении видимости пункта руководства оператора");
		$( "#error_dialog" ).dialog("open");
	});
}
					
function fn_success_show_operator_manual_item(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	
	var page= $('#hdn_page_tbl_operator_manual_items').val();
	var num= $('#hdn_num_tbl_operator_manual_items').val();
	
	if(data== "1")
	{
		fn_get_operator_manual_items(page,num);
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
						
}
					
function fn_hide_operator_manual_item(id)
{
	fn_set_status_loading();
	jqXHR= $.post("./hide_operator_manual_item.php","id_operator_manual_item="+encodeURIComponent(id),fn_success_hide_operator_manual_item);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при изменении видимости пункта руководства оператора");
		$( "#error_dialog" ).dialog("open");
	});
}
					
function fn_success_hide_operator_manual_item(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	
	var page= $('#hdn_page_tbl_operator_manual_items').val();
	var num= $('#hdn_num_tbl_operator_manual_items').val();
	
	if(data== "1")
	{
		fn_get_operator_manual_items(page,num);
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
}
 
	
