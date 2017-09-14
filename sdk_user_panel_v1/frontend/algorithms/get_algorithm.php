<?php

	error_reporting(E_ALL & ~E_NOTICE);
	$title_adm= "Алгоритмы экспресс-анализа";
	
	include_once('../../config/config.php');
	
	$is_algorithm= false;

	$key_algorithm_get= "";
	
	
	
	if(!empty($_POST['algorithm_preview']))
	{
	
		$key_algorithm_algorithm= ($_POST['id_algorithm']);
		$id_type_board= ($_POST['id_type_board']);
		$name_algorithm_algorithm= ($_POST['name_algorithm']);
		$ref_web_page_text_algorithm_algorithm= ($_POST['path_html_algorithm']);
		$ref_pdf_text_algorithm_algorithm= ($_POST['path_pdf_algorithm']);
		$status_show_pdf_algorithm= ($_POST['visibility_ref_pdf_algorithm']);
		$key_rle_algorithm= mysql_real_escape_string($_POST['path_rle_algorithm']);
		$status_show_rle_algorithm= ($_POST['visibility_ref_rle_algorithm']);
		$comment_algorithm= ($_POST['comment_algorithm']);
		$status_use_web_page_algorithm_algorithm= ($_POST['use_ref_html_algorithm']);
		$status_algorithm= ($_POST['visibility_algorithm']);
		$text_algorithm_algorithm= ($_POST['text_algorithm']);
		
		
		$file_contain_algorithm= "";
		
		
		if($status_use_web_page_algorithm_algorithm== "1")
		{
			
			if(file_exists($ref_web_page_text_algorithm_algorithm))
			{
				$filename= $ref_web_page_text_algorithm_algorithm; 
							
				// открываем файл  
				$file= fopen($filename, "r");  
				  
				// читаем его содержимое в буффер  
				$buffer= fread($file, filesize($filename));  
				 //echo $buffer;
				// закрываем файл  
				fclose($file);  
				 
				// Определяем позицию <title> 
				//$pattern= "/<[\s]*body[\s]*>(*)<[\s]*\/[\s]*body[\s]*>/i";  
				//preg_match($pattern,$buffer,$out); 
				
				$in_1= strstr($buffer,"<body>")+6;
				$in_2= strstr($buffer,"</body>")-1;
				
						
				$file_contain_algorithm= substr($buffer,$in_1,$in_2-$in_1 + 1);
			}
			else
			{
				$file_contain_algorithm= "Отсутствует описание алгоритма";
			}
		}
		else
		{
			$file_contain_algorithm= $text_algorithm_algorithm;
			if($text_algorithm_algorithm  == "")
			{
				$file_contain_algorithm= "Отсутствует описание алгоритма";
			}
		}
		
		
		$rle_exists= false;
	
		if(($status_show_rle_algorithm== "1") && $key_rle_algorithm != "")
		{
			$query= "select * from $tbl_rle_items where status='1' and key_rle_item='$key_rle_algorithm' order by position";
			
			$res= @mysql_query($query);
		 	
			if($res)
			{
				$rle_item_algorithm= @mysql_fetch_array($res);
				
				if($rle_item_algorithm)
				{
					$rle_exists= true;
					
					$id_rle_item= $rle_item_algorithm['id'];
					$key_rle_item_rle_item= $rle_item_algorithm['key_rle_item'];
					$key_type_board_rle_item= $rle_item_algorithm['key_type_board'];
					$name_rle_item_rle_item= $rle_item_algorithm['name_rle_item'];
					$ref_web_page_text_rle_item_rle_item= $rle_item_algorithm['ref_web_page_text_rle_item'];
					$ref_pdf_text_rle_item_rle_item= $rle_item_algorithm['ref_pdf_text_rle_item'];
					$status_show_pdf_rle_item= $rle_item_algorithm['status_show_pdf'];
					$key_algorithm_rle_item= $rle_item_algorithm['key_algorithm'];
					$status_show_algorithm_rle_item= $rle_item_algorithm['status_show_algorithm'];
					$comment_rle_item= $rle_item_algorithm['comment'];
					$status_use_web_page_rle_item_rle_item= $rle_item_algorithm['status_use_web_page_rle_item'];
					$admin_add_rle_item= $rle_item_algorithm['admin_add'];
					$admin_last_modified_rle_item= $rle_item_algorithm['admin_last_modified'];
					$date_add_rle_item= $rle_item_algorithm['date_add'];
					$text_rle_item_rle_item= $rle_item_algorithm['text_rle_item'];
					$date_last_modified_rle_item= $rle_item_algorithm['date_last_modified'];
					$position_rle_item= $rle_item_algorithm['position'];
					$status_rle_item= $rle_item_algorithm['status'];
					
					$file_contain_rle_item= "";
		
					if($status_use_web_page_rle_item_rle_item== "1")
					{
						if(file_exists($ref_web_page_text_rle_item_rle_item))
						{
							 $filename= $ref_web_page_text_rle_item_rle_item; 
							
							// открываем файл  
							$file= fopen($filename, "r");  
				  
							// читаем его содержимое в буффер  
							$buffer= fread($file, filesize($filename));  
				 
							// закрываем файл  
							fclose($file);  
				 
							// Определяем позицию <title> 
							//$pattern= "/<[\s]*body[\s]*>(*)<[\s]*\/[\s]*body[\s]*>/i";  
							//preg_match($pattern,$buffer,$out); 
							
							$in_1= strstr($buffer,"<body>")+6;
							$in_2= strstr($buffer,"</body>")-1;
				
						
							$file_contain_rle_item= substr($buffer,$in_1,$in_2-$in_1 + 1);
						}
						else
						{
							$file_contain_rle_item= "Отсутствует описание из РЛЭ";
						}
					}
					else
					{
						$file_contain_rle_item= $text_rle_item_rle_item;
						if($text_rle_item_rle_item== "")
						{
							$file_contain_rle_item= "Отсутствует описание из РЛЭ";
						}
					}
					
					$rle_item_html= "<table id='rle_item_$key_rle_item_rle_item' style='width:100%;background:#bda377;display:table;'>
									<tr style='display:none;'>
										<td style='font-weight:bold;font-style:italic;'>
											Наименование пункта РЛЭ:
										</td>
									</tr>
									<tr style='display:none;'>
										<td>
											$name_rle_item_rle_item
										</td>
									</tr>
									<tr>
										<td style='font-weight:bold;font-style:italic;'>
											Содержание соответствующих пунктов регламентирующих документов:
										</td>
									</tr>
									<tr>
										<td>
											$file_contain_rle_item
										</td>
									</tr>
								</table>";
				}
			}
					
		}
		
	}
	else if(!empty($_POST['rle_item_preview']))
	{
		$rle_exists= true;
		
		$key_rle_item_rle_item= ($_POST['id_rle_item']);
		$id_type_board= ($_POST['id_type_board']);
		$name_rle_item_rle_item= ($_POST['name_rle_item']);
		$ref_web_page_text_rle_item_rle_item= ($_POST['path_html_rle_item']);
		$ref_pdf_text_rle_item_rle_item= ($_POST['path_pdf_rle_item']);
		$status_show_pdf_rle_item= ($_POST['visibility_ref_pdf_rle_item']);
		$key_algorithm_rle_item= mysql_real_escape_string($_POST['path_algorithm_rle_item']);
		$status_show_algorithm_rle_item= ($_POST['visibility_ref_algorithm_rle_item']);
		$comment_rle_item= ($_POST['comment_rle_item']);
		$status_use_web_page_rle_item_rle_item= ($_POST['use_ref_html_rle_item']);
		$status_rle_item= ($_POST['visibility_rle_item']);
		$text_rle_item_rle_item= ($_POST['text_rle_item']);
		
		
		$file_contain_algorithm= "";
		
		
		
		if($status_use_web_page_rle_item_rle_item== "1")
		{
			
			if(file_exists($ref_web_page_text_rle_item_rle_item))
			{
				$filename= $ref_web_page_text_rle_item_rle_item; 
							
				// открываем файл  
				$file= fopen($filename, "r");  
				  
				// читаем его содержимое в буффер  
				$buffer= fread($file, filesize($filename));  
				 //echo $buffer;
				// закрываем файл  
				fclose($file);  
				 
				// Определяем позицию <title> 
				//$pattern= "/<[\s]*body[\s]*>(*)<[\s]*\/[\s]*body[\s]*>/i";  
				//preg_match($pattern,$buffer,$out); 
				
				$in_1= strstr($buffer,"<body>")+6;
				$in_2= strstr($buffer,"</body>")-1;
				
						
				$file_contain_rle_item= substr($buffer,$in_1,$in_2-$in_1 + 1);
			}
			else
			{
				$file_contain_rle_item= "Отсутствует описание РЛЭ";
			}
		}
		else
		{
			$file_contain_rle_item= $text_rle_item_rle_item;
			if($text_rle_item_rle_item  == "")
			{
				$file_contain_rle_item= "Отсутствует описание пункта РЛЭ";
			}
		}
		
		
		$algorithm_exists= false;
	
		if(($status_show_algorithm_rle_item== "1") && $key_algorithm_rle_item != "")
		{
			$query= "select * from $tbl_sdk_express_algorithms where status='1' and key_algorithm='$key_algorithm_rle_item' order by position";
		
			$res= @mysql_query($query);
				
			if($res)
			{
				$algorithm_rle_item= @mysql_fetch_array($res);
				if($algorithm_rle_item)
				{
					$algorithm_exists= true;
					
					$id_algorithm= $algorithm_rle_item['id'];
					$key_algorithm= $algorithm_rle_item['key_algorithm'];
					$key_type_board_algorithm= $algorithm_rle_item['key_type_board'];
					$name_algorithm= $algorithm_rle_item['name_algorithm'];
					$ref_web_page_text_algorithm_algorithm= $algorithm_rle_item['ref_web_page_text_algorithm'];
					$ref_pdf_text_algorithm_algorithm= $algorithm_rle_item['ref_pdf_text_algorithm'];
					$status_show_pdf_algorithm= $algorithm_rle_item['status_show_pdf'];
					$key_algorithm_rle_item= $algorithm_rle_item['key_rle'];
					$status_show_algorithm_rle_item= $algorithm_rle_item['status_show_rle'];
					$comment_algorithm= $algorithm_rle_item['comment'];
					$status_use_web_page_algorithm_algorithm= $algorithm_rle_item['status_use_web_page_algorithm'];
					$admin_add_algorithm= $algorithm_rle_item['admin_add'];
					$admin_last_modified_algorithm= $algorithm_rle_item['admin_last_modified'];
					$date_add_algorithm= $algorithm_rle_item['date_add'];
					$text_algorithm_algorithm= $algorithm_rle_item['text_algorithm'];
					$date_last_modified_algorithm= $algorithm_rle_item['date_last_modified'];
					$position_algorithm= $algorithm_rle_item['position'];
					$status_algorithm= $algorithm_rle_item['status'];
					
					$file_contain_algorithm= "";
		
					if($status_use_web_page_algorithm_algorithm== "1")
					{
						if(file_exists($ref_web_page_text_algorithm_algorithm))
						{
							 $filename= $ref_web_page_text_algorithm_algorithm; 
							
							// открываем файл  
							$file= fopen($filename, "r");  
				  
							// читаем его содержимое в буффер  
							$buffer= fread($file, filesize($filename));  
				 
							// закрываем файл  
							fclose($file);  
				 
							// Определяем позицию <title> 
							//$pattern= "/<[\s]*body[\s]*>(*)<[\s]*\/[\s]*body[\s]*>/i";  
							//preg_match($pattern,$buffer,$out); 
							
							$in_1= strstr($buffer,"<body>")+6;
							$in_2= strstr($buffer,"</body>")-1;
				
						
							$file_contain_algorithm= substr($buffer,$in_1,$in_2-$in_1 + 1);
						}
						else
						{
							$file_contain_algorithm= "Отсутствует описание алгоритма";
						}
					}
					else
					{
						$file_contain_algorithm= $text_algorithm_algorithm;
						if($text_algorithm_algorithm== "")
						{
							$file_contain_algorithm= "Отсутствует описание алгоритма";
						}
					}
				}
			}
					
		}
		
		$rle_item_html= "<table id='rle_item_$key_rle_item_rle_item' style='width:100%;background:#bda377;display:table;'>
									<tr style='display:none;'>
										<td style='font-weight:bold;font-style:italic;'>
											Наименование пункта РЛЭ:
										</td>
									</tr>
									<tr style='display:none;'>
										<td>
											$name_rle_item_rle_item
										</td>
									</tr>
									<tr>
										<td style='font-weight:bold;font-style:italic;'>
											Содержание пунктов регламентирующих документов:
										</td>
									</tr>
									<tr>
										<td>
											$file_contain_rle_item
										</td>
									</tr>
								</table>";
								
	}
	else
	{
	
	
		if(!empty($_POST['key_algorithm']))
		{
			$key_algorithm_get= mysql_real_escape_string($_POST['key_algorithm']);
			$is_algorithm= true;
		}
		

		if(!$is_algorithm)
		{
			exit("");
		}
		else
		{
			
		}

		$query= "select * from $tbl_sdk_express_algorithms where status='1' and key_algorithm='$key_algorithm_get' order by position ";
		
		$res= @mysql_query($query);
			
		if(!$res)
		{
			exit('');
		}
			
		$algorithm= @mysql_fetch_array($res);
		
		if(!$algorithm)
		{
			exit('');
		}	
		$id_algorithm= $algorithm['id'];
		$key_algorithm_algorithm= $algorithm['key_algorithm'];
		$key_type_board_algorithm= $algorithm['key_type_board'];
		$name_algorithm_algorithm= $algorithm['name_algorithm'];
		$ref_web_page_text_algorithm_algorithm= $algorithm['ref_web_page_text_algorithm'];
		$ref_pdf_text_algorithm_algorithm= $algorithm['ref_pdf_text_algorithm'];
		$status_show_pdf_algorithm= $algorithm['status_show_pdf'];
		$key_rle_algorithm= $algorithm['key_rle'];
		$status_show_rle_algorithm= $algorithm['status_show_rle'];
		$comment_algorithm= $algorithm['comment'];
		$status_use_web_page_algorithm_algorithm= $algorithm['status_use_web_page_algorithm'];
		$admin_add_algorithm= $algorithm['admin_add'];
		$admin_last_modified_algorithm= $algorithm['admin_last_modified'];
		$date_add_algorithm= $algorithm['date_add'];
		$text_algorithm_algorithm= $algorithm['text_algorithm'];
		$date_last_modified_algorithm= $algorithm['date_last_modified'];
		$position_algorithm= $algorithm['position'];
		$status_algorithm= $algorithm['status'];

		
		
		$file_contain_algorithm= "";
		
		if($status_use_web_page_algorithm_algorithm== "1")
		{
			if(file_exists($ref_web_page_text_algorithm_algorithm))
			{
				$filename= $ref_web_page_text_algorithm_algorithm; 
							
				// открываем файл  
				$file= fopen($filename, "r");  
				  
				// читаем его содержимое в буффер  
				$buffer= fread($file, filesize($filename));  
				 
				// закрываем файл  
				fclose($file);  
				 
				// Определяем позицию <title> 
				//$pattern= "/<[\s]*body[\s]*>(*)<[\s]*\/[\s]*body[\s]*>/i";  
				//preg_match($pattern,$buffer,$out); 
							
				$in_1= strstr($buffer,"<body>")+6;
				$in_2= strstr($buffer,"</body>")-1;
				
						
				$file_contain_algorithm= substr($buffer,$in_1,$in_2-$in_1 + 1);
			}
			else
			{
				$file_contain_algorithm= "Отсутствует описание алгоритма";
			}
		}
		else
		{
			$file_contain_algorithm= $text_algorithm_algorithm;
			if($text_algorithm_algorithm == "")
			{
				$file_contain_algorithm= "Отсутствует описание алгоритма";
			}
		}
					
					
		
		
		
		$rle_exists= false;
		
		if(($status_show_rle_algorithm== "1") && $key_rle_algorithm != "")
		{
			$query= "select * from $tbl_rle_items where status='1' and key_algorithm='$key_algorithm_get' and key_rle_item='$key_rle_algorithm' order by position";
		
			$res= @mysql_query($query);
				
			if($res)
			{
				$rle_item= @mysql_fetch_array($res);
				if($rle_item)
				{
					$rle_exists= true;
					
					$id_rle_item= $rle_item['id'];
					$key_rle_item_rle_item= $rle_item['key_rle_item'];
					$key_type_board_rle_item= $rle_item['key_type_board'];
					$name_rle_item_rle_item= $rle_item['name_rle_item'];
					$ref_web_page_text_rle_item_rle_item= $rle_item['ref_web_page_text_rle_item'];
					$ref_pdf_text_rle_item_rle_item= $rle_item['ref_pdf_text_rle_item'];
					$status_show_pdf_rle_item= $rle_item['status_show_pdf'];
					$key_algorithm_rle_item= $rle_item['key_algorithm'];
					$status_show_algorithm_rle_item= $rle_item['status_show_algorithm'];
					$comment_rle_item= $rle_item['comment'];
					$status_use_web_page_rle_item_rle_item= $rle_item['status_use_web_page_rle_item'];
					$admin_add_rle_item= $rle_item['admin_add'];
					$admin_last_modified_rle_item= $rle_item['admin_last_modified'];
					$date_add_rle_item= $rle_item['date_add'];
					$text_rle_item_rle_item= $rle_item['text_rle_item'];
					$date_last_modified_rle_item= $rle_item['date_last_modified'];
					$position_rle_item= $rle_item['position'];
					$status_rle_item= $rle_item['status'];
					
					$file_contain_rle_item= "";
		
					if($status_use_web_page_rle_item_rle_item== "1")
					{
						if(file_exists($ref_web_page_text_rle_item_rle_item))
						{
							 $filename= $ref_web_page_text_rle_item_rle_item; 
							
							// открываем файл  
							$file= fopen($filename, "r");  
				  
							// читаем его содержимое в буффер  
							$buffer= fread($file, filesize($filename));  
				 
							// закрываем файл  
							fclose($file);  
				 
							// Определяем позицию <title> 
							//$pattern= "/<[\s]*body[\s]*>(*)<[\s]*\/[\s]*body[\s]*>/i";  
							//preg_match($pattern,$buffer,$out); 
							
							$in_1= strstr($buffer,"<body>")+6;
							$in_2= strstr($buffer,"</body>")-1;
				
						
							$file_contain_rle_item= substr($buffer,$in_1,$in_2-$in_1 + 1);
						}
						else
						{
							$file_contain_rle_item= "Отсутствует описание из РЛЭ";
						}
					}
					else
					{
						$file_contain_rle_item= $text_rle_item_rle_item;
						if($text_rle_item_rle_item== "")
						{
							$file_contain_rle_item= "Отсутствует описание из РЛЭ";
						}
					}
					
					$rle_item_html= "<table id='rle_item_$key_rle_item_rle_item' style='width:100%;background:#bda377;display:table;'>
									<tr style='display:none;'>
										<td style='font-weight:bold;font-style:italic;'>
											Наименование пункта РЛЭ:
										</td>
									</tr>
									<tr style='display:none;'>
										<td>
											$name_rle_item_rle_item
										</td>
									</tr>
									<tr>
										<td style='font-weight:bold;font-style:italic;'>
											Содержание пунктов регламентирующих документов:
										</td>
									</tr>
									<tr>
										<td>
											$file_contain_rle_item
										</td>
									</tr>
								</table>";
				}
			}
					
		}
	}

	
	$alg_html= "<h3 class='ac_$key_algorithm_get'>
					<table style='width:100%;'>
						<tr>
							<td>$name_algorithm_algorithm</td>
							<td style='text-align:right;'><button class='btn_close_$key_algorithm_get' style='font-size:0.6em;' onclick=\"$('.ac_$key_algorithm_get').remove();\">Закрыть</button></td>
						</tr>
					</table>
				</h3>
				<div class='ac_$key_algorithm_get'>
					<table style='width:100%;'>
						";
	$is_toolbar= false;
	if(($status_show_pdf_algorithm) && ($ref_pdf_text_algorithm_algorithm != ""))
	{
		$alg_html .= "<tr><td style='font-size:0.6em;border-bottom:2px solid #40331c;padding-bottom:10px; '>
						<a href='$ref_pdf_text_algorithm_algorithm'><button class='btn_$key_algorithm_get' title='Описание алгоритма в формате pdf'>pdf</button></a>";
		$is_toolbar= true;
	}
	
	if($rle_exists)
	{
		if(!(($status_show_pdf_algorithm) && ($ref_pdf_text_rle_rle != "")))
		{
			$alg_html .= "<tr><td style='font-size:0.6em;border-bottom:2px solid #40331c;padding-bottom:10px; '>
							<button class='btn_$key_algorithm_get' title='Показать/Скрыть содержание соответствующих пунктов регламентирующих документов' onclick=\"if($('#rle_item_$key_rle_item_rle_item').css('display')== 'none') {\$('#rle_item_$key_rle_item_rle_item').show();} else {\$('#rle_item_$key_rle_item_rle_item').hide();}; $('#accordion_algorithms div').css('height','auto');\">rle</button></td></tr>";
		}
		else
		{
			$alg_html .= "<button class='btn_$key_algorithm_get' title='Показать/Скрыть содержание соответствующих пунктов регламентирующих документов' onclick=\"if($('#rle_item_$key_rle_item_rle_item').css('display')== 'none') {\$('#rle_item_$key_rle_item_rle_item').show();\} else {\$('#rle_item_$key_rle_item_rle_item').hide();}; $('#accordion_algorithms div').css('height','auto');\">rle</button></td></tr>";

		}
		$alg_html .= "<tr><td>".$rle_item_html."</tr></td>"; 
		$is_toolbar= true;
			
	}
	
	if($is_toolbar)
	{
	
		$alg_html .= "</td>
				</tr>";
	}
	
	$alg_html .= "<tr>
					<td style='font-weight:bold;font-style:italic;padding-top:10px;padding-bottom:10px;'>
						Алгоритм:
					</td>
				</tr>
				<tr style='padding-top:10px;padding-bottom:10px;'>
					<td>
						$name_algorithm_algorithm
					</td>
				</tr>
				<tr>
					<td style='font-weight:bold;font-style:italic;padding-top:10px;padding-bottom:2px;'>
						Содержание алгоритма:
					</td>
				</tr>
				<tr>
					<td style='padding-top:2px;'>
						$file_contain_algorithm
					</td>
				</tr>
			</table>
		</div>";
	


	
	echo $alg_html;		
	
?>