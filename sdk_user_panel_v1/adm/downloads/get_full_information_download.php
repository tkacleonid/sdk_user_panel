<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin= intval($_SESSION['id_user_adm']);
	
	$id_download= -1;
	
	if(!empty($_POST['id_download']))
	{
		$id_download= intval($_POST['id_download']);
	}
	
	if($id_download < 1)
	{
		$id_download= -1;
	}
	
	if($id_download== -1)
	{
		exit("Произошла ошибка при определении загрузки");
	}
	
	
	$query= "select downloads.id As id_download,
			downloads.id_group As id_group_download,
			downloads.name As name_download,
			downloads.comment As comment_download,
			downloads.short_description As short_description_download,
			downloads.long_description As long_description_download,
			downloads.ref_download As ref_download,
			downloads.icon_download As icon_download,
			downloads.id_admin_add As id_admin_add_download,
			downloads.id_admin_last_modified As id_admin_last_modified_download,
			downloads.date_add As date_add_download,
			downloads.date_last_modified As date_last_modified_download,
			downloads.position As position_download,
			downloads.status As status_download,
			admins.login As login_admin_add,
			admins2.login As login_admin_last_modified,
			group_downloads.name As group_downloads_name
			
			from $tbl_downloads As downloads
			
			left join $tbl_group_downloads As group_downloads 
			on downloads.id_group=group_downloads.id
			
			left join $tbl_adm_accounts As admins 
			on downloads.id_admin_add=admins.id 
			
			left join $tbl_adm_accounts As admins2 
			on downloads.id_admin_last_modified=admins2.id

			
			where downloads.id= $id_download";
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных".mysql_error());
	}
	
	$download= @mysql_fetch_array($res);
	
	if(!$download)
	{
		exit("Загрузка не обнаружена в базе данных");
	}
	
	
	$id_download= $download['id_download'];
	$id_group_download= $download['id_group_download'];
	$name_download= $download['name_download'];
	$comment_download= $download['comment_download'];
	$short_description_download= $download['short_description_download'];
	$long_description_download= $download['long_description_download'];
	$ref_download= $download['ref_download'];
	$icon_download= $download['icon_download'];
	$id_admin_add_download= $download['id_admin_add_download'];
	$id_admin_last_modified_download= $download['id_admin_last_modified_download'];
	$date_add_download= $download['date_add_download'];
	$date_last_modified_download= $download['date_last_modified_download'];
	$position_download= $download['position_download'];
	$status_download= $download['status_download'];
	$login_admin_add= $download['login_admin_add'];
	$login_admin_last_modified= $download['login_admin_last_modified'];
	$group_downloads_name= $download['group_downloads_name'];
	
	if($status_download== "0")
	{
		$status_download= "";
	}
	else
	{
		$status_download= "checked";
	}
	
	
	
?>
	<table style="width:100%;">
		<tr>
			<td colspan=2>
				<p id="error_download_full_information_dialog" style="color:red;"></p>
			</td>
		</tr>
		<tr style='display:none;'>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Идентификатор группы загрузок:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<?php echo $id_group_download;  ?>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Название загрузки:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<?php echo $name_download;  ?>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Видимость загрузки:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<input <?php echo $status_download;  ?> id="visibility_download_full_information_dialog" type="checkbox" style="" disabled>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Краткое описание:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<?php echo $short_description_download;  ?>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Расширенное описание:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<textarea id="long_description_download_full_information_dialog" style="width:90%;height:300px;overflow:auto;"><?php echo $long_description_download;  ?></textarea>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:300px;font-weight:bold;">
				Иконка:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<div style="height:25px;">
					<div id="ref_icon_preview_download_full_information_dialog" style="width:25px; height:100%;padding:0px;margin:0px;float:left;display:inline;background:#f0efee url('../../styles/images/preview_icon.png') center no-repeat;border:1px solid black;border-right:none;cursor:pointer;">
					</div>
					<div style="padding:0px;margin:0px;float:left;height:100%;">
						<input value='<?php echo $icon_download;  ?>' id="path_icon_download_full_information_dialog" type="textbox" style="width: 400px;height:100%;padding:0px;background: #f0efee;border:none;border:1px solid black;padding:0px;margin:0px;" disabled>
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
					<div onclick="fn_file_preview($('#path_file_download_full_information_dialog').val());" id="ref_file_preview_download_full_information_dialog" style="width:25px; height:100%;padding:0px;margin:0px;float:left;display:inline;background:#f0efee url('../../styles/images/preview_icon.png') center no-repeat;border:1px solid black;border-right:none;cursor:pointer;">
					</div>
					<div style="padding:0px;margin:0px;float:left;height:100%;">
						<input value='<?php echo $ref_download;  ?>' id="path_file_download_full_information_dialog" type="textbox" style="width: 400px;height:100%;padding:0px;background: #f0efee;border:none;border:1px solid black;padding:0px;margin:0px;" disabled>
					</div>
				</div>			
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Комментарий:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<?php echo $comment_download;  ?>
			</td>
		</tr>
	</table>
	<input type="hidden" id="hdn_id_download_download_full_information_dialog" value="<?php echo $id_download; ?>">
<script type="text/javascript">
function fn_tinymce_for_edit_download()
{	
	tinymce.init({
		selector: "#long_description_download_full_information_dialog",
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
	fn_tinymce_for_edit_download();
	$("#btn_save_download_full_information_dialog").button();
	$("#btn_choice_file_download_full_information_dialog").button();
	$("#btn_choice_icon_download_full_information_dialog").button();
	
	$("#ref_icon_preview_download_full_information_dialog").mouseover("on",function(e){
		this.t = this.title;
		this.title = '';	
		var c = (this.t != '') ? "<br/>" + this.t : '';
		$("body").append("<p id='image_preview'><span>Отсутствует изображение</span></p>");
		$("#image_preview")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px")
			.fadeIn("fast");
		var img = new Image();
		img.onload = function(){
			var w = this.width;
			var h = this.height;
			var n_w = w;
			var n_h = h;
			if((w >= h) && (w > 400))
			{
				n_w = 400;
				n_h = parseInt((400/w)*h);
			}
			else if((h > w) && (h > 400))
			{
				n_h = 400;
				n_w = parseInt((400/h)*w);
			}
			$("#image_preview img").remove();
			$("#image_preview span").remove();
			$("#image_preview").append("<img style='width:"+n_w+"px;height:"+n_h+"px;' src="+($('#path_icon_download_full_information_dialog').val())+ " alt='Отсутствует изображение' />");
		}
		img.src = $('#path_icon_download_full_information_dialog').val();	

		var w = img.width;
		var h = img.height;
		var n_w = w;
		var n_h = h;
		if((w > 0) && (h > 0))
		{
			if((w >= h) && (w > 400))
			{
				n_w = 400;
				n_h = parseInt((400/w)*h);
			}
			else if((h > w) && (h > 400))
			{
				n_h = 400;
				n_w = parseInt((400/h)*w);
			}
			$("#image_preview img").remove();
			$("#image_preview span").remove();
			$("#image_preview").append("<img style='width:"+n_w+"px;height:"+n_h+"px;' src="+($('#path_icon_download_full_information_dialog').val())+ " alt='Отсутствует изображение' />");
		}	
	});
	$('#ref_icon_preview_download_full_information_dialog').mouseout("on",function(){
		this.title = this.t;	
		$("#image_preview").remove();
	});	
	$("#ref_icon_preview_download_full_information_dialog").mousemove(function(e){
		$("#image_preview")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px");
	});	
						
						
});
</script>