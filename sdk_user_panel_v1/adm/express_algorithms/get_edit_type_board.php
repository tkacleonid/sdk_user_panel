<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin= intval($_SESSION['id_user_adm']);
	
	$id_current_type_board= -1;
	
	if(!empty($_POST['id_current_type_board']))
	{
		$id_current_type_board= intval($_POST['id_current_type_board']);
	}
	
	if($id_current_type_board < 1)
	{
		$id_current_type_board= -1;
	}
	
	if($id_current_type_board== -1)
	{
		exit("Произошла ошибка при определении типа борта");
	}
	
	
	$query= "select type_boards.id As id,
		type_boards.name As name,
		type_boards.short_description As short_description ,
		type_boards.long_description As long_description,
		type_boards.status As status,
		type_boards.date_add As date_add,
		type_boards.date_last_modified As date_last_modified,
		type_boards.id_admin_add As id_admin_add,
		type_boards.id_admin_modified As id_admin_modified,
		type_boards.key_type_board As key_type_board,
		type_boards.position As position,
		type_boards.ref_pdf_algorithm As ref_pdf_algorithm,
		type_boards.status_show_pdf_algorithm As status_show_pdf_algorithm,
		admins.login As admin_add_login,
		admins2.login As admin_modified_login
		
		from $tbl_type_boards As type_boards 
		left join $tbl_adm_accounts As admins 
		on type_boards.id_admin_add=admins.id 
		
		left join $tbl_adm_accounts As admins2 
		on type_boards.id_admin_modified=admins2.id

		where (type_boards.id=$id_current_type_board) and (type_boards.status <> '2')";
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных".mysql_error());
	}
	
	$type_board= @mysql_fetch_array($res);
	
	if(!$type_board)
	{
		exit("Тип борта не обнаружен в базе данных");
	}
	
	$id= $type_board["id"];
	$name= $type_board["name"];
	$short_description= $type_board["short_description"];
	$long_description= $type_board["long_description"];
	$status= $type_board["status"];
	$date_add= $type_board["date_add"];
	$date_last_modified= $type_board["date_last_modified"];
	$date_last_modified= $type_board["date_last_modified"];
	$id_admin_add= $type_board["id_admin_add"];
	$id_admin_modified= $type_board["id_admin_modified"];
	$key_type_board= $type_board["key_type_board"];
	$position= $type_board["position"];
	$ref_pdf_algorithm= $type_board["ref_pdf_algorithm"];
	$status_show_pdf_algorithm= $type_board["status_show_pdf_algorithm"];
	
	$admin_add_login= $type_board["admin_add_login"]; 
	$admin_modified_login= $type_board["admin_modified_login"]; 
	
	if($status== "0")
	{
		$status= "";
	}
	else
	{
		$status= "checked";
	}
	
	if($status_show_pdf_algorithm== "0")
	{
		$status_show_pdf_algorithm= "";
	}
	else
	{
		$status_show_pdf_algorithm= "checked";
	}
	
	
?>
	<table style="width:100%;">
		<tr>
			<td colspan=2>
				<p id="error_edit_type_board_edit_type_board_dialog" style="color:red;"></p>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Идентификатор типа борта:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<input id="key_type_board_edit_type_board_dialog" type="textbox" style="width:90%;" value="<?php echo $key_type_board;?>">
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Название типа борта:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<input id="name_type_board_edit_type_board_dialog" type="textbox" style="width:90%;" value="<?php echo $name;?>">
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Видимость типа борта:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<input id="visibility_type_board_edit_type_board_dialog" type="checkbox" style="" <?php echo $status;?>>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Краткое описание:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<textarea id="short_description_edit_type_board_dialog" style="width:90%;height:150px;overflow:auto;"><?php echo $short_description;?></textarea>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Расширенное описание:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<textarea id="long_description_edit_type_board_dialog" style="width:90%;height:300px;overflow:auto;"><?php echo $long_description;?></textarea>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Ссылка на pdf-файл алгоритмов:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<div style="height:25px;">
					<div onclick="fn_pdf_algorithm_preview($('#path_pdf_algorithm_edit_type_board_dialog').val());" id="ref_pdf_algorithm_preview_edit_type_board_dialog" style="width:25px; height:100%;padding:0px;margin:0px;float:left;display:inline;background:#f0efee url('../../styles/images/preview_icon.png') center no-repeat;border:1px solid black;border-right:none;cursor:pointer;">
					</div>
					<div style="padding:0px;margin:0px;float:left;height:100%;">
						<input value='<?php echo  $ref_pdf_algorithm; ?>' id="path_pdf_algorithm_edit_type_board_dialog" type="textbox" style="width: 400px;height:100%;padding:0px;background: #f0efee;border:none;border:1px solid black;padding:0px;margin:0px;" disabled>
					</div>
					<div style="float:left;height:100%;padding:0px">
						<button onclick='fn_btn_choice_file_pdf_algorithm_edit_type_board_dialog();' class="btn" id="btn_choice_pdf_algorithm_path_pdf_algorithm_edit_type_board_dialog" style="height:100%;padding:0px;vertical-align:middle;margin:0px;font-size:0.6em;">Выбрать</button>
					</div>
					<div style="float:left;">
					</div>
				</div>			
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Видимость pdf алгоритмов:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<input id="visibility_file_pdf_algorithm_edit_type_board_dialog" type="checkbox" style="" <?php echo  $status_show_pdf_algorithm; ?>>
			</td>
		</tr>
		<tr>
			<td style="padding-top:10px;text-align:center;" colspan=2>
				<button id="btn_save_edit_type_board_dialog" class="btn" onclick="fn_save_edit_type_board(<?php echo $id_current_type_board; ?>);">Сохранить</button>
				<input type=hidden id="hdn_id_edit_type_board" value="<?php echo $id_current_type_board; ?>">
			</td>
		</tr>
</table>
<script type="text/javascript">
function fn_tinymce_for_edit_type_board()
{	
	tinymce.init({
		selector: "#long_description_edit_type_board_dialog",
		theme: "modern",
		
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
$(function(){
	fn_tinymce_for_edit_type_board();
	$("#btn_save_edit_type_board_dialog").button();
	$("#btn_choice_pdf_algorithm_path_pdf_algorithm_edit_type_board_dialog").button();
});
</script>