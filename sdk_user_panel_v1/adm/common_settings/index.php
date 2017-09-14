<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	include_once("../../config/config.php");
	
	include_once("../utils/menu.php");
	
	include_once("../utils/top_html.php");
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin = intval($_SESSION['id_user_adm']);
	
	$tr_checkbox_settings = "";
	$tr_textbox_settings = "";
	
	$query = "select * from $tbl_common_checkbox_settings";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных.");
	}
	
	while($setting=mysql_fetch_array($res))
	{
		$id_setting = $setting['id'];
		$name_setting = $setting['name_setting'];
		$status_setting = $setting['status'];
		$date_install_setting = $setting['date_install'];
		$comment = $setting['comment'];
		
		if($status_setting == "1")
		{
			$status_setting = "checked";
		}
		else
		{
			$status_setting = "";
		}
		
		$tr_checkbox_settings .= "<tr>
			<td style='width:400px; border:1px solid #5a1f08;background:#fac9b6;padding:10px;'>$name_setting:</td>
			<td style='border:1px solid #5a1f08;padding:10px;'><input type='checkbox' onchange=\"fn_change_state_checkbox_common_setting($id_setting,this);\" $status_setting></td>
			<td></td>
		</tr>";
	}
	
	
	$query = "select * from $tbl_common_textbox_settings";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных.");
	}
	
	while($setting=mysql_fetch_array($res))
	{
		$id_setting = $setting['id'];
		$name_setting = $setting['name'];
		$value_setting = $setting['value'];
		$date_change_setting = $setting['date_change'];
		$comment = $setting['comment'];
		

		
		$tr_checkbox_settings .= "<tr>
			<td style='width:400px; border:1px solid #5a1f08;background:#fac9b6;padding:10px;'>$name_setting:</td>
			<td style='border:1px solid #5a1f08;padding:10px;'><input id='version_sdk' value='$value_setting' type='textbox'  style='width:100px;'></td>
			<td style=''><button class='btn' onclick=\"fn_change_version_sdk();\">Применить</button></td>
		</tr>";
	}

	
	$title_adm = "Управление общими настройками программы";
	
	include_once("../utils/top_page.php");

?>	
<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/jquery.tinymce.min.js"></script>
<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/plugins/tiny_mce_wiris/core/display.js"></script>
<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/plugins/tiny_mce_wiris/integration/WIRISplugins.js?viewer=image"></script>
	
<script type="text/javascript" src="./main_script.js">
</script>

<table style='padding:20px;'>
	<?php
		echo $tr_checkbox_settings;
	?>
</table>


					
					
<div id="pic" style="border:1px solid #5a1f08;width:850px;display:none;">
					
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



<?php
	require_once("../utils/bottom_page.php");
?>
							
							