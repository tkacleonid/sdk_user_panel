<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	include_once("../../config/config.php");

	
	include_once("../utils/menu.php");
	
	include_once("../utils/top_html.php");
	
	$title_adm= "Управление руководством пользователя программы СДК-8";
	
	include_once("../utils/top_page.php");

?>	
<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/jquery.tinymce.min.js"></script>
<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/plugins/tiny_mce_wiris/core/display.js"></script>
<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/plugins/tiny_mce_wiris/integration/WIRISplugins.js?viewer=image"></script>
	
<script type="text/javascript" src="./main_script.js">
</script>

<div id="toolbar_operator_manual_settings" style="padding: 10px;font-size:0.6em;text-align:left;border-bottom:1px solid #5a1f08;">
	<button class="btn_add" id="btn_add_operator_manual_item" onclick="fn_show_dialog_add_new_operator_manual_item();">Добавить пункт руководства пользователя</button>	
</div>

<div id="div_operator_manual_items_table" style="display:table; padding:20px;text-align:center;width:90%;">
					<?php	
						require_once("./get_operator_manual_items.php");
					?>
</div>

<div id="add_new_operator_manual_item_dialog" style='display:none;'>
	<table style='width:100%;'>
		<tr>
			<td colspan=2>
				<p id="error_dialog_add_new_operator_manual_item" style="color:red;"></p>
			</td>
		</tr>
		<tr>
			<td colspan=2>
				<button class='btn' onclick="$('#pic').dialog('open');fn_show_choice_picture();">Управление изображениями</button>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Идентификатор пункта:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<input id='key_operator_manual_item_dialog_add_new_operator_manual_item' type='textbox' style='width:90%;' >
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Наименование пункта:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<input id='name_operator_manual_item_dialog_add_new_operator_manual_item' type='textbox' style='width:90%;' >
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Ссылка на web-страницу описания:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<div style="height:25px;">
					<div onclick='fn_html_operator_manual_item_preview();' id="ref_html_operator_manual_item_preview_dialog_add_new_operator_manual_item" style="width:25px; height:100%;padding:0px;margin:0px;float:left;display:inline;background:#f0efee url('../../styles/images/preview_icon.png') center no-repeat;border:1px solid black;border-right:none;cursor:pointer;">
					</div>
					<div style="padding:0px;margin:0px;float:left;height:100%;">
						<input id="path_html_operator_manual_item_dialog_add_new_operator_manual_item" type="textbox" style="width: 400px;height:100%;padding:0px;background: #f0efee;border:none;border:1px solid black;padding:0px;margin:0px;" disabled>
					</div>
					<div style="float:left;height:100%;padding:0px">
						<button onclick='fn_btn_choice_file_html_operator_manual_item_dialog_add_new_operator_manual_item();' class="btn" id="btn_choice_html_operator_manual_item_dialog_add_new_operator_manual_item" style="height:100%;padding:0px;vertical-align:middle;margin:0px;font-size:0.6em;">Выбрать</button>
					</div>
					<div style="float:left;">
					</div>
				</div>			
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Комментарий к пункту:
			</td>
			<td style="border:1px solid #5a1f08;">
				<textarea id='comment_operator_manual_item_dialog_add_new_operator_manual_item' style='width:90%;height:200px;' ></textarea>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Текст пункта:
			</td>
			<td style="border:1px solid #5a1f08;">
				<textarea id="text_operator_manual_item_dialog_add_new_operator_manual_item" style="width:90%;height:300px;overflow:auto;"></textarea>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Использовать описание из файла:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<input id='use_ref_html_operator_manual_item_dialog_add_new_operator_manual_item' type='checkbox' style='width:90%;' >
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Видимость:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<input id='visibility_dialog_add_new_operator_manual_item' type='checkbox' style='width:90%;' >
			</td>
		</tr>
		<tr>
			<td colspan=2 style='font-size:1em;text-align:center; padding-top:20px;'>
				<button class='btn' onclick="fn_operator_manual_item_preview();">Предварительный просмотр</button>
				<button onclick='fn_add_new_operator_manual_item();' class='btn' id='btn_add_new_operator_manual_item_dialog_add_new_operator_manual_item'>Добавить пункт</button>
			</td>
		</tr>
	</table>
</div>



<div id="profile_admin_information_dialog" style='display:none;'>
	<div id="profile_admin_information" style=''>
	</div>
</div>	
			
<div id="pic" style="border:1px solid #5a1f08;;width:850px;display:none;">
</div>

<div id="choice_file_dialog" style="border:1px solid #5a1f08;;width:850px;display:none;">
</div>

<div id="status_loading" style="display:none;">
			<div id="loading">	
			</div>
</div>
<div id="error_dialog" style="text-align:center; display: none;">
	<p id="p_error_dialog" style="width:100%"></p>
	<hr>
	<button id="btn_error_dialog" class="btn" style="margin:20px;" onclick="$('#error_dialog').dialog('close');">OK</button>
</div>

<div id="dialog_show_information_operator_manual_item">
	<div id="show_information_operator_manual_item" style='width:100%;'>
	
	</div>
	<button onclick="fn_edit_operator_manual_item($('#id_operator_manual_item_dialog_show_information_operator_manual_item').val());" class='btn' id='btn_edit_dialog_show_information_operator_manual_item'>Редактировать пункт</button>
</div>
<div id="dialog_edit_operator_manual_item">

</div>
	

<?php
	require_once("../utils/bottom_page.php");
?>
							
							