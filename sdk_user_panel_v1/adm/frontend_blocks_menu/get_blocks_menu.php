<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	
	include_once("../../config/config.php");
	
	
	$page= intval($_POST['page']);
	$num= intval($_POST['num']);
	
	if($num < 1) $num= 10;
	if($page < 1) $page= 1;
	
	$query= "select count(*) from $tbl_blocks_menu_frontend_ru";
	
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
	
	
	$query= "select  COUNT(*) from $tbl_blocks_menu_frontend_ru";
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Возникла ошибка при обращении к базе данных. Пожалуйста, попробуйте позднее.");
	}
	$res= @mysql_fetch_array($res);
	$num_rows= $res[0];
	
	$query= "select 
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
		admins.login  As login_admin_add, 
		admins2.login  As login_admin_last_modified
		
		from $tbl_blocks_menu_frontend_ru AS blocks
		
		LEFT JOIN $tbl_adm_accounts AS admins 
		ON blocks.id_admin_add=admins.id 
		
		LEFT JOIN $tbl_adm_accounts AS admins2 
		ON blocks.id_admin_last_modified=admins2.id 
		
		order by position limit $sub_lim,$num";
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit("Возникла ошибка при обращении к базе данных. Пожалуйста, попробуйте позднее.");
	}
	
	$menu_table= "<input type='hidden' value='$page' id='hdn_page_tbl_blocks'>
	<input type='hidden' value='$num' id='hdn_num_tbl_blocks'>
	<table cellspacing=0 cellpadding=0>
		<tr id='header_blocks_menu_table' style='display:table-row; background:#f37e50;background:linear-gradient(to bottom , #f37e50, #944d31); font-weight: bold;border: 1px solid #5a1f08;'>
			<!--<td style='display:table-cell;border-left: 1px solid #5a1f08;border-top: 1px solid #5a1f08;'>
								
			</td>-->
			<td style='display:table-cell; padding: 20px;text-align:center;border-left: 1px solid #5a1f08;border-top: 1px solid #5a1f08;'>
				Название
			</td>
			<td style='display:table-cell; padding: 20px;text-align:center;border-left: 1px solid #5a1f08;border-top: 1px solid #5a1f08;'>
				Краткое описание
			</td>
			<td style='display:table-cell; padding: 20px;text-align:center;border-left: 1px solid #5a1f08;border-top: 1px solid #5a1f08;'>
				Директория
			</td>
			<td style='display:table-cell; padding: 20px;text-align:center;border-left: 1px solid #5a1f08;border-top: 1px solid #5a1f08;'>
				Дата создания
			</td>
			<td style='display:table-cell; padding: 20px;text-align:center;border-left: 1px solid #5a1f08;border-top: 1px solid #5a1f08;'>
				Дата изменения
			</td>
			<td style='display:table-cell; padding: 20px;text-align:center;border-left: 1px solid #5a1f08;border-top: 1px solid #5a1f08;'>
				Администратор
			</td>
			<td style='display:table-cell; padding: 20px;text-align:center;border-left: 1px solid #5a1f08;border-top: 1px solid #5a1f08;border-right: 1px solid #5a1f08;width:150px;'>
				Операции
			</td>
		</tr>";
		
	if ($num_rows == 0)
	{
		$menu_table .= "<tr><td colspan=7 style='text-align:center;border: 1px solid #5a1f08;'>Отсутствуют блоки меню пользовательской части</td></tr>";
	}
	
	$count_block= $sub_lim;
	
	
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
	
	$num_pages .= "<button class='btn_num_pages' id='btn_first_page' onclick=\"fn_get_blocks_menu(1,$num);\" $disable_first>&lt;&lt;</button>";
	$num_pages .= "<button class='btn_num_pages' id='btn_prev_page' onclick=\"fn_get_blocks_menu($num_prev,$num);\" $disable_prev>&lt;</button>";
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
			$num_pages .= "<button class='btn_num_pages' onclick=\"fn_get_blocks_menu($p,$num);\" $style>$p</button>";
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
			$num_pages .= "<button class='btn_num_pages' onclick=\"fn_get_blocks_menu($p,$num);\" $style>$p</button>";
		}
	}
	$num_pages .= "<button class='btn_num_pages' id='btn_prev_page' onclick=\"fn_get_blocks_menu($num_next,$num);\" $disable_next>&gt;</button>";
	$num_pages .= "<button class='btn_num_pages' id='btn_first_page' onclick=\"fn_get_blocks_menu($count_pages,$num);\" $disable_last>&gt;&gt;</button>";
	
	
	while(($block= mysql_fetch_array($res)))
	{
		$count_block++;
		
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
		
		$admin_login_add= $block['login_admin_add'];
		$admin_login_last_modified= $block['login_admin_last_modified'];
		
		$diable_up= "";
		$diable_down= "";
		
		if($count_block== 1)
		{
			$disable_up= "disabled";
			$disable_down= "";
		}
		else if($count_block== $num_rows)
		{
			$disable_up= "";
			$disable_down= "disabled";
		}
		else
		{
			$disable_up= "";
			$disable_down= "";
		}
		if($num_rows== 1)
		{
			$disable_up= "disabled";
			$disable_down= "disabled";
		}
		
		$color_hide= "#FFFFFF";
		if($status== "0")
		{
			$color_hide= "#e4dfdd";
			$button_hide_show= "<button class='btn_show btn_icon' onclick=\"fn_show_block_menu($id,$page,$num);\" >Отобразить </button>";
		}
		else
		{

			$button_hide_show= "<button class='btn_hide btn_icon' onclick=\"fn_hide_block_menu($id,$page,$num);\" >Скрыть </button>";
		}
		
		if($status_debug== "1")
		{
			$color_hide= "#e4dfdd";
			$button_debug_off_on= "<button class='btn_debug_on btn_icon' onclick=\"fn_debug_off_block_menu($id,$page,$num);\" >Отключить режим отладки</button>";
		}
		else
		{
			$button_debug_off_on= "<button class='btn_debug_off btn_icon' onclick=\"fn_debug_on_block_menu($id,$page,$num);\" >Включить режим отладки</button>";
		}
		
		
		$menu_table .= "<tr id='header_blocks_menu_table' style='display:table-row;background:$color_hide' onmouseover=\"this.style.background='#f5a788'\" onmouseout=\"this.style.background='$color_hide'\">
							<!--<td style='display:table-cell;vertical-align:middle;border-left: 1px solid #5a1f08;border-top: none;padding:5px;border-bottom: 1px solid #5a1f08;'>
								<input type='checkbox'>
							</td>-->
							<td style='display:table-cell;border-left: 1px solid #5a1f08;border-top: none;vertical-align:middle;padding:5px;border-bottom: 1px solid #5a1f08;cursor:pointer;' onclick='fn_show_block_menu_information($id);'   onmouseover=\"this.style.background='#fac9b6'\" onmouseout=\"this.style.background='none'\">
								$name
							</td>
							<td style='display:table-cell;width:200px;border-left: 1px solid #5a1f08;border-top: none;padding:5px;text-align:justify;border-bottom: 1px solid #5a1f08;'>
								$short_desc
							</td>
							<td style='display:table-cell;border-left: 1px solid #5a1f08;border-top: none;vertical-align:middle;text-align:center;padding:5px;border-bottom: 1px solid #5a1f08;'>
								$url_folder
							</td>
							<td style='display:table-cell;border-left: 1px solid #5a1f08;border-top: none;vertical-align:middle;text-align:center;padding:5px;border-bottom: 1px solid #5a1f08;'>
								$date_add
							</td>
							<td style='display:table-cell;border-left: 1px solid #5a1f08;border-top: none;vertical-align:middle;text-align:center;padding:5px;border-bottom: 1px solid #5a1f08;'>
								$date_last_modified
							</td>
							<td    onmouseover=\"this.style.background='#fac9b6'\" onmouseout=\"this.style.background='none'\" onclick='fn_get_profile_admin_information($id_admin_add);' style='cursor:pointer;display:table-cell;border-left: 1px solid #5a1f08;border-top: none;vertical-align:middle;text-align:center;padding:5px;border-bottom: 1px solid #5a1f08;'>
								$admin_login_add
							</td>
							<td style='display:table-cell;border-left: 1px solid #5a1f08;border-top: none;vertical-align:middle;text-align:center;padding:5px;border-right: 1px solid #5a1f08;border-bottom: 1px solid #5a1f08;font-size:0.6em;vertical-align:middle;'>
								<button class='btn_edit btn_icon' onclick=\"fn_get_edit_block_menu($id,$page,$num);\">Редактировать</button>
								<button class='btn_up btn_icon' onclick=\"fn_up_block_menu($id,$page,$num);\" $disable_up>Вверх</button>
								<button class='btn_down btn_icon' onclick=\"fn_down_block_menu($id,$page,$num);\" $disable_down>Вниз</button>
								<button class='btn_delete btn_icon' onclick=\"fn_delete_block_menu($id,$page,$num);\" >Удалить</button>
								$button_hide_show
								$button_debug_off_on
							</td>
						</tr>";
	}
	$menu_table .= "<tr>
			<td colspan=8 style='padding-top:20px; text-align:center;font-size:0.6em;'>
				$num_pages
			</td>
		</tr>";
	$menu_table .= "</table>";
	
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
			
			$('.btn_debug_on').button({
				icons:{primary:'ui-icon-locked'},text:false,
			});
			$('.btn_debug_off').button({
				icons:{primary:'ui-icon-unlocked'},text:false,
			});
			
			$('.btn_num_pages').button();
		});
		</script>";
	
	echo $menu_table.$script;

?>