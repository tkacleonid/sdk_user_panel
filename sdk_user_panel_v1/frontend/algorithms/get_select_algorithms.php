<?php

	error_reporting(E_ALL & ~E_NOTICE);
	$title_adm = "Алгоритмы экспресс-анализа";
	
	include_once('../../config/config.php');
	
	$is_type_board = false;
	$is_algorithm = false;
	
	$key_type_board_get = "";
	
	if(!empty($_POST['key_type_board']))
	{
		$key_type_board_get = mysql_real_escape_string($_POST['key_type_board']);
		$is_type_board = true;
	}


	$select_algorithms = "<select id='select_algorithms' onchange ='fn_select_algorithm(this.value);' style='width:300px;'>
		<option value='none' id='algorithm_none_selected' selected>Выберите алгоритм...</option>
		";


	$count_algorithms = 0;
	$select_index_algorithm = 0;

	if($is_type_board)
	{
		$query = "select * from $tbl_sdk_express_algorithms where status='1' and key_type_board='$key_type_board_get' order by position ";
	
		$res = @mysql_query($query);
		
		if($res)
		{
			
			while(($algorithm = @mysql_fetch_array($res)))	
			{
				$count_algorithms++;
				
				$id_algorithm = $algorithm['id'];
				$key_algorithm_algorithm = $algorithm['key_algorithm'];
				$key_type_board_algorithm = $algorithm['key_type_board'];
				$name_algorithm_algorithm = $algorithm['name_algorithm'];
				$ref_web_page_text_algorithm_algorithm = $algorithm['ref_web_page_text_algorithm'];
				$ref_pdf_text_algorithm_algorithm = $algorithm['ref_pdf_text_algorithm'];
				$status_show_pdf_algorithm = $algorithm['status_show_pdf'];
				$key_rle_algorithm = $algorithm['key_rle'];
				$status_show_rle_algorithm = $algorithm['status_show_rle'];
				$comment_algorithm = $algorithm['comment'];
				$status_use_web_page_algorithm_algorithm = $algorithm['status_use_web_page_algorithm'];
				$admin_add_algorithm = $algorithm['admin_add'];
				$admin_last_modified_algorithm = $algorithm['admin_last_modified'];
				$date_add_algorithm = $algorithm['date_add'];
				$date_last_modified_algorithm = $algorithm['date_last_modified'];
				$position_algorithm = $algorithm['position'];
				$status_algorithm = $algorithm['status'];

				
				$select_algorithms .= "<option value='$key_algorithm_algorithm'>$name_algorithm_algorithm</option>";
				
			}
		}
		
	}
	

	
	$script_select_index_algorithm = "<script type='text/javascript'>
		$(function()
			{
				$('#select_algorithms').get(0).selectedIndex = 0;
			}
		);
	</script>";

	
	$select_algorithms .= "</select>";
	
	echo $select_algorithms.$script_select_index_algorithm;
	
?>