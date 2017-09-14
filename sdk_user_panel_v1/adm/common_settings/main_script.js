$(function(){		
					
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
	
	$("#btn_error_dialog").button().on('click',function(){
		$( "#error_dialog" ).dialog('close');
	});
	
	$("#td_content_block").css("display","table-cell");
	
	$(".btn").button();
});
														
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

function fn_change_state_checkbox_common_setting(id,el)
{
	var status = "0";
	var jqXHR = null;
	
	if(el.checked)
	{
		status = "1";
	}
	
	if(id < 1)
	{
		$("#p_error_dialog").html("Произошла ошибка при изменении настройки");
		$( "#error_dialog" ).dialog('open');
	}
	else
	{
		fn_set_status_loading();
		
		jqXHR = $.post("./change_state_checkbox_common_setting.php","id="+encodeURIComponent(id)+"&status="+encodeURIComponent(status),fn_success_change_state_checkbox_common_setting);
		jqXHR.fail(function(){
			fn_clear_status_loading();
			$("#p_error_dialog").html("Произошла ошибка при изменении настройки");
			$("#error_dialog").dialog("open");
		});
	}
}

function fn_success_change_state_checkbox_common_setting(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	if(data=="1")
	{
		$("#p_error_dialog").html("Настройка успешно изменена");
		$("#error_dialog").dialog("open");
	}
	else
	{
		$("#p_error_dialog").html(data);
		$("#error_dialog").dialog("open");
	}
}

function fn_change_version_sdk()
{
	var version = $('#version_sdk').val();
	var id = 1;
	
	var expVersion = new RegExp("^[0-9]+\.[0-9]+\.[0-9]+\.[0-9]+$");
	
	if(!expVersion.test(version))
	{
		$("#p_error_dialog").html("Версия программы должна иметь формат 'число.число.число.число'");
		$("#error_dialog").dialog("open");
	}
	else
	{
		fn_set_status_loading();
		
		jqXHR = $.post("./change_value_textbox_common_setting.php","id="+encodeURIComponent(id)+"&value="+encodeURIComponent(version),fn_success_change_value_textbox_common_setting);
		jqXHR.fail(function(){
			fn_clear_status_loading();
			$("#p_error_dialog").html("Произошла ошибка при изменении значения");
			$("#error_dialog").dialog("open");
		});
	}
}

function fn_success_change_value_textbox_common_setting(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	if(data=="1")
	{
		$("#p_error_dialog").html("Значение успешно изменено");
		$("#error_dialog").dialog("open");
	}
	else
	{
		$("#p_error_dialog").html(data);
		$("#error_dialog").dialog("open");
	}
}


					