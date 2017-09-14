<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin= intval($_SESSION['id_user_adm']);
	
	$id_algorithm= -1;
	
	if(!empty($_POST['id_algorithm']))
	{
		$id_algorithm= intval($_POST['id_algorithm']);
	}
	
	if($id_algorithm < 1)
	{
		$id_algorithm= -1;
	}
	
	if($id_algorithm== -1)
	{
		exit("Произошла ошибка при определении алгоритма");
	}
	
	
	$query= "select algorithms.id As id_algorithm,
			algorithms.key_algorithm As key_algorithm_algorithm,
			algorithms.key_type_board As key_type_board_algorithm,
			algorithms.name_algorithm As name_algorithm_algorithm,
			algorithms.ref_web_page_text_algorithm As ref_web_page_text_algorithm_algorithm,
			algorithms.ref_pdf_text_algorithm As ref_pdf_text_algorithm_algorithm,
			algorithms.status_show_pdf As status_show_pdf_algorithm,
			algorithms.key_rle As key_rle_algorithm,
			algorithms.status_show_rle As status_show_rle_algorithm,
			algorithms.comment As comment_algorithm,
			algorithms.text_algorithm As text_algorithm_algorithm,
			algorithms.status_use_web_page_algorithm As status_use_web_page_algorithm_algorithm,
			algorithms.admin_add As admin_add_algorithm,
			algorithms.admin_last_modified As admin_last_modified_algorithm,
			algorithms.date_add As date_add_algorithm,
			algorithms.date_last_modified As date_last_modified_algorithm,
			algorithms.position As position_algorithm,
			algorithms.status As status_algorithm,
			admins.login As login_admin_add,
			admins2.login As login_admin_last_modified,
			type_boards.name As type_board_name,
			rle_items.id As id_rle_item_algorithm
			
			from $tbl_sdk_express_algorithms As algorithms
			
			left join $tbl_type_boards As type_boards 
			on algorithms.key_type_board=type_boards.key_type_board
			
			left join $tbl_adm_accounts As admins 
			on algorithms.admin_add=admins.id 
			
			left join $tbl_adm_accounts As admins2 
			on algorithms.admin_last_modified=admins2.id
			
			left join $tbl_rle_items As rle_items
			on algorithms.key_rle=rle_items.key_rle_item

			
			where algorithms.id= $id_algorithm
			
			
			order by algorithms.position";

		
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Возникла ошибка при обращении к базе данных. Пожалуйста, попробуйте позднее.");
	}
	
	$algorithm= @mysql_fetch_array($res);
	
	if(!$algorithm)
	{
		exit("Алгоритм не обнаружен в базе данных");
	}
	
	
	
	$id_algorithm= $algorithm['id_algorithm'];
	$key_algorithm_algorithm= $algorithm['key_algorithm_algorithm'];
	$key_type_board_algorithm= mysql_real_escape_string($algorithm['key_type_board_algorithm']);
	$name_algorithm_algorithm= $algorithm['name_algorithm_algorithm'];
	$ref_web_page_text_algorithm_algorithm= $algorithm['ref_web_page_text_algorithm_algorithm'];
	$ref_pdf_text_algorithm_algorithm= $algorithm['ref_pdf_text_algorithm_algorithm'];
	$status_show_pdf_algorithm= $algorithm['status_show_pdf_algorithm'];
	$key_rle_algorithm= $algorithm['key_rle_algorithm'];
	$status_show_rle_algorithm= $algorithm['status_show_rle_algorithm'];
	$comment_algorithm= $algorithm['comment_algorithm'];
	$text_algorithm_algorithm= $algorithm['text_algorithm_algorithm'];
	$status_use_web_page_algorithm_algorithm= $algorithm['status_use_web_page_algorithm_algorithm'];
	$admin_add_algorithm= $algorithm['admin_add_algorithm'];
	$admin_last_modified_algorithm= $algorithm['admin_last_modified_algorithm'];
	$date_add_algorithm= $algorithm['date_add_algorithm'];
	$date_last_modified_algorithm= $algorithm['date_last_modified_algorithm'];
	$position_algorithm= $algorithm['position_algorithm'];
	$status_algorithm= $algorithm['status_algorithm'];
	$login_admin_add= $algorithm['login_admin_add'];
	$login_admin_last_modified= $algorithm['login_admin_last_modified'];
	$type_board_name= $algorithm['type_board_name'];
	$id_rle_item_algorithm= $algorithm['id_rle_item_algorithm'];
	
	$query= "select $tbl_type_boards.id from $tbl_type_boards where key_type_board= '$key_type_board_algorithm'";
	
	$res= mysql_query($query);

	
	if(!$res)
	{
		exit("Ощибка при идетификации типа борта".mysql_error());
	}
	
	$res= mysql_fetch_array($res);
	
	if(!$res)
	{
		exit("Ощибка при идетификации типа борта".mysql_error());
	}
	
	$id_type_board= $res['id'];
	
	if($status_algorithm== "0")
	{
		$status_algorithm= "";
	}
	else
	{
		$status_algorithm= "checked";
	}
	
	if($status_show_pdf_algorithm == "0")
	{
		$status_show_pdf_algorithm = "";
	}
	else
	{
		$status_show_pdf_algorithm = "checked";
	}
	
	if($status_show_rle_algorithm == "0")
	{
		$status_show_rle_algorithm = "";
	}
	else
	{
		$status_show_rle_algorithm = "checked";
	}
	
	if($status_use_web_page_algorithm_algorithm == "0")
	{
		$status_use_web_page_algorithm_algorithm = "";
	}
	else
	{
		$status_use_web_page_algorithm_algorithm = "checked";
	}
	
?>
	<table style='width:100%;'>
		<tr>
			<td colspan=2>
				<p id="error_edit_algorithm_dialog_edit_algorithm" style="color:red;"></p>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Идентификатор типа борта:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<input value="<?php echo $id_type_board; ?>" id="id_type_board_dialog_edit_algorithm" type='textbox' style='width:90%;'>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Идентификатор алгоритма:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<input value="<?php echo $key_algorithm_algorithm; ?>" id="key_algorithm_dialog_edit_algorithm" type='textbox' style='width:90%;'>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Наименование алгоритма:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<input value="<?php echo $name_algorithm_algorithm; ?>" id="name_algorithm_dialog_edit_algorithm" type='textbox' style='width:90%;'>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Ссылка на web-страницу описания:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<div style="height:25px;">
					<div onclick="fn_html_algorithm_preview($('#path_html_algorithm_dialog_edit_algorithm').val());" id="ref_html_algorithm_preview_dialog_edit_algorithm" style="width:25px; height:100%;padding:0px;margin:0px;float:left;display:inline;background:#f0efee url('../../styles/images/preview_icon.png') center no-repeat;border:1px solid black;border-right:none;cursor:pointer;">
					</div>
					<div style="padding:0px;margin:0px;float:left;height:100%;">
						<input value='<?php echo $ref_web_page_text_algorithm_algorithm;?>' id="path_html_algorithm_dialog_edit_algorithm" type="textbox" style="width: 400px;height:100%;padding:0px;background: #f0efee;border:none;border:1px solid black;padding:0px;margin:0px;" disabled>
					</div>
					<div style="float:left;height:100%;padding:0px">
						<button onclick='fn_btn_choice_file_html_algorithm_dialog_edit_algorithm();' class="btn" id="btn_choice_html_algorithm_dialog_edit_algorithm" style="height:100%;padding:0px;vertical-align:middle;margin:0px;font-size:0.6em;">Выбрать</button>
					</div>
					<div style="float:left;">
					</div>
				</div>			
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Ссылка на pdf-файл описания:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<div style="height:25px;">
					<div onclick="fn_pdf_algorithm_preview($('#path_pdf_algorithm_dialog_edit_algorithm').val());" id="ref_pdf_algorithm_preview_dialog_edit_algorithm" style="width:25px; height:100%;padding:0px;margin:0px;float:left;display:inline;background:#f0efee url('../../styles/images/preview_icon.png') center no-repeat;border:1px solid black;border-right:none;cursor:pointer;">
					</div>
					<div style="padding:0px;margin:0px;float:left;height:100%;">
						<input value='<?php echo $ref_pdf_algorithm_algorithm;?>' id="path_pdf_algorithm_dialog_edit_algorithm" type="textbox" style="width: 400px;height:100%;padding:0px;background: #f0efee;border:none;border:1px solid black;padding:0px;margin:0px;" disabled>
					</div>
					<div style="float:left;height:100%;padding:0px">
						<button onclick='fn_btn_choice_file_pdf_algorithm_dialog_edit_algorithm();' class="btn" id="btn_choice_pdf_algorithm_dialog_edit_algorithm" style="height:100%;padding:0px;vertical-align:middle;margin:0px;font-size:0.6em;">Выбрать</button>
					</div>
					<div style="float:left;">
					</div>
				</div>		
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Отображать ссылку на pdf:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<input <?php echo $status_show_pdf_algorithm; ?> id='visibility_ref_pdf_algorithm_dialog_edit_algorithm' type='checkbox' style='width:90%;'>
			</td>
		</tr>
		<?php if(empty($_POST['choice_ref_algorithm_for_rle']))
			{
				
				echo "<tr style=''>
						<td style='border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;'>
							Ссылка на РЛЭ:
						</td>
						<td style='border:1px solid #5a1f08;padding:5px;text-align:center;'>
							<div style='height:25px;'>
								<div onclick=\"fn_ref_rle_algorithm_preview($('#path_id_rle_algorithm_dialog_edit_algorithm').val());\" id=\"ref_rle_algorithm_preview_dialog_edit_algorithm\" style=\"width:25px; height:100%;padding:0px;margin:0px;float:left;display:inline;background:#f0efee url('../../styles/images/preview_icon.png') center no-repeat;border:1px solid black;border-right:none;cursor:pointer;\">
								</div>
								<div style=\"padding:0px;margin:0px;float:left;height:100%;\">
									<input value='".$key_rle_algorithm."' id=\"path_rle_algorithm_dialog_edit_algorithm\" type=\"textbox\" style=\"width: 400px;height:100%;padding:0px;background: #f0efee;border:none;border:1px solid black;padding:0px;margin:0px;\" disabled>
									<input id=\"path_id_rle_algorithm_dialog_edit_algorithm\" value='".$id_rle_item_algorithm."' type=hidden>
								</div>
								<div style=\"float:left;height:100%;padding:0px\">
									<button onclick=\"fn_get_choice_rle_for_algorithm(".$id_algorithm.",$('#hdn_id_type_board_tbl_algorithms').val());\" class=\"btn\" id=\"btn_choice_rle_algorithm_dialog_edit_algorithm\" style=\"height:100%;padding:0px;vertical-align:middle;margin:0px;font-size:0.6em;\">Выбрать</button>
								</div>
								<div style=\"float:left;\">
								</div>
							</div>			
						</td>
					</tr>";
				
			}
			else
			{
				echo "<tr style='display:none;'>
						<td style='border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;'>
							Ссылка на РЛЭ:
						</td>
						<td style='border:1px solid #5a1f08;padding:5px;text-align:center;'>
							<div style='height:25px;'>
								<div onclick=\"fn_ref_rle_algorithm_preview($('#path_id_rle_algorithm_dialog_edit_algorithm').val());\" id=\"ref_rle_algorithm_preview_dialog_edit_algorithm\" style=\"width:25px; height:100%;padding:0px;margin:0px;float:left;display:inline;background:#f0efee url('../../styles/images/preview_icon.png') center no-repeat;border:1px solid black;border-right:none;cursor:pointer;\">
								</div>
								<div style=\"padding:0px;margin:0px;float:left;height:100%;\">
									<input value='".$key_rle_algorithm."' id=\"path_rle_algorithm_dialog_edit_algorithm\" type=\"textbox\" style=\"width: 400px;height:100%;padding:0px;background: #f0efee;border:none;border:1px solid black;padding:0px;margin:0px;\" disabled>
									<input id=\"path_id_rle_algorithm_dialog_edit_algorithm\" value='".$id_rle_item_algorithm."' type=hidden>
								</div>
								<div style=\"float:left;height:100%;padding:0px\">
									<button onclick=\"fn_get_choice_rle_for_algorithm(".$id_algorithm.",$('#hdn_id_type_board_tbl_algorithms').val());\" class=\"btn\" id=\"btn_choice_rle_algorithm_dialog_edit_algorithm\" style=\"height:100%;padding:0px;vertical-align:middle;margin:0px;font-size:0.6em;\">Выбрать</button>
								</div>
								<div style=\"float:left;\">
								</div>
							</div>			
						</td>
					</tr>";
			}
		?>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Отображать ссылку на РЛЭ:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<input <?php echo $status_show_rle_algorithm; ?> id='visibility_ref_rle_algorithm_dialog_edit_algorithm' type='checkbox' style='width:90%;'>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Комментарий к алгоритму:
			</td>
			<td style="border:1px solid #5a1f08;">
				<textarea id='comment_algorithm_dialog_show_information_express_algorithm' style='width:90%;height:200px;' ><?php echo $comment_algorithm; ?></textarea>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Текст алгоритма:
			</td>
			<td style="border:1px solid #5a1f08;">
				<textarea id="text_algorithm_dialog_edit_algorithm" style="width:90%;height:300px;overflow:auto;"><?php echo $text_algorithm_algorithm; ?></textarea>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Использовать описание из файла:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<input <?php echo $status_use_web_page_algorithm_algorithm; ?> id='use_ref_html_algorithm_dialog_edit_algorithm' type='checkbox' style='width:90%;'>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Видимость:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<input <?php echo $status_algorithm; ?> id='visibility_dialog_edit_algorithm' type='checkbox' style='width:90%;'>
			</td>
		</tr>
		<tr>
			<td colspan=2 style='font-size:1em;text-align:center; padding-top:20px;'>
				<button class='btn' onclick="fn_edit_algorithm_preview();">Предварительный просмотр</button>
				<button onclick='fn_save_edit_algorithm();' class='btn' id='btn_add_new_algorithm_dialog_show_information_express_algorithm'>Сохранить алгоритм</button>
			</td>
		</tr>
	</table>
	<input type='hidden' id='id_algorithm_dialog_edit_algorithm' value="<?php echo $id_algorithm; ?>"/>
	<script type="text/javascript">
		$(function(){
			$(".btn").button();
			fn_tinymce_for_edit_algorithm();
		});
	</script>