<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	include_once("../../config/config.php");
	
	include_once("../utils/menu.php");
	
	include_once("../utils/top_html.php");
	
	if(empty($_SESSION['id_user_adm']))
	{
		//exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin = intval($_SESSION['id_user_adm']);
	
	$query = "select * from $tbl_adm_accounts where id=$id_admin";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		//exit("Возникла ошибка при обращении к базе данных");
	}
	
	$res = @mysql_fetch_array($res);
	
	if(!$res)
	{
		//exit("Возникла ошибка при обращении к базе данных");
	}
	
	
	$login = $res["login"];
	$status = $res["status"];
	$name = $res["name"];
	$last_name = $res["last_name"];
	$patronym = $res["patronym"];
	$job_title = $res["job_title"];
	$tel = $res["tel"];
	$tel = $res["tel"];
	$email = $res["email"];
	$desc = $res["description"];
	$image_profile = $res["image_profile"];
	$date_reg = $res["date_reg"];
	
	$title_adm = "Администраторы";
	
	include_once("../utils/top_page.php");

?>	
<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/jquery.tinymce.min.js"></script>
<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/plugins/tiny_mce_wiris/core/display.js"></script>
<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/plugins/tiny_mce_wiris/integration/WIRISplugins.js?viewer=image"></script>
	
<script type="text/javascript" src="./main_script.js">
</script>				

<?php
	require_once("./get_adm_accounts.php");
?>
<div id="profile_admin_information_dialog" style='display:none;'>
	<div id="profile_admin_information" style=''>
	</div>
	<button id="btn_edit_profile_user_information" class="btn_edit" style="font-size:0.6em;" onclick="fn_get_edit_profile_admin_information($('#hdn_id_admin_in_admin_information_dialog').val());">Редактировать</button>
</div>		
<div id="edit_profile_admin_information" style='display:none;'>

</div>		
					
<div id="pic" style="border:1px solid #5a1f08;width:850px;display:none;">
					
</div>
<div id="status_loading" style="display:none;">
			<div id="loading">	
			</div>
</div>
<div id="error_dialog" style="text-align:center; display: none;">
	<p id="p_error_dialog" style="width:100%"></p>
	<hr style='border:1px solid #5a1f08'>
	<button id="btn_error_dialog" style="margin:20px";>OK</button>
<div>
<div id="change_status_dialog" style=" display: none;padding-top:20px;">
	
<div>


<?php
	require_once("../utils/bottom_page.php");
?>
							
							