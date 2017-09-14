<?php

	error_reporting(E_ALL & ~E_NOTICE);

	require_once("../../config/config.php");

	require_once("../utils/authorized.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Панель администрирования программного комплекса СДК-8</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
		<link rel="StyleSheet" type="text/css" href="../utils/adm.css">
		
		<script type="text/javascript" src="../../scripts/js/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="../../scripts/js/jquery-ui-1.11.2.custom/jquery-ui.js"></script>
		
		
		<link rel="StyleSheet" type="text/css" href="../../scripts/js/jquery-ui-1.11.2.custom/jquery-ui.min.css">
		<link rel="StyleSheet" type="text/css" href="../../scripts/js/jquery-ui-1.11.2.custom/jquery-ui.theme.min.css">
		<link rel="StyleSheet" type="text/css" href="../../scripts/js/jquery-ui-1.11.2.custom/jquery-ui.structure.min.css">
		
		<link rel="StyleSheet" type="text/css" href="../../scripts/js/fancy/source/jquery.fancybox.css">
		
		<link rel="shortcut icon" href="../../styles/images/dia_logo_icon.gif">

	
		<link rel="StyleSheet" type="text/css" href="../../scripts/js/jquery.qtip.min.css">
		<script type="text/javascript" src="../../scripts/js/jquery.qtip.min.js"></script>

		<!-- Magnific Popup core CSS file -->
		<link rel="stylesheet" href="../../scripts/js/magnific/magnific-popup.css"> 


		<!-- Magnific Popup core JS file -->
		<script src="../../scripts/js/magnific/jquery.magnific-popup.js"></script>
		
		<script type="text/javascript">
			$(function(){
			  $.widget("ui.dialog", $.ui.dialog, {
					_allowInteraction: function(event) {
							return !!$(event.target).closest(".mce-container").length || this._super( event );
						}
				});
			});
		</script>
