<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin= intval($_SESSION['id_user_adm']);
	
	$id_operator_manual_item= -1;
	
	if(!empty($_POST['id_operator_manual_item']))
	{
		$id_operator_manual_item= intval($_POST['id_operator_manual_item']);
	}
	
	if($id_operator_manual_item < 1)
	{
		$id_operator_manual_item= -1;
	}
	
	if($id_operator_manual_item== -1)
	{
		exit("Произошла ошибка при определении пункта руководства оператора");
	}
	
	
	$query= "select operator_manual_items.id As id_operator_manual_item,
			operator_manual_items.key_operator_manual_item As key_operator_manual_item,
			operator_manual_items.name As name_operator_manual_item,
			operator_manual_items.ref_html_text As ref_html_text_operator_manual_item,
			operator_manual_items.comment As comment_operator_manual_item,
			operator_manual_items.text As text_operator_manual_item,
			operator_manual_items.use_html_text As use_html_text_operator_manual_item,
			operator_manual_items.status As status_operator_manual_item,
			operator_manual_items.id_admin_add As id_admin_add_operator_manual_item,
			operator_manual_items.id_admin_last_modified As id_admin_last_modified_operator_manual_item,
			operator_manual_items.date_add As date_add_operator_manual_item,
			operator_manual_items.date_last_modified As date_last_modified_operator_manual_item,
			operator_manual_items.position As position_operator_manual_item,
			admins.login As login_admin_add,
			admins2.login As login_admin_last_modified
			
			from $tbl_operator_manual_items_ru As operator_manual_items
			
			left join $tbl_adm_accounts As admins 
			on operator_manual_items.id_admin_add=admins.id 
			
			left join $tbl_adm_accounts As admins2 
			on operator_manual_items.id_admin_last_modified=admins2.id

			
			where operator_manual_items.id= $id_operator_manual_item
			
			
			order by operator_manual_items.position";

		
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Возникла ошибка при обращении к базе данных. Пожалуйста, попробуйте позднее.");
	}
	
	$operator_manual_item= @mysql_fetch_array($res);
	
	if(!$operator_manual_item)
	{
		exit("Пункт руководства пользователя не обнаружен в базе данных");
	}
	
	
	$id_operator_manual_item= $operator_manual_item['id_operator_manual_item'];
	$key_operator_manual_item= $operator_manual_item['key_operator_manual_item'];
	$name_operator_manual_item= $operator_manual_item['name_operator_manual_item'];
	$ref_html_text_operator_manual_item= $operator_manual_item['ref_html_text_operator_manual_item'];
	$comment_operator_manual_item= $operator_manual_item['comment_operator_manual_item'];
	$text_operator_manual_item= $operator_manual_item['text_operator_manual_item'];
	$use_html_text_operator_manual_item= $operator_manual_item['use_html_text_operator_manual_item'];
	$id_admin_add_operator_manual_item= $operator_manual_item['id_admin_add_operator_manual_item'];
	$id_admin_last_modified_operator_manual_item= $operator_manual_item['id_admin_last_modified_operator_manual_item'];
	$date_add_operator_manual_item= $operator_manual_item['date_add_operator_manual_item'];
	$date_last_modified_operator_manual_item= $operator_manual_item['date_last_modified_operator_manual_item'];
	$position_operator_manual_item= $operator_manual_item['position_operator_manual_item'];
	$status_operator_manual_item= $operator_manual_item['status_operator_manual_item'];
	$login_admin_add= $operator_manual_item['login_admin_add'];
	$login_admin_last_modified= $operator_manual_item['login_admin_last_modified'];

	
	if($status_operator_manual_item== "0")
	{
		$status_operator_manual_item= "";
	}
	else
	{
		$status_operator_manual_item= "checked";
	}
	
	if($use_html_text_operator_manual_item == "0")
	{
		$use_html_text_operator_manual_item = "";
	}
	else
	{
		$use_html_text_operator_manual_item = "checked";
	}
	
?>
	<table style=''>
		<tr>
			<td colspan=2>
				<p id="error_dialog_show_full_information_operator_manual_item" style="color:red;"></p>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Идентификатор пункта:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<?php echo $key_operator_manual_item; ?>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Наименование пункта:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<?php echo $name_operator_manual_item; ?>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Добавил:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<?php echo $login_admin_add_operator_manual_item; ?>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Дата добавления:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<?php echo $date_add_operator_manual_item; ?>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Отредактировал:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<?php echo $login_admin_last_modified_operator_manual_item; ?>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Дата редактирования:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<?php echo $date_last_modified_operator_manual_item; ?>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Ссылка на web-страницу описания:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<div style="height:25px;">
					<div onclick="fn_html_operator_manual_item_preview($('#path_html_operator_manual_item_dialog_show_full_information_operator_manual_item').val());" id="ref_html_operator_manual_item_preview_dialog_show_full_information_operator_manual_item" style="width:25px; height:100%;padding:0px;margin:0px;float:left;display:inline;background:#f0efee url('../../styles/images/preview_icon.png') center no-repeat;border:1px solid black;border-right:none;cursor:pointer;">
					</div>
					<div style="padding:0px;margin:0px;float:left;height:100%;">
						<input value='<?php echo $ref_html_text_operator_manual_item; ?>' id="path_html_operator_manual_item_dialog_show_full_information_operator_manual_item" type="textbox" style="width: 400px;height:100%;padding:0px;background: #f0efee;border:none;border:1px solid black;padding:0px;margin:0px;" disabled>
					</div>
				</div>			
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Комментарий к пункту:
			</td>
			<td style="border:1px solid #5a1f08;">
				<div id='comment_operator_manual_item_dialog_show_full_information_operator_manual_item' style='width:90%;height:200px;' ><?php echo $comment_operator_manual_item; ?></div>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Текст пункта:
			</td>
			<td style="border:1px solid #5a1f08;with:500px;">
				<textarea id="text_operator_manual_item_dialog_show_full_information_operator_manual_item" style='height:300px;'><?php echo $text_operator_manual_item; ?></textarea>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Использовать описание из файла:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<input disabled <?php echo $use_html_text_operator_manual_item; ?> id='use_ref_html_operator_manual_item_dialog_show_full_information_operator_manual_item' type='checkbox' style='' >
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Видимость:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<input disabled <?php echo $status_operator_manual_item; ?> id='visibility_dialog_show_full_information_operator_manual_item' type='checkbox' style='' >
			</td>
		</tr>
	</table>

	<input type='hidden' id='id_operator_manual_item_dialog_show_information_operator_manual_item' value="<?php echo $id_operator_manual_item; ?>"/>
	<script type="text/javascript">
		$(function(){
			$(".btn").button();
			fn_tinymce_for_show_full_information_operator_manual_item();
		});
	</script>