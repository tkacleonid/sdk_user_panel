<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin = intval($_SESSION['id_user_adm']);
	
	$id_rle_item = intval($_POST['id_rle_item']);
	
	$id_type_board = intval($_POST["id_current_type_board"]);
	
	
	//$query ="select * from $tbl_rle_items where id=$id_rle_item";
	
	
	
	
	
	$query = "select key_type_board from $tbl_type_boards where id=$id_type_board";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Произошла ошибка при обращении к базе данных. Попробуйте позднее.");
	}
	
	$res = mysql_fetch_array($res);
	
	
	if(!$res)
	{
		exit("Произошла ошибка при идентификации типа борта");
	}
	else
	{
		$key_type_board = $res['key_type_board'];

	}
	
	$key_choice_algorithm = $_POST['key_choice_algorithm'];
	
	$page = intval($_POST['page']);
	$num = intval($_POST['num']);
	
	if($num < 1) $num = 5;
	if($page < 1) $page = 1;
	
	$query = "select count(*) from $tbl_sdk_express_algorithms";
	
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Возникла ошибка при обращении к базе данных. Пожалуйста, попробуйте позднее.");
	}
	
	$count = @mysql_fetch_array($res);
	
	$count_pages = intval($count[0] / $num);
	if($count[0] % $num != 0)
	{
		$count_pages += 1;
	}
	
	if(($page > $count_pages) || ($page < 1))
	{
		$page = 1;
	}
	
	$sub_lim = ($page - 1)*$num;
	
	
	$num_rows = $count[0];
	
	$algorithms_table = "";
	
	$algorithms_table .= "<table style='width:100%;'><tr>";
	
	$algorithms_table .= "<td style='font-size:0.6em;padding:5px;border-bottom: 1px solid #5a1f08;'><button onclick='fn_show_dialog_add_new_algorithm();' id='btn_add_new_algorithm_dialog_choice_algorithm'>Добавить новый алгоритм</button></td></tr>";
		
			
	$algorithms_table .= "<tr><td>
	<input type='hidden' value='$id_rle_item' id='hdn_id_rle_item_tbl_algorithms'>
	<input type='hidden' value='$id_type_board' id='hdn_id_type_board_tbl_algorithms'>
	<input type='hidden' value='$page' id='hdn_page_tbl_algorithms'>
	<input type='hidden' value='$num' id='hdn_num_tbl_algorithms'>
<table cellspacing=0 cellpadding=0 style='width:100%;'>
<tr id='header_algorithms_table' style='display:table-row; background:#f37e50;background:linear-gradient(to bottom , #f37e50, #944d31); font-weight: bold;border: 1px solid #5a1f08;'>
	<table cellspacing=0 cellpadding=0 style='width:100%;'>
		<tr id='header_algorithms_table' style='display:table-row; background:#f37e50;background:linear-gradient(to bottom , #f37e50, #944d31); font-weight: bold;border: 1px solid #5a1f08;'>
			<!--<td style='display:table-cell;border-left: 1px solid #5a1f08;border-top: 1px solid #5a1f08;'>
								
			</td>-->
			<td style='display:table-cell;padding: 0px;text-align:center;border-left: 1px solid #5a1f08;border-top: 1px solid #5a1f08;'>
				
			</td>
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
			<td style='display:table-cell; padding: 20px;text-align:center;border-left: 1px solid #5a1f08;border-top: 1px solid #5a1f08;border-right: 1px solid #5a1f08;width:200px;'>
				Операции
			</td>
		</tr>";
	
	$count_algorithms = 0;
	
	
	if($count_algorithms == 0)
	{
		$menu_table .= "<tt>
			<td colspan=5 style='text-align:center;border: 1px solid #5a1f08;'>
				Алгоритмы для данного борта отсутствуют
			</td>
		</tr>";
	}
	
	$query = "select algorithms.id As id_algorithm,
			algorithms.key_algorithm As key_algorithm_algorithm,
			algorithms.key_type_board As key_type_board_algorithm,
			algorithms.name_algorithm As name_algorithm_algorithm,
			algorithms.ref_web_page_text_algorithm As ref_web_page_text_algorithm_algorithm,
			algorithms.ref_pdf_text_algorithm As ref_pdf_text_algorithm_algorithm,
			algorithms.status_show_pdf As status_show_pdf_algorithm,
			algorithms.key_rle As key_rle_item_algorithm,
			algorithms.status_show_rle As status_show_rle_item_algorithm,
			algorithms.comment As comment_algorithm,
			algorithms.text_algorithm As text_algorithm_algorithm,
			algorithms.status_use_web_page_algorithm As status_use_web_page_algorithm_algorithm,
			algorithms.admin_add As admin_add_algorithm,
			algorithms.admin_last_modified As admin_last_modified_algorithm,
			algorithms.date_add As date_add_algorithm,
			algorithms.date_last_modified As date_last_modified_algorithm,
			algorithms.position As position_algorithm,
			algorithms.status As status_algorithm,
			rle_items.id As id_rle_item_algorithm,
			admins.login As login_admin_add,
			admins2.login As login_admin_last_modified,
			type_boards.name As type_board_name
			
			from $tbl_sdk_express_algorithms As algorithms
			
			left join $tbl_type_boards As type_boards 
			on algorithms.key_type_board=type_boards.key_type_board
			
			left join $tbl_adm_accounts As admins 
			on algorithms.admin_add=admins.id 
			
			left join $tbl_adm_accounts As admins2 
			on algorithms.admin_last_modified=admins2.id
			
			left join $tbl_rle_items As rle_items 
			on rle_items.key_rle_item=algorithms.key_rle

			where algorithms.key_type_board = '$key_type_board'
			
			
			order by algorithms.position limit $sub_lim,$num";

		
	$res = @mysql_query($query);
	
	if(!$res)
	{
		exit("Возникла ошибка при обращении к базе данных. Пожалуйста, попробуйте позднее.");
	}
	
	$count_algorithm = $sub_lim;
	
	
	$num_pages = "";
	
	$num_first_pages = 5;
	
	$first_page = 1;
	
	if($page >= $num_first_pages)
	{
		$first_page = $page - ($num_first_pages - 1);
	}
	
	$disable_first = "disabled";
	$disable_prev = "disabled";
	$disable_next = "disabled";
	$disable_last = "disabled";
	
	$num_prev = $page;
	$num_next = $page;
	
	if($page > 1)
	{
		$disable_first = "";
		$disable_prev = "";
		$num_prev = $page - 1;
	}
	
	if($page < $count_pages)
	{
		$disable_next = "";
		$disable_last = "";
		$num_next = $page + 1;
	}
	
	$num_pages .= "<button class='btn_num_pages' id='btn_first_page' onclick=\"fn_get_choice_algorithm_for_rle_item($id_rle_item,$id_type_board,1,$num);\" $disable_first>&lt;&lt;</button>";
	$num_pages .= "<button class='btn_num_pages' id='btn_prev_page' onclick=\"fn_get_choice_algorithm_for_rle_item($id_rle_item,$id_type_board,$num_prev,$num);\" $disable_prev>&lt;</button>";
	$p = 1;
	$style = "";
	if($count_pages > $num_first_pages)
	{
		for($i = 0; $i < $num_first_pages; $i++)
		{
			$p = $first_page + $i;
			if($p == $page)
			{
				$style = "style='background:#f1a080'";
			}
			else
			{
				$style = "";
			}
			$num_pages .= "<button class='btn_num_pages' onclick=\"fn_get_choice_algorithm_for_rle_item($id_rle_item,$id_type_board,$p,$num);\" $style>$p</button>";
		}
	}
	else
	{
		for($i = 0; $i < $count_pages; $i++)
		{
			$p = $first_page + $i;
			if($p == $page)
			{
				$style = "style='background:#f1a080'";
			}
			else
			{
				$style = "";
			}
			$num_pages .= "<button class='btn_num_pages' onclick=\"fn_get_choice_algorithm_for_rle_item($id_rle_item,$id_type_board,$p,$num);\" $style>$p</button>";
		}
	}
	$num_pages .= "<button class='btn_num_pages' id='btn_prev_page' onclick=\"fn_get_choice_algorithm_for_rle_item($id_rle_item,$id_type_board,$num_next,$num);\" $disable_next>&gt;</button>";
	$num_pages .= "<button class='btn_num_pages' id='btn_first_page' onclick=\"fn_get_choice_algorithm_for_rle_item($id_rle_item,$id_type_board,$count_pages,$num);\" $disable_last>&gt;&gt;</button>";
	
	
$str_choice_algorithm = "<table cellpadding=0 cellspacing=0 style='width:100%;margin-top:10px;';><tr style='display:none;' ><td colspan=5 style='text-align:center;padding-top:10px;background:#f37e50;background:linear-gradient(to bottom , #f37e50, #944d31); font-weight: bold;border: 1px solid #5a1f08;'>Текущий выбранный алгоритм</td></tr>";
	
	$is_algorithm = false;
	$key_choice_algorithm_for_hdn = "";
	$id_choice_algorithm_for_hdn = "";
	
	while(($algorithm = mysql_fetch_array($res)))
	{
		$count_algorithm++;
		
		
		$id_algorithm = $algorithm['id_algorithm'];
		$key_algorithm_algorithm = $algorithm['key_algorithm_algorithm'];
		$key_type_board_algorithm = $algorithm['key_type_board_algorithm'];
		$name_algorithm_algorithm = $algorithm['name_algorithm_algorithm'];
		$ref_web_page_text_algorithm_algorithm = $algorithm['ref_web_page_text_algorithm_algorithm'];
		$ref_pdf_text_algorithm_algorithm = $algorithm['ref_pdf_text_algorithm_algorithm'];
		$status_show_pdf_algorithm = $algorithm['status_show_pdf_algorithm'];
		$key_rle_item_algorithm = $algorithm['key_rle_item_algorithm'];
		$status_show_rle_item_algorithm = $algorithm['status_show_rle_item_algorithm'];
		$comment_algorithm = $algorithm['comment_algorithm'];
		$text_algorithm_algorithm = $algorithm['text_algorithm_algorithm'];
		$status_use_web_page_algorithm_algorithm = $$algorithm['status_use_web_page_algorithm_algorithm'];
		$admin_add_algorithm = $algorithm['admin_add_algorithm'];
		$admin_last_modified_algorithm = $algorithm['admin_last_modified_algorithm'];
		$date_add_algorithm = $algorithm['date_add_algorithm'];
		$id_rle_item_algorithm = $algorithm['id_rle_item_algorithm'];
		$date_last_modified_algorithm = $algorithm['date_last_modified_algorithm'];
		$position_algorithm = $algorithm['position_algorithm'];
		$status_algorithm = $algorithm['status_algorithm'];
		$login_admin_add = $algorithm['login_admin_add'];
		$login_admin_last_modified = $algorithm['login_admin_last_modified'];
		$type_board_name = $algorithm['type_board_name'];


		$diable_up = "";
		$diable_down = "";
		
		if($count_algorithm == 1)
		{
			$disable_up = "disabled";
			$disable_down = "";
		}
		else if($count_algorithm == $num_rows)
		{
			$disable_up = "";
			$disable_down = "disabled";
		}
		else
		{
			$disable_up = "";
			$disable_down = "";
		}
		
		if($num_rows == 1)
		{
			$disable_up = "disabled";
			$disable_down = "disabled";
		}
		
		if($status_algorithm == "0")
		{
			$color_hide = "#e4dfdd";
			$button_hide_show = "<button class='btn_show btn_icon' onclick=\"fn_show_algorithm($id_algorithm,$page,$num);\" >Отобразить </button>";
		}
		else
		{
			$color_hide = "#FFFFFF";
			$button_hide_show = "<button class='btn_hide btn_icon' onclick=\"fn_hide_algorithm($id_algorithm,$page,$num);\" >Скрыть </button>";
		}
		$checked_radio = "";
		if((($key_algorithm_algorithm == $key_choice_algorithm) && ($key_choice_algorithm != "")) || (($id_rle_item_algorithm == $id_rle_item) && ($id_rle_item != "")))
		{
			$is_algorithm = true;
			
			$checked_radio = "checked";
			$key_choice_algorithm_for_hdn = $key_algorithm_algorithm;
			$id_choice_algorithm_for_hdn = $id_algorithm;
			$str_choice_algorithm .= "<tr  style='display:none;background:$color_hide' onmouseover=\"this.style.background='#f5a788'\" onmouseout=\"this.style.background='$color_hide'\">
							<!--<td style='display:table-cell;vertical-align:middle;border-left: 1px solid #5a1f08;border-top: none;padding:5px;border-bottom: 1px solid #5a1f08;'>
								<input type='checkbox'>
							</td>-->
							<td style='display:table-cell;border-left: 1px solid #5a1f08;border-top: none;vertical-align:middle;padding:5px;border-bottom: 1px solid #5a1f08;cursor:pointer;' onclick='fn_get_show_full_information_algorithm($id_algorithm);'  onmouseover=\"this.style.background='#fac9b6'\" onmouseout=\"this.style.background='none'\">
								$name_algorithm_algorithm
							</td>
							<td style='display:table-cell;border-left: 1px solid #5a1f08;border-top: none;vertical-align:middle;text-align:center;padding:5px;border-bottom: 1px solid #5a1f08;'>
								$date_add_algorithm
							</td>
							<td style='display:table-cell;border-left: 1px solid #5a1f08;border-top: none;vertical-align:middle;text-align:center;padding:5px;border-bottom: 1px solid #5a1f08;'>
								$date_last_modified_algorithm
							</td>
							<td onclick='fn_get_profile_admin_information($admin_add_algorithm);' onmouseover=\"this.style.background='#fac9b6'\" onmouseout=\"this.style.background='none'\" style='cursor:pointer;display:table-cell;border-left: 1px solid #5a1f08;border-top: none;vertical-align:middle;text-align:center;padding:5px;border-bottom: 1px solid #5a1f08;'>
								$login_admin_add
							</td>
							<td style='display:table-cell;border-left: 1px solid #5a1f08;border-top: none;vertical-align:middle;text-align:center;padding:5px;border-right: 1px solid #5a1f08;border-bottom: 1px solid #5a1f08;font-size:0.6em;vertical-align:middle;'>
								<button class='btn_edit btn_icon' onclick=\"fn_edit_algorithm($id_algorithm,$page,$num);\">Редактировать</button>
								<button class='btn_up btn_icon' onclick=\"fn_up_algorithm($id_algorithm,$page,$num);\" $disable_up>Вверх</button>
								<button class='btn_down btn_icon' onclick=\"fn_down_algorithm($id_algorithm,$page,$num);\" $disable_down>Вниз</button>
								<button class='btn_delete btn_icon' onclick=\"fn_delete_algorithm($id_algorithm,$page,$num);\">Удалить</button>
								$button_hide_show
							</td>
						</tr>";
		}	
		
		
		$algorithms_table .= "<tr  style='display:table-row;background:$color_hide' onmouseover=\"this.style.background='#f5a788'\" onmouseout=\"this.style.background='$color_hide'\">
							<!--<td style='display:table-cell;vertical-align:middle;border-left: 1px solid #5a1f08;border-top: none;padding:5px;border-bottom: 1px solid #5a1f08;'>
								<input type='checkbox'>
							</td>-->
							<td style='display:table-cell;vertical-align:middle;border-left: 1px solid #5a1f08;border-top: none;padding:5px;border-bottom: 1px solid #5a1f08;'>
								<input $checked_radio type='radio' name='radio_choice_algorithm_tr' value='tr_algorithm_$id_algorithm' onclick=\"$('#hdn_id_key_choice_algorithm').val('$key_algorithm_algorithm');$('#hdn_id_choice_algorithm').val($id_algorithm);\">
							</td>
							<td style='display:table-cell;border-left: 1px solid #5a1f08;border-top: none;vertical-align:middle;padding:5px;border-bottom: 1px solid #5a1f08;cursor:pointer;' onclick='fn_get_show_full_information_algorithm($id_algorithm);'  onmouseover=\"this.style.background='#fac9b6'\" onmouseout=\"this.style.background='none'\">
								$name_algorithm_algorithm
							</td>
							<td style='display:table-cell;border-left: 1px solid #5a1f08;border-top: none;vertical-align:middle;text-align:center;padding:5px;border-bottom: 1px solid #5a1f08;'>
								$date_add_algorithm
							</td>
							<td style='display:table-cell;border-left: 1px solid #5a1f08;border-top: none;vertical-align:middle;text-align:center;padding:5px;border-bottom: 1px solid #5a1f08;'>
								$date_last_modified_algorithm
							</td>
							<td onclick='fn_get_profile_admin_information($admin_add_algorithm);' onmouseover=\"this.style.background='#fac9b6'\" onmouseout=\"this.style.background='none'\" style='cursor:pointer;display:table-cell;border-left: 1px solid #5a1f08;border-top: none;vertical-align:middle;text-align:center;padding:5px;border-bottom: 1px solid #5a1f08;'>
								$login_admin_add
							</td>
							<td style='display:table-cell;border-left: 1px solid #5a1f08;border-top: none;vertical-align:middle;text-align:center;padding:5px;border-right: 1px solid #5a1f08;border-bottom: 1px solid #5a1f08;font-size:0.6em;vertical-align:middle;'>
								<button class='btn_edit btn_icon' onclick=\"fn_edit_algorithm($id_algorithm,$page,$num);\">Редактировать</button>
								<button class='btn_up btn_icon' onclick=\"fn_up_algorithm($id_algorithm,$page,$num);\" $disable_up>Вверх</button>
								<button class='btn_down btn_icon' onclick=\"fn_down_algorithm($id_algorithm,$page,$num);\" $disable_down>Вниз</button>
								<button class='btn_delete btn_icon' onclick=\"fn_delete_algorithm($id_algorithm,$page,$num);\">Удалить</button>
								$button_hide_show
							</td>
						</tr>";
						
						
	
	}
	
	if(!$is_algorithm)
	{
		$str_choice_algorithm .= "<tr style='display:none;'>
							<td colspan=5 style='border: 1px solid #5a1f08;padding:10px;'>Не выбран алгоритм</td>
						</tr>";
	}
	$str_choice_algorithm .= "<input type='hidden'  id='hdn_id_choice_algorithm' value='$id_choice_algorithm_for_hdn'>
	<input type='hidden'  id='hdn_id_key_choice_algorithm' value='$key_choice_algorithm_for_hdn'>";
	$algorithms_table .= "<tr>
			<td colspan=8 style='padding-top:20px; text-align:center;font-size:0.6em;'>
				$num_pages
			</td>
		</tr>";
	
	$script = "<script type='text/javascript'>
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
			$('.btn_choice_algorithm').button();
			$('#btn_add_new_algorithm_dialog_choice_algorithm').button({
				icons:{primary:'ui-icon-plus'},text:false,
			});
			
		});
		</script>";


	$rle_items_table .= "</table></td></tr></table>";
	
	echo $algorithms_table.$str_choice_algorithm.$script;

?>