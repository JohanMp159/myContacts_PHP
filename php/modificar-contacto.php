<?php
$email = $_POST["email_hdn"];
$nombre = $_POST["nombre_txt"];
$sexo = $_POST["sexo_rdo"];
$nacimiento = $_POST["nacimiento_txt"];
$telefono = $_POST["telefono_txt"];
$pais = $_POST["pais_slc"];

include("conexion.php");
$consulta = "SELECT * FROM contactos WHERE email='$email'";
$ejecutar_consulta = $conexion->query($consulta);
$num_regs = $ejecutar_consulta->num_rows;

if($num_regs == 1){
	// si la foto viene vacio asignamos el valor del botn oculto de la foto que tiene el valor anterior a la busqueda, sino subo la nueva foto y reemplazmos el valor
	if(empty($_FILES["foto_fls"]["tmp_name"])){
		$imagen = $_POST["foto_hdn"];
	}else{
		//Se ejecuta la funcion para subir la imagen
		include("funciones.php");
		$tipo = $_FILES["foto_fls"]["type"];
		$archivo  = $_FILES["foto_fls"]["tmp_name"];
		$imagen = subir_imagen($tipo,$archivo,$email);
	}
	
	//Actualizamos los datos a la BD
	$consulta = "UPDATE contactos SET nombre='$nombre',sexo='$sexo',nacimiento='$nacimiento',telefono='$telefono',pais='$pais',imagen='$imagen' WHERE email='$email'";
	$ejecutar_consulta = $conexion->query(utf8_encode($consulta));
	
	if(ejecutar_consulta){
		$mensaje= " Se han hechos los cambios en los datos del contato con el email <b>$email</b> correctamente!..";
	}
	
} else{
	$mensaje =" No se pudieron hacer los cambios enlos datos el contacto con el email <b>$email</b>; Este no existe en la BD o está Duplicado";
}
$conexion->close();
header("Location: ../index.php?op=cambios&mensaje=$mensaje");
?>