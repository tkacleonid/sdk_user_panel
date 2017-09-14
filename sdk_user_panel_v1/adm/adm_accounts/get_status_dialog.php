<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	include_once("../utils/check_session_admin.php");
		
	
	$id_admin = intval($_SESSION['id_user_adm']);
	
	$id = intval($_POST['id']);

	$str_error = "";
	

	$query = "select * from $tbl_adm_accounts where id = $id";
	
	$res = @mysql_query($query);
		
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позднее.");
	}
		
	$res = @mysql_fetch_array($res);
		
	if(!$res)
	{
		exit("Ошибка обращения к базе данных. Попробуйте позднее.");
	}
		
	$status = $res['status'];
	
	$sel = "";
	
	if($status == "0")
	{
		$sel .= "<option value=0 selected>Полный администратор</option>";
	}
	else
	{
		$sel .= "<option value=0>Полный администратор</option>";
	}
	
	if($status == "1")
	{
		$sel .= "<option value=1 selected>Ожидающий подтверждения</option>";
	}
	else
	{
		$sel .= "<option value=1>Ожидающий подтверждения</option>";
	}
	
	if($status == "2")
	{
		$sel .= "<option value=2 selected>Заблокированный</option>";
	}
	else
	{
		$sel .= "<option value=2>Заблокированный</option>";
	}
	
	if($status == "3")
	{
		$sel .= "<option value=3 selected>Ограниченный администратор</option>";
	}
	else
	{
		$sel .= "<option value=3>Ограниченный администратор</option>";
	}
	

?>

<table cellpadding=0 cellspacing=0 style="width:100%;">
		<tr>
			<td style="font-weight:bold;background:#f8baa1;padding:10px;border:1px solid #5a1f08;">
				Выберите статус:
			</td>
			<td style="border:1px solid #5a1f08;padding:10px;">
				<select id="sel_status" name="sel_status" style="width:400px;">
					<?php echo $sel; ?>
				</select>
			</td>
		</tr>
		<tr>
			<td style="font-weight:bold;background:#f8baa1;padding:10px;border:1px solid #5a1f08;">
				Уведомить пользователя об изменении статуса:
			</td>
			<td style="border:1px solid #5a1f08;padding:10px;">
				<input type="checkbox" id="chk_send_change_status_message" value="1">
			</td>
		</tr>
		<tr>
			<td style="padding:10px;text-align:center;" colspan=2>
				<button id="btn_change_status_dialog" style="margin:30px"; onclick="fn_change_status_admin(<?php echo $id; ?>);">Изменить</button>
			</td>
		</tr>
</table>
<script type="text/javascript">
	
	$(function(){
		$("#btn_change_status_dialog").button();
		$("#sel_status").selectmenu();
	});
	function fn_change_status_admin(id)
	{
		fn_set_status_loading();
		
		var status = $("#sel_status").val();
		var send_email = $("#chk_send_change_status_message").get(0).checked;
		
		if(send_email)
		{
			send_email = "1";
		}
		else
		{
			send_email = "0";
		}
		
		qXHR = $.post("./change_status.php","id="+encodeURIComponent(id)+"&send_email="+encodeURIComponent(send_email)+"&status="+encodeURIComponent(status),fn_success_change_status_admin);
		jqXHR.fail(function(){fn_clear_status_loading();$("#p_error_dialog").html("Ошибка при изменении статуса");
			$( "#error_dialog" ).dialog("open");
		});
		
	}
	function fn_success_change_status_admin(data,textStatus,jqXHR)
	{
		fn_clear_status_loading();
		if(data != "1")
		{
			$("#p_error_dialog").html(data);
			$("#error_dialog" ).dialog("open");
		}
		else
		{
			$("#change_status_dialog").dialog("close");
			$("#p_error_dialog").html("Статус администратора успешно изменен");
			$("#error_dialog" ).dialog("open");
			location.reload(true);
		}
	}
</script>