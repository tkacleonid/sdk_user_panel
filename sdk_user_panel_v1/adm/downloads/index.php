<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	include_once("../../config/config.php");

	
	include_once("../utils/menu.php");
	
	include_once("../utils/top_html.php");
	
	$title_adm= "Управление загрузками";
	
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
						Группа загрузок
						<hr style="width:70%; border:1px solid #5a1f08;">
					</td>
				</tr>
				<tr>
					<td style="padding:10px;font-size:0.6em;text-align:center;">
						<button class="btn_add" onclick="fn_tinymce_for_add_group_downloads();$('#add_new_group_downloads_dialog').dialog('open');">Добавить новую группу загрузок</button>
						<button class="btn_edit" onclick="fn_get_edit_group_downloads($('#id_current_group_downloads').val());">Редактировать группу загрузок</button>
						<button class="btn_del" onclick="fn_delete_group_downloads($('#id_current_group_downloads').val());">Удалить группу загрузок</button>
						<button class="btn_update" onclick="fn_get_group_downloads($('#id_current_group_downloads').val());">Обновить список групп загрузок</button>
						<button class="btn_show_full_information" onclick="fn_get_show_full_information_group_downloads($('#id_current_group_downloads').val());">Просмотр подробной информации о текущей группе загрузок</button>					
						<button id="btn_up_group_downloads" class="btn_up" onclick="fn_up_group_downloads($('#id_current_group_downloads').val());">Переместить на одну позицию вверх</button>					
						<button id="btn_down_group_downloads" class="btn_down" onclick="fn_down_group_downloads($('#id_current_group_downloads').val());">Переместить на одну позицию вниз</button>					
					</td>
				</tr>
				<tr>
					<td style="padding:5px;" id="td_group_downloads">
						<?php
							include_once("./get_group_downloads.php");
						?>
						</td>					
				</tr>
			</table>
		</td>
		<td style="vertical-align:top;">
			<table cellpadding=0 cellspacing=0 style="width:100%;">
				<tr>
					<td style="font-size:0.6em;padding-left:10px;padding-bottom:5px;border-bottom: 1px solid #5a1f08; width: 100%; height:50px; vertical-align:bottom;">
						<button class='btn_add' onclick="fn_show_dialog_add_new_download($('#id_current_group_downloads').val());">Добавить новую загрузку</button>
						<button class='btn_show_files' onclick="fn_show_choice_file();$( '#choice_file_dialog' ).dialog('open');">Открыть диалог просмотра файлов</button>
					</td>
				</tr>
				<tr>
					<td id="td_downloads" style="text-align:center;padding:10px;">
						
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<div id="add_new_group_downloads_dialog" style="border:1px solid #5a1f08;display:none;">
	<table style="width:100%;">
		<tr>
			<td colspan=2>
				<p id="error_add_group_downloads_add_new_group_downloads_dialog" style="color:red;"></p>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Название типа загрузки:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<input id="name_group_downloads_add_new_group_downloads_dialog" type="textbox" style="width:90%;">
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Видимость типа загрузки:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<input id="visibility_group_downloads_add_new_group_downloads_dialog" type="checkbox" style="" checked>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Краткое описание:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<textarea id="short_description_add_new_group_downloads_dialog" style="width:90%;height:150px;overflow:auto;"></textarea>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Расширенное описание:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<textarea id="long_description_add_new_group_downloads_dialog" style="width:90%;height:300px;overflow:auto;"></textarea>
			</td>
		</tr>
		<tr>
			<td style="padding-top:10px;text-align:center;" colspan=2>
				<button id="btn_save_add_new_group_downloads_dialog" class="btn" onclick="fn_add_new_group_downloads();">Добавить</button>
			</td>
		</tr>
	</table>
</div>
<div id="edit_group_downloads_dialog" style="border:1px solid #5a1f08;display:none;">
</div>
<div id="full_group_downloads_information_dialog" style="border:1px solid #5a1f08;;width:850px;display:none;">
	<div id="full_group_downloads_information" style="border:1px solid #5a1f08;width:100%;">
	</div>
	<button id="btn_edit_group_downloads_in_full_group_downloads_information_dialog" class="btn_edit" style="font-size:0.6em;" onclick="$('#full_group_downloads_information_dialog').dialog('close');fn_get_edit_group_downloads($('#id_current_group_downloads').val());">Редактировать</button>
</div>



<div id="add_new_download_dialog" style="display:none;">
	<table style="width:100%;">
		<tr>
			<td colspan=2>
				<p id="error_add_new_download_dialog" style="color:red;"></p>
			</td>
		</tr>
		<tr style='display:none;'>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Идентификатор группы загрузок:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<input id="id_group_downloads_add_new_download_dialog" type="textbox" style="width:90%;">
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Название загрузки:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<input id="name_add_new_download_dialog" type="textbox" style="width:90%;">
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Видимость загрузки:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<input id="visibility_add_new_download_dialog" type="checkbox" style="" checked>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Краткое описание:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<textarea id="short_description_add_new_download_dialog" style="width:90%;height:150px;overflow:auto;"></textarea>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Расширенное описание:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<textarea id="long_description_add_new_download_dialog" style="width:90%;height:300px;overflow:auto;"></textarea>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Иконка:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<div style="height:25px;">
					<div id="ref_icon_preview_add_new_download_dialog" style="width:25px; height:100%;padding:0px;margin:0px;float:left;display:inline;background:#f0efee url('../../styles/images/preview_icon.png') center no-repeat;border:1px solid black;border-right:none;cursor:pointer;">
					</div>
					<div style="padding:0px;margin:0px;float:left;height:100%;">
						<input id="path_icon_add_new_download_dialog" type="textbox" style="width: 400px;height:100%;padding:0px;background: #f0efee;border:none;border:1px solid black;padding:0px;margin:0px;" disabled>
					</div>
					<div style="float:left;height:100%;padding:0px">
						<button onclick='fn_btn_choice_icon_add_new_download_dialog();' class="btn" id="btn_choice_icon_add_new_download_dialog" style="height:100%;padding:0px;vertical-align:middle;margin:0px;font-size:0.6em;">Выбрать</button>
					</div>
					<div style="float:left;">
					</div>
				</div>			
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Ссылка на загрузку:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<div style="height:25px;">
					<div onclick="fn_file_preview($('#path_file_add_new_download_dialog').val());" id="ref_file_preview_add_new_download_dialog" style="width:25px; height:100%;padding:0px;margin:0px;float:left;display:inline;background:#f0efee url('../../styles/images/preview_icon.png') center no-repeat;border:1px solid black;border-right:none;cursor:pointer;">
					</div>
					<div style="padding:0px;margin:0px;float:left;height:100%;">
						<input id="path_file_add_new_download_dialog" type="textbox" style="width: 400px;height:100%;padding:0px;background: #f0efee;border:none;border:1px solid black;padding:0px;margin:0px;" disabled>
					</div>
					<div style="float:left;height:100%;padding:0px">
						<button onclick='fn_btn_choice_file_add_new_download_dialog();' class="btn" id="btn_choice_file_add_new_download_dialog" style="height:100%;padding:0px;vertical-align:middle;margin:0px;font-size:0.6em;">Выбрать</button>
					</div>
					<div style="float:left;">
					</div>
				</div>			
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Комментарий:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<textarea id="comment_add_new_download_dialog" style="width:90%;height:150px;overflow:auto;"></textarea>
			</td>
		</tr>
		<tr>
			<td style="padding-top:10px;text-align:center;" colspan=2>
				<button id="btn_save_add_new_download_dialog" class="btn" onclick="fn_add_new_download();">Добавить</button>
			</td>
		</tr>
	</table>
</div>


<div id="edit_download_dialog" style="display:none;">

</div>

<div id="download_full_information_dialog" style="display:none;">
	<div id="download_full_information">
	
	</div>
	<button style="font-size:0.6em;" onclick="fn_edit_download($('#hdn_id_download_download_full_information_dialog').val());$('#download_full_information_dialog').dialog('close');" id="btn_edit_download_full_information_dialog" class="btn_edit">Редактировть</button>
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



		

<?php
	require_once("../utils/bottom_page.php");
?>
							
							