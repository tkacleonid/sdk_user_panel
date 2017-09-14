$(function(){
	$("#btn_edit_hasp_user_data").button();
	$("#btn_save_edit_hasp_user_information_dialog").button();
	
	$("#edit_hasp_user_information_dialog" ).dialog({
		autoOpen: false,
		height: 800,
		width: 900,
		modal: true,
		resizable:true,
		dialogClass:"none_header_dialog",
		title: "Редактирование информации",
		close:function(){
								
			}
	});
});

function fn_get_edit_hasp_user_information()
{
	$("#edit_hasp_user_information_dialog").dialog('open');
}

function fn_save_edit_hasp_user_information()
{
	$("#error_edit_hasp_user_information_dialog").html("");

	var hasp_id = $("#hdn_hasp_id").val();
	var company_name = $("#company_name_edit_hasp_user_information_dialog").val();
	var company_address = $("#address_edit_hasp_user_information_dialog").val();
	var company_email = $("#email_edit_hasp_user_information_dialog").val();
	var company_tel = $("#tel_edit_hasp_user_information_dialog").val();
	var company_comment = $("#user_cooment_edit_hasp_user_information_dialog").val();
	
	var str_error = "";
	var jqXHR;
	
	if(str_error == "")
	{
		fn_set_status_loading();
		jqXHR = $.post("./save_edit_hasp_user_information.php","hasp_id="+encodeURIComponent(hasp_id)+"&company_name="+encodeURIComponent(company_name)+"&company_address="+encodeURIComponent(company_address)+"&company_email="+encodeURIComponent(company_email)+"&company_tel="+encodeURIComponent(company_tel)+"&company_comment="+encodeURIComponent(company_comment),fn_success_save_edit_hasp_user_information);
		jqXHR.fail(function(){
			fn_clear_status_loading();
			$("#p_error_dialog").html("Произошла ошибка при сохранении данных.");
			$("#error_dialog").dialog("open");
		});
	}
	
	
}

function fn_success_save_edit_hasp_user_information(data,textStatus,jqXHR)
{
	fn_clear_status_loading();
	if(data != "1")
	{
		$("#p_error_dialog").html(data);
		$("#error_dialog").dialog("open");
	}
	else
	{
		document.location.reload();
	}
}