<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	require_once("../../config/config.php");

	if(empty($_POST['id']))
	{
		exit("Возникла проблема при получении информации о блоке меню.");
	}
	
	$id= intval($_POST['id']);
	
	$query= "select blocks.id As id,blocks.name As name,blocks.short_desc As short_desc,blocks.icon As icon,blocks.status As status,blocks.url_folder As url_folder,blocks.large_desc As large_desc,blocks.position As position,blocks.date_add As date_add,blocks.date_last_modified As date_last_modified,blocks.id_admin As id_admin,admins.login  As login_admin from $tbl_blocks_menu_ru AS blocks LEFT JOIN $tbl_adm_accounts AS admins ON blocks.id_admin=admins.id where blocks.id=$id limit 1";
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Возникла ошибка при обращении к базе данных. Пожалуйста, попробуйте позднее.".mysql_error());
	}
	
	$block_information= "";
	
	while(($block= mysql_fetch_array($res)))
	{
		$id= $block['id'];
		$name= $block['name'];
		$short_desc= $block['short_desc'];
		$icon= $block['icon'];
		$status= $block['status'];
		$url_folder= $block['url_folder'];
		$large_desc= $block['large_desc'];
		$position= $block['position'];
		$date_add= $block['date_add'];
		$date_last_modified= $block['date_last_modified'];
		$id_admin= $block['id_admin'];
		
		$admin_login= $block['login_admin'];
		
		$checked= "";
		
		if($status== "1")
		{
			$checked= "checked";
		}
		else
		{
			$checked= "";
		}
		
		
		$block_information .= "<table style'''>
							<tr>
								<td colspan=2>
									<p id='error_edit_block_menu_dialog' style='color:red;'></p>
								</td>
							</tr>
							<tr style=''>
								<td style='font-weight:bold;border:1px solid black;background:#f8baa1;'>Название:</td>
								<td style='border:1px solid black;'><input id='name_edit_block_menu_dialog' type='textbox' style='width: 500px;' value='$name'></td>
							</tr>
							<tr style=''>
									<td style='vertical-align:middle;font-weight:bold;border:1px solid black;background:#f8baa1;'>Иконка:</td>
									<td style='vertical-align:top;border:1px solid black; padding: 5px;text-align:center;'><div style=''>
										<div style='height:25px;'>
											<div style='height:25px;'>
												<div id='edit_block_menu_icon_image_preview' style=\"width:25px; height:100%;padding:0px;margin:0px;float:left;display:inline;background:#f0efee url('../../styles/images/preview_icon.png') center no-repeat;border:1px solid black;border-right:none;cursor:pointer;\">

												</div>
												<div style='padding:0px;margin:0px;float:left;height:100%;'>
													<input id='path_image_icon_edit_block_menu' type='textbox' style='width: 300px;height:100%;padding:0px;background: #f0efee;border:none;border:1px solid black;padding:0px;margin:0px;' disabled value='$icon'>
												</div>
												<div style='float:left;height:100%;padding:0px'>
													<button style='height:100%;padding:0px;vertical-align:middle;margin:0px;font-size:0.6em;' id='btn_choice_icon_edit_block_menu'>Выбрать</button>
												</div>
												<div style='float:left;'>
												
												</div>
											</div>
										</div>
									
									</div></td>
							</tr>
							<tr style=''>
								<td style='font-weight:bold;border:1px solid black;background:#f8baa1;'>Директория:</td>
								<td style='border:1px solid black;'><input id='directory_edit_block_menu_dialog' type='textbox' style='width: 500px;' value='$url_folder'></td>
							</tr>
							<tr style='font-weight:bold;border:1px solid black;'>
								<td style='border:1px solid black;background:#f8baa1;'>Видимость:</td>
								<td style='border:1px solid black;text-align:center;'><input id='visibility_edit_block_menu_dialog' type='checkbox' value='1' $checked></td>
							</tr>
							<tr style='font-weight:bold;'>
								<td style='border:1px solid black;background:#f8baa1;'>Краткое описание:</td>
								<td style='border:1px solid black;'><textarea id='short_desc_edit_block_menu_dialog' style='width: 500px;'>$short_desc</textarea></td>
							</tr>
							<tr style='font-weight:bold;'>
								<td style='border:1px solid black;background:#f8baa1;'>Подробное описание:</td>
								<td style='border:1px solid black;'><textarea style='width: 500px;' id='long_desc_edit_block_menu_dialog'>$large_desc</textarea></td>
							</tr>
							<tr style='font-weight:bold;'>
								<td  colspan=2 style='text-align:center;padding-top:20px;'><button id='btn_save_edit_block_menu_dialog' onclick=\"fn_save_edit_block_menu($id);\">Сохранить</button></td>
							</tr>
						</table>
						<script type='text/javascript'>
								$('#edit_block_menu_icon_image_preview').mouseover('on',function(e){
								this.t= this.title;
								this.title= '';	
								var c= (this.t != '') ? '<br/>' + this.t : '';
								$('body').append(\"<p id='image_preview'><span>Отсутствует изображение</span></p>\");
								$('#image_preview')
									.css('top',(e.pageY - xOffset) + 'px')
									.css('left',(e.pageX + yOffset) + 'px')
									.fadeIn('fast');
								var img= new Image();
								img.onload= function(){
									var w= this.width;
									var h= this.height;
									var n_w= w;
									var n_h= h;
									if((w >= h) && (w > 400))
									{
										n_w= 400;
										n_h= parseInt((400/w)*h);
									}
									else if((h > w) && (h > 400))
									{
										n_h= 400;
										n_w= parseInt((400/h)*w);
									}
									$('#image_preview img').remove();
									$('#image_preview span').remove();
									$('#image_preview').append(\"<img style='width:\"+n_w+\"px;height:\"+n_h+\"px;' src=\"+($('#path_image_icon_edit_block_menu').val())+ \" alt='Отсутствует изображение' />\");
								}
								img.src= $('#path_image_icon_edit_block_menu').val();	

								var w= img.width;
								var h= img.height;
								var n_w= w;
								var n_h= h;
								if((w > 0) && (h > 0))
								{
									if((w >= h) && (w > 400))
									{
										n_w= 400;
										n_h= parseInt((400/w)*h);
									}
									else if((h > w) && (h > 400))
									{
										n_h= 400;
										n_w= parseInt((400/h)*w);
									}
									$('#image_preview img').remove();
									$('#image_preview span').remove();
									$('#image_preview').append(\"<img style='width:\"+n_w+\"px;height:\"+n_h+\"px;' src=\"+($('#path_image_icon_edit_block_menu').val())+ \" alt='Отсутствует изображение' />\");
								}	
							});
							$('#edit_block_menu_icon_image_preview').mouseout('on',function(){
								this.title= this.t;	
								$('#image_preview').remove();
							});	
							$('#edit_block_menu_icon_image_preview').mousemove(function(e){
								$('#image_preview')
									.css('top',(e.pageY - xOffset) + 'px')
									.css('left',(e.pageX + yOffset) + 'px');
							});	
					
					
							$( '#btn_choice_icon_edit_block_menu').button().on('click', function() {
								fn_show_choice_picture();
								$('#pic').dialog('open').dialog('moveToTop');
							});
							
							$( '#btn_save_edit_block_menu_dialog').button({
							
							});
							
						</script>
						";
	}
		
	
	echo $block_information;

?>