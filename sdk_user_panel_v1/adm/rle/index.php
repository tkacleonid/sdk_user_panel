<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	include_once("../../config/config.php");
//include_once("../utils/security_mod.php");
	
	include_once("../utils/menu.php");
	
	include_once("../utils/top_html.php");
	
	$title_adm = "Управление пунктами РЛЭ";
	
	include_once("../utils/top_page.php");

?>	
<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/jquery.tinymce.min.js"></script>
<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/plugins/tiny_mce_wiris/core/display.js"></script>
<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/plugins/tiny_mce_wiris/integration/WIRISplugins.js?viewer=image"></script>
	
<script type="text/javascript" src="./main_script.js">
</script>

<table cellpadding=0 cellspacing=0 style="width:100%;height:300px;">
	<tr>
		<td style="border-right: 1px solid #5a1f08; width: 250px; vertical-align:top;">
			<table cellpadding=0 cellspacing=0 style="width:100%;">
				<tr>
					<td style="padding:10px;text-align:center;">
						Тип борта
						<hr style="width:70%; border:1px solid #5a1f08;">
					</td>
				</tr>
				<tr>
					<td style="padding:10px;font-size:0.6em;text-align:center;">
						<button class="btn_add" onclick="fn_tinymce_for_add_type_board();$('#add_new_type_board_dialog').dialog('open');">Добавить новый тип борта</button>
						<button class="btn_edit" onclick="fn_get_edit_type_board($('#id_current_type_board').val());">Редактировать тип борта</button>
						<button class="btn_del" onclick="fn_delete_type_board($('#id_current_type_board').val());">Удалить ти борта</button>
						<button class="btn_update" onclick="fn_get_type_boards($('#id_current_type_board').val());">Обновить список типов бортов</button>
						<button class="btn_show_full_information" onclick="fn_get_show_full_information_type_boards($('#id_current_type_board').val());">Просмотр подробной информации о текущем типе борта</button>					
					</td>
				</tr>
				<tr>
					<td style="padding:5px;" id="td_type_boards">
						<?php
							include_once("./get_type_boards.php");
						?>
						</td>					
				</tr>
			</table>
		</td>
		<td style="vertical-align:top;">
			<table cellpadding=0 cellspacing=0 style="width:100%;">
				<tr>
					<td style="font-size:0.6em;padding-left:10px;padding-bottom:5px;border-bottom: 1px solid #5a1f08; width: 100%; height:50px; vertical-align:bottom;">
						<button class='btn_add' onclick="fn_show_dialog_add_new_rle_item();">Добавить новый пункт РЛЭ</button>
						<button class='btn_show_files' onclick="fn_show_choice_file();$( '#choice_file_dialog' ).dialog('open');">Открыть диалог просмотра файлов</button>
					</td>
				</tr>
				<tr>
					<td id="td_rle_items" style="text-align:center;padding:10px;">
						
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<div id="add_new_type_board_dialog" style="border:1px solid #5a1f08;display:none;">
	<table style="width:100%;">
		<tr>
			<td colspan=2>
				<p id="error_add_type_board_add_new_type_board_dialog" style="color:red;"></p>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Идентификатор типа борта:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<input id="key_type_board_add_new_type_board_dialog" type="textbox" style="width:90%;">
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Название типа борта:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<input id="name_type_board_add_new_type_board_dialog" type="textbox" style="width:90%;">
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Видимость типа борта:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<input id="visibility_type_board_add_new_type_board_dialog" type="checkbox" style="" checked>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Краткое описание:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<textarea id="short_description_add_new_type_board_dialog" style="width:90%;height:150px;overflow:auto;"></textarea>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Расширенное описание:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<textarea id="long_description_add_new_type_board_dialog" style="width:90%;height:300px;overflow:auto;"></textarea>
			</td>
		</tr>
		<tr>
			<td style="padding-top:10px;text-align:center;" colspan=2>
				<button id="btn_save_add_new_type_board_dialog" class="btn" onclick="fn_add_new_type_board();">Добавить</button>
			</td>
		</tr>
	</table>
</div>
<div id="edit_type_board_dialog" style="border:1px solid #5a1f08;display:none;">
</div>
<div id="full_type_board_information_dialog" style="border:1px solid #5a1f08;;width:850px;display:none;">
	<div id="full_type_board_information" style="border:1px solid #5a1f08;width:100%;">
	</div>
	<button id="btn_edit_type_board_in_full_type_board_information_dialog" class="btn_edit" style="font-size:0.6em;" onclick="$('#full_type_board_information_dialog').dialog('close');fn_get_edit_type_board($('#id_current_type_board').val());">Редактировать</button>
</div>



<div id="add_new_rle_item_dialog" style='display:none;'>
	<table style='width:100%;'>
		<tr>
			<td colspan=2>
				<p id="error_add_new_rle_item_dialog_add_new_rle_item" style="color:red;"></p>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Идентификатор типа борта:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<input id='id_type_board_dialog_add_new_rle_item' type='textbox' style='width:90%;' >
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Идентификатор пункта РЛЭ:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<input id='id_type_rle_item_dialog_add_new_rle_item' type='textbox' style='width:90%;' >
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Наименование пункта РЛЭ:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<input id='name_rle_item_dialog_add_new_rle_item' type='textbox' style='width:90%;' >
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Ссылка на web-страницу описания:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<div style="height:25px;">
					<div onclick='fn_html_rle_item_preview();' id="ref_html_rle_item_preview_dialog_add_new_rle_item" style="width:25px; height:100%;padding:0px;margin:0px;float:left;display:inline;background:#f0efee url('../../styles/images/preview_icon.png') center no-repeat;border:1px solid black;border-right:none;cursor:pointer;">
					</div>
					<div style="padding:0px;margin:0px;float:left;height:100%;">
						<input id="path_html_rle_item_dialog_add_new_rle_item" type="textbox" style="width: 400px;height:100%;padding:0px;background: #f0efee;border:none;border:1px solid black;padding:0px;margin:0px;" disabled>
					</div>
					<div style="float:left;height:100%;padding:0px">
						<button onclick='fn_btn_choice_file_html_rle_item_dialog_add_new_rle_item();' class="btn" id="btn_choice_html_rle_item_dialog_add_new_rle_item" style="height:100%;padding:0px;vertical-align:middle;margin:0px;font-size:0.6em;">Выбрать</button>
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
					<div onclick='fn_pdf_rle_item_preview();' id="ref_pdf_rle_item_preview_dialog_add_new_rle_item" style="width:25px; height:100%;padding:0px;margin:0px;float:left;display:inline;background:#f0efee url('../../styles/images/preview_icon.png') center no-repeat;border:1px solid black;border-right:none;cursor:pointer;">
					</div>
					<div style="padding:0px;margin:0px;float:left;height:100%;">
						<input id="path_pdf_rle_item_dialog_add_new_rle_item" type="textbox" style="width: 400px;height:100%;padding:0px;background: #f0efee;border:none;border:1px solid black;padding:0px;margin:0px;" disabled>
					</div>
					<div style="float:left;height:100%;padding:0px">
						<button onclick='fn_btn_choice_file_pdf_rle_item_dialog_add_new_rle_item();' class="btn" id="btn_choice_pdf_rle_item_dialog_add_new_rle_item" style="height:100%;padding:0px;vertical-align:middle;margin:0px;font-size:0.6em;">Выбрать</button>
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
				<input id='visibility_ref_pdf_rle_item_dialog_add_new_rle_item' type='checkbox' style='width:90%;' >
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Ссылка на алгоритм:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<div style="height:25px;">
					<div onclick="fn_ref_algorithm_rle_item_preview($('#path_id_algorithm_rle_item_dialog_add_new_rle_item').val());" id="ref_algorithm_rle_item_preview_dialog_add_new_rle_item" style="width:25px; height:100%;padding:0px;margin:0px;float:left;display:inline;background:#f0efee url('../../styles/images/preview_icon.png') center no-repeat;border:1px solid black;border-right:none;cursor:pointer;">
					</div>
					<div style="padding:0px;margin:0px;float:left;height:100%;">
						<input id="path_algorithm_rle_item_dialog_add_new_rle_item" type="textbox" style="width: 400px;height:100%;padding:0px;background: #f0efee;border:none;border:1px solid black;padding:0px;margin:0px;" disabled>
						<input id="path_id_algorithm_rle_item_dialog_add_new_rle_item" type="hidden" style="width: 400px;height:100%;padding:0px;background: #f0efee;border:none;border:1px solid black;padding:0px;margin:0px;" disabled>
					</div>
					<div style="float:left;height:100%;padding:0px">
						<button onclick="fn_get_choice_algorithm_for_rle_item('',$('#hdn_id_type_board_tbl_rle_items').val());" class="btn" id="btn_choice_algorithm_rle_item_dialog_add_new_rle_item" style="height:100%;padding:0px;vertical-align:middle;margin:0px;font-size:0.6em;">Выбрать</button>
					</div>
					<div style="float:left;">
					</div>
				</div>			
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Отображать ссылку на алгоритм:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<input id='visibility_ref_algorithm_rle_item_dialog_add_new_rle_item' type='checkbox' style='width:90%;' >
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Комментарий к пункту РЛЭ:
			</td>
			<td style="border:1px solid #5a1f08;">
				<textarea id='comment_rle_item_dialog_add_new_rle_item' style='width:90%;height:200px;' ></textarea>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Текст пункта РЛЭ:
			</td>
			<td style="border:1px solid #5a1f08;">
				<textarea id="text_rle_item_dialog_add_new_rle_item" style="width:90%;height:300px;overflow:auto;"></textarea>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Использовать описание из файла:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<input id='use_ref_html_rle_item_dialog_add_new_rle_item' type='checkbox' style='width:90%;' >
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Видимость:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<input id='visibility_dialog_add_new_rle_item' type='checkbox' style='width:90%;' >
			</td>
		</tr>
		<tr>
			<td colspan=2 style='font-size:1em;text-align:center; padding-top:20px;'>
				<button class='btn' onclick="fn_rle_item_preview();">Предварительный просмотр</button>
				<button onclick='fn_add_new_rle_item();' class='btn' id='btn_add_new_rle_item_dialog_add_new_rle_item'>Добавить пункт РЛЭ</button>
			</td>
		</tr>
	</table>
</div>




<div id="rle_item_preview_dialog" style="display:none;">
	<div id="accordion_rle_items">
		
	</div>
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
<div>

<div id="dialog_show_information_rle_item">
	<div id="show_information_rle_item">
	
	</div>
	<button onclick="fn_edit_rle_item($('#id_rle_item_dialog_show_information_rle_item').val());" class='btn' id='btn_edit_dialog_show_information_rle_item'>Редактировать пункт РЛЭ</button>
</div>
<div id="dialog_edit_rle_item">

</div>



<div id="add_new_express_algorithm_dialog">
	<table style='width:100%;'>
		<tr>
			<td colspan=2>
				<p id="error_add_new_algorithm_dialog_add_new_express_algorithm" style="color:red;"></p>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Идентификатор типа борта:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<input id='id_type_board_dialog_add_new_express_algorithm' type='textbox' style='width:90%;' >
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Идентификатор алгоритма:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<input id='id_type_algorithm_dialog_add_new_express_algorithm' type='textbox' style='width:90%;' >
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Наименование алгоритма:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<input id='name_algorithm_dialog_add_new_express_algorithm' type='textbox' style='width:90%;' >
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Ссылка на web-страницу описания:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<div style="height:25px;">
					<div onclick='fn_html_algorithm_preview();' id="ref_html_algorithm_preview_dialog_add_new_express_algorithm" style="width:25px; height:100%;padding:0px;margin:0px;float:left;display:inline;background:#f0efee url('../../styles/images/preview_icon.png') center no-repeat;border:1px solid black;border-right:none;cursor:pointer;">
					</div>
					<div style="padding:0px;margin:0px;float:left;height:100%;">
						<input id="path_html_algorithm_dialog_add_new_express_algorithm" type="textbox" style="width: 400px;height:100%;padding:0px;background: #f0efee;border:none;border:1px solid black;padding:0px;margin:0px;" disabled>
					</div>
					<div style="float:left;height:100%;padding:0px">
						<button onclick='fn_btn_choice_file_html_algorithm_dialog_add_new_express_algorithm();' class="btn" id="btn_choice_html_algorithm_dialog_add_new_express_algorithm" style="height:100%;padding:0px;vertical-align:middle;margin:0px;font-size:0.6em;">Выбрать</button>
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
					<div onclick='fn_pdf_algorithm_preview();' id="ref_pdf_algorithm_preview_dialog_add_new_express_algorithm" style="width:25px; height:100%;padding:0px;margin:0px;float:left;display:inline;background:#f0efee url('../../styles/images/preview_icon.png') center no-repeat;border:1px solid black;border-right:none;cursor:pointer;">
					</div>
					<div style="padding:0px;margin:0px;float:left;height:100%;">
						<input id="path_pdf_algorithm_dialog_add_new_express_algorithm" type="textbox" style="width: 400px;height:100%;padding:0px;background: #f0efee;border:none;border:1px solid black;padding:0px;margin:0px;" disabled>
					</div>
					<div style="float:left;height:100%;padding:0px">
						<button onclick='fn_btn_choice_file_pdf_algorithm_dialog_add_new_express_algorithm();' class="btn" id="btn_choice_pdf_algorithm_dialog_add_new_express_algorithm" style="height:100%;padding:0px;vertical-align:middle;margin:0px;font-size:0.6em;">Выбрать</button>
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
				<input id='visibility_ref_pdf_algorithm_dialog_add_new_express_algorithm' type='checkbox' style='width:90%;' >
			</td>
		</tr>
		
		<tr style='display:none;'>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Ссылка на РЛЭ:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<div style="height:25px;">
					<div onclick="fn_ref_rle_algorithm_preview($('#path_id_rle_algorithm_dialog_add_new_express_algorithm').val());" id="ref_rle_algorithm_preview_dialog_add_new_express_algorithm" style="width:25px; height:100%;padding:0px;margin:0px;float:left;display:inline;background:#f0efee url('../../styles/images/preview_icon.png') center no-repeat;border:1px solid black;border-right:none;cursor:pointer;">
					</div>
					<div style="padding:0px;margin:0px;float:left;height:100%;">
						<input value='' id="path_rle_algorithm_dialog_add_new_express_algorithm" type="textbox" style="width: 400px;height:100%;padding:0px;background: #f0efee;border:none;border:1px solid black;padding:0px;margin:0px;" disabled>
						<input id="path_id_rle_algorithm_dialog_add_new_express_algorithm" value='' type="hidden">
					</div>
					<div style="float:left;">
					</div>
				</div>			
			</td>
		</tr>
		
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Отображать ссылку на РЛЭ:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<input id='visibility_ref_rle_algorithm_dialog_add_new_express_algorithm' type='checkbox' style='width:90%;' >
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Комментарий к алгоритму:
			</td>
			<td style="border:1px solid #5a1f08;">
				<textarea id='comment_algorithm_dialog_add_new_express_algorithm' style='width:90%;height:200px;' ></textarea>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Текст алгоритма:
			</td>
			<td style="border:1px solid #5a1f08;">
				<textarea id="text_algorithm_dialog_add_new_express_algorithm" style="width:90%;height:300px;overflow:auto;"></textarea>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Использовать описание из файла:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<input id='use_ref_html_algorithm_dialog_add_new_express_algorithm' type='checkbox' style='width:90%;' >
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Видимость:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<input id='visibility_dialog_add_new_express_algorithm' type='checkbox' style='width:90%;' >
			</td>
		</tr>
		<tr>
			<td colspan=2 style='font-size:1em;text-align:center; padding-top:20px;'>
				<button class='btn' onclick="fn_algorithm_preview();">Предварительный просмотр</button>
				<button onclick='fn_add_new_algorithm();' class='btn' id='btn_add_new_algorithm_dialog_add_new_express_algorithm'>Добавить алгоритм</button>
			</td>
		</tr>
	</table>
</div>



<div id="dialog_show_information_express_algorithm">
	<div id="show_information_express_algorithm">
	
	</div>
	<button onclick="fn_edit_algorithm($('#id_algorithm_dialog_show_information_express_algorithm').val());" class='btn' id='btn_edit_dialog_show_information_express_algorithm'>Редактировать алгоритм</button>
</div>
<div id="dialog_edit_algorithm">

</div>

<div id="dialog_choice_algorithm" style=''>
	<div id="dialog_choice_algorithm_inner">
		
	</div>
	<div style='width:100%;text-align:center;padding-top:10px;'><button id="btn_choice_dialog_choice_algorithm" onclick="fn_btn_choice_dialog_choice_algorithm()";>Выбрать</button></div>
</div>
		

		

<?php
	require_once("../utils/bottom_page.php");
?>
							
							