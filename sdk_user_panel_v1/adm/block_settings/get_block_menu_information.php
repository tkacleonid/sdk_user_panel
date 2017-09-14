<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	require_once("../../config/config.php");
	
	
	if(empty($_POST['id']))
	{
		exit("Возникла проблема при получении информации о блоке меню.");
	}
	
	$id = intval($_POST['id']);
	
	$query = "select blocks.id As id,blocks.name As name,blocks.short_desc As short_desc,blocks.icon As icon,blocks.status As status,blocks.url_folder As url_folder,blocks.large_desc As large_desc,blocks.position As position,blocks.date_add As date_add,blocks.date_last_modified As date_last_modified,blocks.id_admin As id_admin,admins.login  As login_admin from $tbl_blocks_menu_ru AS blocks LEFT JOIN $tbl_adm_accounts AS admins ON blocks.id_admin=admins.id where blocks.id=$id limit 1";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Возникла ошибка при обращении к базе данных. Пожалуйста, попробуйте позднее.".mysql_error());
	}
	
	$block_information = "";
	
	while(($block = mysql_fetch_array($res)))
	{
		$id = $block['id'];
		$name = $block['name'];
		$short_desc = $block['short_desc'];
		$icon = $block['icon'];
		$status = $block['status'];
		$url_folder = $block['url_folder'];
		$large_desc = $block['large_desc'];
		$position = $block['position'];
		$date_add = $block['date_add'];
		$date_last_modified = $block['date_last_modified'];
		$id_admin = $block['id_admin'];
		
		$admin_login = $block['login_admin'];
		
		$checked = "";
		
		if($status == "1")
		{
			$checked = "checked";
		}
		
		
		$block_information .= "<table style='width:750px;'>
							<tr style=''>
								<td style='font-weight:bold;border:1px solid #5a1f08;background:#f8baa1;'>Название:</td>
								<td style='border:1px solid #5a1f08;'>$name</td>
							</tr>
							<tr style=''>
									<td style='vertical-align:middle;font-weight:bold;border:1px solid #5a1f08;background:#f8baa1;'>Иконка:</td>
									<td style='vertical-align:middle;border:1px solid #5a1f08;'><img src='$icon' class='block_icon_img' style='width:50px;height:50px'></td>
							</tr>
							<tr style=''>
								<td style='font-weight:bold;border:1px solid #5a1f08;background:#f8baa1;'>Директория:</td>
								<td style='border:1px solid #5a1f08;'>$url_folder</td>
							</tr>
							<tr style=''>
								<td style='font-weight:bold;border:1px solid #5a1f08;background:#f8baa1;'>Дата добавления:</td>
								<td style='border:1px solid #5a1f08;'>$date_add</td>
							</tr>
							<tr style=''>
								<td style='font-weight:bold;border:1px solid #5a1f08;background:#f8baa1;'>Дата последнего редактирования:</td>
								<td style='border:1px solid #5a1f08;'>$date_last_modified</td>
							</tr>
							<tr style='font-weight:bold;border:1px solid #5a1f08;'>
								<td style='border:1px solid #5a1f08;background:#f8baa1;'>Администратор:</td>
								<td style='border:1px solid #5a1f08;'>$admin_login</td>
							</tr>
							<tr style='font-weight:bold;border:1px solid #5a1f08;'>
								<td style='border:1px solid #5a1f08;background:#f8baa1;'>Видимость:</td>
								<td style='border:1px solid black;'><input type='checkbox' disabled $checked></td>
							</tr>
							<tr style='font-weight:bold;height:height:100px;'>
								<td style='border:1px solid #5a1f08;background:#f8baa1;'>Краткое описание:</td>
								<td style='border:1px solid #5a1f08;'><div style='width:100%;height:100px;overflow:auto;'>$short_desc</div></td>
							</tr>
							<tr style='font-weight:bold;height:250px;'>
								<td style='border:1px solid #5a1f08;background:#f8baa1;'>Подробное описание:</td>
								<td style='border:1px solid #5a1f08;'><div style='width:100%;height:250px;overflow:auto;'>$large_desc</div></td>
							</tr>
						</table>";
	}
		
	
	echo $block_information;
?>