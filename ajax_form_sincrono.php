<?php
	//inicializar variables
	$error=$mensaje=$nombre=$apellidos=null;

	//comprobar si hemos pulsado el botón enviar
	if(isset($_POST['enviar'])) {
		//recuperar la información del formulario
		$nombre = trim($_POST['nombre']);
		$apellidos = trim($_POST['apellidos']);

		//validar que estén informados
		if ($nombre=='' || $apellidos=='') {
			$error = 'nombre y apellidos obligatorios';
		} else {
			//confeccionar el mensaje de respuesta
			$mensaje = "$nombre $apellidos";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style>
		label {width:120px;display: inline-block;}
		form {width: 300px; border:1px solid grey;padding:20px;margin:auto;}
	</style>
</head>
<body>
	<form action="#" method='post'>
		<label>Nombre</label>
		<input type="text" name='nombre' value="<?=$nombre?>"><br>
		<label>Apellidos</label>
		<input type="text" name='apellidos' value="<?=$apellidos?>"><br><br>
		<label></label>
		<input type="submit" name='enviar'><br><br>
		<label></label>
		<textarea><?=$mensaje?></textarea><br>
		<span><?=$error?></span>
	</form>
</body>
</html>