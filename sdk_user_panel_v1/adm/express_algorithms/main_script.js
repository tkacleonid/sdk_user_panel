xOffset= 10;
yOffset= 30;

type_choice_file= 0;

$(function(){

	$("#add_new_sign_algorithms_dialog").dialog({
		autoOpen: false,
		height: 1300,
		width: 900,
		modal: true,
		resizable:false,
		dialogClass:"none_header_dialog",
		title: "Добавление нового модуля условных обозначений",
		close:function(){
			if(tinyMCE.editors["text_add_new_sign_algorithms_dialog"] != undefined)
			{
				tinyMCE.editors["text_add_new_sign_algorithms_dialog"].remove();	
			}				
		}
	});
	
	$("#edit_sign_algorithms_dialog").dialog({
		autoOpen: false,
		height: 800,
		width: 900,
		modal: true,
		resizable:false,
		dialogClass:"none_header_dialog",
		title: "Редактирование модуля условных обозначений",
		close:function(){
			if(tinyMCE.editors["text_edit_sign_algorithms_dialog"] != undefined)
			{
				tinyMCE.editors["text_edit_sign_algorithms_dialog"].remove();					
			}
		}
	});
	
	$("#dialog_show_information_sign_algorithms").dialog({
		autoOpen: false,
		height: 800,
		width: 900,
		modal: true,
		resizable:false,
		dialogClass:"none_header_dialog",
		title: "Подробная информация о модуле условных обозначений",
		close:function(){

		}
	});
	

	$(".btn_show_sign").button();

	$("#sign_for_algorithm_dialog" ).dialog({
		autoOpen: false,
		height: 600,
		width: 900,
		modal: true,
		resizable:true,
		dialogClass:"none_header_dialog",
		title: "Управление условными обозначениями",
		close:function(){
				//fn_clear_tinymce();					
			}
	});

	$("#dialog_show_information_rle_item" ).dialog({
		autoOpen: false,
		height: 1300,
		width: 900,
		modal: true,
		resizable:false,
		dialogClass:"none_header_dialog",
		title: "Подробная информация об пункте РЛЭ",
		close:function(){
				//fn_clear_tinymce();					
			}
	});
	
	$("#dialog_edit_rle_item" ).dialog({
		autoOpen: false,
		height: 1300,
		width: 900,
		modal: true,
		resizable:false,
		dialogClass:"none_header_dialog",
		title: "Редактирование пункта РЛЭ",
		close:function(){
			if(tinyMCE.editors["text_rle_item_dialog_edit_rle_item"] != undefined)
			{
				tinyMCE.editors["text_rle_item_dialog_edit_rle_item"].remove();					
			}
		}
	});
	
	
	$("#dialog_choice_rle" ).dialog({
		autoOpen: false,
		height: 1000,
		width: 1000,
		modal: true,
		resizable:true,
		dialogClass:"none_header_dialog",
		title: "Выбор пункта РЛЭ",
		close:function(){
				//fn_clear_tinymce();					
			}
	});
	
	
	$("#add_new_rle_item_dialog" ).dialog({
		autoOpen: false,
		height: 1300,
		width: 900,
		modal: true,
		resizable:false,
		dialogClass:"none_header_dialog",
		title: "Добавление нового пункта РЛЭ",
		close:function(){
			if(tinyMCE.editors["text_rle_item_dialog_add_new_rle_item"] != undefined)
			{
				tinyMCE.editors["text_rle_item_dialog_add_new_rle_item"].remove();					
			}
		}
	});
	
	
			
	$("#add_new_express_algorithm_dialog" ).dialog({
		autoOpen: false,
		height: 1300,
		width: 900,
		modal: true,
		resizable:false,
		dialogClass:"none_header_dialog",
		title: "Добавление нового алгоритма",
		close:function(){
			if(tinyMCE.editors["text_algorithm_dialog_add_new_express_algorithm"] != undefined)
			{
				tinyMCE.editors["text_algorithm_dialog_add_new_express_algorithm"].remove();					
			}
		}
	});
	
	$("#dialog_show_information_express_algorithm" ).dialog({
		autoOpen: false,
		height: 1300,
		width: 900,
		modal: true,
		resizable:false,
		dialogClass:"none_header_dialog",
		title: "Информация алгоритма",
		close:function(){
				//fn_clear_tinymce();					
			}
	});
	
	$("#dialog_edit_algorithm" ).dialog({
		autoOpen: false,
		height: 1300,
		width: 900,
		modal: true,
		resizable:false,
		dialogClass:"none_header_dialog",
		title: "Редактирование алгоритма",
		close:function(){
			if(tinyMCE.editors["text_algorithm_dialog_edit_algorithm"] != undefined)
			{
				tinyMCE.editors["text_algorithm_dialog_edit_algorithm"].remove();				
			}
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
	
	
	$( "#add_new_type_board_dialog" ).dialog({
		autoOpen: false,
		height: 800,
		width: 900,
		modal: true,
		resizable:false,
		dialogClass:"none_header_dialog",
		title: "Добавление нового типа борта",
		close:function(){
				tinyMCE.editors["long_description_add_new_type_board_dialog"].remove();				
			}
	});
	
	$( "#edit_type_board_dialog" ).dialog({
		autoOpen: false,
		height: 800,
		width: 900,
		modal: true,
		resizable:false,
		dialogClass:"none_header_dialog",
		title: "Редактирование типа борта",
		close:function(){
				tinyMCE.editors["long_description_edit_type_board_dialog"].remove();				
			}
	});
	
	$( "#full_type_board_information_dialog" ).dialog({
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
	
	$( "#algorithm_preview_dialog" ).dialog({
		autoOpen: false,
		height: 1000,
		width: 1000,
		modal: true,
		resizable:true,
		dialogClass:"none_header_dialog",
		title: "Предпросмотр алгоритма",
		close:function(){			
			}
	});
	
	

	$("#menu_boards_type").menu();
						
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
	
	$("#btn_choice_dialog_choice_rle").button();
	


});



function fn_tinymce_for_add_sign_algorithm()
{
	tinymce.init({
		selector: "#text_add_new_sign_algorithms_dialog",
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

function fn_tinymce_for_edit_sign_algorithm()
{
	tinymce.init({
		selector: "#text_edit_sign_algorithms_dialog",
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

					
function fn_tinymce_for_add_type_board()
{
	tinymce.init({
		selector: "#long_description_add_new_type_board_dialog",
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
function fn_tinymce_for_add_new_algorithm()
{
	tinymce.init({
		selector: "#text_algorithm_dialog_add_new_express_algorithm",
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
function fn_tinymce_for_edit_algorithm()
{
	tinymce.init({
		selector: "#text_algorithm_dialog_edit_algorithm",
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


function fn_tinymce_for_add_new_rle_item()
{
	tinymce.init({
		selector: "#text_rle_item_dialog_add_new_rle_item",
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
function fn_tinymce_for_edit_rle_item()
{
	tinymce.init({
		selector: "#text_rle_item_dialog_edit_rle_item",
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


function fn_clear_tinymce()
{
	tinymce.remove();
}

function fn_add_new_type_board()
{

	$('#error_add_type_board_add_new_type_board_dialog').html("");


	var key_type_board= $('#key_type_board_add_new_type_board_dialog').val();
	var name_type_board= $('#name_type_board_add_new_type_board_dialog').val();
	var visibility_type_board= $('#visibility_type_board_add_new_type_board_dialog').get(0).checked;
	var short_description_type_board= $('#short_description_add_new_type_board_dialog').val();
	var long_description_type_board=   tinyMCE.editors["long_description_add_new_type_board_dialog"].getContent();
	var path_pdf_algorithm= $('#path_pdf_algorithm_add_new_type_board_dialog').val();
	var visibility_file_pdf_algorithm= $('#visibility_file_pdf_algorithm_add_new_type_board_dialog').get(0).checked;
	
	var exp_key_type_board= new RegExp('^[a-zA-Z0-9_]{1,50}$');
	var exp_name_type_board= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	
	var str_error= "";
	
	if(visibility_type_board)
	{
		visibility_type_board= "1";
	}
	else
	{
		visibility_type_board= "0";
	}
	
	if(visibility_file_pdf_algorithm)
	{
		visibility_file_pdf_algorithm= "1";
	}
	else
	{
		visibility_file_pdf_algorithm= "0";
	}
	
	
	if(!exp_key_type_board.test(key_type_board))
	{
		str_error += "Идентификатор типа борта не соответствует требованиям<br>";
	}
	if(!exp_name_type_board.test(name_type_board))
	{
		str_error += "Название типа борта не соответствует требованиям<br>";
	}
	
	if(str_error != "")
	{
		$('#error_add_type_board_add_new_type_board_dialog').html(str_error);
	}
	else
	{
		fn_set_status_loading();
                       
		jqXHR= $.post("./check_type_board_information_for_add.php","key_type_board="+encodeURIComponent(key_type_board)+"&visibility_file_pdf_algorithm="+encodeURIComponent(visibility_file_pdf_algorithm)+"&path_pdf_algorithm="+encodeURIComponent(path_pdf_algorithm)+"&name_type_board="+encodeURIComponent(name_type_board)+"&visibility_type_board="+encodeURIComponent(visibility_type_board)+"&short_description_type_board="+encodeURIComponent(short_description_type_board)+"&long_description_type_board="+encodeURIComponent(long_description_type_board),fn_success_check_type_board_information_for_add);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при обавлении нового типа борта");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

	function fn_success_check_type_board_information_for_add(data,textStatus,jqXHR)
	{
		$('#error_add_type_board_add_new_type_board_dialog').html("");
		
		var key_type_board= $('#key_type_board_add_new_type_board_dialog').val();
		var name_type_board= $('#name_type_board_add_new_type_board_dialog').val();
		var visibility_type_board= $('#visibility_type_board_add_new_type_board_dialog').get(0).checked;
		var short_description_type_board= $('#short_description_add_new_type_board_dialog').val();
		var long_description_type_board= tinyMCE.editors["long_description_add_new_type_board_dialog"].getContent();
		var path_pdf_algorithm= $('#path_pdf_algorithm_add_new_type_board_dialog').val();
		var visibility_file_pdf_algorithm= $('#visibility_file_pdf_algorithm_add_new_type_board_dialog').get(0).checked;
		
		if(visibility_type_board)
		{
			visibility_type_board= "1";
		}
		else
		{
			visibility_type_board= "0";
		}
		
		if(visibility_file_pdf_algorithm)
		{
			visibility_file_pdf_algorithm= "1";
		}
		else
		{
			visibility_file_pdf_algorithm= "0";
		}
	
	
		
		fn_clear_status_loading();
		
		if(data != "1")
		{
			$('#error_add_type_board_add_new_type_board_dialog').html(data);
		}
		else
		{
			fn_set_status_loading();
                       
			jqXHR= $.post("./add_new_type_board_information.php","key_type_board="+encodeURIComponent(key_type_board)+"&visibility_file_pdf_algorithm="+encodeURIComponent(visibility_file_pdf_algorithm)+"&path_pdf_algorithm="+encodeURIComponent(path_pdf_algorithm)+"&name_type_board="+encodeURIComponent(name_type_board)+"&visibility_type_board="+encodeURIComponent(visibility_type_board)+"&short_description_type_board="+encodeURIComponent(short_description_type_board)+"&long_description_type_board="+encodeURIComponent(long_description_type_board),fn_success_add_new_type_board);
			jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при обавлении нового типа борта");
				$( "#error_dialog" ).dialog("open");
			});
		}
	}

function fn_success_add_new_type_board(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	if(data== "1")
	{
		$("#add_new_type_board_dialog").dialog("close");
		$("#p_error_dialog").html("Новый тип борта успешно добавлен");
		$("#error_dialog" ).dialog("open");
		fn_get_type_boards($('#id_current_type_board').val());	
	}
	else
	{
		$("#p_error_dialog").html(data);
		$("#error_dialog" ).dialog("open");
	}
}



function fn_save_edit_type_board()
{

	$('#error_edit_type_board_edit_type_board_dialog').html("");
	
	var id_type_board= $("#hdn_id_edit_type_board").val();

	var key_type_board= $('#key_type_board_edit_type_board_dialog').val();
	var name_type_board= $('#name_type_board_edit_type_board_dialog').val();
	var visibility_type_board= $('#visibility_type_board_edit_type_board_dialog').get(0).checked;
	var short_description_type_board= $('#short_description_edit_type_board_dialog').val();
	var long_description_type_board= tinyMCE.editors["long_description_edit_type_board_dialog"].getContent();
	var path_pdf_algorithm= $('#path_pdf_algorithm_edit_type_board_dialog').val();
	var visibility_file_pdf_algorithm= $('#visibility_file_pdf_algorithm_edit_type_board_dialog').get(0).checked;
	
	var exp_key_type_board= new RegExp('^[a-zA-Z0-9_]{1,50}$');
	var exp_name_type_board= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	
	var str_error= "";
	
	if(visibility_type_board)
	{
		visibility_type_board= "1";
	}
	else
	{
		visibility_type_board= "0";
	}
	
	if(visibility_file_pdf_algorithm)
	{
		visibility_file_pdf_algorithm= "1";
	}
	else
	{
		visibility_file_pdf_algorithm= "0";
	}
		
		
	
	if(!exp_key_type_board.test(key_type_board))
	{
		str_error += "Идентификатор типа борта не соответствует требованиям<br>";
	}
	if(!exp_name_type_board.test(name_type_board))
	{
		str_error += "Название типа борта не соответствует требованиям<br>";
	}
	
	if(str_error != "")
	{
		$('#error_edit_type_board_edit_type_board_dialog').html(str_error);
	}
	else
	{
		fn_set_status_loading();
                       
		jqXHR= $.post("./check_type_board_information_for_edit.php","key_type_board="+encodeURIComponent(key_type_board)+"&visibility_file_pdf_algorithm="+encodeURIComponent(visibility_file_pdf_algorithm)+"&path_pdf_algorithm="+encodeURIComponent(path_pdf_algorithm)+"&id_current_type_board="+encodeURIComponent(id_type_board)+"&name_type_board="+encodeURIComponent(name_type_board)+"&visibility_type_board="+encodeURIComponent(visibility_type_board)+"&short_description_type_board="+encodeURIComponent(short_description_type_board)+"&long_description_type_board="+encodeURIComponent(long_description_type_board),fn_success_check_type_board_information_for_edit);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при редактировании типа борта");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

	function fn_success_check_type_board_information_for_edit(data,textStatus,jqXHR)
	{
		$('#error_edit_type_board_edit_type_board_dialog').html("");
		
		var id_type_board= $("#hdn_id_edit_type_board").val();
		
		var key_type_board= $('#key_type_board_edit_type_board_dialog').val();
		var name_type_board= $('#name_type_board_edit_type_board_dialog').val();
		var visibility_type_board= $('#visibility_type_board_edit_type_board_dialog').get(0).checked;
		var short_description_type_board= $('#short_description_edit_type_board_dialog').val();
		var long_description_type_board= tinyMCE.editors["long_description_edit_type_board_dialog"].getContent();
		var path_pdf_algorithm= $('#path_pdf_algorithm_edit_type_board_dialog').val();
		var visibility_file_pdf_algorithm= $('#visibility_file_pdf_algorithm_edit_type_board_dialog').get(0).checked;
		
		if(visibility_type_board)
		{
			visibility_type_board= "1";
		}
		else
		{
			visibility_type_board= "0";
		}
		
		if(visibility_file_pdf_algorithm)
		{
			visibility_file_pdf_algorithm= "1";
		}
		else
		{
			visibility_file_pdf_algorithm= "0";
		}
		
		fn_clear_status_loading();
		
		if(data != "1")
		{
			$('#error_edit_type_board_edit_type_board_dialog').html(data);
		}
		else
		{
			fn_set_status_loading();
                       
			jqXHR= $.post("./save_edit_type_board_information.php","key_type_board="+encodeURIComponent(key_type_board)+"&visibility_file_pdf_algorithm="+encodeURIComponent(visibility_file_pdf_algorithm)+"&path_pdf_algorithm="+encodeURIComponent(path_pdf_algorithm)+"&id_current_type_board="+encodeURIComponent(id_type_board)+"&name_type_board="+encodeURIComponent(name_type_board)+"&visibility_type_board="+encodeURIComponent(visibility_type_board)+"&short_description_type_board="+encodeURIComponent(short_description_type_board)+"&long_description_type_board="+encodeURIComponent(long_description_type_board),fn_success_edit_type_board);
			jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при редактировании типа борта");
				$( "#error_dialog" ).dialog("open");
			});
		}
	}

function fn_success_edit_type_board(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	if(data== "1")
	{
		$("#edit_type_board_dialog").dialog("close");
		$("#p_error_dialog").html("Тип борта успешно отредактирован");
		$("#error_dialog" ).dialog("open");
		fn_get_type_boards($('#id_current_type_board').val());
	}
	else
	{
		$("#p_error_dialog").html(data);
		$("#error_dialog" ).dialog("open");
	}
}








function fn_get_show_full_information_type_boards(id_current_type_board)
{
	fn_set_status_loading();
    if((id_current_type_board== "") || (id_current_type_board== undefined))
	{
	 	jqXHR= $.post("./get_type_board_full_information.php","",fn_success_get_show_full_information_type_boards);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при получении списка типов бортов");
			$( "#error_dialog" ).dialog("open");
		});
	}	
	else
	{
		jqXHR= $.post("./get_type_board_full_information.php","id_current_type_board="+encodeURIComponent(id_current_type_board),fn_success_get_show_full_information_type_boards);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при получении информации по текущему типу борта");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

function fn_success_get_show_full_information_type_boards(data,textStatus,jqXHR)
{
	$("#full_type_board_information" ).html(data);
	fn_clear_status_loading();
	$("#full_type_board_information_dialog" ).dialog("open");
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

function fn_get_edit_type_board(id_current_type_board)
{
	fn_set_status_loading();
    if((id_current_type_board== "") || (id_current_type_board== undefined))
	{
	 	jqXHR= $.post("./get_edit_type_board.php","",fn_success_get_edit_type_board);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при получении информации по текущему типу борта");
			$( "#error_dialog" ).dialog("open");
		});
	}	
	else
	{
		jqXHR= $.post("./get_edit_type_board.php","id_current_type_board="+encodeURIComponent(id_current_type_board),fn_success_get_edit_type_board);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при получении информации по текущему типу борта");
			$( "#error_dialog" ).dialog("open");
		});
	}
}
function fn_success_get_edit_type_board(data,textStatus,jqXHR)
{
	$( "#edit_type_board_dialog" ).html(data);
	fn_clear_status_loading();
	$( "#edit_type_board_dialog" ).dialog("open");
}

	
	
function fn_delete_type_board(id_current_type_board)
{
	if(confirm("Вы действительно хотите удалить текущий тип борта?"))
	{
		fn_set_status_loading();
		if((id_current_type_board== "") || (id_current_type_board== undefined))
		{
			jqXHR= $.post("./delete_type_board.php","",fn_success_delete_type_board);
			jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при удалении типа борта");
				$( "#error_dialog" ).dialog("open");
			});
		}	
		else
		{
			jqXHR= $.post("./delete_type_board.php","id_current_type_board="+encodeURIComponent(id_current_type_board),fn_success_delete_type_board);
			jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при удалении типа борта");
				$( "#error_dialog" ).dialog("open");
			});
		}
	}
}

function fn_success_delete_type_board(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	if(data== "1")
	{
		$('#id_current_type_board').val("");
		$("#p_error_dialog").html("Текущий тип борта успешно удален");
		$("#error_dialog" ).dialog("open");
		fn_get_type_boards("");
	}
	else
	{
		$("#p_error_dialog").html(data);
		$("#error_dialog" ).dialog("open");
	}
}

function fn_show_dialog_add_new_express_algoruthm()
{
	fn_tinymce_for_add_new_algorithm();
	$('#path_rle_algorithm_dialog_add_new_express_algorithm').val("");
	$('#id_type_board_dialog_add_new_express_algorithm').val($('#id_current_type_board').val());
	$("#add_new_express_algorithm_dialog" ).dialog('open');
	
}

function fn_html_algorithm_preview(path)
{
	
	var path_html= $('#path_html_algorithm_dialog_add_new_express_algorithm').val();
	if(path)
	{
		window.open(path);
	}
	else
	{
		window.open(path_html);
	}
}

function fn_pdf_algorithm_preview(path)
{
	var path_pdf= $('#path_pdf_algorithm_dialog_add_new_express_algorithm').val();
	if(path)
	{
		window.open(path);
	}
	else
	{
		window.open(path_pdf);
	}
}

function fn_file_preview(path)
{

	if(path)
	{
		window.open(path);
	}

}

function fn_get_sign_algorithms(id_type_board,page,num)
{
	if((id_type_board == undefined) || (id_type_board == ""))
	{
		if($("#id_current_type_board").val() != undefined)
		{
			id_type_board = $("#id_current_type_board").val();
		}
		else
		{
			id_type_board = "";
		}
	}
	
	if((page == undefined) || (page == ""))
	{
		page = 1;
	}
	
	if((num == undefined) || (num == ""))
	{
		num = 10;
	}

	fn_set_status_loading();
	
	jqXHR= $.post("./get_sign_algorithms.php","id_current_type_board="+encodeURIComponent(id_type_board)+"&page="+encodeURIComponent(page)+"&num="+encodeURIComponent(num),fn_success_get_sign_algorithms);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при получении модулей условных обозначений");
		$( "#error_dialog" ).dialog("open");
	});
	
}

function fn_success_get_sign_algorithms(data,textStatus,jqXHR)
{
	$("#sign_for_algorithm_dialog").html(data);
	fn_clear_status_loading();
}

function fn_show_dialog_add_new_sign_algorithms()
{
	var id_type_board;
	
	if($("#id_current_type_board").val() != undefined)
	{
		id_type_board = $("#id_current_type_board").val();
	}
	else
	{
		id_type_board = "";
	}
	$("#id_type_board_add_new_sign_algorithms_dialog").val(id_type_board);
	fn_tinymce_for_add_sign_algorithm();
	$("#add_new_sign_algorithms_dialog").dialog("open");
}

function fn_btn_choice_file_html_add_new_sign_algorithms_dialog()
{
	type_choice_file= 9;
	fn_show_choice_file();
	$('#choice_file_dialog').dialog('open');
}

function fn_btn_choice_file_pdf_add_new_sign_algorithms_dialog()
{
	type_choice_file= 10;
	fn_show_choice_file();
	$('#choice_file_dialog').dialog('open');
}

function fn_add_new_sign_algorithms()
{
	$("#error_add_new_sign_algorithms_dialog").html("");

	var id_type_board = $("#id_type_board_add_new_sign_algorithms_dialog").val();
	var name = $("#name_add_new_sign_algorithms_dialog").val();
	var description = $("#description_add_new_sign_algorithms_dialog").val();
	var ref_web_page_text = $("#path_html_add_new_sign_algorithms_dialog").val();
	var ref_pdf_text = $("#path_pdf_add_new_sign_algorithms_dialog").val();
	var status_show_pdf_text = $("#visibility_ref_pdf_add_new_sign_algorithms_dialog").get(0).checked;
	var comment = $("#comment_add_new_sign_algorithms_dialog").val();
	var text_sign = tinyMCE.editors["text_add_new_sign_algorithms_dialog"].getContent();
	var status_use_web_page_text = $("#use_ref_html_add_new_sign_algorithms_dialog").get(0).checked;
	var status = $("#visibility_add_new_sign_algorithms_dialog").get(0).checked;
	
	if(status_show_pdf_text)
	{
		status_show_pdf_text = "1";
	}
	else
	{
		status_show_pdf_text = "0";
	}
	
	if(status_use_web_page_text)
	{
		status_use_web_page_text = "1";
	}
	else
	{
		status_use_web_page_text = "0";
	}
	
	if(status)
	{
		status = "1";
	}
	else
	{
		status = "0";
	}
	
	var str_error = "";
	
	name = name.trim();
	if(name == "")
	{
		str_error += "Название модуля должно содержать хотябы один непробельный символ<br>";
	}
	
	if(str_error != "")
	{
		$("#error_add_new_sign_algorithms_dialog").html(str_error);
	}
	else
	{
		fn_set_status_loading();
	
		jqXHR= $.post("./add_new_sign_algorithms.php","id_type_board="+encodeURIComponent(id_type_board)+"&name="+encodeURIComponent(name)+"&description="+encodeURIComponent(description)+"&ref_web_page_text="+encodeURIComponent(ref_web_page_text)+"&ref_pdf_text="+encodeURIComponent(ref_pdf_text)+"&status_show_pdf_text="+encodeURIComponent(status_show_pdf_text)+"&comment="+encodeURIComponent(comment)+"&text_sign="+encodeURIComponent(text_sign)+"&status_use_web_page_text="+encodeURIComponent(status_use_web_page_text)+"&status="+encodeURIComponent(status),fn_success_add_new_sign_algorithms);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при добавлении модуля условных обозначений");
			$( "#error_dialog" ).dialog("open");
		});
	}
	
}

function fn_success_add_new_sign_algorithms(data,textStatus,jqXHR)
{
	
	var page = $("#hdn_page_tbl_sign_algorithms").val();
	var num = $("#hdn_num_tbl_sign_algorithms").val();
	var id_type_board = $("#id_type_board_add_new_sign_algorithms_dialog").val();
	
	if(data=="1")
	{
		$("#add_new_sign_algorithms_dialog").dialog("close");
		fn_get_sign_algorithms(id_type_board,page,num);
		$("#p_error_dialog").html("Модуль успешно добавлен");
		$( "#error_dialog" ).dialog("open");
		fn_clear_status_loading();
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
	fn_clear_status_loading();
}



function fn_save_edit_sign_algorithms(id_sign_algorithm)
{
	$("#error_edit_sign_algorithms_dialog").html("");

	var id_type_board = $("#id_type_board_edit_sign_algorithms_dialog").val();
	var name = $("#name_edit_sign_algorithms_dialog").val();
	var description = $("#description_edit_sign_algorithms_dialog").val();
	var ref_web_page_text = $("#path_html_edit_sign_algorithms_dialog").val();
	var ref_pdf_text = $("#path_pdf_edit_sign_algorithms_dialog").val();
	var status_show_pdf_text = $("#visibility_ref_pdf_edit_sign_algorithms_dialog").get(0).checked;
	var comment = $("#comment_edit_sign_algorithms_dialog").val();
	var text_sign = tinyMCE.editors["text_edit_sign_algorithms_dialog"].getContent();
	var status_use_web_page_text = $("#use_ref_html_edit_sign_algorithms_dialog").get(0).checked;
	var status = $("#visibility_edit_sign_algorithms_dialog").get(0).checked;
	
	if(status_show_pdf_text)
	{
		status_show_pdf_text = "1";
	}
	else
	{
		status_show_pdf_text = "0";
	}
	
	if(status_use_web_page_text)
	{
		status_use_web_page_text = "1";
	}
	else
	{
		status_use_web_page_text = "0";
	}
	
	if(status)
	{
		status = "1";
	}
	else
	{
		status = "0";
	}
	
	var str_error = "";
	
	name = name.trim();
	if(name == "")
	{
		str_error += "Название модуля должно содержать хотябы один непробельный символ<br>";
	}
	
	if(str_error != "")
	{
		$("#error_add_new_sign_algorithms_dialog").html(str_error);
	}
	else
	{
		fn_set_status_loading();
	
		jqXHR= $.post("./save_edit_sign_algorithms.php","id_sign_algorithm="+encodeURIComponent(id_sign_algorithm)+"&id_type_board="+encodeURIComponent(id_type_board)+"&name="+encodeURIComponent(name)+"&description="+encodeURIComponent(description)+"&ref_web_page_text="+encodeURIComponent(ref_web_page_text)+"&ref_pdf_text="+encodeURIComponent(ref_pdf_text)+"&status_show_pdf_text="+encodeURIComponent(status_show_pdf_text)+"&comment="+encodeURIComponent(comment)+"&text_sign="+encodeURIComponent(text_sign)+"&status_use_web_page_text="+encodeURIComponent(status_use_web_page_text)+"&status="+encodeURIComponent(status),fn_success_edit_sign_algorithms);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при сохранении модуля условных обозначений");
			$( "#error_dialog" ).dialog("open");
		});
	}
	
}

function fn_success_edit_sign_algorithms(data,textStatus,jqXHR)
{
	
	var page = $("#hdn_page_tbl_sign_algorithms").val();
	var num = $("#hdn_num_tbl_sign_algorithms").val();
	var id_type_board = $("#id_type_board_edit_sign_algorithms_dialog").val();
	
	if(data=="1")
	{
		$("#edit_sign_algorithms_dialog").dialog("close");
		fn_get_sign_algorithms(id_type_board,page,num);
		$("#p_error_dialog").html("Модуль успешно отредактирован");
		$( "#error_dialog" ).dialog("open");
		fn_clear_status_loading();
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
	fn_clear_status_loading();
}




		
function fn_get_type_boards(id_current_type_board)
{	
	fn_set_status_loading();
    if((id_current_type_board== "") || (id_current_type_board== undefined))
	{
	 	jqXHR= $.post("./get_type_boards.php","",fn_success_get_type_boards);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при получении списка типов бортов");
			$( "#error_dialog" ).dialog("open");
		});
	}	
	else
	{
		jqXHR= $.post("./get_type_boards.php","id_current_type_board="+encodeURIComponent(id_current_type_board),fn_success_get_type_boards);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при получении списка типов бортов");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

function fn_success_get_type_boards(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	$("#td_type_boards").html(data);
}
	
function fn_get_express_algorithms(id_current_type_board,page,num)
{

	fn_set_status_loading();
	
	jqXHR= $.post("./get_express_algorithms.php","id_current_type_board="+encodeURIComponent(id_current_type_board)+"&page="+encodeURIComponent(page)+"&num="+encodeURIComponent(num),fn_success_get_express_algrithms);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при получении алгоритмов экспресс-анализа");
		$( "#error_dialog" ).dialog("open");
	});
	
}

function fn_success_get_express_algrithms(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	$("#td_express_algorithms").html(data);
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
			$('#path_html_algorithm_dialog_add_new_express_algorithm').val($('#path_choice_file').val());
			break;
		case 2:
			$('#path_pdf_algorithm_dialog_add_new_express_algorithm').val($('#path_choice_file').val());
			break;
		case 3:
			$('#path_html_algorithm_dialog_edit_algorithm').val($('#path_choice_file').val());
			break;	
		case 4:
			$('#path_pdf_algorithm_dialog_edit_algorithm').val($('#path_choice_file').val());
			break;
			
		case 5:
			$('#path_html_rle_item_dialog_add_new_rle_item').val($('#path_choice_file').val());
			break;
		case 6:
			$('#path_pdf_rle_item_dialog_add_new_rle_item').val($('#path_choice_file').val());
			break;
		case 7:
			$('#path_html_rle_item_dialog_edit_rle_item').val($('#path_choice_file').val());
			break;
		case 8:
			$('#path_pdf_rle_item_dialog_edit_rle_item').val($('#path_choice_file').val());
			break;
		case 9:
			$('#path_html_add_new_sign_algorithms_dialog').val($('#path_choice_file').val());
			break;
		case 10:
			$('#path_pdf_add_new_sign_algorithms_dialog').val($('#path_choice_file').val());
			break;
		case 11:
			$('#path_pdf_algorithm_add_new_type_board_dialog').val($('#path_choice_file').val());
			break;
		case 12:
			$('#path_pdf_algorithm_edit_type_board_dialog').val($('#path_choice_file').val());
			break;
		case 13:
			$('#path_html_edit_sign_algorithms_dialog').val($('#path_choice_file').val());
			break;
		case 14:
			$('#path_pdf_edit_sign_algorithms_dialog').val($('#path_choice_file').val());
			break;
	}
	$('#path_choice_file').val("");
	$("#choice_file_dialog").dialog('close');
}

function fn_btn_choice_file_html_algorithm_dialog_add_new_express_algorithm()
{
	type_choice_file= 1;
	fn_show_choice_file();
	$( '#choice_file_dialog' ).dialog('open');
}

function fn_btn_choice_file_pdf_algorithm_dialog_add_new_express_algorithm()
{
	type_choice_file= 2;
	fn_show_choice_file();
	$( '#choice_file_dialog' ).dialog('open');
}

function fn_btn_choice_file_pdf_algorithm_add_new_type_board_dialog()
{
	type_choice_file= 11;
	fn_show_choice_file();
	$( '#choice_file_dialog' ).dialog('open');
}

function fn_btn_choice_file_pdf_algorithm_edit_type_board_dialog()
{
	type_choice_file= 12;
	fn_show_choice_file();
	$( '#choice_file_dialog' ).dialog('open');
}

function fn_btn_choice_file_html_algorithm_dialog_edit_algorithm()
{
	type_choice_file= 3;
	fn_show_choice_file();
	$( '#choice_file_dialog' ).dialog('open');
}

function fn_btn_choice_file_pdf_algorithm_dialog_edit_algorithm()
{
	type_choice_file= 4;
	fn_show_choice_file();
	$( '#choice_file_dialog' ).dialog('open');
}



function fn_add_new_algorithm()
{

	$('#error_add_new_algorithm_dialog_add_new_express_algorithm').html("");
	
	var id_type_board= $('#id_type_board_dialog_add_new_express_algorithm').val();
	var id_algorithm= $('#id_type_algorithm_dialog_add_new_express_algorithm').val();
	var name_algorithm= $('#name_algorithm_dialog_add_new_express_algorithm').val();
	var path_html_algorithm= $('#path_html_algorithm_dialog_add_new_express_algorithm').val();
	var path_pdf_algorithm= $('#path_pdf_algorithm_dialog_add_new_express_algorithm').val();
	var visibility_ref_pdf_algorithm= $('#visibility_ref_pdf_algorithm_dialog_add_new_express_algorithm').get(0).checked;
	var path_rle_algorithm= $('#path_rle_algorithm_dialog_add_new_express_algorithm').val();
	var visibility_ref_rle_algorithm= $('#visibility_ref_rle_algorithm_dialog_add_new_express_algorithm').get(0).checked;
	var comment_algorithm= $('#comment_algorithm_dialog_add_new_express_algorithm').val();
	var text_algorithm= tinyMCE.editors["text_algorithm_dialog_add_new_express_algorithm"].getContent();
	var use_ref_html_algorithm= $('#use_ref_html_algorithm_dialog_add_new_express_algorithm').get(0).checked;
	var visibility_algorithm= $('#visibility_dialog_add_new_express_algorithm').get(0).checked;
	
	var exp_key_algorithm= new RegExp('^[a-zA-Z0-9_]{1,50}$');
	var exp_name_algorithm= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	
	var str_error= "";
	
	if(visibility_ref_pdf_algorithm)
	{
		visibility_ref_pdf_algorithm= "1";
	}
	else
	{
		visibility_ref_pdf_algorithm= "0";
	}
	
	if(visibility_ref_rle_algorithm)
	{
		visibility_ref_rle_algorithm= "1";
	}
	else
	{
		visibility_ref_rle_algorithm= "0";
	}
	
	if(use_ref_html_algorithm)
	{
		use_ref_html_algorithm= "1";
	}
	else
	{
		use_ref_html_algorithm= "0";
	}
	
	if(visibility_algorithm)
	{
		visibility_algorithm= "1";
	}
	else
	{
		visibility_algorithm= "0";
	}
	
	
	if(!exp_key_algorithm.test(id_algorithm))
	{
		str_error += "Идентификатор алгоритма не соответствует требованиям<br>";
	}
	if(!exp_name_algorithm.test(name_algorithm))
	{
		str_error += "Название алгоритма не соответствует требованиям<br>";
	}
	
	if(str_error != "")
	{
		$('#error_add_new_algorithm_dialog_add_new_express_algorithm').html(str_error);
	}
	else
	{
		fn_set_status_loading();
                       
		jqXHR= $.post("./check_algorithm_information_for_add.php","status="+encodeURIComponent(visibility_algorithm)+"&id_type_board="+encodeURIComponent(id_type_board)+"&id_algorithm="+encodeURIComponent(id_algorithm)+"&name_algorithm="+encodeURIComponent(name_algorithm)+"&path_html_algorithm="+encodeURIComponent(path_html_algorithm)+"&path_pdf_algorithm="+encodeURIComponent(path_pdf_algorithm)+"&visibility_ref_pdf_algorithm="+encodeURIComponent(visibility_ref_pdf_algorithm)+"&path_rle_algorithm="+encodeURIComponent(path_rle_algorithm)+"&visibility_ref_rle_algorithm="+encodeURIComponent(visibility_ref_rle_algorithm)+"&comment_algorithm="+encodeURIComponent(comment_algorithm)+"&text_algorithm="+encodeURIComponent(text_algorithm)+"&use_ref_html_algorithm="+encodeURIComponent(use_ref_html_algorithm),fn_success_check_algorithm_information_for_add);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при добавлении нового алгоритма");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

function fn_success_check_algorithm_information_for_add(data,textStatus,jqXHR)
{
		
	$('#error_add_new_algorithm_dialog_add_new_express_algorithm').html("");
	
	var id_type_board= $('#id_type_board_dialog_add_new_express_algorithm').val();
	var id_algorithm= $('#id_type_algorithm_dialog_add_new_express_algorithm').val();
	var name_algorithm= $('#name_algorithm_dialog_add_new_express_algorithm').val();
	var path_html_algorithm= $('#path_html_algorithm_dialog_add_new_express_algorithm').val();
	var path_pdf_algorithm= $('#path_pdf_algorithm_dialog_add_new_express_algorithm').val();
	var visibility_ref_pdf_algorithm= $('#visibility_ref_pdf_algorithm_dialog_add_new_express_algorithm').get(0).checked;
	var path_rle_algorithm= $('#path_rle_algorithm_dialog_add_new_express_algorithm').val();
	var visibility_ref_rle_algorithm= $('#visibility_ref_rle_algorithm_dialog_add_new_express_algorithm').get(0).checked;
	var comment_algorithm= $('#comment_algorithm_dialog_add_new_express_algorithm').val();
	var text_algorithm= tinyMCE.editors["text_algorithm_dialog_add_new_express_algorithm"].getContent();
	var use_ref_html_algorithm= $('#use_ref_html_algorithm_dialog_add_new_express_algorithm').get(0).checked;
	var visibility_algorithm= $('#visibility_dialog_add_new_express_algorithm').get(0).checked;
	
	var exp_key_algorithm= new RegExp('^[a-zA-Z0-9_]{1,50}$');
	var exp_name_algorithm= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	
	var str_error= "";
	
	if(visibility_ref_pdf_algorithm)
	{
		visibility_ref_pdf_algorithm= "1";
	}
	else
	{
		visibility_ref_pdf_algorithm= "0";
	}
	
	if(visibility_ref_rle_algorithm)
	{
		visibility_ref_rle_algorithm= "1";
	}
	else
	{
		visibility_ref_rle_algorithm= "0";
	}
	
	if(use_ref_html_algorithm)
	{
		use_ref_html_algorithm= "1";
	}
	else
	{
		use_ref_html_algorithm= "0";
	}
	
	if(visibility_algorithm)
	{
		visibility_algorithm= "1";
	}
	else
	{
		visibility_algorithm= "0";
	}
	
	fn_clear_status_loading();
		
	if(data != "1")
	{
		$('#error_add_new_algorithm_dialog_add_new_express_algorithm').html(data);
	}
	else
	{
		fn_set_status_loading();
                       
		jqXHR= $.post("./add_new_algorithm_information.php","status="+encodeURIComponent(visibility_algorithm)+"&id_type_board="+encodeURIComponent(id_type_board)+"&id_algorithm="+encodeURIComponent(id_algorithm)+"&name_algorithm="+encodeURIComponent(name_algorithm)+"&path_html_algorithm="+encodeURIComponent(path_html_algorithm)+"&path_pdf_algorithm="+encodeURIComponent(path_pdf_algorithm)+"&visibility_ref_pdf_algorithm="+encodeURIComponent(visibility_ref_pdf_algorithm)+"&path_rle_algorithm="+encodeURIComponent(path_rle_algorithm)+"&visibility_ref_rle_algorithm="+encodeURIComponent(visibility_ref_rle_algorithm)+"&comment_algorithm="+encodeURIComponent(comment_algorithm)+"&text_algorithm="+encodeURIComponent(text_algorithm)+"&use_ref_html_algorithm="+encodeURIComponent(use_ref_html_algorithm),fn_success_add_new_algorithm);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при добавлении нового алгоритма");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

function fn_success_add_new_algorithm(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	if(data== "1")
	{
		$("#add_new_express_algorithm_dialog").dialog("close");
		$("#p_error_dialog").html("Новый алгоритм успешно добавлен");
		$("#error_dialog" ).dialog("open");
		fn_get_express_algorithms($('#id_current_type_board').val(),$('#hdn_page_tbl_algorithms').val(),$('#hdn_num_tbl_algorithms').val());	
	}
	else
	{
		$("#p_error_dialog").html(data);
		$("#error_dialog" ).dialog("open");
	}
}

function fn_algorithm_preview()
{
	$('#error_add_new_algorithm_dialog_add_new_express_algorithm').html("");
	
	var id_type_board= $('#id_type_board_dialog_add_new_express_algorithm').val();
	var id_algorithm= $('#id_type_algorithm_dialog_add_new_express_algorithm').val();
	var name_algorithm= $('#name_algorithm_dialog_add_new_express_algorithm').val();
	var path_html_algorithm= $('#path_html_algorithm_dialog_add_new_express_algorithm').val();
	var path_pdf_algorithm= $('#path_pdf_algorithm_dialog_add_new_express_algorithm').val();
	var visibility_ref_pdf_algorithm= $('#visibility_ref_pdf_algorithm_dialog_add_new_express_algorithm').get(0).checked;
	var path_rle_algorithm= $('#path_rle_algorithm_dialog_add_new_express_algorithm').val();
	var visibility_ref_rle_algorithm= $('#visibility_ref_rle_algorithm_dialog_add_new_express_algorithm').get(0).checked;
	var comment_algorithm= $('#comment_algorithm_dialog_add_new_express_algorithm').val();
	var text_algorithm= tinyMCE.editors["text_algorithm_dialog_add_new_express_algorithm"].getContent();
	var use_ref_html_algorithm= $('#use_ref_html_algorithm_dialog_add_new_express_algorithm').get(0).checked;
	var visibility_algorithm= $('#visibility_dialog_add_new_express_algorithm').get(0).checked;
	
	var exp_key_algorithm= new RegExp('^[a-zA-Z0-9_]{1,50}$');
	var exp_name_algorithm= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	
	var str_error= "";
	
	if(visibility_ref_pdf_algorithm)
	{
		visibility_ref_pdf_algorithm= "1";
	}
	else
	{
		visibility_ref_pdf_algorithm= "0";
	}
	
	if(visibility_ref_rle_algorithm)
	{
		visibility_ref_rle_algorithm= "1";
	}
	else
	{
		visibility_ref_rle_algorithm= "0";
	}
	
	if(use_ref_html_algorithm)
	{
		use_ref_html_algorithm= "1";
	}
	else
	{
		use_ref_html_algorithm= "0";
	}
	
	if(visibility_algorithm)
	{
		visibility_algorithm= "1";
	}
	else
	{
		visibility_algorithm= "0";
	}
	
	
	if(!exp_key_algorithm.test(id_algorithm))
	{
		str_error += "Идентификатор алгоритма не соответствует требованиям<br>";
	}
	if(!exp_name_algorithm.test(name_algorithm))
	{
		str_error += "Название алгоритма не соответствует требованиям<br>";
	}
	
	if(str_error != "")
	{
		$('#error_add_new_algorithm_dialog_add_new_express_algorithm').html(str_error);
	}
	else
	{
		fn_set_status_loading();
                       
		jqXHR= $.post("./check_algorithm_information_for_add.php","status="+encodeURIComponent(visibility_algorithm)+"&id_type_board="+encodeURIComponent(id_type_board)+"&id_algorithm="+encodeURIComponent(id_algorithm)+"&name_algorithm="+encodeURIComponent(name_algorithm)+"&path_html_algorithm="+encodeURIComponent(path_html_algorithm)+"&path_pdf_algorithm="+encodeURIComponent(path_pdf_algorithm)+"&visibility_ref_pdf_algorithm="+encodeURIComponent(visibility_ref_pdf_algorithm)+"&path_rle_algorithm="+encodeURIComponent(path_rle_algorithm)+"&visibility_ref_rle_algorithm="+encodeURIComponent(visibility_ref_rle_algorithm)+"&comment_algorithm="+encodeURIComponent(comment_algorithm)+"&text_algorithm="+encodeURIComponent(text_algorithm)+"&use_ref_html_algorithm="+encodeURIComponent(use_ref_html_algorithm),fn_success_check_algorithm_information_for_preview);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при добавлении нового алгоритма");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

function fn_success_check_algorithm_information_for_preview(data,textStatus,jqXHR)
{
	$('#error_add_new_algorithm_dialog_add_new_express_algorithm').html("");
	
	var id_type_board= $('#id_type_board_dialog_add_new_express_algorithm').val();
	var id_algorithm= $('#id_type_algorithm_dialog_add_new_express_algorithm').val();
	var name_algorithm= $('#name_algorithm_dialog_add_new_express_algorithm').val();
	var path_html_algorithm= $('#path_html_algorithm_dialog_add_new_express_algorithm').val();
	var path_pdf_algorithm= $('#path_pdf_algorithm_dialog_add_new_express_algorithm').val();
	var visibility_ref_pdf_algorithm= $('#visibility_ref_pdf_algorithm_dialog_add_new_express_algorithm').get(0).checked;
	var path_rle_algorithm= $('#path_rle_algorithm_dialog_add_new_express_algorithm').val();
	var visibility_ref_rle_algorithm= $('#visibility_ref_rle_algorithm_dialog_add_new_express_algorithm').get(0).checked;
	var comment_algorithm= $('#comment_algorithm_dialog_add_new_express_algorithm').val();
	var text_algorithm= tinyMCE.editors["text_algorithm_dialog_add_new_express_algorithm"].getContent();
	var use_ref_html_algorithm= $('#use_ref_html_algorithm_dialog_add_new_express_algorithm').get(0).checked;
	var visibility_algorithm= $('#visibility_dialog_add_new_express_algorithm').get(0).checked;
	
	var exp_key_algorithm= new RegExp('^[a-zA-Z0-9_]{1,50}$');
	var exp_name_algorithm= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	
	var str_error= "";
	
	if(visibility_ref_pdf_algorithm)
	{
		visibility_ref_pdf_algorithm= "1";
	}
	else
	{
		visibility_ref_pdf_algorithm= "0";
	}
	
	if(visibility_ref_rle_algorithm)
	{
		visibility_ref_rle_algorithm= "1";
	}
	else
	{
		visibility_ref_rle_algorithm= "0";
	}
	
	if(use_ref_html_algorithm)
	{
		use_ref_html_algorithm= "1";
	}
	else
	{
		use_ref_html_algorithm= "0";
	}
	
	if(visibility_algorithm)
	{
		visibility_algorithm= "1";
	}
	else
	{
		visibility_algorithm= "0";
	}
	
	fn_clear_status_loading();
		
	if(data != "1")
	{
		$('#error_add_new_algorithm_dialog_add_new_express_algorithm').html(data);
	}
	else
	{
		fn_set_status_loading();
                       
		jqXHR= $.post("../../frontend/profile/get_algorithm.php","algorithm_preview="+encodeURIComponent("1")+"&status="+encodeURIComponent(visibility_algorithm)+"&id_type_board="+encodeURIComponent(id_type_board)+"&id_algorithm="+encodeURIComponent(id_algorithm)+"&name_algorithm="+encodeURIComponent(name_algorithm)+"&path_html_algorithm="+encodeURIComponent(path_html_algorithm)+"&path_pdf_algorithm="+encodeURIComponent(path_pdf_algorithm)+"&visibility_ref_pdf_algorithm="+encodeURIComponent(visibility_ref_pdf_algorithm)+"&path_rle_algorithm="+encodeURIComponent(path_rle_algorithm)+"&visibility_ref_rle_algorithm="+encodeURIComponent(visibility_ref_rle_algorithm)+"&comment_algorithm="+encodeURIComponent(comment_algorithm)+"&text_algorithm="+encodeURIComponent(text_algorithm)+"&use_ref_html_algorithm="+encodeURIComponent(use_ref_html_algorithm),fn_success_get_algorithm_preview);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при добавлении нового алгоритма");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

function fn_success_get_algorithm_preview(data,textStatus,jqXHR)
{

	//window.open("../../frontend/profile/index.php?"+"algorithm_preview="+encodeURIComponent("1")+"&data="+encodeURIComponent(data));
	//fn_clear_status_loading();

	jqXHR= $.post("../../frontend/profile/index.php","algorithm_preview="+encodeURIComponent("1")+"&data="+encodeURIComponent(data),fn_success_get_page_algorithm_preview);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при добавлении нового алгоритма");
			$( "#error_dialog" ).dialog("open");
	});

}

function fn_success_get_page_algorithm_preview(data,textStatus,jqXHR)
{
	jqXHR= $.post("../../frontend/profile/create_page_preview.php","algorithm_preview="+encodeURIComponent("1")+"&data="+encodeURIComponent(data),fn_success_create_page_algorithm_preview);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при добавлении нового алгоритма");
			$( "#error_dialog" ).dialog("open");
	});
		
}

function fn_success_create_page_algorithm_preview(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	
	if(data== "1")
	{
		window.open('../../frontend/profile/page_preview_algorithm.html');
	}
	else
	{
		$("#p_error_dialog").html("Ошибка при получении страницы предпросмотра");
		$( "#error_dialog" ).dialog("open");
	}
}


function fn_get_show_full_information_algorithm(id_algorithm)
{
	fn_set_status_loading();
    if((id_algorithm != "") && (id_algorithm != undefined))
	{
	 	jqXHR= $.post("./get_algorithm_full_information.php","id_algorithm="+encodeURIComponent(id_algorithm),fn_success_get_show_full_information_algorithm);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при получении информации по данному алгоритму");
			$( "#error_dialog" ).dialog("open");
		});
	}	
	else
	{
		//
	}
}

function fn_success_get_show_full_information_algorithm(data,textStatus,jqXHR)
{
	$("#show_information_express_algorithm" ).html(data);
	fn_clear_status_loading();
	$("#dialog_show_information_express_algorithm" ).dialog("open");
}

function fn_edit_sign_algorithms(id_sign_algorithm,page,num)
{
	fn_set_status_loading();
    if((id_sign_algorithm != "") || (id_sign_algorithm != undefined))
	{
	 	jqXHR= $.post("./get_edit_sign_algorithm.php","id_sign_algorithm="+encodeURIComponent(id_sign_algorithm),fn_success_get_edit_sign_algorithm);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при получении информации по выбранному модулю условных обозначений");
			$( "#error_dialog" ).dialog("open");
		});
	}	
	else
	{
		//
	}
}

function fn_success_get_edit_sign_algorithm(data,textStatus,jqXHR)
{
	$( "#edit_sign_algorithms_dialog" ).html(data);
	fn_clear_status_loading();
	$( "#edit_sign_algorithms_dialog" ).dialog("open");
}

function fn_get_show_full_information_sign_algorithms(id_sign_algorithm)
{
	fn_set_status_loading();
    if((id_sign_algorithm != "") || (id_sign_algorithm != undefined))
	{
	 	jqXHR= $.post("./get_information_sign_algorithm.php","id_sign_algorithm="+encodeURIComponent(id_sign_algorithm),fn_success_get_show_full_information_sign_algorithms);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при получении информации по выбранному модулю условных обозначений");
			$( "#error_dialog" ).dialog("open");
		});
	}	
	else
	{
		//
	}
}

function fn_success_get_show_full_information_sign_algorithms(data,textStatus,jqXHR)
{
	
	$( "#show_information_sign_algorithms" ).html(data);
	fn_clear_status_loading();
	$( "#dialog_show_information_sign_algorithms" ).dialog("open");
}

 function fn_btn_choice_file_html_edit_sign_algorithms_dialog()
 {
	type_choice_file= 13;
	fn_show_choice_file();
	$('#choice_file_dialog').dialog('open');
 }
 
 function fn_btn_choice_file_pdf_edit_sign_algorithms_dialog()
 {
	type_choice_file= 14;
	fn_show_choice_file();
	$('#choice_file_dialog').dialog('open');
 }




function fn_edit_algorithm(id_algorithm)
{
	fn_set_status_loading();
    if((id_algorithm != "") || (id_algorithm != undefined))
	{
	 	jqXHR= $.post("./get_edit_algorithm.php","id_algorithm="+encodeURIComponent(id_algorithm),fn_success_get_edit_algorithm);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при получении информации по выбранному алгоритму");
			$( "#error_dialog" ).dialog("open");
		});
	}	
	else
	{
		//
	}
}
function fn_success_get_edit_algorithm(data,textStatus,jqXHR)
{
	$( "#dialog_edit_algorithm" ).html(data);
	fn_clear_status_loading();
	$("#dialog_show_information_express_algorithm" ).dialog("close");
	$( "#dialog_edit_algorithm" ).dialog("open");
}




function fn_save_edit_algorithm()
{

	$('#error_edit_algorithm_dialog_edit_algorithm').html("");
	
	var id_type_board= $('#id_type_board_dialog_edit_algorithm').val();
	var key_algorithm= $('#key_algorithm_dialog_edit_algorithm').val();
	var name_algorithm= $('#name_algorithm_dialog_edit_algorithm').val();
	var path_html_algorithm= $('#path_html_algorithm_dialog_edit_algorithm').val();
	var path_pdf_algorithm= $('#path_pdf_algorithm_dialog_edit_algorithm').val();
	var visibility_ref_pdf_algorithm= $('#visibility_ref_pdf_algorithm_dialog_edit_algorithm').get(0).checked;
	var path_rle_algorithm= $('#path_rle_algorithm_dialog_edit_algorithm').val();
	var visibility_ref_rle_algorithm= $('#visibility_ref_rle_algorithm_dialog_edit_algorithm').get(0).checked;
	var comment_algorithm= $('#comment_algorithm_dialog_edit_algorithm').val();
	var text_algorithm= tinyMCE.editors["text_algorithm_dialog_edit_algorithm"].getContent();
	var use_ref_html_algorithm= $('#use_ref_html_algorithm_dialog_edit_algorithm').get(0).checked;
	var visibility_algorithm= $('#visibility_dialog_edit_algorithm').get(0).checked;
	var id_algorithm= $('#id_algorithm_dialog_edit_algorithm').val();
	
	var exp_key_algorithm= new RegExp('^[a-zA-Z0-9_]{1,50}$');
	var exp_name_algorithm= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	
	var str_error= "";
	
	if(visibility_ref_pdf_algorithm)
	{
		visibility_ref_pdf_algorithm= "1";
	}
	else
	{
		visibility_ref_pdf_algorithm= "0";
	}
	
	if(visibility_ref_rle_algorithm)
	{
		visibility_ref_rle_algorithm= "1";
	}
	else
	{
		visibility_ref_rle_algorithm= "0";
	}
	
	if(use_ref_html_algorithm)
	{
		use_ref_html_algorithm= "1";
	}
	else
	{
		use_ref_html_algorithm= "0";
	}
	
	if(visibility_algorithm)
	{
		visibility_algorithm= "1";
	}
	else
	{
		visibility_algorithm= "0";
	}
	
	
	if(!exp_key_algorithm.test(key_algorithm))
	{
		str_error += "Идентификатор алгоритма не соответствует требованиям<br>";
	}
	if(!exp_name_algorithm.test(name_algorithm))
	{
		str_error += "Название алгоритма не соответствует требованиям<br>";
	}
	
	if(str_error != "")
	{
		$('#error_edit_algorithm_dialog_edit_algorithm').html(str_error);
	}
	else
	{
		fn_set_status_loading();
                       
		jqXHR= $.post("./check_algorithm_information_for_edit.php","id_algorithm="+encodeURIComponent(id_algorithm)+"&status="+encodeURIComponent(visibility_algorithm)+"&id_type_board="+encodeURIComponent(id_type_board)+"&key_algorithm="+encodeURIComponent(key_algorithm)+"&name_algorithm="+encodeURIComponent(name_algorithm)+"&path_html_algorithm="+encodeURIComponent(path_html_algorithm)+"&path_pdf_algorithm="+encodeURIComponent(path_pdf_algorithm)+"&visibility_ref_pdf_algorithm="+encodeURIComponent(visibility_ref_pdf_algorithm)+"&path_rle_algorithm="+encodeURIComponent(path_rle_algorithm)+"&visibility_ref_rle_algorithm="+encodeURIComponent(visibility_ref_rle_algorithm)+"&comment_algorithm="+encodeURIComponent(comment_algorithm)+"&text_algorithm="+encodeURIComponent(text_algorithm)+"&use_ref_html_algorithm="+encodeURIComponent(use_ref_html_algorithm),fn_success_check_algorithm_information_for_edit);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при сохранении алгоритма");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

function fn_success_check_algorithm_information_for_edit(data,textStatus,jqXHR)
{
		
	$('#error_edit_algorithm_dialog_edit_algorithm').html("");
	
	var id_type_board= $('#id_type_board_dialog_edit_algorithm').val();
	var key_algorithm= $('#key_algorithm_dialog_edit_algorithm').val();
	var name_algorithm= $('#name_algorithm_dialog_edit_algorithm').val();
	var path_html_algorithm= $('#path_html_algorithm_dialog_edit_algorithm').val();
	var path_pdf_algorithm= $('#path_pdf_algorithm_dialog_edit_algorithm').val();
	var visibility_ref_pdf_algorithm= $('#visibility_ref_pdf_algorithm_dialog_edit_algorithm').get(0).checked;
	var path_rle_algorithm= $('#path_rle_algorithm_dialog_edit_algorithm').val();
	var visibility_ref_rle_algorithm= $('#visibility_ref_rle_algorithm_dialog_edit_algorithm').get(0).checked;
	var comment_algorithm= $('#comment_algorithm_dialog_edit_algorithm').val();
	var text_algorithm= tinyMCE.editors["text_algorithm_dialog_edit_algorithm"].getContent();
	var use_ref_html_algorithm= $('#use_ref_html_algorithm_dialog_edit_algorithm').get(0).checked;
	var visibility_algorithm= $('#visibility_dialog_edit_algorithm').get(0).checked;
	var id_algorithm= $('#id_algorithm_dialog_edit_algorithm').val();
	
	var exp_key_algorithm= new RegExp('^[a-zA-Z0-9_]{1,50}$');
	var exp_name_algorithm= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	
	var str_error= "";
	
	if(visibility_ref_pdf_algorithm)
	{
		visibility_ref_pdf_algorithm= "1";
	}
	else
	{
		visibility_ref_pdf_algorithm= "0";
	}
	
	if(visibility_ref_rle_algorithm)
	{
		visibility_ref_rle_algorithm= "1";
	}
	else
	{
		visibility_ref_rle_algorithm= "0";
	}
	
	if(use_ref_html_algorithm)
	{
		use_ref_html_algorithm= "1";
	}
	else
	{
		use_ref_html_algorithm= "0";
	}
	
	if(visibility_algorithm)
	{
		visibility_algorithm= "1";
	}
	else
	{
		visibility_algorithm= "0";
	}
	
	fn_clear_status_loading();
		
	if(data != "1")
	{
		$('#error_add_new_algorithm_dialog_add_new_express_algorithm').html(data);
	}
	else
	{
		fn_set_status_loading();
                       
		jqXHR= $.post("./save_edit_algorithm_information.php","id_algorithm="+encodeURIComponent(id_algorithm)+"&status="+encodeURIComponent(visibility_algorithm)+"&id_type_board="+encodeURIComponent(id_type_board)+"&key_algorithm="+encodeURIComponent(key_algorithm)+"&name_algorithm="+encodeURIComponent(name_algorithm)+"&path_html_algorithm="+encodeURIComponent(path_html_algorithm)+"&path_pdf_algorithm="+encodeURIComponent(path_pdf_algorithm)+"&visibility_ref_pdf_algorithm="+encodeURIComponent(visibility_ref_pdf_algorithm)+"&path_rle_algorithm="+encodeURIComponent(path_rle_algorithm)+"&visibility_ref_rle_algorithm="+encodeURIComponent(visibility_ref_rle_algorithm)+"&comment_algorithm="+encodeURIComponent(comment_algorithm)+"&text_algorithm="+encodeURIComponent(text_algorithm)+"&use_ref_html_algorithm="+encodeURIComponent(use_ref_html_algorithm),fn_success_save_edit_algorithm);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при сохранении алгоритма");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

function fn_success_save_edit_algorithm(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	if(data== "1")
	{
		$("#dialog_edit_algorithm").dialog("close");
		$("#p_error_dialog").html("Алгоритм успешно отредактирован");
		$("#error_dialog" ).dialog("open");
		fn_get_express_algorithms($('#id_current_type_board').val(),$('#hdn_page_tbl_algorithms').val(),$('#hdn_num_tbl_algorithms').val());	
	}
	else
	{
		$("#p_error_dialog").html(data);
		$("#error_dialog" ).dialog("open");
	}
}

function fn_edit_algorithm_preview()
{
	$('#error_edit_algorithm_dialog_edit_algorithm').html("");
	
	var id_type_board= $('#id_type_board_dialog_edit_algorithm').val();
	var key_algorithm= $('#key_algorithm_dialog_edit_algorithm').val();
	var name_algorithm= $('#name_algorithm_dialog_edit_algorithm').val();
	var path_html_algorithm= $('#path_html_algorithm_dialog_edit_algorithm').val();
	var path_pdf_algorithm= $('#path_pdf_algorithm_dialog_edit_algorithm').val();
	var visibility_ref_pdf_algorithm= $('#visibility_ref_pdf_algorithm_dialog_edit_algorithm').get(0).checked;
	var path_rle_algorithm= $('#path_rle_algorithm_dialog_edit_algorithm').val();
	var visibility_ref_rle_algorithm= $('#visibility_ref_rle_algorithm_dialog_edit_algorithm').get(0).checked;
	var comment_algorithm= $('#comment_algorithm_dialog_edit_algorithm').val();
	var text_algorithm= tinyMCE.editors["text_algorithm_dialog_edit_algorithm"].getContent();
	var use_ref_html_algorithm= $('#use_ref_html_algorithm_dialog_edit_algorithm').get(0).checked;
	var visibility_algorithm= $('#visibility_dialog_edit_algorithm').get(0).checked;
	var id_algorithm= $('#id_algorithm_dialog_edit_algorithm').val();
	
	var exp_key_algorithm= new RegExp('^[a-zA-Z0-9_]{1,50}$');
	var exp_name_algorithm= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	
	var str_error= "";
	
	if(visibility_ref_pdf_algorithm)
	{
		visibility_ref_pdf_algorithm= "1";
	}
	else
	{
		visibility_ref_pdf_algorithm= "0";
	}
	
	if(visibility_ref_rle_algorithm)
	{
		visibility_ref_rle_algorithm= "1";
	}
	else
	{
		visibility_ref_rle_algorithm= "0";
	}
	
	if(use_ref_html_algorithm)
	{
		use_ref_html_algorithm= "1";
	}
	else
	{
		use_ref_html_algorithm= "0";
	}
	
	if(visibility_algorithm)
	{
		visibility_algorithm= "1";
	}
	else
	{
		visibility_algorithm= "0";
	}
	
	
	if(!exp_key_algorithm.test(key_algorithm))
	{
		str_error += "Идентификатор алгоритма не соответствует требованиям<br>";
	}
	if(!exp_name_algorithm.test(name_algorithm))
	{
		str_error += "Название алгоритма не соответствует требованиям<br>";
	}
	
	if(str_error != "")
	{
		$('#error_add_new_algorithm_dialog_add_new_express_algorithm').html(str_error);
	}
	else
	{
		fn_set_status_loading();
                       
		jqXHR= $.post("./check_algorithm_information_for_edit.php","id_algorithm="+encodeURIComponent(id_algorithm)+"&status="+encodeURIComponent(visibility_algorithm)+"&id_type_board="+encodeURIComponent(id_type_board)+"&key_algorithm="+encodeURIComponent(key_algorithm)+"&name_algorithm="+encodeURIComponent(name_algorithm)+"&path_html_algorithm="+encodeURIComponent(path_html_algorithm)+"&path_pdf_algorithm="+encodeURIComponent(path_pdf_algorithm)+"&visibility_ref_pdf_algorithm="+encodeURIComponent(visibility_ref_pdf_algorithm)+"&path_rle_algorithm="+encodeURIComponent(path_rle_algorithm)+"&visibility_ref_rle_algorithm="+encodeURIComponent(visibility_ref_rle_algorithm)+"&comment_algorithm="+encodeURIComponent(comment_algorithm)+"&text_algorithm="+encodeURIComponent(text_algorithm)+"&use_ref_html_algorithm="+encodeURIComponent(use_ref_html_algorithm),fn_success_check_algorithm_information_for_edit_preview);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при добавлении нового алгоритма");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

function fn_success_check_algorithm_information_for_edit_preview(data,textStatus,jqXHR)
{
	$('#error_edit_algorithm_dialog_edit_algorithm').html("");
	
	var id_type_board= $('#id_type_board_dialog_edit_algorithm').val();
	var id_algorithm= $('#key_algorithm_dialog_edit_algorithm').val();
	var name_algorithm= $('#name_algorithm_dialog_edit_algorithm').val();
	var path_html_algorithm= $('#path_html_algorithm_dialog_edit_algorithm').val();
	var path_pdf_algorithm= $('#path_pdf_algorithm_dialog_edit_algorithm').val();
	var visibility_ref_pdf_algorithm= $('#visibility_ref_pdf_algorithm_dialog_edit_algorithm').get(0).checked;
	var path_rle_algorithm= $('#path_rle_algorithm_dialog_edit_algorithm').val();
	var visibility_ref_rle_algorithm= $('#visibility_ref_rle_algorithm_dialog_edit_algorithm').get(0).checked;
	var comment_algorithm= $('#comment_algorithm_dialog_edit_algorithm').val();
	var text_algorithm= tinyMCE.editors["text_algorithm_dialog_edit_algorithm"].getContent();
	var use_ref_html_algorithm= $('#use_ref_html_algorithm_dialog_edit_algorithm').get(0).checked;
	var visibility_algorithm= $('#visibility_dialog_edit_algorithm').get(0).checked;
	
	var exp_key_algorithm= new RegExp('^[a-zA-Z0-9_]{1,50}$');
	var exp_name_algorithm= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	
	var str_error= "";
	
	if(visibility_ref_pdf_algorithm)
	{
		visibility_ref_pdf_algorithm= "1";
	}
	else
	{
		visibility_ref_pdf_algorithm= "0";
	}
	
	if(visibility_ref_rle_algorithm)
	{
		visibility_ref_rle_algorithm= "1";
	}
	else
	{
		visibility_ref_rle_algorithm= "0";
	}
	
	if(use_ref_html_algorithm)
	{
		use_ref_html_algorithm= "1";
	}
	else
	{
		use_ref_html_algorithm= "0";
	}
	
	if(visibility_algorithm)
	{
		visibility_algorithm= "1";
	}
	else
	{
		visibility_algorithm= "0";
	}
	
	fn_clear_status_loading();
		
	if(data != "1")
	{
		$('#error_add_new_algorithm_dialog_add_new_express_algorithm').html(data);
	}
	else
	{
		fn_set_status_loading();
                       
		jqXHR= $.post("../../frontend/profile/get_algorithm.php","algorithm_preview="+encodeURIComponent("1")+"&status="+encodeURIComponent(visibility_algorithm)+"&id_type_board="+encodeURIComponent(id_type_board)+"&id_algorithm="+encodeURIComponent(id_algorithm)+"&name_algorithm="+encodeURIComponent(name_algorithm)+"&path_html_algorithm="+encodeURIComponent(path_html_algorithm)+"&path_pdf_algorithm="+encodeURIComponent(path_pdf_algorithm)+"&visibility_ref_pdf_algorithm="+encodeURIComponent(visibility_ref_pdf_algorithm)+"&path_rle_algorithm="+encodeURIComponent(path_rle_algorithm)+"&visibility_ref_rle_algorithm="+encodeURIComponent(visibility_ref_rle_algorithm)+"&comment_algorithm="+encodeURIComponent(comment_algorithm)+"&text_algorithm="+encodeURIComponent(text_algorithm)+"&use_ref_html_algorithm="+encodeURIComponent(use_ref_html_algorithm),fn_success_get_algorithm_preview);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при добавлении нового алгоритма");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

function fn_up_algorithm(id)
{
	fn_set_status_loading();
                       
	jqXHR= $.post("./up_algorithm.php","id_algorithm="+encodeURIComponent(id),fn_success_up_algorithm);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при изменении позиции алгоритма");
	$( "#error_dialog" ).dialog("open");});
}

function fn_success_up_algorithm(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	
	var page= $('#hdn_page_tbl_algorithms').val();
	var num= $('#hdn_num_tbl_algorithms').val();
	var id_type_board= $('#hdn_id_type_board_tbl_algorithms').val();
						
	if(data== "1")
	{
	
		fn_get_express_algorithms(id_type_board,page,num);
		
		$("#p_error_dialog").html("Алгоритм успешно перемещен на одну позицию вверх");
		$( "#error_dialog" ).dialog("open");
							
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
						
}

function fn_down_algorithm(id)
{
	fn_set_status_loading();
                       
	jqXHR= $.post("./down_algorithm.php","id_algorithm="+encodeURIComponent(id),fn_success_down_algorithm);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при изменении позиции алгоритма");
	$( "#error_dialog" ).dialog("open");});
}

function fn_success_down_algorithm(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	
	var page= $('#hdn_page_tbl_algorithms').val();
	var num= $('#hdn_num_tbl_algorithms').val();
	var id_type_board= $('#hdn_id_type_board_tbl_algorithms').val();
						
	if(data== "1")
	{
	
		fn_get_express_algorithms(id_type_board,page,num);
		
		$("#p_error_dialog").html("Алгоритм успешно перемещен на одну позицию вниз");
		$( "#error_dialog" ).dialog("open");
							
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
						
}

function fn_delete_algorithm(id)
{
	if(confirm("Выдействительно хотите удалить данный алгоритм?"))
	{
		fn_clear_status_loading();
		jqXHR= $.post("./delete_algorithm.php","id_algorithm="+encodeURIComponent(id),fn_success_delete_algorithm);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при удалении алгоритма");
		$( "#error_dialog" ).dialog("open");});
	}
}
					
function fn_success_delete_algorithm(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	var page= $('#hdn_page_tbl_algorithms').val();
	var num= $('#hdn_num_tbl_algorithms').val();
	var id_type_board= $('#hdn_id_type_board_tbl_algorithms').val();
	if(data== "1")
	{
		fn_get_express_algorithms(id_type_board,page,num);
		$("#p_error_dialog").html("Алгоритм успешно удален");
		$( "#error_dialog" ).dialog("open");
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
						
}


function fn_show_algorithm(id)
{
	fn_set_status_loading();
	jqXHR= $.post("./show_algorithm.php","id_algorithm="+encodeURIComponent(id),fn_success_show_algorithm);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при изменении видимости алгоритма");
		$( "#error_dialog" ).dialog("open");
	});
}
					
function fn_success_show_algorithm(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	
	var page= $('#hdn_page_tbl_algorithms').val();
	var num= $('#hdn_num_tbl_algorithms').val();
	var id_type_board= $('#hdn_id_type_board_tbl_algorithms').val();
	
	if(data== "1")
	{
		fn_get_express_algorithms(id_type_board,page,num);
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
						
}
					
function fn_hide_algorithm(id)
{
	fn_set_status_loading();
	jqXHR= $.post("./hide_algorithm.php","id_algorithm="+encodeURIComponent(id),fn_success_hide_algorithm);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при изменении видимости алгоритма");
		$( "#error_dialog" ).dialog("open");
	});
}
					
function fn_success_hide_algorithm(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	
	var page= $('#hdn_page_tbl_algorithms').val();
	var num= $('#hdn_num_tbl_algorithms').val();
	var id_type_board= $('#hdn_id_type_board_tbl_algorithms').val();
	
	if(data== "1")
	{
		fn_get_express_algorithms(id_type_board,page,num);
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
}


function fn_get_choice_rle_for_algorithm(id_algorithm,id_type_board,page,num)
{
	fn_set_status_loading();
	var key_choice_rle_item= "";
	if($("#add_new_express_algorithm_dialog").dialog("isOpen"))
	{
		key_choice_rle_item= $("#path_rle_algorithm_dialog_add_new_express_algorithm").val();
	}
	else if($("#dialog_edit_algorithm").dialog("isOpen"))
	{
		key_choice_rle_item= $("#path_rle_algorithm_dialog_edit_algorithm").val();
	}

	jqXHR= $.post("./get_choice_rle_algorithm.php","id_algorithm="+encodeURIComponent(id_algorithm)+"&id_current_type_board="+encodeURIComponent(id_type_board)+"&page="+encodeURIComponent(page)+"&num="+encodeURIComponent(num)+"&key_choice_rle_item="+encodeURIComponent(key_choice_rle_item),fn_success_get_choice_rle_for_algorithm);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при получении РЛЭ по выбранному алгоритму");
		$("#error_dialog" ).dialog("open");
	});

}
function fn_success_get_choice_rle_for_algorithm(data,textStatus,jqXHR)
{
	$( "#dialog_choice_rle_inner" ).html(data);
	fn_clear_status_loading();
	if(!$( "#dialog_choice_rle" ).dialog("isOpen"))
	{
		$( "#dialog_choice_rle" ).dialog("open");
	}
}





function fn_add_new_rle_item()
{

	$('#error_add_new_rle_item_dialog_add_new_rle_item').html("");
	
	var id_type_board= $('#id_type_board_dialog_add_new_rle_item').val();
	var id_rle_item= $('#id_type_rle_item_dialog_add_new_rle_item').val();
	var name_rle_item= $('#name_rle_item_dialog_add_new_rle_item').val();
	var path_html_rle_item= $('#path_html_rle_item_dialog_add_new_rle_item').val();
	var path_pdf_rle_item= $('#path_pdf_rle_item_dialog_add_new_rle_item').val();
	var visibility_ref_pdf_rle_item= $('#visibility_ref_pdf_rle_item_dialog_add_new_rle_item').get(0).checked;
	var path_algorithm_rle_item= $('#path_algorithm_rle_item_dialog_add_new_rle_item').val();
	var visibility_ref_algorithm_rle_item= $('#visibility_ref_algorithm_rle_item_dialog_add_new_rle_item').get(0).checked;
	var comment_rle_item= $('#comment_rle_item_dialog_add_new_rle_item').val();
	var text_rle_item= tinyMCE.editors["text_rle_item_dialog_add_new_rle_item"].getContent();
	var use_ref_html_rle_item= $('#use_ref_html_rle_item_dialog_add_new_rle_item').get(0).checked;
	var visibility_rle_item= $('#visibility_dialog_add_new_rle_item').get(0).checked;
	
	var exp_key_rle_item= new RegExp('^[a-zA-Z0-9_]{1,50}$');
	var exp_name_rle_item= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	
	var str_error= "";
	
	if(visibility_ref_pdf_rle_item)
	{
		visibility_ref_pdf_rle_item= "1";
	}
	else
	{
		visibility_ref_pdf_rle_item= "0";
	}
	
	if(visibility_ref_algorithm_rle_item)
	{
		visibility_ref_algorithm_rle_item= "1";
	}
	else
	{
		visibility_ref_algorithm_rle_item= "0";
	}
	
	if(use_ref_html_rle_item)
	{
		use_ref_html_rle_item= "1";
	}
	else
	{
		use_ref_html_rle_item= "0";
	}
	
	if(visibility_rle_item)
	{
		visibility_rle_item= "1";
	}
	else
	{
		visibility_rle_item= "0";
	}
	
	
	if(!exp_key_rle_item.test(id_rle_item))
	{
		str_error += "Идентификатор пункта РЛЭ не соответствует требованиям<br>";
	}
	if(!exp_name_rle_item.test(name_rle_item))
	{
		str_error += "Название пункта РЛЭ не соответствует требованиям<br>";
	}
	
	if(str_error != "")
	{
		$('#error_add_new_rle_item_dialog_add_new_rle_item').html(str_error);
	}
	else
	{
		fn_set_status_loading();
                       
		jqXHR= $.post("../rle/check_rle_item_information_for_add.php","status="+encodeURIComponent(visibility_rle_item)+"&id_type_board="+encodeURIComponent(id_type_board)+"&id_rle_item="+encodeURIComponent(id_rle_item)+"&name_rle_item="+encodeURIComponent(name_rle_item)+"&path_html_rle_item="+encodeURIComponent(path_html_rle_item)+"&path_pdf_rle_item="+encodeURIComponent(path_pdf_rle_item)+"&visibility_ref_pdf_rle_item="+encodeURIComponent(visibility_ref_pdf_rle_item)+"&path_algorithm_rle_item="+encodeURIComponent(path_algorithm_rle_item)+"&visibility_ref_algorithm_rle_item="+encodeURIComponent(visibility_ref_algorithm_rle_item)+"&comment_rle_item="+encodeURIComponent(comment_rle_item)+"&text_rle_item="+encodeURIComponent(text_rle_item)+"&use_ref_html_rle_item="+encodeURIComponent(use_ref_html_rle_item),fn_success_check_rle_item_information_for_add);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при добавлении нового пункта РЛЭ");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

function fn_success_check_rle_item_information_for_add(data,textStatus,jqXHR)
{
		
	$('#error_add_new_rle_item_dialog_add_new_rle_item').html("");
	
	var id_type_board= $('#id_type_board_dialog_add_new_rle_item').val();
	var id_rle_item= $('#id_type_rle_item_dialog_add_new_rle_item').val();
	var name_rle_item= $('#name_rle_item_dialog_add_new_rle_item').val();
	var path_html_rle_item= $('#path_html_rle_item_dialog_add_new_rle_item').val();
	var path_pdf_rle_item= $('#path_pdf_rle_item_dialog_add_new_rle_item').val();
	var visibility_ref_pdf_rle_item= $('#visibility_ref_pdf_rle_item_dialog_add_new_rle_item').get(0).checked;
	var path_algorithm_rle_item= $('#path_algorithm_rle_item_dialog_add_new_rle_item').val();
	var visibility_ref_algorithm_rle_item= $('#visibility_ref_algorithm_rle_item_dialog_add_new_rle_item').get(0).checked;
	var comment_rle_item= $('#comment_rle_item_dialog_add_new_rle_item').val();
	var text_rle_item= tinyMCE.editors["text_rle_item_dialog_add_new_rle_item"].getContent();
	var use_ref_html_rle_item= $('#use_ref_html_rle_item_dialog_add_new_rle_item').get(0).checked;
	var visibility_rle_item= $('#visibility_dialog_add_new_rle_item').get(0).checked;
	
	var exp_key_rle_item= new RegExp('^[a-zA-Z0-9_]{1,50}$');
	var exp_name_rle_item= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	
	var str_error= "";
	
	if(visibility_ref_pdf_rle_item)
	{
		visibility_ref_pdf_rle_item= "1";
	}
	else
	{
		visibility_ref_pdf_rle_item= "0";
	}
	
	if(visibility_ref_algorithm_rle_item)
	{
		visibility_ref_algorithm_rle_item= "1";
	}
	else
	{
		visibility_ref_algorithm_rle_item= "0";
	}
	
	if(use_ref_html_rle_item)
	{
		use_ref_html_rle_item= "1";
	}
	else
	{
		use_ref_html_rle_item= "0";
	}
	
	if(visibility_rle_item)
	{
		visibility_rle_item= "1";
	}
	else
	{
		visibility_rle_item= "0";
	}
	
	fn_clear_status_loading();
		
	if(data != "1")
	{
		$('#error_add_new_rle_item_dialog_add_new_rle_item').html(data);
	}
	else
	{
		fn_set_status_loading();
                       
		jqXHR= $.post("../rle/add_new_rle_item_information.php","status="+encodeURIComponent(visibility_rle_item)+"&id_type_board="+encodeURIComponent(id_type_board)+"&id_rle_item="+encodeURIComponent(id_rle_item)+"&name_rle_item="+encodeURIComponent(name_rle_item)+"&path_html_rle_item="+encodeURIComponent(path_html_rle_item)+"&path_pdf_rle_item="+encodeURIComponent(path_pdf_rle_item)+"&visibility_ref_pdf_rle_item="+encodeURIComponent(visibility_ref_pdf_rle_item)+"&path_algorithm_rle_item="+encodeURIComponent(path_algorithm_rle_item)+"&visibility_ref_algorithm_rle_item="+encodeURIComponent(visibility_ref_algorithm_rle_item)+"&comment_rle_item="+encodeURIComponent(comment_rle_item)+"&text_rle_item="+encodeURIComponent(text_rle_item)+"&use_ref_html_rle_item="+encodeURIComponent(use_ref_html_rle_item),fn_success_add_new_rle_item);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при добавлении нового пункта РЛЭ");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

function fn_success_add_new_rle_item(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	var page= $('#hdn_page_tbl_rle_items').val();
	var num= $('#hdn_num_tbl_rle_items').val();
	var id_type_board= $('#hdn_id_type_board_tbl_rle_items').val();
	var id_algorithm= $('#hdn_id_algorithm_tbl_rle_items').val();

	if(data== "1")
	{
		$("#add_new_rle_item_dialog").dialog("close");
		$("#p_error_dialog").html("Новый пункт РЛЭ успешно добавлен");
		$("#error_dialog" ).dialog("open");

		fn_get_choice_rle_for_algorithm(id_algorithm,id_type_board,page,num);	
	}
	else
	{
		$("#p_error_dialog").html(data);
		$("#error_dialog" ).dialog("open");
	}
}

function fn_rle_item_preview()
{
	$('#error_add_new_rle_item_dialog_add_new_rle_item').html("");
	
	var id_type_board= $('#id_type_board_dialog_add_new_rle_item').val();
	var id_rle_item= $('#id_type_rle_item_dialog_add_new_rle_item').val();
	var name_rle_item= $('#name_rle_item_dialog_add_new_rle_item').val();
	var path_html_rle_item= $('#path_html_rle_item_dialog_add_new_rle_item').val();
	var path_pdf_rle_item= $('#path_pdf_rle_item_dialog_add_new_rle_item').val();
	var visibility_ref_pdf_rle_item= $('#visibility_ref_pdf_rle_item_dialog_add_new_rle_item').get(0).checked;
	var path_algorithm_rle_item= $('#path_algorithm_rle_item_dialog_add_new_rle_item').val();
	var visibility_ref_algorithm_rle_item= $('#visibility_ref_algorithm_rle_item_dialog_add_new_rle_item').get(0).checked;
	var comment_rle_item= $('#comment_rle_item_dialog_add_new_rle_item').val();
	var text_rle_item= tinyMCE.editors["text_rle_item_dialog_add_new_rle_item"].getContent();
	var use_ref_html_rle_item= $('#use_ref_html_rle_item_dialog_add_new_rle_item').get(0).checked;
	var visibility_rle_item= $('#visibility_dialog_add_new_rle_item').get(0).checked;
	
	var exp_key_rle_item= new RegExp('^[a-zA-Z0-9_]{1,50}$');
	var exp_name_rle_item= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	
	var str_error= "";
	
	if(visibility_ref_pdf_rle_item)
	{
		visibility_ref_pdf_rle_item= "1";
	}
	else
	{
		visibility_ref_pdf_rle_item= "0";
	}
	
	if(visibility_ref_algorithm_rle_item)
	{
		visibility_ref_algorithm_rle_item= "1";
	}
	else
	{
		visibility_ref_algorithm_rle_item= "0";
	}
	
	if(use_ref_html_rle_item)
	{
		use_ref_html_rle_item= "1";
	}
	else
	{
		use_ref_html_rle_item= "0";
	}
	
	if(visibility_rle_item)
	{
		visibility_rle_item= "1";
	}
	else
	{
		visibility_rle_item= "0";
	}
	
	
	if(!exp_key_rle_item.test(id_rle_item))
	{
		str_error += "Идентификатор пункта РЛЭ не соответствует требованиям<br>";
	}
	if(!exp_name_rle_item.test(name_rle_item))
	{
		str_error += "Название пункта РЛЭ не соответствует требованиям<br>";
	}
	
	if(str_error != "")
	{
		$('#error_add_new_rle_item_dialog_add_new_rle_item').html(str_error);
	}
	else
	{
		fn_set_status_loading();
                       
		jqXHR= $.post("../rle/check_rle_item_information_for_add.php","status="+encodeURIComponent(visibility_rle_item)+"&id_type_board="+encodeURIComponent(id_type_board)+"&id_rle_item="+encodeURIComponent(id_rle_item)+"&name_rle_item="+encodeURIComponent(name_rle_item)+"&path_html_rle_item="+encodeURIComponent(path_html_rle_item)+"&path_pdf_rle_item="+encodeURIComponent(path_pdf_rle_item)+"&visibility_ref_pdf_rle_item="+encodeURIComponent(visibility_ref_pdf_rle_item)+"&path_algorithm_rle_item="+encodeURIComponent(path_algorithm_rle_item)+"&visibility_ref_algorithm_rle_item="+encodeURIComponent(visibility_ref_algorithm_rle_item)+"&comment_rle_item="+encodeURIComponent(comment_rle_item)+"&text_rle_item="+encodeURIComponent(text_rle_item)+"&use_ref_html_rle_item="+encodeURIComponent(use_ref_html_rle_item),fn_success_check_rle_item_information_for_preview);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при предпросмотре нового пункта РЛЭ");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

function fn_success_check_rle_item_information_for_preview(data,textStatus,jqXHR)
{
	$('#error_add_new_rle_item_dialog_add_new_rle_item').html("");
	
	var id_type_board= $('#id_type_board_dialog_add_new_rle_item').val();
	var id_rle_item= $('#id_type_rle_item_dialog_add_new_rle_item').val();
	var name_rle_item= $('#name_rle_item_dialog_add_new_rle_item').val();
	var path_html_rle_item= $('#path_html_rle_item_dialog_add_new_rle_item').val();
	var path_pdf_rle_item= $('#path_pdf_rle_item_dialog_add_new_rle_item').val();
	var visibility_ref_pdf_rle_item= $('#visibility_ref_pdf_rle_item_dialog_add_new_rle_item').get(0).checked;
	var path_algorithm_rle_item= $('#path_algorithm_rle_item_dialog_add_new_rle_item').val();
	var visibility_ref_algorithm_rle_item= $('#visibility_ref_algorithm_rle_item_dialog_add_new_rle_item').get(0).checked;
	var comment_rle_item= $('#comment_rle_item_dialog_add_new_rle_item').val();
	var text_rle_item= tinyMCE.editors["text_rle_item_dialog_add_new_rle_item"].getContent();
	var use_ref_html_rle_item= $('#use_ref_html_rle_item_dialog_add_new_rle_item').get(0).checked;
	var visibility_rle_item= $('#visibility_dialog_add_new_rle_item').get(0).checked;
	
	var exp_key_rle_item= new RegExp('^[a-zA-Z0-9_]{1,50}$');
	var exp_name_rle_item= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	
	var str_error= "";
	
	if(visibility_ref_pdf_rle_item)
	{
		visibility_ref_pdf_rle_item= "1";
	}
	else
	{
		visibility_ref_pdf_rle_item= "0";
	}
	
	if(visibility_ref_algorithm_rle_item)
	{
		visibility_ref_algorithm_rle_item= "1";
	}
	else
	{
		visibility_ref_algorithm_rle_item= "0";
	}
	
	if(use_ref_html_rle_item)
	{
		use_ref_html_rle_item= "1";
	}
	else
	{
		use_ref_html_rle_item= "0";
	}
	
	if(visibility_rle_item)
	{
		visibility_rle_item= "1";
	}
	else
	{
		visibility_rle_item= "0";
	}
	
	fn_clear_status_loading();
		
	if(data != "1")
	{
		$('#error_add_new_rle_item_dialog_add_new_rle_item').html(data);
	}
	else
	{
		fn_set_status_loading();
                       
		jqXHR= $.post("../../frontend/profile/get_algorithm.php","rle_item_preview="+encodeURIComponent("1")+"&status="+encodeURIComponent(visibility_rle_item)+"&id_type_board="+encodeURIComponent(id_type_board)+"&id_rle_item="+encodeURIComponent(id_rle_item)+"&name_rle_item="+encodeURIComponent(name_rle_item)+"&path_html_rle_item="+encodeURIComponent(path_html_rle_item)+"&path_pdf_rle_item="+encodeURIComponent(path_pdf_rle_item)+"&visibility_ref_pdf_rle_item="+encodeURIComponent(visibility_ref_pdf_rle_item)+"&path_algorithm_rle_item="+encodeURIComponent(path_algorithm_rle_item )+"&visibility_ref_algorithm_rle_item="+encodeURIComponent(visibility_ref_algorithm_rle_item)+"&comment_rle_item="+encodeURIComponent(comment_rle_item)+"&text_rle_item="+encodeURIComponent(text_rle_item)+"&use_ref_html_rle_item="+encodeURIComponent(use_ref_html_rle_item),fn_success_get_rle_item_preview);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при предпросмотре пункта РЛЭ");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

function fn_success_get_rle_item_preview(data,textStatus,jqXHR)
{

	//window.open("../../frontend/profile/index.php?"+"rle_item_preview="+encodeURIComponent("1")+"&data="+encodeURIComponent(data));
	//fn_clear_status_loading();

	jqXHR= $.post("../../frontend/profile/index.php","algorithm_preview="+encodeURIComponent("1")+"&data="+encodeURIComponent(data),fn_success_get_page_rle_item_preview);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при предпросмотре пункта РЛЭ");
			$( "#error_dialog" ).dialog("open");
	});

}

function fn_success_get_page_rle_item_preview(data,textStatus,jqXHR)
{
	jqXHR= $.post("../../frontend/profile/create_page_preview.php","algorithm_preview="+encodeURIComponent("1")+"&data="+encodeURIComponent(data),fn_success_create_page_rle_item_preview);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при предпросмотре пункта РЛЭ");
			$( "#error_dialog" ).dialog("open");
	});
		
}

function fn_success_create_page_rle_item_preview(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	
	if(data== "1")
	{
		window.open('../../frontend/profile/page_preview_algorithm.html');
	}
	else
	{
		$("#p_error_dialog").html("Ошибка при получении страницы предпросмотра");
		$( "#error_dialog" ).dialog("open");
	}
}

function fn_show_dialog_add_new_rle_item()
{
	fn_tinymce_for_add_new_rle_item();
	$('#id_type_board_dialog_add_new_rle_item').val($('#id_current_type_board').val());
	$("#add_new_rle_item_dialog" ).dialog('open');
	
}

function fn_get_show_full_information_rle_item(id_rle_item)
{
	fn_set_status_loading();
    if((id_rle_item != "") && (id_rle_item != undefined))
	{
	 	jqXHR= $.post("../rle/get_rle_item_full_information.php","id_rle_item="+encodeURIComponent(id_rle_item)+"&choice_ref_rle_item_for_algorithm="+encodeURIComponent(1),fn_success_get_show_full_information_rle_item);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при получении информации по данному пункт РЛЭу");
			$( "#error_dialog" ).dialog("open");
		});
	}	
	else
	{
		//
	}
}

function fn_success_get_show_full_information_rle_item(data,textStatus,jqXHR)
{
	$("#show_information_rle_item" ).html(data);
	fn_clear_status_loading();
	$("#dialog_show_information_rle_item" ).dialog("open");
}






function fn_edit_rle_item(id_rle_item)
{
	fn_set_status_loading();
    if((id_rle_item != "") || (id_rle_item != undefined))
	{
	 	jqXHR= $.post("../rle/get_edit_rle_item.php","id_rle_item="+encodeURIComponent(id_rle_item)+"&choice_ref_rle_item_for_algorithm="+encodeURIComponent(1),fn_success_get_edit_rle_item);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при получении информации по выбранному пункт РЛЭу");
			$( "#error_dialog" ).dialog("open");
		});
	}	
	else
	{
		//
	}
}
function fn_success_get_edit_rle_item(data,textStatus,jqXHR)
{
	$( "#dialog_edit_rle_item" ).html(data);
	fn_clear_status_loading();
	$("#dialog_show_information_rle_item" ).dialog("close");
	$( "#dialog_edit_rle_item" ).dialog("open");
}




function fn_save_edit_rle_item()
{

	$('#error_edit_rle_item_dialog_edit_rle_item').html("");
	
	var id_type_board= $('#id_type_board_dialog_edit_rle_item').val();
	var key_rle_item= $('#key_rle_item_dialog_edit_rle_item').val();
	var name_rle_item= $('#name_rle_item_dialog_edit_rle_item').val();
	var path_html_rle_item= $('#path_html_rle_item_dialog_edit_rle_item').val();
	var path_pdf_rle_item= $('#path_pdf_rle_item_dialog_edit_rle_item').val();
	var visibility_ref_pdf_rle_item= $('#visibility_ref_pdf_rle_item_dialog_edit_rle_item').get(0).checked;
	var path_algorithm_rle_item= $('#path_algorithm_rle_item_dialog_edit_rle_item').val();
	var visibility_ref_algorithm_rle_item= $('#visibility_ref_algorithm_rle_item_dialog_edit_rle_item').get(0).checked;
	var comment_rle_item= $('#comment_rle_item_dialog_edit_rle_item').val();
	var text_rle_item= tinyMCE.editors["text_rle_item_dialog_edit_rle_item"].getContent();
	var use_ref_html_rle_item= $('#use_ref_html_rle_item_dialog_edit_rle_item').get(0).checked;
	var visibility_rle_item= $('#visibility_dialog_edit_rle_item').get(0).checked;
	var id_rle_item= $('#id_rle_item_dialog_edit_rle_item').val();
	
	var exp_key_rle_item= new RegExp('^[a-zA-Z0-9_]{1,50}$');
	var exp_name_rle_item= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	
	var str_error= "";
	
	if(visibility_ref_pdf_rle_item)
	{
		visibility_ref_pdf_rle_item= "1";
	}
	else
	{
		visibility_ref_pdf_rle_item= "0";
	}
	
	if(visibility_ref_algorithm_rle_item)
	{
		visibility_ref_algorithm_rle_item= "1";
	}
	else
	{
		visibility_ref_algorithm_rle_item= "0";
	}
	
	if(use_ref_html_rle_item)
	{
		use_ref_html_rle_item= "1";
	}
	else
	{
		use_ref_html_rle_item= "0";
	}
	
	if(visibility_rle_item)
	{
		visibility_rle_item= "1";
	}
	else
	{
		visibility_rle_item= "0";
	}
	
	
	if(!exp_key_rle_item.test(key_rle_item))
	{
		str_error += "Идентификатор пункта РЛЭ не соответствует требованиям<br>";
	}
	if(!exp_name_rle_item.test(name_rle_item))
	{
		str_error += "Название пункта РЛЭ не соответствует требованиям<br>";
	}
	
	if(str_error != "")
	{
		$('#error_edit_rle_item_dialog_edit_rle_item').html(str_error);
	}
	else
	{
		fn_set_status_loading();
                       
		jqXHR= $.post("../rle/check_rle_item_information_for_edit.php","id_rle_item="+encodeURIComponent(id_rle_item)+"&status="+encodeURIComponent(visibility_rle_item)+"&id_type_board="+encodeURIComponent(id_type_board)+"&key_rle_item="+encodeURIComponent(key_rle_item)+"&name_rle_item="+encodeURIComponent(name_rle_item)+"&path_html_rle_item="+encodeURIComponent(path_html_rle_item)+"&path_pdf_rle_item="+encodeURIComponent(path_pdf_rle_item)+"&visibility_ref_pdf_rle_item="+encodeURIComponent(visibility_ref_pdf_rle_item)+"&path_algorithm_rle_item="+encodeURIComponent(path_algorithm_rle_item )+"&visibility_ref_algorithm_rle_item="+encodeURIComponent(visibility_ref_algorithm_rle_item)+"&comment_rle_item="+encodeURIComponent(comment_rle_item)+"&text_rle_item="+encodeURIComponent(text_rle_item)+"&use_ref_html_rle_item="+encodeURIComponent(use_ref_html_rle_item),fn_success_check_rle_item_information_for_edit);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при сохранении пункта РЛЭ");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

function fn_success_check_rle_item_information_for_edit(data,textStatus,jqXHR)
{
		
	$('#error_edit_rle_item_dialog_edit_rle_item').html("");
	
	var id_type_board= $('#id_type_board_dialog_edit_rle_item').val();
	var key_rle_item= $('#key_rle_item_dialog_edit_rle_item').val();
	var name_rle_item= $('#name_rle_item_dialog_edit_rle_item').val();
	var path_html_rle_item= $('#path_html_rle_item_dialog_edit_rle_item').val();
	var path_pdf_rle_item= $('#path_pdf_rle_item_dialog_edit_rle_item').val();
	var visibility_ref_pdf_rle_item= $('#visibility_ref_pdf_rle_item_dialog_edit_rle_item').get(0).checked;
	var path_algorithm_rle_item= $('#path_algorithm_rle_item_dialog_edit_rle_item').val();
	var visibility_ref_algorithm_rle_item= $('#visibility_ref_algorithm_rle_item_dialog_edit_rle_item').get(0).checked;
	var comment_rle_item= $('#comment_rle_item_dialog_edit_rle_item').val();
	var text_rle_item= tinyMCE.editors["text_rle_item_dialog_edit_rle_item"].getContent();
	var use_ref_html_rle_item= $('#use_ref_html_rle_item_dialog_edit_rle_item').get(0).checked;
	var visibility_rle_item= $('#visibility_dialog_edit_rle_item').get(0).checked;
	var id_rle_item= $('#id_rle_item_dialog_edit_rle_item').val();
	
	var exp_key_rle_item= new RegExp('^[a-zA-Z0-9_]{1,50}$');
	var exp_name_rle_item= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	
	var str_error= "";
	
	if(visibility_ref_pdf_rle_item)
	{
		visibility_ref_pdf_rle_item= "1";
	}
	else
	{
		visibility_ref_pdf_rle_item= "0";
	}
	
	if(visibility_ref_algorithm_rle_item)
	{
		visibility_ref_algorithm_rle_item= "1";
	}
	else
	{
		visibility_ref_algorithm_rle_item= "0";
	}
	
	if(use_ref_html_rle_item)
	{
		use_ref_html_rle_item= "1";
	}
	else
	{
		use_ref_html_rle_item= "0";
	}
	
	if(visibility_rle_item)
	{
		visibility_rle_item= "1";
	}
	else
	{
		visibility_rle_item= "0";
	}
	
	fn_clear_status_loading();
		
	if(data != "1")
	{
		$('#error_add_new_rle_item_dialog_add_new_rle_item').html(data);
	}
	else
	{
		fn_set_status_loading();
                       
		jqXHR= $.post("../rle/save_edit_rle_item_information.php","id_rle_item="+encodeURIComponent(id_rle_item)+"&status="+encodeURIComponent(visibility_rle_item)+"&id_type_board="+encodeURIComponent(id_type_board)+"&key_rle_item="+encodeURIComponent(key_rle_item)+"&name_rle_item="+encodeURIComponent(name_rle_item)+"&path_html_rle_item="+encodeURIComponent(path_html_rle_item)+"&path_pdf_rle_item="+encodeURIComponent(path_pdf_rle_item)+"&visibility_ref_pdf_rle_item="+encodeURIComponent(visibility_ref_pdf_rle_item)+"&path_algorithm_rle_item="+encodeURIComponent(path_algorithm_rle_item )+"&visibility_ref_algorithm_rle_item="+encodeURIComponent(visibility_ref_algorithm_rle_item)+"&comment_rle_item="+encodeURIComponent(comment_rle_item)+"&text_rle_item="+encodeURIComponent(text_rle_item)+"&use_ref_html_rle_item="+encodeURIComponent(use_ref_html_rle_item),fn_success_save_edit_rle_item);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при сохранении пункта РЛЭ");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

function fn_success_save_edit_rle_item(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	
	var page= $('#hdn_page_tbl_rle_items').val();
	var num= $('#hdn_num_tbl_rle_items').val();
	var id_type_board= $('#hdn_id_type_board_tbl_rle_items').val();
	var id_algorithm= $('#hdn_id_algorithm_tbl_rle_items').val();

	if(data== "1")
	{
		$("#dialog_edit_rle_item").dialog("close");
		$("#p_error_dialog").html("пункт РЛЭ успешно отредактирован");
		$("#error_dialog" ).dialog("open");

		fn_get_choice_rle_for_algorithm(id_algorithm,id_type_board,page,num);	
	}
	else
	{
		$("#p_error_dialog").html(data);
		$("#error_dialog" ).dialog("open");
	}
}

function fn_edit_rle_item_preview()
{
	$('#error_edit_rle_item_dialog_edit_rle_item').html("");
	
	var id_type_board= $('#id_type_board_dialog_edit_rle_item').val();
	var key_rle_item= $('#key_rle_item_dialog_edit_rle_item').val();
	var name_rle_item= $('#name_rle_item_dialog_edit_rle_item').val();
	var path_html_rle_item= $('#path_html_rle_item_dialog_edit_rle_item').val();
	var path_pdf_rle_item= $('#path_pdf_rle_item_dialog_edit_rle_item').val();
	var visibility_ref_pdf_rle_item= $('#visibility_ref_pdf_rle_item_dialog_edit_rle_item').get(0).checked;
	var path_algorithm_rle_item= $('#path_algorithm_rle_item_dialog_edit_rle_item').val();
	var visibility_ref_algorithm_rle_item= $('#visibility_ref_algorithm_rle_item_dialog_edit_rle_item').get(0).checked;
	var comment_rle_item= $('#comment_rle_item_dialog_edit_rle_item').val();
	var text_rle_item= tinyMCE.editors["text_rle_item_dialog_edit_rle_item"].getContent();
	var use_ref_html_rle_item= $('#use_ref_html_rle_item_dialog_edit_rle_item').get(0).checked;
	var visibility_rle_item= $('#visibility_dialog_edit_rle_item').get(0).checked;
	var id_rle_item= $('#id_rle_item_dialog_edit_rle_item').val();
	
	var exp_key_rle_item= new RegExp('^[a-zA-Z0-9_]{1,50}$');
	var exp_name_rle_item= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	
	var str_error= "";
	
	if(visibility_ref_pdf_rle_item)
	{
		visibility_ref_pdf_rle_item= "1";
	}
	else
	{
		visibility_ref_pdf_rle_item= "0";
	}
	
	if(visibility_ref_algorithm_rle_item)
	{
		visibility_ref_algorithm_rle_item= "1";
	}
	else
	{
		visibility_ref_algorithm_rle_item= "0";
	}
	
	if(use_ref_html_rle_item)
	{
		use_ref_html_rle_item= "1";
	}
	else
	{
		use_ref_html_rle_item= "0";
	}
	
	if(visibility_rle_item)
	{
		visibility_rle_item= "1";
	}
	else
	{
		visibility_rle_item= "0";
	}
	
	
	if(!exp_key_rle_item.test(key_rle_item))
	{
		str_error += "Идентификатор пункта РЛЭ не соответствует требованиям<br>";
	}
	if(!exp_name_rle_item.test(name_rle_item))
	{
		str_error += "Название пункта РЛЭ не соответствует требованиям<br>";
	}
	
	if(str_error != "")
	{
		$('#error_add_new_rle_item_dialog_add_new_rle_item').html(str_error);
	}
	else
	{
		fn_set_status_loading();
                       
		jqXHR= $.post("../rle/check_rle_item_information_for_edit.php","id_rle_item="+encodeURIComponent(id_rle_item)+"&status="+encodeURIComponent(visibility_rle_item)+"&id_type_board="+encodeURIComponent(id_type_board)+"&key_rle_item="+encodeURIComponent(key_rle_item)+"&name_rle_item="+encodeURIComponent(name_rle_item)+"&path_html_rle_item="+encodeURIComponent(path_html_rle_item)+"&path_pdf_rle_item="+encodeURIComponent(path_pdf_rle_item)+"&visibility_ref_pdf_rle_item="+encodeURIComponent(visibility_ref_pdf_rle_item)+"&path_algorithm_rle_item="+encodeURIComponent(path_algorithm_rle_item )+"&visibility_ref_algorithm_rle_item="+encodeURIComponent(visibility_ref_algorithm_rle_item)+"&comment_rle_item="+encodeURIComponent(comment_rle_item)+"&text_rle_item="+encodeURIComponent(text_rle_item)+"&use_ref_html_rle_item="+encodeURIComponent(use_ref_html_rle_item),fn_success_check_rle_item_information_for_edit_preview);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при предпросмотре пункта РЛЭ");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

function fn_success_check_rle_item_information_for_edit_preview(data,textStatus,jqXHR)
{
	$('#error_edit_rle_item_dialog_edit_rle_item').html("");
	
	var id_type_board= $('#id_type_board_dialog_edit_rle_item').val();
	var id_rle_item= $('#key_rle_item_dialog_edit_rle_item').val();
	var name_rle_item= $('#name_rle_item_dialog_edit_rle_item').val();
	var path_html_rle_item= $('#path_html_rle_item_dialog_edit_rle_item').val();
	var path_pdf_rle_item= $('#path_pdf_rle_item_dialog_edit_rle_item').val();
	var visibility_ref_pdf_rle_item= $('#visibility_ref_pdf_rle_item_dialog_edit_rle_item').get(0).checked;
	var path_algorithm_rle_item= $('#path_algorithm_rle_item_dialog_edit_rle_item').val();
	var visibility_ref_algorithm_rle_item= $('#visibility_ref_algorithm_rle_item_dialog_edit_rle_item').get(0).checked;
	var comment_rle_item= $('#comment_rle_item_dialog_edit_rle_item').val();
	var text_rle_item= tinyMCE.editors["text_rle_item_dialog_edit_rle_item"].getContent();
	var use_ref_html_rle_item= $('#use_ref_html_rle_item_dialog_edit_rle_item').get(0).checked;
	var visibility_rle_item= $('#visibility_dialog_edit_rle_item').get(0).checked;
	
	var exp_key_rle_item= new RegExp('^[a-zA-Z0-9_]{1,50}$');
	var exp_name_rle_item= new RegExp('[a-zA-Z0-9_А-Яа-я]+');
	
	var str_error= "";
	
	if(visibility_ref_pdf_rle_item)
	{
		visibility_ref_pdf_rle_item= "1";
	}
	else
	{
		visibility_ref_pdf_rle_item= "0";
	}
	
	if(visibility_ref_algorithm_rle_item)
	{
		visibility_ref_algorithm_rle_item= "1";
	}
	else
	{
		visibility_ref_algorithm_rle_item= "0";
	}
	
	if(use_ref_html_rle_item)
	{
		use_ref_html_rle_item= "1";
	}
	else
	{
		use_ref_html_rle_item= "0";
	}
	
	if(visibility_rle_item)
	{
		visibility_rle_item= "1";
	}
	else
	{
		visibility_rle_item= "0";
	}
	
	fn_clear_status_loading();
		
	if(data != "1")
	{
		$('#error_add_new_rle_item_dialog_add_new_rle_item').html(data);
	}
	else
	{
		fn_set_status_loading();
                       
		jqXHR= $.post("../../frontend/profile/get_algorithm.php","rle_item_preview="+encodeURIComponent("1")+"&status="+encodeURIComponent(visibility_rle_item)+"&id_type_board="+encodeURIComponent(id_type_board)+"&id_rle_item="+encodeURIComponent(id_rle_item)+"&name_rle_item="+encodeURIComponent(name_rle_item)+"&path_html_rle_item="+encodeURIComponent(path_html_rle_item)+"&path_pdf_rle_item="+encodeURIComponent(path_pdf_rle_item)+"&visibility_ref_pdf_rle_item="+encodeURIComponent(visibility_ref_pdf_rle_item)+"&path_algorithm_rle_item="+encodeURIComponent(path_algorithm_rle_item )+"&visibility_ref_algorithm_rle_item="+encodeURIComponent(visibility_ref_algorithm_rle_item)+"&comment_rle_item="+encodeURIComponent(comment_rle_item)+"&text_rle_item="+encodeURIComponent(text_rle_item)+"&use_ref_html_rle_item="+encodeURIComponent(use_ref_html_rle_item),fn_success_get_rle_item_preview);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при предпросмотре пункта РЛЭ");
			$( "#error_dialog" ).dialog("open");
		});
	}
}

function fn_up_rle_item(id)
{
	fn_set_status_loading();
                       
	jqXHR= $.post("../rle/up_rle_item.php","id_rle_item="+encodeURIComponent(id),fn_success_up_rle_item);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при изменении позиции пункта РЛЭ");
	$( "#error_dialog" ).dialog("open");});
}

function fn_success_up_rle_item(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	
	var page= $('#hdn_page_tbl_rle_items').val();
	var num= $('#hdn_num_tbl_rle_items').val();
	var id_type_board= $('#hdn_id_type_board_tbl_rle_items').val();
	var id_algorithm= $('#hdn_id_algorithm_tbl_rle_items').val();
						
	if(data== "1")
	{

		fn_get_choice_rle_for_algorithm(id_algorithm,id_type_board,page,num);
		
		$("#p_error_dialog").html("Пункт РЛЭ успешно перемещен на одну позицию вверх");
		$( "#error_dialog" ).dialog("open");
							
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
						
}

function fn_down_rle_item(id)
{
	fn_set_status_loading();
                       
	jqXHR= $.post("../rle/down_rle_item.php","id_rle_item="+encodeURIComponent(id),fn_success_down_rle_item);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при изменении позиции пункта РЛЭ");
	$( "#error_dialog" ).dialog("open");});
}

function fn_success_down_rle_item(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	
	var page= $('#hdn_page_tbl_rle_items').val();
	var num= $('#hdn_num_tbl_rle_items').val();
	var id_type_board= $('#hdn_id_type_board_tbl_rle_items').val();
	var id_algorithm= $('#hdn_id_algorithm_tbl_rle_items').val();
						
	if(data== "1")
	{
	
		fn_get_choice_rle_for_algorithm(id_algorithm,id_type_board,page,num);		
		$("#p_error_dialog").html("Пункт РЛЭ успешно перемещен на одну позицию вниз");
		$( "#error_dialog" ).dialog("open");
							
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
						
}

function fn_delete_rle_item(id)
{
	if(confirm("Выдействительно хотите удалить данный пункт РЛЭ?"))
	{
		fn_clear_status_loading();
		jqXHR= $.post("../rle/delete_rle_item.php","id_rle_item="+encodeURIComponent(id),fn_success_delete_rle_item);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при удалении пункта РЛЭ");
		$( "#error_dialog" ).dialog("open");});
	}
}
					
function fn_success_delete_rle_item(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	var page= $('#hdn_page_tbl_rle_items').val();
	var num= $('#hdn_num_tbl_rle_items').val();
	var id_type_board= $('#hdn_id_type_board_tbl_rle_items').val();
	var id_algorithm= $('#hdn_id_algorithm_tbl_rle_items').val();

	if(data== "1")
	{

		fn_get_choice_rle_for_algorithm(id_algorithm,id_type_board,page,num);
		$("#p_error_dialog").html("Пункт РЛЭ успешно удален");
		$( "#error_dialog" ).dialog("open");
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
						
}


function fn_show_rle_item(id)
{
	fn_set_status_loading();
	jqXHR= $.post("../rle/show_rle_item.php","id_rle_item="+encodeURIComponent(id),fn_success_show_rle_item);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при изменении видимости пункта РЛЭ");
		$( "#error_dialog" ).dialog("open");
	});
}
					
function fn_success_show_rle_item(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	
	var page= $('#hdn_page_tbl_rle_items').val();
	var num= $('#hdn_num_tbl_rle_items').val();
	var id_type_board= $('#hdn_id_type_board_tbl_rle_items').val();
	var id_algorithm= $('#hdn_id_algorithm_tbl_rle_items').val();

	
	if(data== "1")
	{
			
		fn_get_choice_rle_for_algorithm(id_algorithm,id_type_board,page,num);
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
						
}
					
function fn_hide_rle_item(id)
{
	fn_set_status_loading();
	jqXHR= $.post("../rle/hide_rle_item.php","id_rle_item="+encodeURIComponent(id),fn_success_hide_rle_item);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при изменении видимости пункта РЛЭ");
		$( "#error_dialog" ).dialog("open");
	});
}
					
function fn_success_hide_rle_item(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	
	var page= $('#hdn_page_tbl_rle_items').val();
	var num= $('#hdn_num_tbl_rle_items').val();
	var id_type_board= $('#hdn_id_type_board_tbl_rle_items').val();
	var id_algorithm= $('#hdn_id_algorithm_tbl_rle_items').val();
	
	
	if(data== "1")
	{

		fn_get_choice_rle_for_algorithm(id_algorithm,id_type_board,page,num);
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
}

function fn_btn_choice_file_html_rle_item_dialog_add_new_rle_item()
{
	type_choice_file= 5;
	fn_show_choice_file();
	$( '#choice_file_dialog' ).dialog('open');
}

function fn_btn_choice_file_pdf_rle_item_dialog_add_new_rle_item()
{
	type_choice_file= 6;
	fn_show_choice_file();
	$( '#choice_file_dialog' ).dialog('open');
}

function fn_btn_choice_file_html_rle_item_dialog_edit_rle_item()
{
	type_choice_file= 7;
	fn_show_choice_file();
	$( '#choice_file_dialog' ).dialog('open');
}

function fn_btn_choice_file_pdf_rle_item_dialog_edit_rle_item()
{
	type_choice_file= 8;
	fn_show_choice_file();
	$( '#choice_file_dialog' ).dialog('open');
}

function fn_btn_choice_dialog_choice_rle()
{
	var key_rle_item= $("#hdn_id_key_choice_rle_item").val(); 
	var id_rle_item= $("#hdn_id_choice_rle_item").val(); 
	var id_algorithm= $("#hdn_id_algorithm_tbl_rle_items").val(); 
	
	
	if($("#add_new_express_algorithm_dialog").dialog("isOpen"))
	{
		$("#path_rle_algorithm_dialog_add_new_express_algorithm").val(key_rle_item);
		$("#path_id_rle_algorithm_dialog_add_new_express_algorithm").val(id_rle_item);
	}
	else if($("#dialog_edit_algorithm").dialog("isOpen"))
	{
		$("#path_rle_algorithm_dialog_edit_algorithm").val(key_rle_item);
		$("#path_id_rle_algorithm_dialog_edit_algorithm").val(id_rle_item);
	}
	else
	{
		fn_set_status_loading();
		jqXHR= $.post("./change_ref_rle_item_algorithm.php","id_algorithm="+encodeURIComponent(id_algorithm)+"&key_rle_item="+encodeURIComponent(key_rle_item)+"&id_rle_item="+encodeURIComponent(id_rle_item),fn_success_change_ref_rle_item_algorithm);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при изменении зависимости с пунктом РЛЭ");
			$( "#error_dialog" ).dialog("open");
		});
	}
	
	$("#dialog_choice_rle").dialog("close");
}

function fn_success_change_ref_rle_item_algorithm(data,textStatus,jqXHR)
{
	if(data== "1")
	{
		$("#p_error_dialog").html("Зависимость с пунктом РЛЭ успешно обновлена");
		$( "#error_dialog" ).dialog("open");
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
	fn_clear_status_loading();
}

function fn_ref_rle_algorithm_preview(id_rle_item)
{
	if(id_rle_item != '')
	{
		fn_get_show_full_information_rle_item(id_rle_item);
	}
}

function fn_html_rle_item_preview(path)
{
	
	var path_html= $('#path_html_rle_item_dialog_add_new_rle_item').val();
	if(path)
	{
		window.open(path);
	}
	else
	{
		window.open(path_html);
	}
}

function fn_pdf_rle_item_preview(path)
{
	var path_pdf= $('#path_pdf_rle_item_dialog_add_new_rle_item').val();
	if(path)
	{
		window.open(path);
	}
	else
	{
		window.open(path_pdf);
	}
}




function fn_up_sign_algorithms(id)
{
	fn_set_status_loading();
                       
	jqXHR= $.post("./up_sign_algorithms.php","id_sign_algorithm="+encodeURIComponent(id),fn_success_up_sign_algorithm);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при изменении позиции модуля условных обозначений");
	$( "#error_dialog" ).dialog("open");});
}

function fn_success_up_sign_algorithm(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	
	var page= $('#hdn_page_tbl_sign_algorithms').val();
	var num= $('#hdn_num_tbl_sign_algorithms').val();
	var id_type_board= $('#hdn_id_type_board_tbl_sign_algorithms').val();
						
	if(data== "1")
	{
	
		fn_get_sign_algorithms(id_type_board,page,num);
		
		$("#p_error_dialog").html("Модуль условных обозначений успешно перемещен на одну позицию вверх");
		$( "#error_dialog" ).dialog("open");
							
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
						
}

function fn_down_sign_algorithms(id)
{
	fn_set_status_loading();
                       
	jqXHR= $.post("./down_sign_algorithms.php","id_sign_algorithm="+encodeURIComponent(id),fn_success_down_sign_algorithm);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при изменении позиции модуля условных обозначений");
	$( "#error_dialog" ).dialog("open");});
}

function fn_success_down_sign_algorithm(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	
	var page= $('#hdn_page_tbl_sign_algorithms').val();
	var num= $('#hdn_num_tbl_sign_algorithms').val();
	var id_type_board= $('#hdn_id_type_board_tbl_sign_algorithms').val();
						
	if(data== "1")
	{
	
		fn_get_sign_algorithms(id_type_board,page,num);
		
		$("#p_error_dialog").html("Модуль условных обозначений успешно перемещен на одну позицию вниз");
		$( "#error_dialog" ).dialog("open");
							
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
						
}

function fn_delete_sign_algorithms(id)
{
	if(confirm("Вы действительно хотите удалить данный модуль условных обозначений?"))
	{
		fn_set_status_loading();
		jqXHR= $.post("./delete_sign_algorithms.php","id_sign_algorithm="+encodeURIComponent(id),fn_success_delete_sign_algorithm);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при удалении модуля условных обозначений");
		$( "#error_dialog" ).dialog("open");});
	}
}
					
function fn_success_delete_sign_algorithm(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	var page= $('#hdn_page_tbl_sign_algorithms').val();
	var num= $('#hdn_num_tbl_sign_algorithms').val();
	var id_type_board= $('#hdn_id_type_board_tbl_sign_algorithms').val();
	if(data== "1")
	{
		fn_get_sign_algorithms(id_type_board,page,num);
		$("#p_error_dialog").html("Модуль условных обозначений успешно удален");
		$( "#error_dialog" ).dialog("open");
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
						
}


function fn_show_sign_algorithms(id)
{
	fn_set_status_loading();
	jqXHR= $.post("./show_sign_algorithms.php","id_sign_algorithm="+encodeURIComponent(id),fn_success_show_sign_algorithm);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при изменении видимости модуля условных обозначений");
		$( "#error_dialog" ).dialog("open");
	});
}
					
function fn_success_show_sign_algorithm(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	
	var page= $('#hdn_page_tbl_sign_algorithms').val();
	var num= $('#hdn_num_tbl_sign_algorithms').val();
	var id_type_board= $('#hdn_id_type_board_tbl_sign_algorithms').val();
	
	if(data== "1")
	{
		fn_get_sign_algorithms(id_type_board,page,num);
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
						
}
					
function fn_hide_sign_algorithms(id)
{
	fn_set_status_loading();
	jqXHR= $.post("./hide_sign_algorithms.php","id_sign_algorithm="+encodeURIComponent(id),fn_success_hide_sign_algorithm);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при изменении видимости модуля условных обозначений");
		$( "#error_dialog" ).dialog("open");
	});
}
					
function fn_success_hide_sign_algorithm(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	
	var page= $('#hdn_page_tbl_sign_algorithms').val();
	var num= $('#hdn_num_tbl_sign_algorithms').val();
	var id_type_board= $('#hdn_id_type_board_tbl_sign_algorithms').val();
	
	if(data== "1")
	{
		fn_get_sign_algorithms(id_type_board,page,num);
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
}