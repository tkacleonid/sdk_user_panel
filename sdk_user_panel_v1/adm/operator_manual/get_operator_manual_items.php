<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin= intval($_SESSION['id_user_adm']);
	
	
	
	$page= intval($_POST['page']);
	$num= intval($_POST['num']);
	
	if($num < 1) $num= 10;
	if($page < 1) $page= 1;
	
	$query= "select count(*) from $tbl_operator_manual_items_ru";
	
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
	
	
	$query= "select  COUNT(*) from $tbl_operator_manual_items_ru";
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Возникла ошибка при обращении к базе данных. Пожалуйста, попробуйте позднее.");
	}
	$res= @mysql_fetch_array($res);
	$num_rows= $res[0];

		
	$operator_manual_items_table= "
	<input type='hidden' value='$page' id='hdn_page_tbl_operator_manual_items'>
	<input type='hidden' value='$num' id='hdn_num_tbl_operator_manual_items'>
<table cellspacing=0 cellpadding=0 style='width:100%;'>
	<tr  style='display:table-row; background:#f37e50;background:linear-gradient(to bottom , #f37e50, #944d31); font-weight: bold;border: 1px solid #5a1f08;'>
			<!--<td style='display:table-cell;border-left: 1px solid #5a1f08;border-top: 1px solid #5a1f08;'>
								
			</td>-->
			<td style='display:table-cell;padding: 20px;text-align:center;border-left: 1px solid #5a1f08;border-top: 1px solid #5a1f08;'>
				Наименование
			</td>
			<td style='display:table-cell; padding: 20px;text-align:center;border-left: 1px solid #5a1f08;border-top: 1px solid #5a1f08;'>
				Дата добавления
			</td>
			<td style='display:table-cell; padding: 20px;text-align:center;border-left: 1px solid #5a1f08;border-top: 1px solid #5a1f08;'>
				Дата изменения
			</td>
			<td style='display:table-cell; padding: 20px;text-align:center;border-left: 1px solid #5a1f08;border-top: 1px solid #5a1f08;'>
				Администратор
			</td>
			<td style='display:table-cell; padding: 20px;text-align:center;border-left: 1px solid #5a1f08;border-top: 1px solid #5a1f08;border-right: 1px solid #5a1f08;width:250px;'>
				Операции
			</td>
		</tr>";
	
	$count_operator_manual_items= 0;
	
	
	if($num_rows== 0)
	{
		$operator_manual_items_table .= "<tt>
			<td colspan=5 style='text-align:center;border: 1px solid #5a1f08;'>
				Пункты руководства оператора программы СДК-8 отсутствуют
			</td>
		</tr>";
	}
	
	$query= "select operator_manual_items.id As id_operator_manual_item,
			operator_manual_items.key_operator_manual_item As key_operator_manual_item,
			operator_manual_items.name As name_operator_manual_item,
			operator_manual_items.ref_html_text As ref_html_text_operator_manual_item,
			operator_manual_items.comment As comment_operator_manual_item,
			operator_manual_items.text As text_operator_manual_item,
			operator_manual_items.use_html_text As use_html_text_operator_manual_item,
			operator_manual_items.status As status_operator_manual_item,
			operator_manual_items.id_admin_add As id_admin_add_operator_manual_item,
			operator_manual_items.id_admin_last_modified As id_admin_last_modified_operator_manual_item,
			operator_manual_items.date_add As date_add_operator_manual_item,
			operator_manual_items.date_last_modified As date_last_modified_operator_manual_item,
			operator_manual_items.position As position_operator_manual_item,
			admins.login As login_admin_add,
			admins2.login As login_admin_last_modified
			
			from $tbl_operator_manual_items_ru As operator_manual_items
			
			left join $tbl_adm_accounts As admins 
			on operator_manual_items.id_admin_add=admins.id 
			
			left join $tbl_adm_accounts As admins2 
			on operator_manual_items.id_admin_last_modified=admins2.id
			
			
			order by operator_manual_items.position limit $sub_lim,$num";

		
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Возникла ошибка при обращении к базе данных. Пожалуйста, попробуйте позднее.");
	}
	
	$count_operator_manual_item= $sub_lim;
	
	
	$num_pages= "";
	
	$num_first_pages= 5;
	
	$first_page= 1;
	
	if($page >= $num_first_pages)
	{
		$first_page= $page - ($num_first_pages - 1);
	}
	
	$disable_first= "disabled";
	$disable_prev= "disabled";
	$disable_next= "disabled";
	$disable_last= "disabled";
	
	$num_prev= $page;
	$num_next= $page;
	
	if($page > 1)
	{
		$disable_first= "";
		$disable_prev= "";
		$num_prev= $page - 1;
	}
	
	if($page < $count_pages)
	{
		$disable_next= "";
		$disable_last= "";
		$num_next= $page + 1;
	}
	
	$num_pages .= "<button class='btn_num_pages' id='btn_first_page' onclick=\"fn_get_operator_manual_items(1,$num);\" $disable_first>&lt;&lt;</button>";
	$num_pages .= "<button class='btn_num_pages' id='btn_prev_page' onclick=\"fn_get_operator_manual_items($num_prev,$num);\" $disable_prev>&lt;</button>";
	$p= 1;
	$style= "";
	if($count_pages > $num_first_pages)
	{
		for($i= 0; $i < $num_first_pages; $i++)
		{
			$p= $first_page + $i;
			if($p== $page)
			{
				$style= "style='background:#f1a080'";
			}
			else
			{
				$style= "";
			}
			$num_pages .= "<button class='btn_num_pages' onclick=\"fn_get_operator_manual_items($p,$num);\" $style>$p</button>";
		}
	}
	else
	{
		for($i= 0; $i < $count_pages; $i++)
		{
			$p= $first_page + $i;
			if($p== $page)
			{
				$style= "style='background:#f1a080'";
			}
			else
			{
				$style= "";
			}
			$num_pages .= "<button class='btn_num_pages' onclick=\"fn_get_operator_manual_items($p,$num);\" $style>$p</button>";
		}
	}
	$num_pages .= "<button class='btn_num_pages' id='btn_prev_page' onclick=\"fn_get_operator_manual_items($num_next,$num);\" $disable_next>&gt;</button>";
	$num_pages .= "<button class='btn_num_pages' id='btn_first_page' onclick=\"fn_get_operator_manual_items($count_pages,$num);\" $disable_last>&gt;&gt;</button>";
	
	
	while(($operator_manual_item= mysql_fetch_array($res)))
	{
		$count_operator_manual_item++;
		
		
		$id_operator_manual_item= $operator_manual_item['id_operator_manual_item'];
		$key_operator_manual_item= $operator_manual_item['key_operator_manual_item'];
		$name_operator_manual_item= $operator_manual_item['name_operator_manual_item'];
		$ref_html_text_operator_manual_item= $operator_manual_item['ref_html_text_operator_manual_item'];
		$comment_operator_manual_item= $operator_manual_item['comment_operator_manual_item'];
		$text_operator_manual_item= $operator_manual_item['text_operator_manual_item'];
		$use_html_text_operator_manual_item= $operator_manual_item['use_html_text_operator_manual_item'];
		$id_admin_add_operator_manual_item= $operator_manual_item['id_admin_add_operator_manual_item'];
		$id_admin_last_modified_operator_manual_item= $operator_manual_item['id_admin_last_modified_operator_manual_item'];
		$date_add_operator_manual_item= $operator_manual_item['date_add_operator_manual_item'];
		$date_last_modified_operator_manual_item= $operator_manual_item['date_last_modified_operator_manual_item'];
		$position_operator_manual_item= $operator_manual_item['position_operator_manual_item'];
		$status_operator_manual_item= $operator_manual_item['status_operator_manual_item'];
		$login_admin_add= $operator_manual_item['login_admin_add'];
		$login_admin_last_modified= $operator_manual_item['login_admin_last_modified'];


		$diable_up= "";
		$diable_down= "";
		
		if($count_operator_manual_item== 1)
		{
			$disable_up= "disabled";
			$disable_down= "";
		}
		else if($count_operator_manual_item== $num_rows)
		{
			$disable_up= "";
			$disable_down= "disabled";
		}
		else
		{
			$disable_up= "";
			$disable_down= "";
		}
		
		if($num_rows == 1)
		{
			$disable_up= "disabled";
			$disable_down= "disabled";
		}
		
		if($status_operator_manual_item== "0")
		{
			$color_hide= "#e4dfdd";
			$button_hide_show= "<button class='btn_show btn_icon' onclick=\"fn_show_operator_manual_item($id_operator_manual_item,$page,$num);\" >Отобразить </button>";
		}
		else
		{
			$color_hide= "#FFFFFF";
			$button_hide_show= "<button class='btn_hide btn_icon' onclick=\"fn_hide_operator_manual_item($id_operator_manual_item,$page,$num);\" >Скрыть </button>";
		}
		
		
		$operator_manual_items_table .= "<tr  style='display:table-row;background:$color_hide' onmouseover=\"this.style.background='#f5a788'\" onmouseout=\"this.style.background='$color_hide'\">
							<!--<td style='display:table-cell;vertical-align:middle;border-left: 1px solid #5a1f08;border-top: none;padding:5px;border-bottom: 1px solid #5a1f08;'>
								<input type='checkbox'>
							</td>-->
							<td style='display:table-cell;border-left: 1px solid #5a1f08;border-top: none;vertical-align:middle;padding:5px;border-bottom: 1px solid #5a1f08;cursor:pointer;' onclick='fn_get_show_full_information_operator_manual_item($id_operator_manual_item);'  onmouseover=\"this.style.background='#fac9b6'\" onmouseout=\"this.style.background='none'\">
								$name_operator_manual_item
							</td>
							<td style='display:table-cell;border-left: 1px solid #5a1f08;border-top: none;vertical-align:middle;text-align:center;padding:5px;border-bottom: 1px solid #5a1f08;'>
								$date_add_operator_manual_item
							</td>
							<td style='display:table-cell;border-left: 1px solid #5a1f08;border-top: none;vertical-align:middle;text-align:center;padding:5px;border-bottom: 1px solid #5a1f08;'>
								$date_last_modified_operator_manual_item
							</td>
							<td onclick='fn_get_profile_admin_information($id_admin_add_operator_manual_item);' onmouseover=\"this.style.background='#fac9b6'\" onmouseout=\"this.style.background='none'\" style='cursor:pointer;display:table-cell;border-left: 1px solid #5a1f08;border-top: none;vertical-align:middle;text-align:center;padding:5px;border-bottom: 1px solid #5a1f08;'>
								$login_admin_add
							</td>
							<td style='display:table-cell;border-left: 1px solid #5a1f08;border-top: none;vertical-align:middle;text-align:center;padding:5px;border-right: 1px solid #5a1f08;border-bottom: 1px solid #5a1f08;font-size:0.6em;vertical-align:middle;width:250px;'>
								<button class='btn_edit btn_icon' onclick=\"fn_edit_operator_manual_item($id_operator_manual_item,$page,$num);\">Редактировать</button>
								<button class='btn_up btn_icon' onclick=\"fn_up_operator_manual_item($id_operator_manual_item,$page,$num);\" $disable_up>Вверх</button>
								<button class='btn_down btn_icon' onclick=\"fn_down_operator_manual_item($id_operator_manual_item,$page,$num);\" $disable_down>Вниз</button>
								<button class='btn_delete btn_icon' onclick=\"fn_delete_operator_manual_item($id_operator_manual_item,$page,$num);\">Удалить</button>
								$button_hide_show
							</td>
						</tr>";
	}
	$operator_manual_items_table .= "<tr>
			<td colspan=8 style='padding-top:20px; text-align:center;font-size:0.6em;'>
				$num_pages
			</td>
		</tr>";
	
	$script= "<script type='text/javascript'>
		$(function(){
			$('.btn_edit').button({
				icons:{primary:'ui-icon-pencil'},text:false,
			});
			$('.btn_up').button({
				icons:{primary:'ui-icon-arrowthick-1-n'},text:false,
			});
			$('.btn_down').button({
				icons:{primary:'ui-icon-arrowthick-1-s'},text:false,
			});
			$('.btn_delete').button({
				icons:{primary:'ui-icon-close'},text:false,
			});
			$('.btn_show').button({
				icons:{primary:'ui-icon-radio-off'},text:false,
			});
			$('.btn_hide').button({
				icons:{primary:'ui-icon-bullet'},text:false,
			});
			$('.btn_num_pages').button();
		});
		</script>";


	$operator_manual_items_table .= "</table>";
	
	echo $operator_manual_items_table.$script;

?>