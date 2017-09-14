<?php

	error_reporting(E_ALL & ~E_NOTICE);
	
	
	//$server_name = "http://
	
	
	
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
	$main_folder = str_replace("//","/",$main_folder);
	
	$main_folder_short = "./../../pictures/images_short/".$main_folder;
	$main_folder_full = "./../../pictures/images_full/".$main_folder;
	
	$dir = opendir($main_folder_full);
	
	$folders = array();
	$count_f = 0;
	$images = array(); 
	$count_i = 0;
	
	$high_toolbar = "<div id='high_toolbar_choice_image' style='width:100%;'>
		<table>
			<tr>
				<td><button id='btn_up_folder_image' style='width:25px;height:25px;' $style_dis>..</button></td>
				<td><button id='btn_create_folder_image' style='width:25px;height:25px;'>Создать папку</button></td>
				<td><button id='btn_upload_image' style='width:25px;height:25px;'>Загрузить изображение</button></td>
				<td><button id='btn_update_image' style='width:25px;height:25px;'>Обновить</button></td>
				<td>
					<div style=\"height:25px;\">
						<div style=\"padding:0px;margin:0px;float:left;height:100%;\">
							<input id='path_coice_image' type=\"textbox\" style=\"width: 500px;height:100%;padding:0px;background: #f0efee;border:none;border:1px solid black;padding:0px;margin:0px;\" value=\"$main_folder\">
						</div>
						<div id='choice_image_preview' style=\"cursor:pointer;width:25px; height:100%;padding:0px;margin:0px;float:left;display:inline;background:#f0efee url('../../styles/images/preview_icon.png') center no-repeat;border:1px solid black;border-left:none;\">

						</div>
					</div>
				</td>
			</tr>
			<tr>
				<td colspan=5><progress id='progress_upload_image_file' style='width:100%;display:none;'></progress></td>
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
		if(is_dir($main_folder_full.$file))
		{
			if(($file != ".") && ($file != ".."))
			{
				$folders[$count_f] = $main_folder_full.$file;
				$count_f++;
				
				$folders_html .= "<li class='folder_image' onmouseover='$(this).css(\"background\",\"#e2e0de\");' onmouseout='$(this).css(\"background\",\"transparent\");' style='cursor:pointer;width:100px;height:100px;background:transparent; float:left;padding:10px;margin:10px;text-align:center;border:1px solid silver;'>
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
				if(($str == ".jpg") || ($str == ".png") || ($str == ".gif") || ($str == ".jpeg"))
				{
					$images[$count_i] = $main_folder.$file;
					$count_i++;
					
					$images_html .= "<li class='image_image' onmouseover='$(this).css(\"background\",\"#e2e0de\");' onmouseout='$(this).css(\"background\",\"transparent\");' style='width:100px;height:100px;background:transparent; float:left;padding:10px;margin:10px;text-align:center;border:1px solid silver;cursor:pointer;'>
								<div>
									<img src='$main_folder_short".$file."' style='padding: 0px;width:60px; height:60px;' >
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
	$res .= $images_html;					
	$res .= "</ul></div><div style='width:100%;text-align:center;'><button id='btn_ok_choice_image'>Выбрать</button></div>";
	
	
	$script = "<script type='text/javascript'>
		
		           $('.folder_image').dblclick('on',function(){
							
							fn_show_choice_picture($(this).children('input').val());
						
					});
					$('.image_image').click('on',function(){
							$('.image_image').css('border','1px solid silver');
							$(this).css('border','1px solid blue');
							$('#path_coice_image').val('../../pictures/images_full/'+$(this).children('input').val());
						
					});
					
					
					
					$('.image_image').dblclick('on',function(){
							fn_show_full_image($(this).children('input').val());
						
					});
					
					function fn_show_full_image(img_name)
					{
							//$('#show_full_image').dialog('open');
						
							$.magnificPopup.open({
								  items: {
									src: ('"."../../pictures/images_full/'"."+img_name) 
								  },
								  type: 'image',
								  preloader: true,
								  preload: 1,
								});
											
						
					}
						for(var i = 0; i < $('.folder_image').length; i++)
						{
							var name = $('.folder_image').eq(i).children('input').val();
							var ind = name.lastIndexOf('/',name.length);
							var short_name = name;
							if((ind > 0) && (ind+1 < name.length))
							{
								short_name = name.substr(ind+1,name.length-ind-1);
								
							}
							
							$('.folder_image').eq(i).qtip({
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
						
						for(var i = 0; i < $('.image_image').length; i++)
						{
							var name = $('.image_image').eq(i).children('input').val();
							var ind = name.lastIndexOf('/',name.length);
							var short_name = name;
							if((ind > 0) && (ind+1 < name.length))
							{
								short_name = name.substr(ind+1,name.length-ind-1);
								
							}
							
							$('.image_image').eq(i).qtip({
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
						
						$('#btn_up_folder_image').qtip({
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
								
								$('#btn_create_folder_image').qtip({
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
							
							$('#btn_upload_image').qtip({
									 content: {
										text: 'Загрузить изображение',
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
						
						
						$('#btn_update_image').qtip({
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
						
					
					
						$( '#btn_up_folder_image' ).button({
					icons: {
					primary: 'ui-icon-circle-arrow-n'
					},
					text: false
					});
					
						$( '#btn_create_folder_image' ).button({
					icons: {
					primary: 'ui-icon-plus'
					},
					text: false
					});
					
						$('#btn_upload_image' ).button({
					icons: {
					primary: 'ui-icon-circle-arrow-s'
					},
					text: false
					});
					
					$('#btn_ok_choice_image' ).button();
					
					
					$('#btn_ok_choice_image' ).click('on',function(){
						$('#path_choice_image').val($('#path_coice_image').val());
						fn_press_btn_choice_image();
					
					});
					
					
					
					
						$('#btn_update_image' ).button({
					icons: {
					primary: 'ui-icon-refresh'
					},
					text: false
					});
					
					
					$('#btn_up_folder_image').click('on',function(){
						var folder = '$main_folder';
						var ind = folder.lastIndexOf('/',folder.length-2);
						var parent = '';
						if(ind > 0)
						{
							parent = folder.substr(0,ind);
						}

						fn_show_choice_picture(parent);
					});
					
					$('#btn_update_image').click('on',function(){
							var folder = '$main_folder';
							var ind = folder.lastIndexOf('/',folder.length-1);
	
						    if(ind == folder.length-1)
						    {
							  folder = folder.substr(0,folder.length-1);
						    }

							fn_show_choice_picture(folder);
					});
					
					$('#btn_create_folder_image').click('on',function(){

						$('#dialog_create_folder').dialog('open');
						
					});
					$('#btn_dialog_create_folder').button();

					
					function fn_create_image_folder()
					{
						fn_set_status_loading();
						

						if(true)
						{
							jqXHR = $.post('./../utils/create_image_folder.php','folder_name='+encodeURIComponent($('#name_created_image_folder').val())+'&folder_parent='+encodeURIComponent('$main_folder'),fn_success_create_image_folder);
						}

						jqXHR.fail(function(){fn_clear_status_loading();$( '#error_check_user_enter' ).dialog('open');});
						
					}
					
					function fn_success_create_image_folder(data,textStatus,jqXHR)
					{
						fn_clear_status_loading();
						fn_show_choice_picture('$main_folder');
					}
					
					var status_upload_file = false;
					
					$('#btn_upload_image').click('on',function(){
						$('#file_for_upload').click();
						status_upload_file = true;
					});
					
					$('#file_for_upload').change('on',function(){
						fn_upload_image_file();
					});
					
					
					
					
					function fn_upload_image_file()
					{
						$('#progress_upload_image_file').css('display','block');
						var formData = new FormData($('#form_for_upload_image_file')[0]);
						$.ajax({
							url: './../utils/upload_image_file.php',  //Server script to process data
							type: 'POST',
							xhr: function() {  // Custom XMLHttpRequest
								var myXhr = $.ajaxSettings.xhr();
								if(myXhr.upload){ // Check if upload property exists
								myXhr.upload.addEventListener('progress',progress_upload_image_file, false); // For handling the progress of the upload
								}
								return myXhr;
							},
							//Ajax events
							//beforeSend: beforeSendHandler,
							success: fn_complete_upload_file,
							//error: errorHandler,
							// Form data
							data: formData,
							//Options to tell jQuery not to process data or worry about content-type.
							cache: false,
							contentType: false,
							processData: false
						});
					}
  
  
				  function progress_upload_image_file(e){
					if(e.lengthComputable){
						$('#progress_upload_image_file').attr({value:e.loaded,max:e.total});
					}
				  }
					function fn_complete_upload_file()
					{
							$('#progress_upload_image_file').css('display','none');
							var folder = '$main_folder';
							var ind = folder.lastIndexOf('/',folder.length-1);
	
						    if(ind == folder.length-1)
						    {
							  folder = folder.substr(0,folder.length-1);
						    }

							fn_show_choice_picture(folder);
					}
					
					$('#dialog_create_folder').dialog({
						autoOpen: false,
						height: 200,
						width: 600,
						modal: true,
						resizable:false,
						dialogClass: 'none_header_dialog',
					});
					
					$('#show_full_image').dialog({
						autoOpen: false,
						height: 500,
						width: 500,
						modal: true,
						resizable:false,
						dialogClass: 'none_header_dialog',
					});
					
					
					//$('a.image_galery').fancybox();
					
					xOffset = 10;
					yOffset = 30;
					
					// these 2 variable determine popup's distance from the cursor
					// you might want to adjust to get the right result
					
				/* END CONFIG */
				$(\"#choice_image_preview\").mouseover(\"on\",function(e){
					this.t = this.title;
					this.title = '';	
					var c = (this.t != '') ? \"<br/>\" + this.t : '';
					$(\"body\").append(\"<p id='image_preview'><span>Отсутствует изображение</span></p>\");
					$(\"#image_preview\")
						.css(\"top\",(e.pageY - xOffset) + \"px\")
						.css(\"left\",(e.pageX + yOffset) + \"px\")
						.fadeIn(\"fast\");
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
						$(\"#image_preview img\").remove();
						$(\"#image_preview span\").remove();
						$(\"#image_preview\").append(\"<img style='width:\"+n_w+\"px;height:\"+n_h+\"px;' src='\"+($('#path_coice_image').val())+ \"' alt='Отсутствует изображение' />\");
					}
					img.src = $('#path_coice_image').val();	

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
						$(\"#image_preview img\").remove();
						$(\"#image_preview span\").remove();
						$(\"#image_preview\").append(\"<img style='width:\"+n_w+\"px;height:\"+n_h+\"px;' src='\"+($('#path_coice_image').val())+ \"' alt='Отсутствует изображение' />\");
					}	
				});
				$('#choice_image_preview').mouseout(\"on\",function(){
					this.title = this.t;	
					$(\"#image_preview\").remove();
				});	
				$(\"#choice_image_preview\").mousemove(function(e){
					$(\"#image_preview\")
						.css(\"top\",(e.pageY - xOffset) + \"px\")
						.css(\"left\",(e.pageX + yOffset) + \"px\");
				});	
	
	</script>";
	
	$dialod_create_folder = "<div id='dialog_create_folder'>
		<table style='width:100%'>
			<tr>
				<td style='background:#f8baa1;font-weight:bold; padding:10px;width:200px;border:1px solid #5a1f08;'>Имя директории:</td>
				<td style='border:1px solid #5a1f08;text-align:center;'><input type='text' style='width:90%;' id='name_created_image_folder'></td>
			</tr>
			<tr>
				<td colspan=2 style='text-align:center;padding-top:20px;'><button id='btn_dialog_create_folder' onclick='fn_create_image_folder();'>Создать</button></td>
			</tr>
		
		
		</table></div>";
	$res .= "<form id='form_for_upload_image_file'><input name='main_folder' type='hidden' value='$main_folder'>
			<input type='file' name='file_for_upload' id='file_for_upload' style='display:none;'></form>
			
				<style type='text/css'>

				</style>
			";
			
			$dialog_show_full_image = "
				<div id='show_full_image'>
					<img src='' style='width:100%;'>
				</div>
			";
	$res .= $dialod_create_folder;
	$res .= $dialog_show_full_image;
	$res .= $script;
	echo $high_toolbar.$res;

	
?>