<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	require_once("../utils/authorized.php");
	
	$title_adm= "Загрузки";
	
	
	
	include_once("../utils/top_html.php");
	
	include_once("../utils/top_page.php");
	
	$html_downloads = "
		<table style='width:100%;'>";
	
	
	$query= "select * from $tbl_group_downloads where status='1' order by position";

		
	$res= @mysql_query($query);
	
	if(!$res)
	{
		echo("Возникла ошибка при обращении к базе данных. Пожалуйста, попробуйте позднее.".mysql_error());
	}
	else
	{
		$count_group_downloads = 0;
		$count_downloads = 0;
		while(($group_downloads= mysql_fetch_array($res)))
		{
			$count_group_downloads++;
			
			
			$id_group_downloads= $group_downloads['id'];
			$name_group_downloads= $group_downloads['name'];
			$short_description_group_downloads= $group_downloads['short_description'];
			$long_description_group_downloads= $group_downloads['long_description'];
			
			$html_downloads .= "
				<tr>
					<td colspan=2 style='border:1px solid #362917;text-align:center;background:#d5ac5d;padding:10px;font-weight:bold;font-style:italic; font-size:1.5em;'>
						$name_group_downloads
					</td>
				</tr>";
			
			$query= "select * from $tbl_downloads where status='1' and id_group=$id_group_downloads order by position";
			
			$res= @mysql_query($query);
	
			if($res)
			{
				$count_downloads = 0;
				while(($download= mysql_fetch_array($res)))
				{
					$count_downloads++;
					
					$id_download = $download['id'];
					$id_group_download = $download['id_group'];
					$name_download = $download['name'];
					$short_description_download = $download['short_description'];
					$long_description_download = $download['long_description'];
					$ref_download = $download['ref_download'];
					$icon_download = $download['icon_download'];
					$comment_download = $download['comment_download'];
					
					$html_downloads .= "
						<tr>
							<td style='border:1px solid #362917;text-align:center;background:#fee4bd;padding:10px;font-weight:bold;font-style:italic; font-size:1em;'>
								<a href='$ref_download'>
									<img src='$icon_download' style='width:50xp;height:50px;'><br>
									$name_download
								</a>
							</td>
							<td style='border:1px solid #362917;text-align:justify;background:#fee4bd;padding:10px;font-weight:bold;font-style:italic; font-size:1em;'>
								$long_description_download
							</td>
						</tr>";
					
				}
			}
						

		}
		$html_downloads .= "</table>";
		echo $html_downloads;
	}
	
	
?>

<?php
	
	include_once("../utils/bottom_page.php");
	
?>
