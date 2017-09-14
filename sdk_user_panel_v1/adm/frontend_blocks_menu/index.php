<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	include_once("../../config/config.php");
//include_once("../utils/security_mod.php");
	
	include_once("../utils/menu.php");
	
	include_once("../utils/top_html.php");
	
	$title_adm = "Управление блоками меню пользовательской части";
	
	include_once("../utils/top_page.php");

?>	
<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/jquery.tinymce.min.js"></script>
<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/plugins/tiny_mce_wiris/core/display.js"></script>
<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/plugins/tiny_mce_wiris/integration/WIRISplugins.js?viewer=image"></script>
	
<script type="text/javascript" src="./main_script.js">
</script>
<div id="toolbar_block_settings" style="padding: 10px;font-size:0.6em;text-align:left;border-bottom:1px solid #5a1f08;">
<button id="btn_add_block_menu">Добавить блок меню</button>	
</div>

<div id="div_blocks_menu_table" style="display:table; padding:20px;">
					<?php	
						require_once("./get_blocks_menu.php");
					?>
</div>
<div id="more_information_about_block_menu" style="display:none;">

						
</div>
					
<div id="add_block_menu1" style="display:none;">
	<table style="">
		<tr>
			<td colspan=2>
						<p id="error_add_block_menu_dialog" style="color:red;"></p>
			</td>
		</tr>
		<tr style="">
			<td style="font-weight:bold;border:1px solid black;background:#f8baa1;">Название:</td>
			<td style="border:1px solid black;"><input id="name_add_block_menu_dialog" type="textbox" style="width: 500px;"></td>
		</tr>
		<tr style="">
			<td style="font-weight:bold;border:1px solid black;background:#f8baa1;">Директория:</td>
			<td style="border:1px solid black;"><input id="directory_add_block_menu_dialog" type="textbox" style="width: 500px;"></td>
		</tr>
		<tr style="font-weight:bold;border:1px solid black;">
			<td style="border:1px solid black;background:#f8baa1;">Видимость:</td>
			<td style="border:1px solid black;text-align:center;"><input id="visibility_add_block_menu_dialog" type="checkbox" value="1"></td>
		</tr>
		<tr style="font-weight:bold;border:1px solid black;">
			<td style="border:1px solid black;background:#f8baa1;">Режим отладки:</td>
			<td style="border:1px solid black;text-align:center;"><input id="status_debug_add_block_menu_dialog" type="checkbox" value="1"></td>
		</tr>
      	<tr style="font-weight:bold;border:1px solid black;">
			<td style="border:1px solid black;background:#f8baa1;">Видимость без авторизации:</td>
			<td style="border:1px solid black;text-align:center;"><input id="status_visibility_without_authorized_add_block_menu_dialog" type="checkbox" value="0"></td>
		</tr>
		<tr style="font-weight:bold;">
			<td style="border:1px solid black;background:#f8baa1;">Краткое описание:</td>
			<td style="border:1px solid black;"><textarea id="short_desc_add_block_menu_dialog" style="width: 500px;"></textarea></td>
		</tr>
		<tr style="font-weight:bold;">
			<td style="border:1px solid black;background:#f8baa1;">Подробное описание:</td>
			<td style="border:1px solid black;"><textarea style="width: 500px;" id="long_desc_add_block_menu_dialog"></textarea></td>
		</tr>
		<tr style="font-weight:bold;">
			<td style="text-align:center;padding-top:20px;"  colspan=2><button id="btn_add_block_menu_dialog">Добавить</button></td>
		</tr>
	</table>
</div>
					
<div id="pic" style="border:1px solid silver;width:850px;display:none;">
					
</div>
<div id="status_loading" style="display:none;">
			<div id="loading">	
			</div>
</div>
<div id="error_dialog" style="text-align:center; display: none;">
	<p id="p_error_dialog" style="width:100%"></p>
	<hr>
	<button id="btn_error_dialog" style="margin:20px";>OK</button>
<div>
<div id="edit_block_menu" style="display:none;">
						
</div>
		
<div id="profile_admin_information_dialog" style='display:none;'>
	<div id="profile_admin_information" style=''>
	</div>
</div>	






<?php
	require_once("../utils/bottom_page.php");
?>
							
							