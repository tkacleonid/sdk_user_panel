<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	require_once("../../config/config.php");

	if(empty($_POST['id']))
	{
		exit("Возникла проблема при получении информации о блоке меню.");
	}
	
	$id= intval($_POST['id']);
	
	$query = "select 
			blocks.id As id,
			blocks.name As name,
			blocks.short_desc As short_desc,
			blocks.status As status,
			blocks.status_debug As status_debug,
			blocks.url_folder As url_folder,
			blocks.large_desc As large_desc,
			blocks.position As position,
			blocks.date_add As date_add,
			blocks.date_last_modified As date_last_modified,
			blocks.id_admin_add As id_admin_add,
			blocks.id_admin_last_modified As id_admin_last_modified,
            blocks.status_visibility_without_authorized As status_visibility_without_authorized,
			admins.login  As login_admin_add, 
			admins2.login  As login_admin_last_modified
			
			from $tbl_blocks_menu_frontend_ru AS blocks
			
			LEFT JOIN $tbl_adm_accounts AS admins 
			ON blocks.id_admin_add=admins.id 
			
			LEFT JOIN $tbl_adm_accounts AS admins2 
			ON blocks.id_admin_last_modified=admins2.id 
			
			where blocks.id=$id limit 1";	
			
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Возникла ошибка при обращении к базе данных. Пожалуйста, попробуйте позднее.");
	}
	
	$block_information= "";
	
	while(($block= mysql_fetch_array($res)))
	{
		$id= $block['id'];
		$name= $block['name'];
		$short_desc= $block['short_desc'];
		$icon= $block['icon'];
		$status= $block['status'];
		$url_folder= $block['url_folder'];
		$large_desc= $block['large_desc'];
		$position= $block['position'];
		$date_add= $block['date_add'];
		$date_last_modified= $block['date_last_modified'];
		$id_admin_add= $block['id_admin_add'];
		$id_admin_last_modified= $block['id_admin_last_modified'];
		$status_debug= $block['status_debug'];
      	$status_visibility_without_authorized= $block['status_visibility_without_authorized'];
		
		$admin_login_add= $block['login_admin_add'];
		$admin_login_last_modified= $block['login_admin_last_modified'];
		
		if($status == "1")
		{
			$status = "checked";
		}
		else
		{
			$status = "";
		}
		
		if($status_debug == "1")
		{
			$status_debug = "checked";
		}
		else
		{
			$status_debug = "";
		}
      
      	if($status_visibility_without_authorized == "1")
		{
			$status_visibility_without_authorized = "checked";
		}
		else
		{
			$status_visibility_without_authorized = "";
		}
		
		
		$block_information .= "<table style'''>
							<tr>
								<td colspan=2>
									<p id='error_edit_block_menu_dialog' style='color:red;'></p>
								</td>
							</tr>
							<tr style=''>
								<td style='font-weight:bold;border:1px solid black;background:#f8baa1;'>Название:</td>
								<td style='border:1px solid black;'><input id='name_edit_block_menu_dialog' type='textbox' style='width: 500px;' value='$name'></td>
							</tr>
							<tr style=''>
								<td style='font-weight:bold;border:1px solid black;background:#f8baa1;'>Директория:</td>
								<td style='border:1px solid black;'><input id='directory_edit_block_menu_dialog' type='textbox' style='width: 500px;' value='$url_folder'></td>
							</tr>
							<tr style='font-weight:bold;border:1px solid black;'>
								<td style='border:1px solid black;background:#f8baa1;'>Видимость:</td>
								<td style='border:1px solid black;text-align:center;'><input id='visibility_edit_block_menu_dialog' type='checkbox' value='1' $status></td>
							</tr>
							<tr style='font-weight:bold;border:1px solid #5a1f08;'>
								<td style='border:1px solid #5a1f08;background:#f8baa1;'>Режим отладки:</td>
								<td style='border:1px solid black;text-align:center;'><input id='status_debug_edit_block_menu_dialog' type='checkbox' $status_debug></td>
							</tr>
                            <tr style='font-weight:bold;border:1px solid #5a1f08;'>
								<td style='border:1px solid #5a1f08;background:#f8baa1;'>Видимость без авторизации:</td>
								<td style='border:1px solid black;text-align:center;'><input id='status_visibility_without_authorized_edit_block_menu_dialog' type='checkbox' $status_visibility_without_authorized></td>
							</tr>
							<tr style='font-weight:bold;'>
								<td style='border:1px solid black;background:#f8baa1;'>Краткое описание:</td>
								<td style='border:1px solid black;'><textarea id='short_desc_edit_block_menu_dialog' style='width: 500px;'>$short_desc</textarea></td>
							</tr>
							<tr style='font-weight:bold;'>
								<td style='border:1px solid black;background:#f8baa1;'>Подробное описание:</td>
								<td style='border:1px solid black;'><textarea style='width: 500px;' id='long_desc_edit_block_menu_dialog'>$large_desc</textarea></td>
							</tr>
							<tr style='font-weight:bold;'>
								<td  colspan=2 style='text-align:center;padding-top:20px;'><button id='btn_save_edit_block_menu_dialog' onclick=\"fn_save_edit_block_menu($id);\">Сохранить</button></td>
							</tr>
						</table>
						<script type='text/javascript'>

							$( '#btn_save_edit_block_menu_dialog').button({
							
							});
							
						</script>
						";
	}
		
	
	echo $block_information;

?>