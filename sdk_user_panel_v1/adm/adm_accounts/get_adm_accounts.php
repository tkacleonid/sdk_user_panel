<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	
	include_once("../../config/config.php");
	
	
	$page= intval($_POST['page']);
	$num= intval($_POST['num']);
	
	if($num < 1) $num= 10;
	if($page < 1) $page= 1;
	
	$query= "select count(*) from $tbl_adm_accounts";
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Возникла ошибка при обращении к базе данных. Пожалуйста, попробуйте позднее.");
	}
	
	$count= @mysql_fetch_array($res);
	
	$count_pages= intval($count[0] / $num);
	
	if($count[0] % $num != 0)
	{
		$count_pages += 1;
	}
	
	if(($page > $count_pages) || ($page < 1))
	{
		$page= 1;
	}
	
	$sub_lim= ($page - 1)*$num;
	
	
	$query= "select  COUNT(*) from $tbl_adm_accounts";
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Возникла ошибка при обращении к базе данных. Пожалуйста, попробуйте позднее.");
	}
	$res= @mysql_fetch_array($res);
	$num_rows= $res[0];
	
	$query= "select * from $tbl_adm_accounts";
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Возникла ошибка при обращении к базе данных. Пожалуйста, попробуйте позднее.");
	}
	
	
	$adm_table= "<table cellspacing=0 cellpadding=0 style='padding:20px;'>
			<tr style='background:#c05930;'>
				<td>
				</td>
				<td style='padding:10px;background:#c05930;border:1px solid #5a1f08;text-align:center; vertical-align:middle;font-weight: bold;width: 150px;'>
					Изображение
				</td>
				<td style='padding:10px;background:#c05930;border:1px solid #5a1f08;text-align:center; vertical-align:middle;font-weight: bold;width: 150px;'>
					Логин
				</td>
				<td style='padding:10px;background:#c05930;border:1px solid #5a1f08;text-align:center; vertical-align:middle;font-weight: bold;width: 150px;'>
					Имя
				</td>
				<td style='padding:10px;background:#c05930;border:1px solid #5a1f08;text-align:center; vertical-align:middle;font-weight: bold;width: 150px;'>
					Фамилия
				</td>
				<td style='padding:10px;background:#c05930;border:1px solid #5a1f08;text-align:center; vertical-align:middle;font-weight: bold;width: 150px;'>
					Отчество
				</td>
				<td style='padding:10px;background:#c05930;border:1px solid #5a1f08;text-align:center; vertical-align:middle;font-weight: bold;width: 100px;'>
					Дата регистрации
				</td>
				<td style='padding:10px;background:#c05930;border:1px solid #5a1f08;text-align:center; vertical-align:middle;font-weight: bold;width: 100px;'>
					Дата последнего входа
				</td>
				<td style='padding:10px;background:#c05930;border:1px solid #5a1f08;text-align:center; vertical-align:middle;font-weight: bold;width: 100px;'>
					Статус
				</td>
				<td style='padding:10px;background:#c05930;border:1px solid #5a1f08;text-align:center; vertical-align:middle;font-weight: bold;width: 100px;'>
					Операции
				</td>
			</tr>
		";
	$c= 0;
	while(($adm= mysql_fetch_array($res)))
	{
		$id= $adm["id"];
		$login= $adm["login"];
		$status= $adm["status"];
		$name= $adm["name"];
		$last_name= $adm["last_name"];
		$patronym= $adm["patronym"];
		$company= $adm["company"];
		$job_title= $adm["job_title"];
		$tel= $adm["tel"];
		$description= $adm["description"];
		$email= $adm["email"];
		$date_reg= $adm["date_reg"];
		$image_profile= $adm["image_profile"];
		$date_last_enter= $adm["date_last_enter"];
		$date_last_activity= $adm["date_last_activity"];
		
		switch($status)
		{
			case '0':
				$status= "Полный администратор";
				break;
			case '1':
				$status= "Ожидающий подтверждения";
				break;
			case '2':
				$status= "Заблокированный";
				break;
			case '3':
				$status= "Ограниченный администратор";
				break;
		}
		
		if($image_profile != "")
		{
			$img= "<img src='$image_profile' style='width:100px;height:100px;'>";
		}
		else
		{
			$img= "";
		}
		$c++;
		$str_table= "<tr style='' onmouseover=\"this.style.background='#f5a788'\" onmouseout=\"this.style.background='#FFFFFF'\">
				<td style='padding:10px;border:1px solid #5a1f08;text-align:center; vertical-align:middle;font-weight: normal;'>
					$c.
				</td>
				<td style='padding:10px;border:1px solid #5a1f08;text-align:center; vertical-align:middle;font-weight: normal;width: 150px;'>
					$img
				</td>
				<td style='padding:10px;border:1px solid #5a1f08;text-align:center; vertical-align:middle;font-weight: normal;width: 150px;cursor:pointer;' onclick='fn_get_profile_admin_information($id);'  onmouseover=\"this.style.background='#fac9b6'\" onmouseout=\"this.style.background='none'\" >
					$login
				</td>
				<td style='padding:10px;border:1px solid #5a1f08;text-align:center; vertical-align:middle;font-weight: normal;width: 150px;'>
					$name
				</td>
				<td style='padding:10px;border:1px solid #5a1f08;text-align:center; vertical-align:middle;font-weight: normal;width: 150px;'>
					$last_name
				</td>
				<td style='padding:10px;border:1px solid #5a1f08;text-align:center; vertical-align:middle;font-weight: normal;width: 150px;'>
					$patronym
				</td>
				<td style='padding:10px;border:1px solid #5a1f08;text-align:center; vertical-align:middle;font-weight: normal;width: 100px;'>
					$date_reg
				</td>
				<td style='padding:10px;border:1px solid #5a1f08;text-align:center; vertical-align:middle;font-weight: normal;width: 100px;'>
					$date_last_enter
				</td>
				<td style='padding:10px;border:1px solid #5a1f08;text-align:center; vertical-align:middle;font-weight: normal;width: 100px;'>
					$status
				</td>
				<td style='padding:10px;border:1px solid #5a1f08;text-align:center; vertical-align:middle;font-weight: normal;width: 100px;font-size:0.6em;'>
					<button class='btn_change_status' onclick='fn_change_status_admin_dialog_open($id);' >Изменить статус</button>
					<button class='btn_edit' onclick='fn_get_edit_profile_admin_information($id);'>Редактировать</button>
					<button class='btn_delete' onclick='fn_delete_profile_admin_information($id);'>Удалить</button>
				</td>
			</tr>";
		$adm_table .= $str_table;
	}
	$script= "<script type='text/javascript'>
		$(function(){
			$('.btn_change_status').button({
				icons:{primary:'ui-icon-star',},
				text:false,
			});
			$('.btn_edit').button({
				icons:{primary:'ui-icon-pencil',},
				text:false,
			});
			$('.btn_delete').button({
				icons:{primary:'ui-icon-close',},
				text:false,
			});
		});
	</script>";
	$adm_table .= "</table>";
	echo $adm_table.$script;
?>
