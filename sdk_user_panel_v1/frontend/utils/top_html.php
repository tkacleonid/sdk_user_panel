<?php

	error_reporting(E_ALL & ~E_NOTICE);

	require_once("../../config/config.php");

	//require_once("../utils/authorized.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Пользовательская панель программного комплекса СДК-8</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 


		<script type="text/javascript" src="../../scripts/js/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="../../styles/frontend/default/jquery-ui/jquery-ui.js"></script>
		<script type="text/javascript" src="../../scripts/js/jquery.qtip.min.js"></script>
      
      <link rel="stylesheet" href="../../scripts/js/nivo_slider/themes/default/default.css" type="text/css" media="screen" />
    	<link rel="stylesheet" href="../../scripts/js/nivo_slider/themes/light/light.css" type="text/css" media="screen" />
    	<link rel="stylesheet" href="../../scripts/js/nivo_slider/themes/dark/dark.css" type="text/css" media="screen" />
    	<link rel="stylesheet" href="../../scripts/js/nivo_slider/themes/bar/bar.css" type="text/css" media="screen" />
    	<link rel="stylesheet" href="../../scripts/js/nivo_slider/nivo-slider.css" type="text/css" media="screen" />
    	
      
      
      	<script type="text/javascript" src="../../scripts/js/nivo_slider/jquery.nivo.slider.js"></script>

      
      	<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/jquery.tinymce.min.js"></script>
		<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/plugins/tiny_mce_wiris/core/display.js"></script>
		<script type="text/javascript" src="../../plugins/tinymce4/js/tinymce/plugins/tiny_mce_wiris/integration/WIRISplugins.js?viewer=image"></script>
      
		
		<link rel="StyleSheet" type="text/css" href="../../styles/frontend/default/main.css">
		<link rel="StyleSheet" type="text/css" href="../../styles/frontend/default/jquery-ui/jquery-ui.min.css">
		<link rel="StyleSheet" type="text/css" href="../../styles/frontend/default/jquery-ui/jquery-ui.theme.min.css">
		<link rel="StyleSheet" type="text/css" href="../../styles/frontend/default/jquery-ui/jquery-ui.structure.min.css">
      <link rel="StyleSheet" type="text/css" href="../../styles/frontend/default/camera.css">
		<link rel="shortcut icon" href="../../styles/images/dia_logo_icon.gif">
		<link rel="StyleSheet" type="text/css" href="../../scripts/js/jquery.qtip.min.css">
		
		<script type="text/javascript">
			$(function(){
			  $.widget("ui.dialog", $.ui.dialog, {
					_allowInteraction: function(event) {
							return !!$(event.target).closest(".mce-container").length || this._super( event );
						}
				});
			});
		</script>

		<script type="text/javascript" src="./main.js"></script>