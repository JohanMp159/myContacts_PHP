<?php
$conexion = mysqli_connect("localhost","root","","mis_contactos")or die("No se pudo conectar con el servidor DB");
echo "Estoy conectado a MySQL";

echo "<h1>Las 4 opéraciones básicas a una BD</h1>";
echo "<h1>Inserción de Datos</h1><br/><br/>";

$consulta = "INSERT INTO contactos(email,nombre,sexo,nacimiento,telefono,pais,imagen)VALUES('jamp.159@hotmail.com','Johan Muñoz','M','04-02-1997','3206504683','Colombia','profile.png')";

$ejecutar_consulta = mysqli_query($consulta,$conexion);
echo "Se han insertado los datos correctamente <br/>";

$consulta = "DELETE FROM contactos WHERE email = 'jamp.159@hotmail.com'";
$ejecutar_consulta = mysqli_query($consulta,$conexion);
echo "Datos Eliminados <br/>";

$consulta = "UPDATE contactos SET email = 'desarrollo.jmp@gmail.com', nombre = 'Johan Pulgarin', imagen = 'picture.png' WHERE email ='jamp.159@hotmail.com'";
$ejecutar_consulta = mysqli_query($consulta,$conexion);
echo "Datos han sido actualziados <br/>";

$consulta = "SELECT * FROM contactos WHERE email = 'desarrollo.jmp@gmail.com' AND pais = 'Colombia'";
$ejecutar_consulta = mysqli_query($consulta,$conexion);
while($registro = mysqli_fetch_array($ejecutar_consulta)){
	echo $registro["email"]." ";
	echo $registro["nombre"]." ";
	echo $registro["sexo"]." ";
	echo $registro["nacimiento"]." ";
	echo $registro["telefono"]." ";
	echo $registro["pais"]." ";
	echo $registro["imagen"]." ";
	echo "<br/>";
}

mysqli_close($conexion);
echo "Conexión Cerrada";
?>