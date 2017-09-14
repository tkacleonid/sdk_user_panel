

</head>
<body>

			<script type="text/javascript">
				$(function(){
                      
                      $("#td_content_block").css("display","table-cell");	
                  
					$("#administrative_header").qtip({
						 content: {
							text: 'Переход на главную страницу панели администрирования',
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
							classes: "qtip-dark",
							width: 300
						},
						 position: {
							my: 'top right',  // Position my top left...
							at: 'bottom center' // at the bottom right of...
						}
					});
					
					$("#frontend_header").qtip({
						 content: {
							text: 'Переход в пользовательскую часть',
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
							classes: "qtip-dark",
							width: 300
						},
						 position: {
							my: 'top right',  // Position my top left...
							at: 'bottom center' // at the bottom right of...
						}
					});
					
					$("#logout_header").qtip({
						 content: {
							text: 'Выход из панели администрирования',
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
							classes: "qtip-dark",
							width: 300
						},
						 position: {
							my: 'top right',  // Position my top left...
							at: 'bottom center' // at the bottom right of...
						}
					});
				});
			</script>
			<table cellspacing=0 cellpadding=0 id="body" style='width:100%;'>
				<tr>
					<td>
						<table class="header_1" cellspacing=0 cellpadding=0 style='width:100%;'>
							<tr style="padding:0px;">
							<!--
								<td style=" width:30px; background:none;padding-left:5px;">
									<img src="../../styles/images/hide_sow_menu_icon.gif" style="height:30px; width:30px;" style=" width:30px; background:#f37e50;">
								</td>
							-->
								<td style="padding:0px;vertical-align:middle;">
									<div id="welcome_admin" style="vertical-align:middle;height:100%;">
										Добро пожаловать, <?php  echo "<a href='../my_profile/'>{$_SESSION['login_adm']}</a>"; ?>
									</div>
								</td>
								<td style="text-align:center;vertical-align:middle;padding:0px;float:right;">
									<table style="width:100%;height:100%;" cellspacing=0 cellpadding=0>
										<tr>
											<td>
											
											</td>
											<td id="administrative_header" style="height:40px;text-align:right;background:#511903;color:white;cursor:pointer;border-left:1px solid #7c3316;padding: 0px 5px;" onmouseover="this.style.background='#7c3316'" onmouseout="this.style.background='#511903'" onclick="document.location = '../block_settings/index.php';">
												Администрирование сайта
											</td>
											<td onclick="window.open('<?php echo("../../frontend/index.php?")?>');" id="frontend_header" style="text-align:right;background:#511903;color:white;cursor:pointer;border-left:1px solid #7c3316;padding: 0px 5px;"  onmouseover="this.style.background='#7c3316'" onmouseout="this.style.background='#511903'">
												Пользовательская часть
											</td>
											<td id="logout_header" style="text-align:right;background:#511903;color:white;cursor:pointer;border-left:1px solid #7c3316;padding: 0px 5px;" onmouseover="this.style.background='#7c3316'" onmouseout="this.style.background='#511903'" onclick="document.location = '<?php echo("./index.php?logout=".(true))?>';">
												<img src='./../../styles/default/images/logout.png' height="100%">
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table style="height:1000px;width:100%;"; cellspacing=0 cellpadding=0>
							<tr>
								<td id="left_menu" style="vertical-align:top;">
										<input type="hidden" id="path_choice_image" value=''>
										<input type="hidden" id="path_choice_file" value=''>
							
										<div id="block_company_information" style="padding:10px;width:100%;">
											<img src="../../styles/images/dia_logo_ciam.gif" style="text-align:center;vertical-align:middle;height:50px;">
										</div>
										<table id="block_menu" class="div_table">
												<?php
													echo "$menu";
													echo "$script";
												?>
										</table>
								</td>
								<td style="vertical-align:top;">
									<table cellpadding=0 cellspacing=0 style="height:100%;color:#4e2311;width:100%;">
										<tr>
											<td style="height:30px; width:100%; background: #FFFFFF;font-weight: bold;font-size:1.2em; font-family: Arial;border-bottom:6px solid #5a1f08;">
												<table cellpadding=0 cellspacing=0>
													<tr><!--
														<td style=" width:30px; background:none;cursor:pointer;" onmouseover="this.style.background='#f7a585'" onmouseout="this.style.background='none'" >
															<img src="../../styles/images/hide_sow_menu_icon.gif" style="height:30px; width:30px;" style=" width:30px; background:#f37e50;" title="Скрыть меню">
														</td>-->
														<td style="padding: 10px;">
															<?php echo $title_adm; ?>
														</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td style="vertical-align:top;display:none;" id="td_content_block">