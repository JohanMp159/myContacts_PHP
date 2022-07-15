<?php
$email = $_POST["email_txt"];
$nombre = $_POST["nombre_txt"];
$sexo = $_POST["sexo_rdo"];
$nacimiento = $_POST["nacimiento_txt"];
$telefono = $_POST["telefono_txt"];
$pais = $_POST["pais_slc"];

$imagen_generica = ($sexo=="M")?"amigo.png":"img/fotos/amiga.png";

include("conexion.php");
$consulta = "SELECT * FROM contactos WHERE email = '$email'";
$ejecutar_consulta = $conexion->query($consulta);
$num_regs = $ejecutar_consulta->num_rows; //num_rows este Método devuelve el número de registros obtenidos


if($num_regs==0){
	include("funciones.php");
	$tipo = $_FILES["foto_fls"]["type"];
	$archivo = $_FILES["foto_fls"]["tmp_name"];
	$se_subio_imagen = subir_imagen($tipo,$archivo,$email);
	
	$imagen = empty($archivo)?$imagen_generica:$se_subio_imagen;
	
	$consulta = "INSERT INTO contactos(email,nombre,sexo,nacimiento,telefono,pais,imagen) VALUES ('$email','$nombre','$sexo','$nacimiento','$telefono','$pais','$imagen')";
	$ejecutar_consulta = $conexion->query(utf8_encode($consulta));
	
	if($ejecutar_consulta){
		$mensaje = "se ha dado de alta al contacto con el email <b>$email</b>";
	}
	else{
		$mensaje="No se pudo dar de alta al contacto con el email <b>$email</b>";
	}
} else {
	$mensaje = "No e pudo dar de alta al contacto con el emal <b/>.. Ya existe";
};
	
$conexion->close();
header("Location: ../index.php?op=alta&mensaje=$mensaje");
?>