<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	session_start();
	
	include_once("../../config/config.php");
	
	
	if(empty($_SESSION['id_user_adm']))
	{
		exit("Ошибка идентификации пользователя. Попробуйте перезагрузить страницу.");
	}
	
	$id_admin= intval($_SESSION['id_user_adm']);
	
	$id_current_group_downloads= -1;
	
	if(!empty($_POST['id_current_group_downloads']))
	{
		$id_current_group_downloads= intval($_POST['id_current_group_downloads']);
	}
	
	if($id_current_group_downloads < 1)
	{
		$id_current_group_downloads= -1;
	}
	
	
	$query= "select * from $tbl_group_downloads order by position ASC";
	
	$res= @mysql_query($query);
	
	if(!$res)
	{
		exit('Произошла ошибка при обращении к базе данных. Попробуйте позднее.');
	}
	
	$group_downloads= "<ul id='menu_group_downloads' style='padding:0px;background:#fd815d;'>";
	
	
	$count= 0;
	$qtips= "";
	$disable_up = "";
	$disable_down = "";
	while($group_download= mysql_fetch_array($res))
	{
		$count++;
		
		$id= $group_download["id"];
		$name= $group_download["name"];
		$short_description= $group_download["short_description"];
		$long_description= $group_download["long_description"];
		$status= $group_download["status"];
		$date_add= $group_download["date_add"];
		$date_last_modified= $group_download["date_last_modified"];
		$id_admin_add= $group_download["id_admin_add"];
		$id_admin_last_modified= $group_download["id_admin_last_modified"];
		$position= $group_download["position"];
		
		$short_name= mb_substr($name,0,20,"utf8");
		
		if(mb_strlen($name,"utf8") > 20)
		{
			$short_name .= "...";
		}
		
		if(($id_current_group_downloads== -1) && $count== 1)
		{
			$id_current_group_downloads= $id;
		}
		
		if($id_current_group_downloads== $id)
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
		
		$group_downloads .= "<li id='group_downloads_$id' onclick='fn_onclick_group_downloads(this,$id);' onmouseover='' onmouseout='' class='board_item' style=\"$style\">$short_name</li>";
		
		$qtips .= "$('#group_downloads_$id').qtip({
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
			$(\"#menu_group_downloads\").menu();
			
			$qtips

			fn_get_downloads($id_current_group_downloads);

			
		});
		function fn_onclick_group_downloads(el,id_group_downloads)
		{
			$('#menu_group_downloads li').css('background','');
			el.style.background=\"#FFFFFF url('../../scripts/js/jquery-ui-1.11.2.custom/images/ui-bg_glass_40_e8957c_1x400.png') 50% 50% repeat-x\";
			fn_get_group_downloads(id_group_downloads);
		}
		
		
		
		
	</script>";
	
	$group_downloads .= "</ul>
		<input type='hidden' id='id_current_group_downloads' value='$id_current_group_downloads'>	
	";
	
	
	echo $group_downloads.$script;

?>
