		
$(function(){
$("#td_content_block").css("display","table-cell");

	fn_tinymce_ro();
	$("#btn_save").button();
	$("#btn_preview").button();
        $("#btn_images").button().click("on", function(){fn_show_choice_picture();
							$( "#pic" ).dialog( "open" ).dialog( "moveToTop" );});
	
							$( "#btn_error_dialog" ).button().on( "click", function() {
							$( "#error_dialog" ).dialog("close");
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
	
});

function fn_press_btn_choice_image()
					{
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
						//jqXHR = $.post("./../utils/getpictures.php",,fn_success_get_pictures);
						jqXHR.fail(function(){fn_clear_status_loading();$( "#error_check_user_enter" ).dialog("open");});
					}
					
					function fn_success_get_pictures(data,textStatus,jqXHR)
					{
						$('#pic button').qtip('destroy');
						$('#pic .image_image').qtip('destroy');
						$('#pic .folder_image').qtip('destroy');
						
						fn_clear_status_loading();
						$("#pic").html(data);
					}
					
					

					function fn_tinymce_ro()
					{
							tinymce.init({
							selector: "#ro",
							theme: "modern",
							//width: 500,
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



function fn_preview()
{
	var content = tinyMCE.editors["ro"].getContent();
	
	fn_set_status_loading();
                       
	jqXHR = $.post("./preview.php","content="+encodeURIComponent(content),fn_success_preview);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при предпросмотре РО");
	$( "#error_dialog" ).dialog("open");});
}

function fn_success_preview(data,textStatus,jqXHR)
{
	fn_clear_status_loading();

	if(data == "1")
	{
		//$("#p_error_dialog").html("РО успешно сохранено");
		//$( "#error_dialog" ).dialog("open");
		//$( "#edit_block_menu" ).dialog("close");
		window.open("trend_18_ro_temp.html");
	}
	else
	{
		$("#p_error_dialog").html(data);
		$( "#error_dialog" ).dialog("open");
	}
						
}

function fn_save()
{
	var content = tinyMCE.editors["ro"].getContent();
	
	fn_set_status_loading();
                       
	jqXHR = $.post("./save.php","content="+encodeURIComponent(content),fn_success_save);
	jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при сохранении РО");
	$( "#error_dialog" ).dialog("open");});
}

function fn_success_save(data,textStatus,jqXHR)
{
	fn_clear_status_loading();

	if(data == "1")
	{
		$("#p_error_dialog").html("РО успешно сохранено");
		$( "#error_dialog" ).dialog("open");
		$( "#edit_block_menu" ).dialog("close");
		//window.open("trend_18_ro_temp.html");
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
