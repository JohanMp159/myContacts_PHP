<?php

if(empty($_GET["pais_slc"])){
	include("conexion.php");
}
include("funciones.php");

$ejecutar_consulta = $conexion->query($consulta);
$num_regs = $ejecutar_consulta->num_rows;

if($num_regs==0){
	echo "<br/> <br/> <span class='mensajes'>No se encontraron registros!..  </span> <br/> <br/>";
}else{
	
}
$conexion->close();
?>

<br> <br/>
<table>
	<thread>
		<tr>
			<th>Email</th>
			<th>Nombre</th>
			<th>Sexo</th>
			<th>Nacimiento</th>
			<th>Telefono</th>
			<th>País</th>
			<th>Imagen</th>
		</tr>
	</thread>
	<tbody>
		<?php
			while($registros = $ejecutar_consulta->fetch_assoc()){
		?>
			<tr>
				<td><?php echo utf8_decode($registros["email"]) ?></td>
				<td><?php echo utf8_decode($registros["nombre"]) ?></td>
				<td><?php echo ($registros["sexo"]=="M")?"Masculino":"Femenino" ?></td>
				<td><?php echo utf8_decode($registros["nacimiento"]) ?></td>
				<td><?php echo utf8_decode($registros["telefono"]) ?></td>
				<td><?php echo utf8_decode($registros["pais"]) ?></td>
				<td> <img src="img/fotos/<?php echo  utf8_decode($registros["imagen"]);?>"/></td>
				
			</tr>
		<?php
			}
		?>
	</tbody>
</table>