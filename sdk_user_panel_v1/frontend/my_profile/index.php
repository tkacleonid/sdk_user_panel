<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	require_once("../utils/authorized.php");
	
	$title_adm= "Мой профиль";
	
	
	
	include_once("../utils/top_html.php");
	
	include_once("../utils/top_page.php");
	
	

	if($type_user == 0)	
	{
		$id_key = intval($_SESSION['key_id']);
		
		$query = "select * from $tbl_hasp where id=$id_key";
		
		$res = mysql_query($query);
		if(!$res)
		{
			header("Location: ../../index_enter.php");
		}
		
		$hasp = mysql_fetch_array($res);
		
		if(!$hasp)
		{
			header("Location: ../../index_enter.php");
		}
		
		$key_hasp_id = $hasp['id_hasp'];
		$date_end_hasp = $hasp['date_end'];
		$text_contain_hasp = $hasp['text_contain'];
		
		$functionality_hasp = explode(";",$text_contain_hasp);
		
		$functionalyty = "";
		$type_boards = "";
		
		if(intval($functionality_hasp[0]) == 116)
		{
			$functionalyty  .= "Автоматизированная обработка<br>";
		}
		if(intval($functionality_hasp[1]) == 116)
		{
			$functionalyty  .= "Список паспортизированных полетов<br>";
		}
		if(intval($functionality_hasp[2]) == 116)
		{
			$functionalyty  .= "Считывание/стирание БНИ<br>";
		}
		if(intval($functionality_hasp[3]) == 116)
		{
			$functionalyty  .= "Тарировка<br>";
		}
		if(intval($functionality_hasp[4]) == 116)
		{
			$functionalyty  .= "Проверка блоков СДК-8<br>";
		}
		if(intval($functionality_hasp[5]) == 116)
		{
			$functionalyty  .= "Экспорт/импорт полетных данных<br>";
		}
		
		if(intval($functionality_hasp[15]) == 116)
		{
			$type_boards  .= "Ми-8Т (расширенный перечень параметров)<br>";
		}
		if(intval($functionality_hasp[16]) == 116)
		{
			$type_boards  .= "Ми-8Т (перечень параметров САРПП-12)<br>";
		}
		if(intval($functionality_hasp[17]) == 116)
		{
			$type_boards  .= "Ми-8МТВ (расширенный перечень параметров)<br>";
		}
		if(intval($functionality_hasp[18]) == 116)
		{
			$type_boards  .= "Ми-8МТВ (перечень параметров САРПП-12)<br>";
		}
		if(intval($functionality_hasp[19]) == 116)
		{
			$type_boards  .= "Ми-8МТ (расширенный перечень параметров)<br>";
		}
		if(intval($functionality_hasp[20]) == 116)
		{
			$type_boards  .= "Ми-8МТ (перечень параметров САРПП-12)<br>";
		}
		
		$month_end_hasp = intval($functionality_hasp[28]);
		$year_end_hasp = intval($functionality_hasp[29]);
		
		
		$id_company = ($hasp["id_company"]);
		$is_company = false;
		
		$name_company = "Отсутствует";
		$address_company = "Отсутствует";
		$email_company = "Отсутствует";
		$tel_company = "Отсутствует";
		$comment_company = "Отсутствует";
		
		if($id_company != "")
		{
			$id_company = intval($id_company);
			$query = "select * from $tbl_company where id=$id_company";
		
			$res = mysql_query($query);
			
			if($res)
			{
				$company = mysql_fetch_array($res);
				
				if($company)
				{
					$is_company = true;
					$name_company = $company['name'];
					$address_company = $company['address'];
					$email_company = $company['email'];
					$tel_company = $company['tel'];
					$comment_company = $company['comment'];
				}
			}
		}
?>
<input type="hidden" value='<?php echo $id_key; ?>' id="hdn_hasp_id">
<table style='width:100%;'>
	<tr>
		<td style="padding:10px;border:1px solid black;width:300px;font-weight:bold;background:#d5ac5d;">
			Идентификатор ключа HASP:
		</td>
		<td style="padding:10px;border:1px solid black;font-style:italic;">
			<?php  echo $key_hasp_id; ?>
		</td>
	</tr>
	<tr>
		<td style="padding:10px;border:1px solid black;width:300px;font-weight:bold;background:#d5ac5d;">
			Дата окончания действия лицензии:
		</td>
		<td style="padding:10px;border:1px solid black;font-style:italic;">
			<?php 
				if(($month_end_hasp == 255) || ($year_end_hasp==255))
				{
					echo "Лицензия отсутствует"; 
				}
				else
				{
					echo "".$month_end_hasp."-20".$year_end_hasp; 
				}
			
			
			  ?>
		</td>
	</tr>
	<tr>
		<td style="padding:10px;border:1px solid black;width:300px;font-weight:bold;background:#d5ac5d;">
			Функциональность по действующей лицензии:
		</td>
		<td style="padding:10px;border:1px solid black;font-style:italic;">
			<?php echo $functionalyty;   ?>
		</td>
	</tr>
	<tr>
		<td style="padding:10px;border:1px solid black;width:300px;font-weight:bold;background:#d5ac5d;">
			Доступные борты по действующей лицензии:
		</td>
		<td style="padding:10px;border:1px solid black;font-style:italic;">
			<?php echo $type_boards;   ?>
		</td>
	</tr>
	<tr>
		<td style="padding:10px;border:1px solid black;font-weight:bold;background:#d5ac5d;">
			Компания:
		</td>
		<td style="padding:10px;border:1px solid black;font-style:italic;">
			<?php echo $name_company;   ?>
		</td>
	</tr>
	<tr>
		<td style="padding:10px;border:1px solid black;font-weight:bold;background:#d5ac5d;">
			Адресс:
		</td>
		<td style="padding:10px;border:1px solid black;font-style:italic;">
			<?php echo $address_company;   ?>
		</td>
	</tr>
	<tr>
		<td style="padding:10px;border:1px solid black;font-weight:bold;background:#d5ac5d;">
			E-mail:
		</td>
		<td style="padding:10px;border:1px solid black;font-style:italic;">
			<?php echo $email_company;   ?>
		</td>
	</tr>
	<tr>
		<td style="padding:10px;border:1px solid black;font-weight:bold;background:#d5ac5d;">
			Teлефон:
		</td>
		<td style="padding:10px;border:1px solid black;font-style:italic;">
			<?php echo $tel_company;   ?>
		</td>
	</tr>
	<tr>
		<td style="padding:10px;border:1px solid black;font-weight:bold;background:#d5ac5d;">
			Дополнительная информация:
		</td>
		<td style="padding:10px;border:1px solid black;font-style:italic;">
			<?php echo $comment_company;   ?>
		</td>
	</tr>
		<tr>
		<td colspan=2 style="padding:10px;font-weight:bold;">
			<button id="btn_edit_hasp_user_data" onclick="fn_get_edit_hasp_user_information();">Редактировать</button>
		</td>
	</tr>
</table>
<div id="edit_hasp_user_information_dialog" style="display:none;">
	<table style='width:100%;font-size:0.8em;'>
	<tr>
		<td id="error_edit_hasp_user_information_dialog"  colspan=2 style="">
		</td>
	</tr>
	<tr>
		<td style="padding:10px;border:1px solid black;font-weight:bold;background:#d5ac5d;width:300px;">
			Компания:
		</td>
		<td style="padding:10px;border:1px solid black;font-style:italic;">
			<input value='<?php echo $name_company;   ?>' id="company_name_edit_hasp_user_information_dialog" type="textbox" style="width:90%">
		</td>
	</tr>
	<tr>
		<td style="padding:10px;border:1px solid black;font-weight:bold;background:#d5ac5d;">
			Адресс:
		</td>
		<td style="padding:10px;border:1px solid black;font-style:italic;">
			<input value='<?php echo $address_company;   ?>' id="address_edit_hasp_user_information_dialog" type="textbox" style="width:90%">
		</td>
	</tr>
	<tr>
		<td style="padding:10px;border:1px solid black;font-weight:bold;background:#d5ac5d;">
			E-mail:
		</td>
		<td style="padding:10px;border:1px solid black;font-style:italic;">
			<input value='<?php echo $email_company;   ?>' id="email_edit_hasp_user_information_dialog" type="textbox" style="width:90%">
		</td>
	</tr>
	<tr>
		<td style="padding:10px;border:1px solid black;font-weight:bold;background:#d5ac5d;">
			Teлефон:
		</td>
		<td style="padding:10px;border:1px solid black;font-style:italic;">
			<input value='<?php echo $tel_company;   ?>' id="tel_edit_hasp_user_information_dialog" type="textbox" style="width:90%">
		</td>
	</tr>
	<tr>
		<td style="padding:10px;border:1px solid black;font-weight:bold;background:#d5ac5d;">
			Дополнительная информация:
		</td>
		<td style="padding:10px;border:1px solid black;font-style:italic;">
			<textarea id="user_cooment_edit_hasp_user_information_dialog" style="width:90%;height:400px;"><?php echo $comment_company;   ?></textarea>
		</td>
	</tr>
		<tr>
		<td colspan=2 style="padding:10px;font-weight:bold;text-align:center;">
			<button id="btn_save_edit_hasp_user_information_dialog" onclick="fn_save_edit_hasp_user_information();">Сохранить</button>
		</td>
	</tr>
</table>
</div>

<?php
	}
	else if($type_user == 1)
	{
      
      
?>
	Страница находится в разработке.

<?php
	}
	else if($type_user == 2)
	{
		
      $id_admin = intval($_SESSION['id_user_adm']);
		
		$query = "select * from $tbl_adm_accounts where id=$id_admin";
		
		$res = mysql_query($query);
		
		$login_admin = "";
		$psw_admin = "";
		$name_admin = "";
		$patronym_admin ="";
		$last_name_admin = "";
		$company_admin = "";
		$job_title_admin = "";
		$tel_admin = "";
		$description_admin = "";
		$email_admin = "";
		$date_reg_admin = "";
		$image_profile_admin = "";
		$date_last_enter_admin = "";
		$date_last_activity_admin = "";
		
		if($res)
		{
			$admin =mysql_fetch_array($res);
			
			if($admin)
			{
				$id_admin = $admin['id'];
				$login_admin = $admin['login'];
				$psw_admin = $admin['psw'];
				$name_admin = $admin['name'];
				$patronym_admin = $admin['patronym'];
				$last_name_admin = $admin['last_name'];
				$company_admin = $admin['company'];
				$job_title_admin = $admin['job_title'];
				$tel_admin = $admin['tel'];
				$description_admin = $admin['description'];
				$email_admin = $admin['email'];
				$date_reg_admin = $admin['date_reg'];
				$image_profile_admin = $admin['image_profile'];
				$date_last_enter_admin = $admin['date_last_enter'];
				$date_last_activity_admin = $admin['date_last_activity'];
			}
		}
?>
<input type="hidden" value='<?php echo $id_admin; ?>' id="hdn_id_admin">
<table style='width:100%;'>
	<tr>
		<td style="padding:10px;border:1px solid black;width:300px;font-weight:bold;background:#d5ac5d;">
			Логин:
		</td>
		<td style="padding:10px;border:1px solid black;font-style:italic;">
			<?php  echo $login_admin; ?>
		</td>
	</tr>
	<tr>
		<td style="padding:10px;border:1px solid black;width:300px;font-weight:bold;background:#d5ac5d;">
			Имя:
		</td>
		<td style="padding:10px;border:1px solid black;font-style:italic;">
			<?php echo $name_admin;   ?>
		</td>
	</tr>
	<tr>
		<td style="padding:10px;border:1px solid black;width:300px;font-weight:bold;background:#d5ac5d;">
			Фамилия:
		</td>
		<td style="padding:10px;border:1px solid black;font-style:italic;">
			<?php echo $last_name_admin;   ?>
		</td>
	</tr>
	<tr>
		<td style="padding:10px;border:1px solid black;width:300px;font-weight:bold;background:#d5ac5d;">
			Отчество:
		</td>
		<td style="padding:10px;border:1px solid black;font-style:italic;">
			<?php echo $patronym_admin;   ?>
		</td>
	</tr>
	<tr>
		<td style="padding:10px;border:1px solid black;font-weight:bold;background:#d5ac5d;">
			Компания:
		</td>
		<td style="padding:10px;border:1px solid black;font-style:italic;">
			<?php echo $company_admin;   ?>
		</td>
	</tr>
	<tr>
		<td style="padding:10px;border:1px solid black;font-weight:bold;background:#d5ac5d;">
			Должность:
		</td>
		<td style="padding:10px;border:1px solid black;font-style:italic;">
			<?php echo $job_title_admin;   ?>
		</td>
	</tr>
	<tr>
		<td style="padding:10px;border:1px solid black;font-weight:bold;background:#d5ac5d;">
			E-mail:
		</td>
		<td style="padding:10px;border:1px solid black;font-style:italic;">
			<?php echo $email_admin;   ?>
		</td>
	</tr>
	<tr>
		<td style="padding:10px;border:1px solid black;font-weight:bold;background:#d5ac5d;">
			Teлефон:
		</td>
		<td style="padding:10px;border:1px solid black;font-style:italic;">
			<?php echo $tel_admin;   ?>
		</td>
	</tr>
</table>

<?php
	}
	else
	{
		
	}
	include_once("../utils/bottom_page.php");
	
?>
