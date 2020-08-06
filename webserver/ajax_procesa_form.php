 <?php
	//inicializar variables
	//$error=$mensaje=$nombre=$apellidos=null;

	//comprobar si hemos pulsado el botón enviar
	//if(isset($_POST['enviar'])) {
		//recuperar la información del formulario
		$nombre = trim($_POST['nombre']);
		$apellidos = trim($_POST['apellidos']);

		//validar que estén informados
		if ($nombre=='' || $apellidos=='') {
			$mensaje = '10nombre y apellidos obligatorios';
		} else {
			//confeccionar el mensaje de respuesta
			$mensaje = "00$nombre $apellidos";
		}

		//enviar mensaje de respuesta, tanto si es error como si no
		echo $mensaje;
	//}
?> 