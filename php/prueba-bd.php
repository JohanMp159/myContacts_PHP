<?php
//Pasos para conectarme a una BD MYsql con PHP
//1)Servidor
//2)Usuario de la BD
//3)Password del usuario de la BD

$conexion = mysql_connect("localhost","root","")or die("No se pudo conectar con el servidor DB");
echo "Estoy conectado a MySQL";

//2)Sleccionar la BD 
mysql_select_db("mis_contactos")or die("No se pudo selecccionar la BD");
echo "BD seleccionada <br/>";

//3)crear una consulta SQL
$consulta = "SELECT * FROM pais";

//4)Ejecutar la consulta SQL
//mysql_query necesita 2 parámetros... 
	//1) la consulta
	//2) la conexion  a la BD
$ejecutar_consulta = mysql_query($consulta,$conexion)or die("No se pudo ejecutar la consulta a la BD");
echo "Se ejecutoó la consulta SQL <br/>";

	
//5)mostar el resultado de ejecutar la consulta, dentro de un ciclo y en una variable voy a  ingrear la funcion mysql_fetch_array
while($registro = mysql_fetch_array($ejecutar_consulta)){
	echo $registro["id_pais"]."-".$registro["pais"]."<br/>";
}

mysql_close($conexion)or die("Ocurrio un error al cerrar la conexión a la BD");
echo "Conexión cerrada";
?>