<?php
	error_reporting(E_ALL & ~E_NOTICE);
	
	include_once("../../config/config.php");
//include_once("../utils/security_mod.php");
	
	include_once("../utils/menu.php");
	
	include_once("../utils/top_html.php");
	
	$title_adm = "Управление руководством оператора программы Тренд-18";
	
	include_once("../utils/top_page.php");
	 $file_array = file("trend_18_ro.html");
	 $str = "";
  if(!$file_array)
  {
    echo("Ошибка открытия файла");
  }
  else
  {
    for($i=0; $i < count($file_array); $i++)
    {
      $str .= $file_array[$i];
    }
  }
$pos1= strpos($str,'<body');
$str = substr($str,$pos1);

$pos1= strpos($str,'>');
$str = substr($str,$pos1+1);

$pos1= strpos($str,'</body>');
$str = substr_replace($str,"",$pos1);
?>	
<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/jquery.tinymce.min.js"></script>
<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/plugins/tiny_mce_wiris/core/display.js"></script>
<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/plugins/tiny_mce_wiris/integration/WIRISplugins.js?viewer=image"></script>
	
<script type="text/javascript" src="./main_script.js">
</script>
<div id="toolbar_block_settings" style="padding: 10px;font-size:0.9em;text-align:left;border-bottom:1px solid #5a1f08;">
<button id="btn_save" onclick="fn_save();">Сохранить изменения</button>	
<button id="btn_preview" onclick="fn_preview();">Предварительный просмотр</button>	
<button style="height:100%;padding:0px;vertical-align:middle;margin:0px;font-size:0.9em;" id="btn_images">Изображения</button>
<button style="height:100%;padding:0px;vertical-align:middle;margin:0px;font-size:0.9em;" id='btn_show_files' onclick="fn_show_choice_file();$( '#choice_file_dialog' ).dialog('open');">Открыть диалог просмотра файлов</button>
</div>
<br>
<div style="text-align:center;">	
<textarea style="width: 90%;height:1000px;" id="ro"><?php echo $str; ?></textarea>
</div>
					
<div id="pic" style="border:1px solid silver;width:850px;display:none;">				
</div>
<div id="choice_file_dialog" style="border:1px solid #5a1f08;;width:850px;display:none;">
</div>
<div id="status_loading" style="display:none;">
			<div id="loading">	
			</div>
</div>
<div id="error_dialog" style="text-align:center; display: none;">
	<p id="p_error_dialog" style="width:100%"></p>
	<hr>
	<button id="btn_error_dialog" style="margin:20px">OK</button>
<div>
	



<?php
	require_once("../utils/bottom_page.php");
?>
							
							
