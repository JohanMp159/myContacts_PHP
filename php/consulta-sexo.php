<br/>
<div>
	<label for="m">Sexo: </label>
	<input type="hidden" name="op" value="consultas">
	<input type="radio" id="m" name="sexo_rdo" title="Tu sexo" value="M" <?php if($_GET["sexo_rdo"]=="M"){ echo "checked";} ?>  required>
	<label id="lm" for="m" >Masculino</label>&nbsp;&nbsp;&nbsp;
	<input type="radio" id="f" name="sexo_rdo" title="Tu sexo" value="F" <?php if($_GET["sexo_rdo"]=="F"){ echo "checked";} ?> required>
	<label id="lf" for="f">Femenino</label>
</div>
<input type="submit" id="enviar-buscar" class="cambio" name="enviar_btn" value="buscar"/>
<?php

if($_GET["sexo_rdo"]!=null){
	$sexo = $_GET["sexo_rdo"];
	$consulta = "SELECT * FROM contactos WHERE sexo ='$sexo'";
	include("tablas-resultados.php");
}
?>


