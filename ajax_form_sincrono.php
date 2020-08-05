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
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script type="text/javascript">
		$(inicio)

		function inicio(){
			//activar listener boton enviar
			$('#enviar').on('click', enviarFormulario)
		}

		function enviarFormulario(){
			alert('enviar formulario')
		}
	</script>
</head>
<body>
	<form>
		<label>Nombre</label>
		<input type="text" id='nombre'><br>
		<label>Apellidos</label>
		<input type="text" id='apellidos'><br><br>
		<label></label>
		<input type="submit" id='enviar' value="Enviar"><br><br>
		<label></label>
		<textarea id="mensaje"></textarea><br>
		<span id="error"></span>
	</form>
</body>
</html>