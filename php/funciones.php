<?php
function borrar_imagenes($ruta,$extension){
	switch($extension){
		case ".jpg":
			if(file_exists($ruta.".png"))
				unlink($ruta.".png");
			if(file_exists($ruta.".gif"))
				unlink($ruta.".gif");
			break;
		case ".gif":
			if(file_exists($ruta.".png"))
				unlink($ruta.".png");
			if(file_exists($ruta.".jpg"))
				unlink($ruta.".jpg");
			break;
		case ".png":
			if(file_exists($ruta.".jpg"))
				unlink($ruta.".jpg");
			if(file_exists($ruta.".gif"))
				unlink($ruta.".gif");
			break;
	}
}

function subir_imagen($tipo,$imagen,$email){
	if(strstr($tipo,"image")){
		if(strstr($tipo,"jpeg"))
			$extension = ".jpg";
		else if (strstr($tipo,"gif"))
			$extension = ".gif";
		else if(strstr($tipo,"png"))
			$extension = ".png";

		$tam_img = getimagesize($imagen);
		$ancho_img = $tam_img[0];
		$alto_img = $tam_img[1];
		$ancho_img_deseado = 420;

		if($ancho_img>$ancho_img_deseado){
			//Obtenemos el valor proporcional deseado
			$nuevo_ancho_img = $ancho_img_deseado;
			$nuevo_alto_img = ($alto_img/$ancho_img)*$nuevo_ancho_img;
			
			//Creamos las nuevas dimensiones dela imagen
			$img_reajustada = imagecreatetruecolor($nuevo_ancho_img,$nuevo_alto_img);
				
			//Creamos la imagen basada en la original, asignando las nuevas dimensiones
			switch($extension){
				case ".jpg":
					$img_original = imagecreatefromjpeg($imagen);
					//reajustamos la imagen creada a nuevos valores
					imagecopyresampled($img_reajustada,$img_original,0,0,0,0, $nuevo_ancho_img,$nuevo_alto_img,$ancho_img,$alto_img);
					//Guardo la imagen reescalada en el servidor
					$nombre_img_ext ="../img/fotos/".$email.$extension;
					$nombre_img ="../img/fotos/".$email;
					imagejpeg($img_reajustada,$nombre_img_ext,100);
					borrar_imagenes($nombre_img,".jpg");
					break;
				case ".gif":
					$img_original = imagecreatefromgif($imagen);
					//reajustamos la imagen creada a nuevos valores
					imagecopyresampled($img_reajustada,$img_original,0,0,0,0, $nuevo_ancho_img,$nuevo_alto_img,$ancho_img,$alto_img);
					//Guardo la imagen reescalada en el servidor
					$nombre_img_ext ="../img/fotos/".$email.$extension;
					$nombre_img ="../img/fotos/".$email;
					imagegif($img_reajustada,$nombre_img_ext,100);
					borrar_imagenes($nombre_img,".gif");
					break;
				case ".png":
					$img_original = imagecreatefrompng($imagen);
					//reajustamos la imagen creada a nuevos valores
					imagecopyresampled($img_reajustada,$img_original,0,0,0,0, $nuevo_ancho_img,$nuevo_alto_img,$ancho_img,$alto_img);
					//Guardo la imagen reescalada en el servidor
					$nombre_img_ext ="../img/fotos/".$email.$extension;
					$nombre_img ="../img/fotos/".$email;
					imagepng($img_reajustada,$nombre_img_ext);
					borrar_imagenes($nombre_img,".png");
					break;	
			}

		}else{
			//ruta para subir imagen
			$destino ="../img/fotos/".$email.$extension;

			//Subir imagen
			move_uploaded_file($imagen,$destino)or die("No se pudo subir la imagen al servidor");

			//Reemplazar imagenes
			$nombre_img ="../img/fotos/".$email;
			borrar_imagenes($nombre_img,$extension);
		}
		//Asignamos nombre de la foto que se guardara en la BD como cadena de texto
		$imagen=$email.$extension;
		return $imagen;	
	}else{
		return false;
	}
}
?>