<?php
$email = $_POST["email_slc"];
include("conexion.php");
$consulta="DELETE FROM contactos WHERE email ='$email'";
$ejecutar_consulta = $conexion->query($consulta);

if($ejecutar_consulta){
	$mensaje = "El Contacto con el email <b> $email </b> ha sido eliminado!..";
} else{
	$mensaje = "No se puede eliminar el contacto con el email <b> $email</b>!..";
}

$conexion->close();
header("Location: ../index.php?op=baja&mensaje=$mensaje");
?>