<?php

function conectarse()
{
	$servidor = "localhost";
	$usuario = "root";
	$password = "";
	$bd = "mis_contactos";
	
	$conectar = new mysqli($servidor,$usuario,$password,$bd)or die("No se pudo conectar al servido de BD MySQL");
	return $conectar;
}

$conexion = conectarse();

?>