<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
$op = $_GET["op"];
switch($op){
	case "alta":
		$contenido = "php/alta-contacto.php";
		$titulo = "Alta de contenidos";
		break;
	case "baja":
		$contenido = "php/baja-contacto.php";
		$titulo = "Baja de contacto";
		break;
	case "cambios":
		$contenido = "php/cambios-contacto.php";
		$titulo = "Cambios a contacto";
		break;
	case "consultas":
		$contenido = "php/consultas-contacto.php";
		$titulo = "Consultas a contacto";
		break;
			
	default:
		$contenido= "php/home.php";
		$titulo = "Mis Contactos v1";
		break;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $titulo; ?></title>
	<link rel="stylesheet" href="css/mis.contacto.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script>
		!window.jQuery && document.write("<script src='js/jquery.min.js'><\/script>");
	</script>
	<script src="js/mis-contactos.js"></script>
</head>
<body>
	<section id="contenido">
		<nav>
			<ul>
				<li><a href="index.php" class="cambio">Home</a></li>
				<li><a href="?op=alta" class="cambio">Alta de Contacto</a></li>
				<li><a href="?op=baja" class="cambio">Baja de Contacto</a></li>
				<li><a href="?op=cambios" class="cambio">Cambios de Contacto</a></li>
				<li><a href="?op=consultas" class="cambio">Consulta de contacto </a></li>
			</ul>
		</nav>
		<section id="principal">
			<?php include($contenido); ?>
		</section>
	</section>
</body>
</html>