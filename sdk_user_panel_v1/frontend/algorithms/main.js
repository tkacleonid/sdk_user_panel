$(function(){
	$('#accordion_algorithms').accordion();
});			
			
			
function fn_success_get_algorithm(data,textStatus,jqXHR)
{
	if($('#accordion_algorithms').accordion('instance'))
	{
		$('#accordion_algorithms').accordion('destroy');
	}
	$('#accordion_algorithms').html(""+data+$('#accordion_algorithms').html());
			
	$(function(){
		$('#accordion_algorithms').accordion();		
	});
				
	$(function(){	
		$("#accordion_algorithms .btn_"+($('#select_algorithms').val())).button();
		$("#accordion_algorithms .btn_close_"+($('#select_algorithms').val())).button({
			icons:{
				primary:"ui-icon-close"
			},
			text:false
		});
		
		$('#accordion_algorithms div,#accordion_algorithms h3').css('height','auto');
					
	});
	fn_clear_status_loading();
										
}

	
			function fn_select_type_board(key_board)
			{
				if(key_board== 'none')
				{
					$('#select_td_type_boards').html("<select id='select_algorithms' onchange='alert(this.value);' style='width:300px;'><option value='none' id='algorithm_none_selected' selected>Выберите алгоритм...</option></select>");
					$('#hdn_key_type_board').val("");
				}
				else
				{
					$('#hdn_key_type_board').val(key_board);
					fn_set_status_loading();
					jqXHR= $.post("./get_sign.php","key_type_board="+encodeURIComponent(key_board),fn_success_get_sign_algorithms);
					jqXHR.fail(function(){
						fn_clear_status_loading();//$( "#error_enter_user_panel_dialog" ).dialog("open");
					});
				}
			}
			
			function fn_success_get_sign_algorithms(data,textStatus,jqXHR)
			{
				var key_board = "";
				
				key_board = $('#hdn_key_type_board').val();
				
				if(key_board == undefined)
				{
					key_board = "";
				}
				
				if($('#tabs_sign_algorithms_dialog').dialog('instance'))
				{
					$('#tabs_sign_algorithms_dialog').dialog('destroy');
				}
				
				
				$("#td_top_type_board_toolbar").html(data);
	
				fn_clear_status_loading();
				
				get_select_algorithms(key_board);
			}
			
			function get_select_algorithms(key_board)
			{
			/*
				if (key_board == undefined)
				{
					key_board = $('#hdn_key_type_board').val();
				}
				if(key_board == undefined)
				{
					key_board = "";
				}
			*/
				fn_set_status_loading();
				jqXHR= $.post("./get_select_algorithms.php","key_type_board="+encodeURIComponent(key_board),fn_success_get_select_algorithms);
				jqXHR.fail(function(){
					fn_clear_status_loading();//$( "#error_enter_user_panel_dialog" ).dialog("open");
				});
			}
			function fn_success_get_select_algorithms(data,textStatus,jqXHR)
			{
				fn_clear_status_loading();
				$('#select_td_type_boards').html(data)
			}
			
			function fn_select_algorithm(key_algorithm)
			{
				if(key_algorithm== 'none')
				{
					$('#select_algorithms').get(0).selectedIndex = 0;
				}
				else
				{
					fn_set_status_loading();

                    if($(".ac_"+key_algorithm).length > 0)
					{
						$(".ac_"+key_algorithm).remove();
					}
					fn_set_status_loading();
					jqXHR= $.post("./get_algorithm.php","key_algorithm="+encodeURIComponent(key_algorithm),fn_success_get_algorithm);
					jqXHR.fail(function(){
						fn_clear_status_loading();//$( "#error_enter_user_panel_dialog" ).dialog("open");
					});
			
				}
			}
			
		