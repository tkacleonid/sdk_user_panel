<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin= intval($_SESSION['id_user_adm']);
	
	$id_current_group_downloads= -1;
	
	if(!empty($_POST['id_current_group_downloads']))
	{
		$id_current_group_downloads= intval($_POST['id_current_group_downloads']);
	}
	
	if($id_current_group_downloads < 1)
	{
		$id_current_group_downloads= -1;
	}
	
	if($id_current_group_downloads== -1)
	{
		exit("Произошла ошибка при определении группы загрузок");
	}
	
	
	$query= "select group_downloads.id As id,
		group_downloads.name As name,
		group_downloads.short_description As short_description ,
		group_downloads.long_description As long_description,
		group_downloads.status As status,
		group_downloads.date_add As date_add,
		group_downloads.date_last_modified As date_last_modified,
		group_downloads.id_admin_add As id_admin_add,
		group_downloads.id_admin_last_modified As id_admin_last_modified,
		group_downloads.position As position,
		admins.login As admin_add_login,
		admins2.login As admin_modified_login
		
		from $tbl_group_downloads As group_downloads 
		left join $tbl_adm_accounts As admins 
		on group_downloads.id_admin_add=admins.id 
		
		left join $tbl_adm_accounts As admins2 
		on group_downloads.id_admin_last_modified=admins2.id

		where (group_downloads.id=$id_current_group_downloads)";
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных".mysql_error());
	}
	
	$group_downloads= @mysql_fetch_array($res);
	
	if(!$group_downloads)
	{
		exit("Группа загрузок не обнаружена в базе данных");
	}
	
	$id= $group_downloads["id"];
	$name= $group_downloads["name"];
	$short_description= $group_downloads["short_description"];
	$long_description= $group_downloads["long_description"];
	$status= $group_downloads["status"];
	$date_add= $group_downloads["date_add"];
	$date_last_modified= $group_downloads["date_last_modified"];
	$date_last_modified= $group_downloads["date_last_modified"];
	$id_admin_add= $group_downloads["id_admin_add"];
	$id_admin_last_modified= $group_downloads["id_admin_last_modified"];
	$position= $group_downloads["position"];
	
	$admin_add_login= $group_downloads["admin_add_login"]; 
	$admin_modified_login= $group_downloads["admin_modified_login"]; 
	
	if($status== "0")
	{
		$status= "";
	}
	else
	{
		$status= "checked";
	}
	
?>
	<table style="width:100%;">
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Название группы загрузок:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<?php
					echo $name;
				?>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Дата добавления:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<?php
					echo $date_add;
				?>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Дата последнего изменения:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<?php
					echo $date_last_modified;
				?>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Добавил администратор:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;cursor:pointer;"  onclick="fn_get_profile_admin_information(<?php echo $id_admin_add; ?>);"   onmouseover="this.style.background='#fac9b6'" onmouseout="this.style.background='none'" >
				<?php
					echo $admin_add_login;
				?>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Отредактировал администратор:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;cursor:pointer;"   onclick="fn_get_profile_admin_information(<?php echo $id_admin_last_modified; ?>);"   onmouseover="this.style.background='#fac9b6'" onmouseout="this.style.background='none'" >
				<?php
					echo $admin_modified_login;
				?>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Видимость группы загрузок:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<input id="visibility_group_downloads_add_new_group_downloads_dialog" type="checkbox" style="" <?php echo $status; ?> disabled>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Краткое описание:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<div style="width:90%;height:150px;overflow:auto;">
					<?php
						echo $short_description;
					?>
				</div>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Расширенное описание:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<div style="width:90%;height:300px;overflow:auto;">
					<?php
						echo $long_description;
					?>
				</div>
			</td>
		</tr>
	</table>