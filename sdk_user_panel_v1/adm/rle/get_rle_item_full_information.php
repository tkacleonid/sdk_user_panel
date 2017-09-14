<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin = intval($_SESSION['id_user_adm']);
	
	$id_rle_item = -1;
	
	if(!empty($_POST['id_rle_item']))
	{
		$id_rle_item = intval($_POST['id_rle_item']);
	}
	
	if($id_rle_item < 1)
	{
		$id_rle_item = -1;
	}
	
	if($id_rle_item == -1)
	{
		exit("Произошла ошибка при определении пункта РЛЭ");
	}
	
	
	$query = "select rle_items.id As id_rle_item,
			rle_items.key_rle_item As key_rle_item_rle_item,
			rle_items.key_type_board As key_type_board_rle_item,
			rle_items.name_rle_item As name_rle_item_rle_item,
			rle_items.ref_web_page_text_rle_item As ref_web_page_text_rle_item_rle_item,
			rle_items.ref_pdf_text_rle_item As ref_pdf_text_rle_item_rle_item,
			rle_items.status_show_pdf As status_show_pdf_rle_item,
			rle_items.key_algorithm As key_algorithm_rle_item,
			rle_items.status_show_algorithm As status_show_algorithm_rle_item,
			rle_items.comment As comment_rle_item,
			rle_items.text_rle_item As text_rle_item_rle_item,
			rle_items.status_use_web_page_rle_item As status_use_web_page_rle_item_rle_item,
			rle_items.admin_add As admin_add_rle_item,
			rle_items.admin_last_modified As admin_last_modified_rle_item,
			rle_items.date_add As date_add_rle_item,
			rle_items.date_last_modified As date_last_modified_rle_item,
			rle_items.position As position_rle_item,
			rle_items.status As status_rle_item,
			admins.login As login_admin_add,
			admins2.login As login_admin_last_modified,
			type_boards.name As type_board_name,
			algorithms.id As id_algorithm_rle_item
			
			from $tbl_rle_items As rle_items
			
			left join $tbl_type_boards As type_boards 
			on rle_items.key_type_board=type_boards.key_type_board
			
			left join $tbl_adm_accounts As admins 
			on rle_items.admin_add=admins.id 
			
			left join $tbl_adm_accounts As admins2 
			on rle_items.admin_last_modified=admins2.id
			
			left join $tbl_sdk_express_algorithms As algorithms
			on algorithms.key_rle=rle_items.key_rle_item

			
			where rle_items.id = $id_rle_item
			
			
			order by rle_items.position";

		
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Возникла ошибка при обращении к базе данных. Пожалуйста, попробуйте позднее.");
	}
	
	$rle_item = @mysql_fetch_array($res);
	
	if(!$rle_item)
	{
		exit("Пункт РЛЭ не обнаружен в базе данных");
	}
	
	$id_rle_item = $rle_item['id_rle_item'];
	$key_rle_item_rle_item = $rle_item['key_rle_item_rle_item'];
	$key_type_board_rle_item = $rle_item['key_type_board_rle_item'];
	$name_rle_item_rle_item = $rle_item['name_rle_item_rle_item'];
	$ref_web_page_text_rle_item_rle_item = $rle_item['ref_web_page_text_rle_item_rle_item'];
	$ref_pdf_text_rle_item_rle_item = $rle_item['ref_pdf_text_rle_item_rle_item'];
	$status_show_pdf_rle_item = $rle_item['status_show_pdf_rle_item'];
	$key_algorithm_rle_item = $rle_item['key_algorithm_rle_item'];
	$status_show_algorithm_rle_item = $rle_item['status_show_algorithm_rle_item'];
	$comment_rle_item = $rle_item['comment_rle_item'];
	$text_rle_item_rle_item = $rle_item['text_rle_item_rle_item'];
	$status_use_web_page_rle_item_rle_item = $rle_item['status_use_web_page_rle_item_rle_item'];
	$admin_add_rle_item = $rle_item['admin_add_rle_item'];
	$admin_last_modified_rle_item = $rle_item['admin_last_modified_rle_item'];
	$date_add_rle_item = $rle_item['date_add_rle_item'];
	$date_last_modified_rle_item = $rle_item['date_last_modified_rle_item'];
	$position_rle_item = $rle_item['position_rle_item'];
	$status_rle_item = $rle_item['status_rle_item'];
	$login_admin_add = $rle_item['login_admin_add'];
	$login_admin_last_modified = $rle_item['login_admin_last_modified'];
	$type_board_name = $rle_item['type_board_name'];
	$id_algorithm_rle_item = $rle_item['id_algorithm_rle_item'];
	
	if($status_rle_item == "0")
	{
		$status_rle_item = "";
	}
	else
	{
		$status_rle_item = "checked";
	}
	
	if($status_show_pdf_rle_item  == "0")
	{
		$status_show_pdf_rle_item  = "";
	}
	else
	{
		$status_show_pdf_rle_item  = "checked";
	}
	
	if($status_show_algorithm_rle_item  == "0")
	{
		$status_show_algorithm_rle_item  = "";
	}
	else
	{
		$status_show_rle_rle_item  = "checked";
	}
	
	if($status_use_web_page_rle_item_rle_item  == "0")
	{
		$status_use_web_page_rle_item_rle_item  = "";
	}
	else
	{
		$status_use_web_page_rle_item_rle_item  = "checked";
	}
	
	$dispaly_none_choice_algorithm = "";
	if(!empty($_POST['choice_ref_rle_item_for_algorithm']))
	{
		$dispaly_none_choice_algorithm = "style='display:none;'";
	}
	
?>
	<table style='width:100%;'>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Идентификатор типа борта:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<?php
					echo $key_type_board_rle_item;
				?>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Идентификатор пункта РЛЭ:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<?php
					echo $key_rle_item_rle_item;
				?>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Наименование пункта РЛЭ:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<?php echo $name_rle_item_rle_item;?>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Ссылка на web-страницу описания:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<div style="height:25px;">
					<div onclick="fn_html_rle_item_preview($('#path_html_rle_item_dialog_show_information_rle_item').val());" id="ref_html_rle_item_preview_dialog_show_information_rle_item" style="width:25px; height:100%;padding:0px;margin:0px;float:left;display:inline;background:#f0efee url('../../styles/images/preview_icon.png') center no-repeat;border:1px solid black;border-right:none;cursor:pointer;">
					</div>
					<div style="padding:0px;margin:0px;float:left;height:100%;">
						<input value='<?php echo $ref_web_page_text_rle_item_rle_item;?>' id="path_html_rle_item_dialog_show_information_rle_item" type="textbox" style="width: 400px;height:100%;padding:0px;background: #f0efee;border:none;border:1px solid black;padding:0px;margin:0px;" disabled>
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
					<div onclick="fn_html_rle_item_preview($('#path_pdf_rle_item_dialog_show_information_rle_item').val());" id="ref_pdf_rle_item_preview_dialog_show_information_rle_item" style="width:25px; height:100%;padding:0px;margin:0px;float:left;display:inline;background:#f0efee url('../../styles/images/preview_icon.png') center no-repeat;border:1px solid black;border-right:none;cursor:pointer;">
					</div>
					<div style="padding:0px;margin:0px;float:left;height:100%;">
						<input value='<?php echo $ref_pdf_text_rle_item_rle_item; ?>' id="path_pdf_rle_item_dialog_show_information_rle_item" type="textbox" style="width: 400px;height:100%;padding:0px;background: #f0efee;border:none;border:1px solid black;padding:0px;margin:0px;" disabled>
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
				<input <?php echo $status_show_pdf_rle_item; ?> id='visibility_ref_pdf_rle_item_dialog_show_information_rle_item' type='checkbox' style='width:90%;' disabled >
			</td>
		</tr>
		<tr  <?php echo $dispaly_none_choice_algorithm; ?> >
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Ссылка на алгоритм экспресс-анализа:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<div style="height:25px;">
					<div onclick="fn_ref_algorithm_rle_item_preview($('#path_id_algorithm_rle_item_dialog_show_information_rle_item').val());"  id="ref_rle_rle_item_preview_dialog_show_information_rle_item" style="width:25px; height:100%;padding:0px;margin:0px;float:left;display:inline;background:#f0efee url('../../styles/images/preview_icon.png') center no-repeat;border:1px solid black;border-right:none;cursor:pointer;">
					</div>
					<div style="padding:0px;margin:0px;float:left;height:100%;">
						<input value='<?php echo $key_algorithm_rle_item; ?>' id="path_rle_rle_item_dialog_show_information_rle_item" type="textbox" style="width: 400px;height:100%;padding:0px;background: #f0efee;border:none;border:1px solid black;padding:0px;margin:0px;" disabled>
						<input id="path_id_algorithm_rle_item_dialog_show_information_rle_item" value='<?php echo $id_algorithm_rle_item ?>' type=hidden>
					</div>
					<div style="float:left;">
					</div>
				</div>			
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Отображать ссылку на алгоритм экспресс-анализа:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<input <?php echo $status_show_rle_rle_item; ?> id='visibility_ref_rle_rle_item_dialog_show_information_rle_item' type='checkbox' style='width:90%;' disabled>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Дата добавления:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<?php echo $date_add_rle_item; ?>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Дата последней модификации:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<?php echo $date_last_modified_rle_item; ?>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Администратор добавления:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<?php echo $login_admin_add; ?>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Администратор последней модификации:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<?php echo $login_admin_last_modified; ?>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Комментарий к алгоритму:
			</td>
			<td style="border:1px solid #5a1f08;">
				<div id='comment_rle_item_dialog_show_information_rle_item' style='width:90%;height:200px;' ><?php echo $comment_rle_item; ?></div>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Текст пункта РЛЭ:
			</td>
			<td style="border:1px solid #5a1f08;">
				<div id="text_rle_item_dialog_show_information_rle_item" style="width:90%;height:300px;overflow:auto;"><?php echo $text_rle_item_rle_item; ?></div>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Использовать описание из файла:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<input <?php echo $status_use_web_page_rle_item_rle_item; ?> id='use_ref_html_rle_item_dialog_show_information_rle_item' type='checkbox' style='width:90%;' disabled>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Видимость:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<input <?php echo $status_rle_item; ?> id='visibility_dialog_show_information_rle_item' type='checkbox' style='width:90%;' disabled>
			</td>
		</tr>
		<tr>
			<td colspan=2 style='font-size:1em;text-align:center; padding-top:20px;'>
				<!--<button class='btn' onclick="fn_rle_item_preview();">Предварительный просмотр</button>
				<button onclick='fn_add_new_rle_item();' class='btn' id='btn_add_new_rle_item_dialog_show_information_rle_item'>Добавить алгоритм</button>-->
			</td>
		</tr>
	</table>
	<input type='hidden' id='id_rle_item_dialog_show_information_rle_item' value="<?php echo $id_rle_item; ?>"/>
	<script type="text/javascript">
		$(function(){
			$(".btn").button();
		});
	</script>