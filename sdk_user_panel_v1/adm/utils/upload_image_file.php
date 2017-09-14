<?php

	error_reporting(E_ALL & ~E_NOTICE);
	
	
	
	function images_size($tmp_name, $new_name, $resolution_width, $resolution_height, $max_size){

		//проверяем размер файла
		$errors = 0;

		$image_size = filesize($tmp_name);
		$image_size = floor($image_size / '1048576') ;
		if($image_size <= $max_size) {

			$params = getimagesize($tmp_name) ;
			//проверяем ширину и высоту, нужно ли обрезание
			if($params['0'] > $resolution_width || $params['1'] > $resolution_height) {
				//пишем фото --------->
				//получаем нужные переменные
				switch ($params['2']) {
					case 1: $old_img = imagecreatefromgif($tmp_name); break;
					case 2: $old_img = imagecreatefromjpeg($tmp_name); break;
					case 3: $old_img = imagecreatefrompng($tmp_name); break;
					case 6: $old_img = imagecreatefromwbmp($tmp_name); break;
				}
				//вычисляем новые размеры
				if($params['0'] > $params['1']) {
					$size = $params['0'] ;
					$resolution = $resolution_width;
				}
				else {
					$size = $params['1'] ;
					$resolution = $resolution_height;
				}
				$new_width = floor($params['0'] * $resolution / $size) ;
				$new_height = floor($params['1'] * $resolution / $size) ;
				//создаём новое изображение
				$new_img = imagecreatetruecolor($new_width, $new_height) ;
				imagecopyresampled ($new_img, $old_img, 0, 0, 0, 0, $new_width, $new_height, $params['0'], $params['1']) ;

				//сохраняем новое изображение----->>>>>>
				//определяем тип изображения
				switch ($params['2']) {
					case 1: $type = '.gif'; break;
					case 2: $type = '.jpg'; break;
					case 3: $type = '.png'; break;
					case 6: $type = '.bmp'; break;
				}
		//Сохраняем
				$new_name = "$new_name" ;
				switch ($type) {
					case '.gif': imagegif($new_img, $new_name); break;
					case '.jpg': imagejpeg($new_img, $new_name, 100); break;
					case '.bmp': imagejpeg($new_img, $new_name, 100); break;
					case '.png': imagepng($new_img, $new_name); break;
				}
				imagedestroy($old_img);
			}
			//если не нужно обрезать-------------------->>>>>>>>>>>>>>>>>>>>>>>
			else {
				//сохраняем новое изображение----->>>>>>
				//определяем тип изображения
				switch ($params['2']) {
					case 1: $type = '.gif'; break;
					case 2: $type = '.jpg'; break;
					case 3: $type = '.png'; break;
					case 6: $type = '.bmp'; break;
				}
				//Сохраняем
				$new_name = "$new_name" ;
				copy($tmp_name, $new_name);
			}
		}
		else $errors = ('<font class="error">Слишком большой размер</font><br>') ;

		return($errors);
}
	
	
	
	$allowedExts = array("gif", "jpeg", "jpg", "png","GIF","JPEG","JPG","PNG");
    $temp = explode(".", $_FILES["file_for_upload"]["name"]);
	$main_folder = $_POST['main_folder'];
    $extension = end($temp);

	images_size($_FILES["file_for_upload"]["tmp_name"], "../../pictures/images_short/$main_folder".$_FILES["file_for_upload"]["name"], 100, 100, 50);
	move_uploaded_file($_FILES["file_for_upload"]["tmp_name"],"../../pictures/images_full/$main_folder".$_FILES["file_for_upload"]["name"]);
	
	

?>