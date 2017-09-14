<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin= intval($_SESSION['id_user_adm']);
	
	$id_current_type_board= -1;
	
	if(!empty($_POST['id_current_type_board']))
	{
		$id_current_type_board= intval($_POST['id_current_type_board']);
	}
	
	if($id_current_type_board < 1)
	{
		$id_current_type_board= -1;
	}
	
	
	$query= "select * from $tbl_type_boards where status <> '2' order by position ASC";
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit('Произошла ошибка при обращении к базе данных. Попробуйте позднее.');
	}
	
	$type_boards= "<ul id='menu_boards_type' style='padding:0px;background:#fd815d;'>";
	
	
	$count= 0;
	$qtips= "";
	
	while($type_board= mysql_fetch_array($res))
	{
		$count++;
		
		$id= $type_board["id"];
		$name= $type_board["name"];
		$short_description= $type_board["short_description"];
		$long_description= $type_board["long_description"];
		$status= $type_board["status"];
		$date_add= $type_board["date_add"];
		$date_last_modified= $type_board["date_last_modified"];
		$id_admin_add= $type_board["id_admin_add"];
		$id_admin_modified= $type_board["id_admin_modified"];
		$key_type_board= $type_board["key_type_board"];
		$position= $type_board["position"];
		
		
		$short_name= mb_substr($name,0,20,"utf8");
		
		if(mb_strlen($name,"utf8") > 20)
		{
			$short_name .= "...";
		}
		
		if(($id_current_type_board== -1) && $count== 1)
		{
			$id_current_type_board= $id;
		}
		
		if($id_current_type_board== $id)
		{
			$style= "border-bottom:1px solid #5a1f08;background:#FFFFFF url('../../scripts/js/jquery-ui-1.11.2.custom/images/ui-bg_glass_40_e8957c_1x400.png') 50% 50% repeat-x;";
		}
		else
		{
			$style= "border-bottom:1px solid #5a1f08;";
			if($status== '0')
			{
				$style .= 'background:#eccec5;';
			}
		}
		
		$type_boards .= "<li id='type_board_$id' onclick='fn_onclick_type_board(this,$id);' onmouseover='' onmouseout='' class='board_item' style=\"$style\">$short_name</li>";
		
		$qtips .= "$('#type_board_$id').qtip({
						 content: {
							text: \"$short_description\",
							title: {
								text: \"$name\"
							}
						},
						show: {
							when: 'mouseover focus',
							solo: false,
							ready : false
						},
						style: {
							tip: true,
							border: {
								width: 0,
								radius: 3
							},
							classes: 'qtip-dark',
							width: 300
						}
					});";	
	}
	
	$script= "<script>
		$(function(){
			$('#menu_boards_type').menu();
			
			$qtips

			fn_get_express_algorithms($id_current_type_board);

			
		});
		function fn_onclick_type_board(el,id_type_board)
		{
			$('#menu_boards_type li').css('background','');
			el.style.background=\"#FFFFFF url('../../scripts/js/jquery-ui-1.11.2.custom/images/ui-bg_glass_40_e8957c_1x400.png') 50% 50% repeat-x\";
			fn_get_type_boards(id_type_board);
		}
		
		
		
		
	</script>";
	
	$type_boards .= "</ul>
		<input type='hidden' id='id_current_type_board' value='$id_current_type_board'>	
	";
	
		
	
	echo $type_boards.$script;

?>
