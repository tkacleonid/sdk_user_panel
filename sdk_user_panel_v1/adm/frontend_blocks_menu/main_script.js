xOffset = 10;
yOffset = 30;
	

				
$(function(){
				
	$( "#error_dialog" ).dialog({
		autoOpen: false,
		height: 200,
		width: 600,
		modal: true,
		resizable:false,
		dialogClass:"none_header_dialog"
	});

	$( "#add_block_menu1" ).dialog({
		autoOpen: false,
		height: 700,
		width: 700,
		modal: true,
		resizable:false,
		title:"Добавление блока меню",
		open: function(e){
			fn_tinymce_for_add_block();
		},
		close:fn_clear_tinymce_for_add_block
	});
						
	$( "#edit_block_menu" ).dialog({
		autoOpen: false,
		height: 700,
		width: 750,
		modal: true,
		resizable:false,
		title:"Редактирование блока меню",
		open: function(e){
			//fn_tinymce_for_add_block();
		},
		close:fn_clear_tinymce_for_edit_block
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
						
	$( "#more_information_about_block_menu" ).dialog({
		autoOpen: false,
		height: 700,
		width: 800,
		modal: true,
		resizable:false,
		dialogClass:"none_header_dialog",
		close:function(){
								
		}
	});
						
	$("#btn_error_dialog").button().on( "click", function() {
		$( "#error_dialog" ).dialog("close");
	});
						
	$( "#btn_add_block_menu" ).button({
		icons:{primary:"ui-icon-plus"},text:false,
		}).on( "click", function() {
			$( "#add_block_menu1" ).dialog( "open" );							
	});
						
	$( "#btn_add_block_menu_dialog" ).button().on( "click", function() {
											
		var name = $("#name_add_block_menu_dialog").val();
		var name_pattern = new RegExp("\\S+");
							
		var directory = $("#directory_add_block_menu_dialog").val();
		var directory_pattern = new RegExp("^[A-Za-z0-9_\\-]+$");
							
		var visibility = $("#visibility_add_block_menu_dialog").get(0).checked;
		var status_debug = $("#status_debug_add_block_menu_dialog").get(0).checked;
      	var status_visibility_without_authorized = $("#status_visibility_without_authorized_add_block_menu_dialog").get(0).checked;
							
		if(visibility) visibility = "1";
		else visibility = "0";
							
		if(status_debug) status_debug = "1";
		else status_debug = "0";
      
      	if(status_visibility_without_authorized) status_visibility_without_authorized = "1";
		else status_visibility_without_authorized = "0";
							
		var short_desc = $("#short_desc_add_block_menu_dialog").val();
							
		var long_desc =  tinyMCE.editors["long_desc_add_block_menu_dialog"].getContent();
							
		var str_error = "";
							
		if(!name_pattern.test(name))
		{
			str_error += "Название не соответствуе требованиям<br>"
		}
		
		if(!directory_pattern.test(directory))
		{
			str_error += "Директория не соответствуе требованиям<br>"
		}

		if(str_error !== "")
		{
			$("#error_add_block_menu_dialog").html(str_error);
		}
		else
		{
			fn_add_block_menu_ajax(name,directory,visibility,status_debug,short_desc,long_desc,status_visibility_without_authorized);
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
	
	$("#td_content_block").css("display","table-cell");
});

	
function fn_tinymce_for_add_block()
{

	tinymce.init({
		selector: "#long_desc_add_block_menu_dialog",
		theme: "modern",
		width: 500,
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
					
function fn_clear_tinymce_for_add_block()
{
	tinymce.editors['long_desc_add_block_menu_dialog'].remove();
}

function fn_clear_tinymce_for_edit_block()
{
	tinymce.editors['long_desc_edit_block_menu_dialog'].remove();
}


function fn_show_block_menu_information(id_block)
{
						
	fn_set_status_loading();
                       
	jqXHR = $.post("./get_block_menu_information.php","id="+encodeURIComponent(id_block),fn_success_show_block_menu_information);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при получении информации о блоке меню");
		$( "#error_dialog" ).dialog("open");});
}
					
function fn_success_show_block_menu_information(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	$( "#more_information_about_block_menu" ).html(data);
	$( "#more_information_about_block_menu" ).dialog("open");
}
					
function fn_add_block_menu_ajax(name,directory,visibility,status_debug,short_desc,long_desc,status_visibility_without_authorized)
{
	fn_set_status_loading();
                       
	jqXHR = $.post("./add_block_menu.php","name="+encodeURIComponent(name)+"&directory="+encodeURIComponent(directory)+"&status_debug="+encodeURIComponent(status_debug)+"&visibility="+encodeURIComponent(visibility)+"&short_desc="+encodeURIComponent(short_desc)+"&long_desc="+encodeURIComponent(long_desc)+"&status_visibility_without_authorized="+encodeURIComponent(status_visibility_without_authorized),fn_success_add_block_menu_ajax);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при добавлении блока меню");
	$( "#error_dialog" ).dialog("open");});
}
					
function fn_success_add_block_menu_ajax(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	
	var page = $('#hdn_page_tbl_blocks').val();
	var num = $('#hdn_num_tbl_blocks').val();
	
	if(data == "1")
	{
		fn_get_blocks_menu(page,num);
		$("#p_error_dialog").html("Блок меню успешно добавлен");
		$( "#error_dialog" ).dialog("open");
		$( "#add_block_menu1" ).dialog("close");
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
						
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

function fn_get_blocks_menu(page,num)
{
	fn_set_status_loading();
	jqXHR = $.post("./get_blocks_menu.php","page="+encodeURIComponent(page)+"&num="+encodeURIComponent(num),fn_success_get_blocks_menu);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при добавлении блока меню");
		$( "#error_dialog" ).dialog("open");
	});
}
					  
function fn_success_get_blocks_menu(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	$("#div_blocks_menu_table").html(data);
}
					  
function fn_get_edit_block_menu(id)
{
	fn_set_status_loading();
	jqXHR = $.post("./get_edit_block_menu.php","id="+encodeURIComponent(id),fn_success_get_edit_block_menu);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при добавлении блока меню");
		$( "#error_dialog" ).dialog("open");
	});
}
					  
function fn_success_get_edit_block_menu(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	$("#edit_block_menu").html(data);
	tinymce.init({
		selector: "#long_desc_edit_block_menu_dialog",
		theme: "modern",
		width: 500,
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
	$("#edit_block_menu").dialog("open");
}
					  
function fn_save_edit_block_menu(id)
{
	var name = $("#name_edit_block_menu_dialog").val();
	var name_pattern = new RegExp("\\S+");
							
	var directory = $("#directory_edit_block_menu_dialog").val();
	var directory_pattern = new RegExp("^[A-Za-z0-9_\\-]+$");

	var visibility = $("#visibility_edit_block_menu_dialog").get(0).checked;
	var status_debug = $("#status_debug_edit_block_menu_dialog").get(0).checked;
  	var status_visibility_without_authorized = $("#status_visibility_without_authorized_edit_block_menu_dialog").get(0).checked;
							
	if(visibility) visibility = "1";
	else visibility = "0";
	
	if(status_debug) status_debug = "1";
	else status_debug = "0";
  
  	if(status_visibility_without_authorized) status_visibility_without_authorized = "1";
	else status_visibility_without_authorized = "0";
							
	var short_desc = $("#short_desc_edit_block_menu_dialog").val();
							
	var long_desc =  tinyMCE.editors["long_desc_edit_block_menu_dialog"].getContent();
							
	var str_error = "";
							
	if(!name_pattern.test(name))
	{
		str_error += "Название не соответствуе требованиям<br>"
	}
	if(!directory_pattern.test(directory))
	{
		str_error += "Директория не соответствуе требованиям<br>"
	}

	if(str_error !== "")
	{
		$("#error_edit_block_menu_dialog").html(str_error);
	}
	else
	{
		fn_save_edit_block_menu_ajax(id,name,directory,visibility,status_debug,short_desc,long_desc,status_visibility_without_authorized);
	}					
}
					  
function fn_save_edit_block_menu_ajax(id,name,directory,visibility,status_debug,short_desc,long_desc,status_visibility_without_authorized)
{
	fn_set_status_loading();
                       
	jqXHR = $.post("./save_edit_block_menu.php","id="+encodeURIComponent(id)+"&name="+encodeURIComponent(name)+"&directory="+encodeURIComponent(directory)+"&status_debug="+encodeURIComponent(status_debug)+"&visibility="+encodeURIComponent(visibility)+"&short_desc="+encodeURIComponent(short_desc)+"&long_desc="+encodeURIComponent(long_desc)+"&status_visibility_without_authorized="+encodeURIComponent(status_visibility_without_authorized),fn_success_save_edit_block_menu_ajax);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при добавлении блока меню");
		$( "#error_dialog" ).dialog("open");});
}
					
function fn_success_save_edit_block_menu_ajax(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	var page = $('#hdn_page_tbl_blocks').val();
	var num = $('#hdn_num_tbl_blocks').val();
	
	if(data == "1")
	{
		$("#p_error_dialog").html("Блок меню успешно отредактирован");
		$( "#error_dialog" ).dialog("open");
		$( "#edit_block_menu" ).dialog("close");
		fn_get_blocks_menu(page,num);
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
						
}
					
function fn_up_block_menu(id)
{
	fn_set_status_loading();
                       
	jqXHR = $.post("./up_block_menu.php","id="+encodeURIComponent(id),fn_success_up_block_menu_ajax);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при изменении позиции блока меню");
		$( "#error_dialog" ).dialog("open");
	});
}
					
function fn_success_up_block_menu_ajax(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	var page = $('#hdn_page_tbl_blocks').val();
	var num = $('#hdn_num_tbl_blocks').val();
						
	if(data == "1")
	{
		$("#p_error_dialog").html("Блок меню успешно перемещен на одну позицию вверх");
		$( "#error_dialog" ).dialog("open");
							
		fn_get_blocks_menu(page,num);
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
}
					
function fn_down_block_menu(id)
{
	fn_set_status_loading();
                       
	jqXHR = $.post("./down_block_menu.php","id="+encodeURIComponent(id),fn_success_down_block_menu_ajax);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при изменении позиции блока меню");
		$( "#error_dialog" ).dialog("open");
	});
}
					
function fn_success_down_block_menu_ajax(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	var page = $('#hdn_page_tbl_blocks').val();
	var num = $('#hdn_num_tbl_blocks').val();
	if(data == "1")
	{
		$("#p_error_dialog").html("Блок меню успешно перемещен на одну позицию вниз");
		$( "#error_dialog" ).dialog("open");
		fn_get_blocks_menu(page,num)
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
}
					
function fn_delete_block_menu(id)
{
	if(confirm("Выдействительно хотите удалить данный блок меню?"))
	{
		fn_clear_status_loading();
		jqXHR = $.post("./delete_block_menu.php","id="+encodeURIComponent(id),fn_success_delete_block_menu_ajax);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при удалении блока меню");
			$( "#error_dialog" ).dialog("open");
		});
	}
}
					
function fn_success_delete_block_menu_ajax(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	var page = $('#hdn_page_tbl_blocks').val();
	var num = $('#hdn_num_tbl_blocks').val();
	if(data == "1")
	{
		$("#p_error_dialog").html("Блок меню успешно удален");
		$( "#error_dialog" ).dialog("open");
		fn_get_blocks_menu(page,num);
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
}
					
function fn_show_block_menu(id)
{
	fn_set_status_loading();
	jqXHR = $.post("./show_block_menu.php","id="+encodeURIComponent(id),fn_success_show_block_menu_ajax);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при изменении видимости блока меню");
		$( "#error_dialog" ).dialog("open");
	});
}

function fn_success_show_block_menu_ajax(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	var page = $('#hdn_page_tbl_blocks').val();
	var num = $('#hdn_num_tbl_blocks').val();
	if(data == "1")
	{
		fn_get_blocks_menu(page,num);
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
}
					
function fn_hide_block_menu(id)
{
	fn_set_status_loading();
	jqXHR = $.post("./hide_block_menu.php","id="+encodeURIComponent(id),fn_success_hide_block_menu_ajax);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при изменении видимости блока меню");
		$( "#error_dialog" ).dialog("open");
	});
}
					
function fn_success_hide_block_menu_ajax(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	var page = $('#hdn_page_tbl_blocks').val();
	var num = $('#hdn_num_tbl_blocks').val();
	if(data == "1")
	{
		fn_get_blocks_menu(page,num)
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
}
					
					
					
function fn_get_profile_admin_information(id)
{
	fn_set_status_loading();
    jqXHR = $.post("../adm_accounts/get_profile_admin_information.php","id="+encodeURIComponent(id),fn_success_get_profile_admin_information);
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



function fn_debug_on_block_menu(id)
{
	fn_set_status_loading();
	jqXHR = $.post("./debug_on_block_menu.php","id="+encodeURIComponent(id),fn_success_debug_on_block_menu_ajax);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при изменении режима отладки блока меню");
		$( "#error_dialog" ).dialog("open");
	});
}

function fn_success_debug_on_block_menu_ajax(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	var page = $('#hdn_page_tbl_blocks').val();
	var num = $('#hdn_num_tbl_blocks').val();
	if(data == "1")
	{
		fn_get_blocks_menu(page,num);
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
}
					
function fn_debug_off_block_menu(id)
{
	fn_set_status_loading();
	jqXHR = $.post("./debug_off_block_menu.php","id="+encodeURIComponent(id),fn_success_debug_off_block_menu_ajax);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при изменении режима отладки блока меню");
		$( "#error_dialog" ).dialog("open");
	});
}
					
function fn_success_debug_off_block_menu_ajax(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	var page = $('#hdn_page_tbl_blocks').val();
	var num = $('#hdn_num_tbl_blocks').val();
	if(data == "1")
	{
		fn_get_blocks_menu(page,num)
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
}
