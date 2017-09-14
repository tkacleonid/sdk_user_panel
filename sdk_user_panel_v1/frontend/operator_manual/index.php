<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	require_once("../utils/authorized.php");
	
	$title_adm= "Руководство оператора СДК-8";
	
	
	
	include_once("../utils/top_html.php");
	
	include_once("../utils/top_page.php");
	
	$html_operator_manual = "<div style='padding-left:10px;'>";
	$html_operator_manual_header_ref = "";
	
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
			
			where operator_manual_items.status='1'
			
			order by operator_manual_items.position ";

		
	$res= @mysql_query($query);
	
	if(!$res)
	{
		echo("Возникла ошибка при обращении к базе данных. Пожалуйста, попробуйте позднее.".mysql_error());
	}
	else
	{
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
			
			$html_operator_manual_header_ref .= "<a href='#sdk_ro_ru_$key_operator_manual_item'>$name_operator_manual_item</a><br>";
			
			$html_operator_manual .= "<a name='sdk_ro_ru_$key_operator_manual_item' id='sdk_ro_ru_$key_operator_manual_item'></a> <h3>$name_operator_manual_item</h3>$text_operator_manual_item";

		}
		$html_operator_manual = "<div style='padding-left:15px;background:#bda377;'>$html_operator_manual_header_ref</div><div style='padding-left:15px;'>$html_operator_manual</div>";
		echo $html_operator_manual;
	}
	
	
?>

<?php
	
	include_once("../utils/bottom_page.php");
	
?>
