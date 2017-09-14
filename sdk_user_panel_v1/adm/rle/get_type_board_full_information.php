<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin = intval($_SESSION['id_user_adm']);
	
	$id_current_type_board = -1;
	
	if(!empty($_POST['id_current_type_board']))
	{
		$id_current_type_board = intval($_POST['id_current_type_board']);
	}
	
	if($id_current_type_board < 1)
	{
		$id_current_type_board = -1;
	}
	
	if($id_current_type_board == -1)
	{
		exit("Произошла ошибка при определении типа борта");
	}
	
	
	$query = "select type_boards.id As id,
		type_boards.name As name,
		type_boards.short_description As short_description ,
		type_boards.long_description As long_description,
		type_boards.status As status,
		type_boards.date_add As date_add,
		type_boards.date_last_modified As date_last_modified,
		type_boards.id_admin_add As id_admin_add,
		type_boards.id_admin_modified As id_admin_modified,
		type_boards.key_type_board As key_type_board,
		type_boards.position As position,
		admins.login As admin_add_login,
		admins2.login As admin_modified_login
		
		from $tbl_type_boards As type_boards 
		left join $tbl_adm_accounts As admins 
		on type_boards.id_admin_add=admins.id 
		
		left join $tbl_adm_accounts As admins2 
		on type_boards.id_admin_modified=admins2.id

		where (type_boards.id=$id_current_type_board) and (type_boards.status <> '2')";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных".mysql_error());
	}
	
	$type_board = @mysql_fetch_array($res);
	
	if(!$type_board)
	{
		exit("Тип борта не обнаружен в базе данных");
	}
	
	$id = $type_board["id"];
	$name = $type_board["name"];
	$short_description = $type_board["short_description"];
	$long_description = $type_board["long_description"];
	$status = $type_board["status"];
	$date_add = $type_board["date_add"];
	$date_last_modified = $type_board["date_last_modified"];
	$date_last_modified = $type_board["date_last_modified"];
	$id_admin_add = $type_board["id_admin_add"];
	$id_admin_modified = $type_board["id_admin_modified"];
	$key_type_board = $type_board["key_type_board"];
	$position = $type_board["position"];
	
	$admin_add_login = $type_board["admin_add_login"]; 
	$admin_modified_login = $type_board["admin_modified_login"]; 
	
	if($status == "0")
	{
		$status = "";
	}
	else
	{
		$status = "checked";
	}
	
?>
	<table style="width:100%;">
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Идентификатор типа борта:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;">
				<?php
					echo $key_type_board;
				?>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Название типа борта:
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
			<td style="border:1px solid #5a1f08;padding:5px;cursor:pointer;"   onclick="fn_get_profile_admin_information(<?php echo $id_admin_modified; ?>);"   onmouseover="this.style.background='#fac9b6'" onmouseout="this.style.background='none'" >
				<?php
					echo $admin_modified_login;
				?>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #5a1f08;padding:5px;background:#f8baa1;width:250px;font-weight:bold;">
				Видимость типа борта:
			</td>
			<td style="border:1px solid #5a1f08;padding:5px;text-align:center;">
				<input id="visibility_type_board_add_new_type_board_dialog" type="checkbox" style="" <?php echo $status; ?> disabled>
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