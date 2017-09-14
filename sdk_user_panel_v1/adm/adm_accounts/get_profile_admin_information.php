<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	if(empty($_SESSION['id_user_adm']))
	{
		//exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin = intval($_SESSION['id_user_adm']);
	
	$id = intval($_POST["id"]);
	
	$query = "select * from $tbl_adm_accounts where id=$id";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Возникла ошибка при обращении к базе данных");
	}
	
	$adm = @mysql_fetch_array($res);
	
	if(!$adm)
	{
		exit("Возникла ошибка при обращении к базе данных");
	}
	
	$login = $adm["login"];
	$status = $adm["status"];
	$name = $adm["name"];
	$last_name = $adm["last_name"];
	$patronym = $adm["patronym"];
	$company = $adm["company"];
	$job_title = $adm["job_title"];
	$tel = $adm["tel"];
	$description = $adm["description"];
	$email = $adm["email"];
	$date_reg = $adm["date_reg"];
	$image_profile = $adm["image_profile"];
	$date_last_enter = $adm["date_last_enter"];
	$date_last_activity = $adm["date_last_activity"];
		
	
?>	



<table cellspacing=0 cellpadding=0 style="padding:20px;width:100%;">
	<tr>
		<td style=''>
			<table style='width:100%;'>
				<tr>
					<td id="my_profile_picture" style='text-align:center;'>
						<img src="<?php if($image_profile == "") {echo "../../pictures/general/my_profile.png";} else {echo $image_profile;} ?>" style="width:200px; overflow:hidden;border:1px solid #5a1f08;">
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table cellspacing=0 cellpadding=0 style="padding:0px;width:100%">
						<tr>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:bold;width:300px;background:#f8baa1;padding:10px;vertical-align:middle;">
								Логин:
							</td>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:normal;text-align:left;vertical-align:middle;padding:10px;">
								<div style="width:100%;">
									<?php
										echo $login;
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:bold;width:300px;background:#f8baa1;padding:10px;vertical-align:middle;">
								Имя:
							</td>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:normal;text-align:left;vertical-align:middle;padding:10px;">
								<div style="width:100%;">
									<?php
										echo $name;
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:bold;width:300px;background:#f8baa1;padding:10px;vertical-align:middle;">
								Фамилия:
							</td>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:normal;text-align:left;vertical-align:middle;padding:10px;">
								<div style="width:100%;">
									<?php
										echo $last_name;
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:bold;width:300px;background:#f8baa1;padding:10px;vertical-align:middle;">
								Отчество:
							</td>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:normal;text-align:left;vertical-align:middle;padding:10px;">
								<div style="width:100%;">
									<?php
										echo $patronym;
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:bold;width:300px;background:#f8baa1;padding:10px;vertical-align:middle;">
								Компания:
							</td>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:normal;text-align:left;vertical-align:middle;padding:10px;">
								<div style="width:100%;">
									<?php
										echo $company;
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:bold;width:300px;background:#f8baa1;padding:10px;vertical-align:middle;">
								Должность:
							</td>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:normal;text-align:left;vertical-align:middle;padding:10px;">
								<div style="width:100%;">
									<?php
										echo $job_title;
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:bold;width:300px;background:#f8baa1;padding:10px;vertical-align:middle;">
								Телефон:
							</td>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:normal;text-align:left;vertical-align:middle;padding:10px;">
								<div style="width:100%;">
									<?php
										echo $tel;
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:bold;width:300px;background:#f8baa1;padding:10px;vertical-align:middle;">
								E-mail:
							</td>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:normal;text-align:left;vertical-align:middle;padding:10px;">
								<div style="width:100%;">
									<?php
										echo $email;
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:bold;width:300px;background:#f8baa1;padding:10px;vertical-align:middle;">
								Дата регистрации:
							</td>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:normal;text-align:left;vertical-align:middle;padding:10px;">
								<div style="width:100%;">
									<?php
										echo $date_reg;
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:bold;width:300px;background:#f8baa1;padding:10px;vertical-align:middle;">
								Дата последней активности:
							</td>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:normal;text-align:left;vertical-align:middle;padding:10px;">
								<div style="width:100%;">
									<?php
										echo $date_last_activity;
									?>
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:bold;width:300px;background:#f8baa1;padding:10px;vertical-align:middle;">
								Дополнительная информация:
							</td>
							<td style="vertical-align:top;border:1px solid #5a1f08;font-weight:normal;text-align:left;vertical-align:middle;padding:10px;height:150px;">
								<div style="width:100%;height:100%;overflow:auto;">
									<?php
										echo $desc;
									?>
								</div>
							</td>
						</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td style="vertical-align:top;border:none;font-weight:bold;font-size:0.6em;padding-top:10px;">
			<input id="hdn_id_admin_in_admin_information_dialog" type=hidden value=<?php echo $id; ?>
		</td>
		<td></td>
	</tr>
</table>
<script>
	$(function(){
		$(".btn_edit").button({
			icons:{primary:'ui-icon-pencil'},text:false,
		});
		
	});
</script>				
						
							