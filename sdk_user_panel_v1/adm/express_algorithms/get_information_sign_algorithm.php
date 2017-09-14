<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin= intval($_SESSION['id_user_adm']);
	
	$id_sign_algorithm= -1;
	
	if(!empty($_POST['id_sign_algorithm']))
	{
		$id_sign_algorithm= intval($_POST['id_sign_algorithm']);
	}
	
	if($id_sign_algorithm < 1)
	{
		$id_sign_algorithm= -1;
	}
	
	if($id_sign_algorithm== -1)
	{
		exit("Произошла ошибка при определении модуля условных обозначений");
	}
	
	
	$query= "select sign_algorithms.id As id_sign_algorithm,
			sign_algorithms.key_type_board As key_type_board_sign_algorithm,
			sign_algorithms.name As name_sign_algorithm,
			sign_algorithms.ref_web_page_text As ref_web_page_text_sign_algorithm,
			sign_algorithms.ref_pdf_text As ref_pdf_text_sign_algorithm,
			sign_algorithms.status_show_pdf_text As status_show_pdf_text_sign_algorithm,
			sign_algorithms.comment As comment_sign_algorithm,
			sign_algorithms.text_sign As text_sign_algorithm,
			sign_algorithms.status_use_web_page_text As status_use_web_page_text_sign_algorithm,
			sign_algorithms.description As description_sign_algorithm,
			sign_algorithms.admin_add As id_admin_add_sign_algorithm,
			sign_algorithms.admin_last_modified As id_admin_last_modified_sign_algorithm,
			sign_algorithms.date_add As date_add_sign_algorithm,
			sign_algorithms.date_last_modified As date_last_modified_sign_algorithm,
			sign_algorithms.position As position_sign_algorithm,
			sign_algorithms.status As status_sign_algorithm,
			admins.login As login_admin_add,
			admins2.login As login_admin_last_modified,
			type_boards.name As type_board_name,
			type_boards.id As id_type_board
			
			from $tbl_sign_algorithms As sign_algorithms
			
			left join $tbl_type_boards As type_boards 
			on sign_algorithms.key_type_board=type_boards.key_type_board
			
			left join $tbl_adm_accounts As admins 
			on sign_algorithms.admin_add=admins.id 
			
			left join $tbl_adm_accounts As admins2 
			on sign_algorithms.admin_last_modified=admins2.id
			

			
			where sign_algorithms.id= $id_sign_algorithm
			
			
			order by sign_algorithms.position";

		
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Возникла ошибка при обращении к базе данных. Пожалуйста, попробуйте позднее.".mysql_error());
	}
	
	$sign_algorithm= @mysql_fetch_array($res);
	
	if(!$sign_algorithm)
	{
		exit("Модуль условных обозначений не обнаружен в базе данных");
	}
	
	
	
	$id_sign_algorithm= $sign_algorithm['id_sign_algorithm'];
	$key_type_board_sign_algorithm= $sign_algorithm['key_type_board_sign_algorithm'];
	$name_sign_algorithm= $sign_algorithm['name_sign_algorithm'];
	$ref_web_page_text_sign_algorithm= $sign_algorithm['ref_web_page_text_sign_algorithm'];
	$ref_pdf_text_sign_algorithm= $sign_algorithm['ref_pdf_text_sign_algorithm'];
	$status_show_pdf_text_sign_algorithm= $sign_algorithm['status_show_pdf_text_sign_algorithm'];
	$comment_sign_algorithm= $sign_algorithm['comment_sign_algorithm'];
	$description_sign_algorithm= $sign_algorithm['description_sign_algorithm'];
	$text_sign_algorithm= $sign_algorithm['text_sign_algorithm'];
	$status_use_web_page_text_sign_algorithm= $sign_algorithm['status_use_web_page_text_sign_algorithm'];
	$id_admin_add_sign_algorithm= $sign_algorithm['id_admin_add_sign_algorithm'];
	$id_admin_last_modified_sign_algorithm= $sign_algorithm['id_admin_last_modified_sign_algorithm'];
	$date_add_sign_algorithm= $sign_algorithm['date_add_sign_algorithm'];
	$date_last_modified_sign_algorithm= $sign_algorithm['date_last_modified_sign_algorithm'];
	$position_sign_algorithm= $sign_algorithm['position_sign_algorithm'];
	$status_sign_algorithm= $sign_algorithm['status_sign_algorithm'];
	$login_admin_add= $sign_algorithm['login_admin_add'];
	$login_admin_last_modified= $sign_algorithm['login_admin_last_modified'];
	$type_board_name= $sign_algorithm['type_board_name'];
	$id_type_board= $sign_algorithm['id_type_board'];
		
	if($status_sign_algorithm== "0")
	{
		$status_sign_algorithm= "";
	}
	else
	{
		$status_sign_algorithm= "checked";
	}
	
	if($status_show_pdf_text_sign_algorithm == "0")
	{
		$status_show_pdf_text_sign_algorithm = "";
	}
	else
	{
		$status_show_pdf_text_sign_algorithm = "checked";
	}
	
	
	if($status_use_web_page_text_sign_algorithm == "0")
	{
		$status_use_web_page_text_sign_algorithm = "";
	}
	else
	{
		$status_use_web_page_text_sign_algorithm = "checked";
	}
	
?>
	<table style='width:100%;'>
		<tr>
			<td colspan=2>
				<p id="error_show_full_information_sign_algorithms_dialog" style="color:red;"></p>
			</td>
		</tr>
		<tr style='display:none;'>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Идентификатор типа борта:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<?php echo $id_type_board; ?>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Наименование модуля:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<?php echo $name_sign_algorithm; ?>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Краткое описание модуля:
			</td>
			<td style="border:1px solid #5a1f08;">
				<?php echo $description_sign_algorithm; ?>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Ссылка на web-страницу содержания:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<div style="height:25px;">
					<div onclick="fn_file_preview($('#path_html_show_full_information_sign_algorithms_dialog').val());" id="ref_html_preview_show_full_information_sign_algorithms_dialog" style="width:25px; height:100%;padding:0px;margin:0px;float:left;display:inline;background:#f0efee url('../../styles/images/preview_icon.png') center no-repeat;border:1px solid black;border-right:none;cursor:pointer;">
					</div>
					<div style="padding:0px;margin:0px;float:left;height:100%;">
						<input value='<?php echo $ref_web_page_text_sign_algorithm; ?>' id="path_html_show_full_information_sign_algorithms_dialog" type="textbox" style="width: 400px;height:100%;padding:0px;background: #f0efee;border:none;border:1px solid black;padding:0px;margin:0px;" disabled>
					</div>
				</div>			
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Ссылка на pdf-файл содержания:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<div style="height:25px;">
					<div onclick="fn_file_preview($('#path_pdf_show_full_information_sign_algorithms_dialog').val());" id="ref_pdf_pdf_preview_show_full_information_sign_algorithms_dialog" style="width:25px; height:100%;padding:0px;margin:0px;float:left;display:inline;background:#f0efee url('../../styles/images/preview_icon.png') center no-repeat;border:1px solid black;border-right:none;cursor:pointer;">
					</div>
					<div style="padding:0px;margin:0px;float:left;height:100%;">
						<input value='<?php echo $ref_pdf_text_sign_algorithm; ?>' id="path_pdf_show_full_information_sign_algorithms_dialog" type="textbox" style="width: 400px;height:100%;padding:0px;background: #f0efee;border:none;border:1px solid black;padding:0px;margin:0px;" disabled>
					</div>
				</div>			
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Отображать ссылку на pdf:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<input disabled <?php echo $status_show_pdf_text_sign_algorithm; ?> id='visibility_ref_pdf_show_full_information_sign_algorithms_dialog' type='checkbox' style='width:90%;' >
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Комментарий к модулю:
			</td>
			<td style="border:1px solid #5a1f08;">
				<?php echo $comment_sign_algorithm; ?>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Содержание модуля:
			</td>
			<td style="border:1px solid #5a1f08;">
				<?php echo $text_sign_algorithm; ?>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Использовать содержание из файла:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<input disabled <?php echo $status_use_web_page_text_sign_algorithm; ?>  id='use_ref_html_show_full_information_sign_algorithms_dialog' type='checkbox' style='width:90%;' >
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Видимость:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<input disabled <?php echo $status_sign_algorithm; ?> id='visibility_show_full_information_sign_algorithms_dialog' type='checkbox' style='width:90%;' >
			</td>
		</tr>
	</table>
	<input type='hidden' id='id_sign_algorithm_dialog_show_full_information_sign_algorithm' value="<?php echo $id_sign_algorithm; ?>"/>
	<script type="text/javascript">

	</script>