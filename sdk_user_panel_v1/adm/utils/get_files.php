<?php

	error_reporting(E_ALL & ~E_NOTICE);
	
	
	//$server_name = "http://
	
function selfURL(){
    if(!isset($_SERVER['REQUEST_URI']))    $suri = $_SERVER['PHP_SELF'];
    else $suri = $_SERVER['REQUEST_URI'];
    $s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
    $sp=strtolower($_SERVER["SERVER_PROTOCOL"]);
    $pr =    substr($sp,0,strpos($sp,"/")).$s;
    $pt = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
    return $pr."://".$_SERVER['SERVER_NAME'].$pt.$suri;
}
	$parent_url = selfURL();
	$pos = strripos($parent_url,"/");
	$parent_url = substr($parent_url,0,$pos);
	
	
	
	if(empty($_POST['main_folder']))
	{
		$main_folder = "";	
		$is_main = 1;
		$style_dis = "disabled";
		
	} 
	else
	{
		$main_folder = $_POST['main_folder']."/";
		$is_main = 0;
		$style_dis = "";
	}
	
	$main_folder_file = "./../../documents/general_adm/".$main_folder;
	
	$dir = opendir($main_folder_file);
	
	
	
	$folders = array();
	$count_f = 0;
	$files = array(); 
	$count_i = 0;
	
	$high_toolbar = "<div id='high_toolbar_choice_files_get_files' style='width:100%;'>
		<table>
			<tr>
				<td><button id='btn_up_folder_get_files' style='width:25px;height:25px;' $style_dis>..</button></td>
				<td><button id='btn_create_folder_get_files' style='width:25px;height:25px;'>Создать папку</button></td>
				<td><button id='btn_upload_file_get_files' style='width:25px;height:25px;'>Загрузить файл</button></td>
				<td><button id='btn_update_get_files' style='width:25px;height:25px;'>Обновить</button></td>
				<td><button id='btn_delete_get_files' style='width:25px;height:25px;'>Удалить</button></td>
				<td><button id='btn_rename_get_files' style='width:25px;height:25px;'>Переименовать</button></td>
				<td>
					<div style=\"height:25px;\">
						<div style=\"padding:0px;margin:0px;float:left;height:100%;\">
							<input id='path_coice_file_get_files' type=\"textbox\" style=\"width: 400px;height:100%;padding:0px;background: #f0efee;border:none;border:1px solid black;padding:0px;margin:0px;\" value=\"$main_folder\" disabled>
						</div>
						<div id='choice_file_preview' style=\"display:none;cursor:pointer;width:25px; height:100%;padding:0px;margin:0px;float:left;background:#f0efee url('../../styles/images/preview_icon.png') center no-repeat;border:1px solid black;border-left:none;\">
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan=5><progress id='progress_upload_file_get_files' style='width:100%;display:none;'></progress></td>
			</tr>
		</table>
	</div>";
	$res = "<div><ul style='width: 650px;height:500px; overflow:scroll;border:1px solid black;list-style-type:none;font-weight:bold;font-family:Arial; font-size:0.8em;'>";
	$folders_html = "";
	$images_html = "";
	
	$script_before = "<script type='text/javascript'>
	</script>";
	
	
	while(($file = readdir($dir)) !== false)
	{
		//$file = iconv('CP1251','UTF-8',$file );
		
		$short_file = substr($file,0,10);
		
		if(strlen($file) > 10)
		{
			$short_file .= "...";
		}
		if(is_dir($main_folder_file.$file))
		{
			
			if(($file != ".") && ($file != ".."))
			{
				$folders[$count_f] = $main_folder_file.$file;
				$count_f++;
				
				$folders_html .= "<li class='folder_file_get_files' onmouseover='$(this).css(\"background\",\"#e2e0de\");' onmouseout='$(this).css(\"background\",\"transparent\");' style='cursor:pointer;width:100px;height:100px;background:transparent; float:left;padding:10px;margin:10px;text-align:center;border:1px solid silver;'>
								<div>
									<img src='../../styles/images/folder_icon.png' style='padding: 0px;width:60px; height:60px;' >
								</div>
								<div>
									".$short_file."
								</div>
								<input type='hidden' value='$main_folder"."$file'>
							</li>";
			}
		}
		else
		{
			$pos = strripos($file,".");
			if($pos != false)
			{
				
				$str = strtolower(substr($file,$pos));
				
				$document_icon = "";
				
				if($str == ".pdf")
				{
					$document_icon = '../../styles/images/pdf_document_icon.png';
				}
				
				if(($str == ".htm") || ($str == ".html"))
				{
					$document_icon = '../../styles/images/html_document_icon.png';
				}
				
				if(($str == ".rar"))
				{
					$document_icon = '../../styles/images/rar_document_icon.png';
				}
				
				if(($str == ".zip"))
				{
					$document_icon = '../../styles/images/zip_document_icon.png';
				}
				
				
				if($document_icon != "")
				{
					$files[$count_i] = $main_folder.$file;
					$count_i++;
					$href = "../../documents/general_adm/".$main_folder.$file;
					$files_html .= "<li class='file_get_files' onmouseover='$(this).css(\"background\",\"#e2e0de\");' onmouseout='$(this).css(\"background\",\"transparent\");' style='width:100px;height:100px;background:transparent; float:left;padding:10px;margin:10px;text-align:center;border:1px solid silver;cursor:pointer;'>
								<div>
									<img src='$document_icon' style='padding: 0px;width:60px; height:60px;' >
								</div>
								<div>
									".$short_file."
								</div>
								<input type='hidden' value='$main_folder"."$file'>
							</li>";
					
				}
			}
		}
	}		
	$res .= $script_before;		
	$res .= $folders_html;		
	$res .= $files_html;					
	$res .= "</ul></div><div style='width:100%;text-align:center;'><button id='btn_ok_choice_file_get_files'>Выбрать</button></div>";
	
	
	$script = "<script type='text/javascript'>
		var path_choice_get_files = '';
		
		function fn_delete_file_get_files(path_file)
		{
			if(confirm('Вы действительно хотите удалить выбранный элемент?'))
			{
				if(path_file=='')
				{
					$('#p_error_dialog').html('Не выбран элемент для удаления');
					$( '#error_dialog').dialog('open');
				}
				else
				{
					fn_set_status_loading();
					jqXHR = $.post('../utils/delete_file.php','path_file='+encodeURIComponent(path_file),fn_success_delete_file_get_files);
					jqXHR.fail(function(){fn_clear_status_loading();$('#p_error_dialog').html('Ошибка при удалении выбранного элемента');
						$('#error_dialog').dialog('open');
					});
				}
			}
		}
		
		function fn_success_delete_file_get_files(data,textStatus,jqXHR)
		{
			fn_clear_status_loading();
			if(data == '1')
			{
				$('#btn_update_get_files').click();
				$('#p_error_dialog').html('Элемент успешно удален');
				$( '#error_dialog').dialog('open');
				
			}
			else
			{
				$('#p_error_dialog').html(data);
				$( '#error_dialog').dialog('open');
			}
		}
		
		
		function fn_rename_file_get_files(path_file)
		{
			if(path_file == '')
			{
				$('#p_error_dialog').html('Не выбран элемент для переименования');
				$( '#error_dialog').dialog('open');
			}
			else
			{
				var pos = path_file.lastIndexOf('/'); 
				var name = path_file.substr(pos+1,path_file.length-pos);
				pos = name.lastIndexOf('.');
				if(pos >= 0)
				{
					name = name.substr(0,pos);
				}
				
				$('#name_renamed_get_files').val(name);
			
				$('#dialog_rename_get_files').dialog('open');
			}
		}
		
		function fn_ok_rename_file_get_files()
		{
			var path_file = $('#path_coice_file_get_files').val();
			var new_name = $('#name_renamed_get_files').val();
			
			$('#error_in_rename_dialog_get_files').html('');
						
			var exp_new_name = new RegExp('^[a-zA-Zа-яА-Я_0-9\\-]+\$');
			
			var pos = path_file.lastIndexOf('/'); 
			var path = path_file.substr(0,pos+1);
			
			var pos = path_file.lastIndexOf('.'); 
			
			var ext = '';
			
			if(pos >= 0)
			{
				ext = path_file.substr(pos,path_file.length-pos);
			}
			
			
			

			if(exp_new_name.test(new_name))
			{
				if(path_file=='')
				{
					$('#p_error_dialog').html('Не выбран элемент для удаления');
					$( '#error_dialog').dialog('open');
				}
				else
				{
					fn_set_status_loading();
					jqXHR = $.post('../utils/rename_file.php','path_file='+encodeURIComponent(path_file)+'&new_name='+encodeURIComponent(new_name)+'&ext='+encodeURIComponent(ext)+'&path='+encodeURIComponent(path),fn_success_rename_file_get_files);
					jqXHR.fail(function(){fn_clear_status_loading();$('#p_error_dialog').html('Ошибка при удалении выбранного элемента');
						$('#error_dialog').dialog('open');
					});
				}
			}
			else
			{
				var error = 'Введенное имя недопустимо';
				$('#error_in_rename_dialog_get_files').html(error);
			}
		}
		
		
		
		function fn_success_rename_file_get_files(data,textStatus,jqXHR)
		{
			fn_clear_status_loading();
			if(data == '1')
			{
				$('#btn_update_get_files').click();
				$('#p_error_dialog').html('Элемент успешно переименован');
				$( '#dialog_rename_get_files').dialog('close');
				$( '#error_dialog').dialog('open');
				
			}
			else
			{
				$('#p_error_dialog').html(data);
				$( '#error_dialog').dialog('open');
			}
		}
		
		
		function fn_file_dblclick_get_files(url_file)
		{
			url_file = '$parent_url'+'/../../documents/general_adm/'+url_file;
			window.open(url_file);
		}
		$('.folder_file_get_files').dblclick('on',function(){
							fn_show_choice_file($(this).children('input').val());
					});

					$('.file_get_files').click('on',function(){
							$('.folder_file_get_files').css('border','1px solid silver');
							$('.file_get_files').css('border','1px solid silver');
							$(this).css('border','1px solid blue');
							$('#path_coice_file_get_files').val('../../documents/general_adm/'+$(this).children('input').val());
						
					});
					
					$('.folder_file_get_files').click('on',function(){
							$('.folder_file_get_files').css('border','1px solid silver');
							$('.file_get_files').css('border','1px solid silver');
							$(this).css('border','1px solid blue');
							$('#path_coice_file_get_files').val('../../documents/general_adm/'+$(this).children('input').val());
						
					});
					
					$('#btn_delete_get_files').click('on',function(){
							fn_delete_file_get_files($('#path_coice_file_get_files').val());
					});
					
					$('#btn_rename_get_files').click('on',function(){
							fn_rename_file_get_files($('#path_coice_file_get_files').val());
					});
					
					$('.file_get_files').dblclick('on',function(){
							fn_file_dblclick_get_files($(this).children('input').val());
					});
					
					
						for(var i = 0; i < $('.folder_file_get_files').length; i++)
						{
							var name = $('.folder_file_get_files').eq(i).children('input').val();
							var ind = name.lastIndexOf('/',name.length);
							var short_name = name;
							if((ind > 0) && (ind+1 < name.length))
							{
								short_name = name.substr(ind+1,name.length-ind-1);
								
							}
							
							$('.folder_file_get_files').eq(i).qtip({
									 content: {
										text: short_name,
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
										classes: 'qtip-dark',
										width: 300
									}
								});	
							
						}
						
						for(var i = 0; i < $('.file_get_files').length; i++)
						{
							var name = $('.file_get_files').eq(i).children('input').val();
							var ind = name.lastIndexOf('/',name.length);
							var short_name = name;
							if((ind > 0) && (ind+1 < name.length))
							{
								short_name = name.substr(ind+1,name.length-ind-1);
								
							}
							
							$('.file_get_files').eq(i).qtip({
									 content: {
										text: short_name,
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
										classes: 'qtip-dark',
										width: 300
									}
								});	
							
						}
						
						$('#btn_up_folder_get_files').qtip({
									 content: {
										text: 'Перейти к родительской директории',
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
										classes: 'qtip-dark',
										width: 300
									}
								});	
								
								$('#btn_create_folder_get_files').qtip({
									 content: {
										text: 'Создать новую директорию',
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
										classes: 'qtip-dark',
										width: 300
									}
								});	
							
							$('#btn_upload_file_get_files').qtip({
									 content: {
										text: 'Загрузить файл',
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
										classes: 'qtip-dark',
										width: 300
									}
								});	
						
						
						$('#btn_update_get_files').qtip({
									 content: {
										text: 'Обновить',
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
										classes: 'qtip-dark',
										width: 300
									}
								});	
						
					$('#btn_delete_get_files').qtip({
									 content: {
										text: 'Удалить текущий выбранный элемент',
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
										classes: 'qtip-dark',
										width: 300
									}
								});	
								
								$('#btn_rename_get_files').qtip({
									 content: {
										text: 'Переименовать текущий выбранный элемент',
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
										classes: 'qtip-dark',
										width: 300
									}
								});	
					
						$( '#btn_up_folder_get_files' ).button({
					icons: {
					primary: 'ui-icon-circle-arrow-n'
					},
					text: false
					});
					
						$( '#btn_create_folder_get_files' ).button({
					icons: {
					primary: 'ui-icon-plus'
					},
					text: false
					});
					
						$('#btn_upload_file_get_files' ).button({
					icons: {
					primary: 'ui-icon-circle-arrow-s'
					},
					text: false
					});
					
						$('#btn_delete_get_files' ).button({
					icons: {
					primary: 'ui-icon-close'
					},
					text: false
					});
					
						$('#btn_rename_get_files' ).button({
					icons: {
					primary: 'ui-icon-pencil'
					},
					text: false
					});
					
					$('#btn_ok_choice_file_get_files' ).button();
					
					
					
					$('#btn_ok_choice_file_get_files' ).click('on',function(){
						$('#path_choice_file').val($('#path_coice_file_get_files').val());
						fn_press_btn_choice_file($('#path_coice_file_get_files').val());
					
					});
					
					
					
					
				$('#btn_update_get_files' ).button({
					icons: {
					primary: 'ui-icon-refresh'
					},
					text: false
					});
					
					
					$('#btn_up_folder_get_files').click('on',function(){
						var folder = '$main_folder';
						var ind = folder.lastIndexOf('/',folder.length-2);
						var parent = '';
						if(ind > 0)
						{
							parent = folder.substr(0,ind);
						}

						fn_show_choice_file(parent);
					});
					
					$('#btn_update_get_files').click('on',function(){
							var folder = '$main_folder';
							var ind = folder.lastIndexOf('/',folder.length-1);
	
						    if(ind == folder.length-1)
						    {
							  folder = folder.substr(0,folder.length-1);
						    }

							fn_show_choice_file(folder);
					});
					
					$('#btn_create_folder_get_files').click('on',function(){

						$('#dialog_create_folder_get_files').dialog('open');
						
					});
					$('#btn_dialog_rename_get_files').button();
					$('#btn_dialog_create_folder_get_files').button().click('on',fn_create_folder);
					
					function fn_success_create_file_folder_get_files(data,textStatus,jqXHR)
					{
						fn_clear_status_loading();
						$('#dialog_create_folder_get_files').dialog('close');
						fn_show_choice_file('$main_folder');
					}
					
					var status_upload_file = false;
					
					$('#btn_upload_file_get_files').click('on',function(){
						$('#file_for_upload_get_files').click();
						status_upload_file = true;
					});
					
					$('#file_for_upload_get_files').change('on',function(){
						fn_upload_file_get_files();
					});
					
					
					function fn_create_folder()
					{
						$('#error_in_create_folder_dialog_get_files').html('');
						
						var folder_name = $('#name_created_file_folder_get_files').val();
						
						var exp_folder_name = new RegExp('^[a-zA-Zа-яА-Я_0-9\\-]+\$');

						if(exp_folder_name.test(folder_name))
						{
							fn_set_status_loading();
							
							jqXHR = $.post('./../utils/create_file_folder.php','folder_name='+encodeURIComponent($('#name_created_file_folder_get_files').val())+'&folder_parent='+encodeURIComponent('$main_folder'),fn_success_create_file_folder_get_files);
		
							jqXHR.fail(function(){fn_clear_status_loading();});
						}
						else
						{
							var error = 'Недопустимое имя директории';
							$('#error_in_create_folder_dialog_get_files').html(error);
							
						}
					}
					
					function fn_upload_file_get_files()
					{
						$('#progress_upload_file_get_files').css('display','block');
						var formData = new FormData($('#form_for_upload_file_get_files')[0]);
						$.ajax({
							url: './../utils/upload_file.php',  //Server script to process data
							type: 'POST',
							xhr: function() {  // Custom XMLHttpRequest
								var myXhr = $.ajaxSettings.xhr();
								if(myXhr.upload){ // Check if upload property exists
								myXhr.upload.addEventListener('progress',progress_upload_file_get_files, false); // For handling the progress of the upload
								}
								return myXhr;
							},
							//Ajax events
							//beforeSend: beforeSendHandler,
							success: fn_complete_upload_file_get_files,
							//error: errorHandler,
							// Form data
							data: formData,
							//Options to tell jQuery not to process data or worry about content-type.
							cache: false,
							contentType: false,
							processData: false
						});
					}
  
  
				  function progress_upload_file_get_files(e){
					if(e.lengthComputable){
						$('#progress_upload_file_get_files').attr({value:e.loaded,max:e.total});
					}
				  }
					function fn_complete_upload_file_get_files()
					{
							$('#progress_upload_file_get_files').css('display','none');
							var folder = '$main_folder';
							var ind = folder.lastIndexOf('/',folder.length-1);
	
						    if(ind == folder.length-1)
						    {
							  folder = folder.substr(0,folder.length-1);
						    }

							fn_show_choice_file(folder);
					}
					
					$('#dialog_create_folder_get_files').dialog({
						autoOpen: false,
						height: 250,
						width: 600,
						modal: true,
						resizable:false,
						dialogClass: 'none_header_dialog',
						close: function(){

						},
					});
					
					$('#dialog_rename_get_files').dialog({
						autoOpen: false,
						height: 250,
						width: 600,
						modal: true,
						resizable:false,
						dialogClass: 'none_header_dialog',
						close: function(){

						},
					});
					
					$('#name_created_file_folder_get_files,#name_renamed_get_files').qtip({
									 content: {
										text: \"Для имени допустимы буквы латинского и русскуго алфавитов, а также символы '_' и '-'\",
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
										classes: 'qtip-dark',
										width: 300
									}
								});	
	
	</script>";
	
	$dialod_create_folder = "<div id='dialog_create_folder_get_files'>
		<table style='width:100%'>
			<tr>
				<td colspan=2 style='color:red;'><p id='error_in_create_folder_dialog_get_files'></p></td>
			</tr>
			<tr>
				<td style='background:#f8baa1;font-weight:bold; padding:10px;width:200px;border:1px solid #5a1f08;'>Имя директории:</td>
				<td style='border:1px solid #5a1f08;text-align:center;'><input type='text' style='width:90%;' id='name_created_file_folder_get_files'></td>
			</tr>
			<tr>
				<td colspan=2 style='text-align:center;padding-top:20px;'><button id='btn_dialog_create_folder_get_files'>Создать</button></td>
			</tr>
		
		
		</table></div>";
		
	$dialod_rename_folder = "<div id='dialog_rename_get_files'>
		<table style='width:100%'>
			<tr>
				<td colspan=2 style='color:red;'><p id='error_in_rename_dialog_get_files'></p></td>
			</tr>
			<tr>
				<td style='background:#f8baa1;font-weight:bold; padding:10px;width:200px;border:1px solid #5a1f08;'>Введите новое имя:</td>
				<td style='border:1px solid #5a1f08;text-align:center;'><input type='text' style='width:90%;' id='name_renamed_get_files'></td>
			</tr>
			<tr>
				<td colspan=2 style='text-align:center;padding-top:20px;'><button id='btn_dialog_rename_get_files' onclick='fn_ok_rename_file_get_files();'>Переименовать</button></td>
			</tr>
		
		
		</table></div>";
		
	$res .= "<form id='form_for_upload_file_get_files'><input name='main_folder' type='hidden' value='$main_folder'>
			<input type='file' name='file_for_upload_get_files' id='file_for_upload_get_files' style='display:none;'></form>
			
				<style type='text/css'>

				</style>
			";
			
	$res .= $dialod_create_folder;
	$res .= $dialod_rename_folder;
	$res .= $script;
	echo $high_toolbar.$res;

	
?>