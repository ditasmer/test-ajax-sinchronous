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
			//alert('enviar formulario')
			//recuperar datos, y eliminar espacios ini y final
			let nombre = $('#nombre').val().trim()
			let apellidos = $('#apellidos').val().trim()

			try	{
				//opcional validar datos
				if((nombre == '') || (apellidos == '')){
					//throw('Obligatorio nombre y apellidos')
				}

				//enviar datos al server: $.post(param1, param2, param3)
				//param1:localizacion del servicio
				//param2: datos que enviamos(calve:valor)
				//param3: callback que el servidor ejecuta 
				/*$.post('webserver/ajax_procesa_form.php', {'nombre': nombre, 'apellidos': apellidos}, procesaRespuesta)*/
				
				//enviar datos al server con función ajax mas potente
				$.ajax({
					url: 'webserver/ajax_procesa_form.php', 
					type: 'post',
					data: {'nombre': nombre, 'apellidos': apellidos},
					beforeSend: function(){
						//acciones a realizar mientras el server envia respuesta
						//aparece el reloj 
						$('#reloj').css('display', 'block')
					},
					success: function(respuesta){
						//acciones a realizar cuando se recibe la respuesta
						procesaRespuesta(respuesta);

						//desaparece el reloj porque ha habido respuesta
						$('#reloj').css('display', 'none')
					},
					error: function(error){
						//acciones a realizar en caso de error en la petición
						console.log(error);
						alert('Error en la petición')
					},
					complete: function(){
						//acciones a realizar cuando se completa la peticion 
						alert('completada petición')
					}

				})


			}catch(e) {
				alert(e)
			}
		}

		function procesaRespuesta(respuesta){
				//alert(respuesta)

				//identificar las dos primeras posiciones de la respuesta para saber si es correcta o error
				if(respuesta.substring(0, 2) == '00'){
					//alert(respuesta.substring(0, 2))
					$('#mensaje').val(respuesta.substring(2))
				} else{
					//alert(respuesta.substring(0, 2))
					$('#error').text(respuesta.substring(2))
				}
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
		<input type="button" id='enviar' value="Enviar"><br><br>
		<label></label>
		<textarea id="mensaje"></textarea><br>
		<span id="error"></span>
		<br><br>
		<img src="img/reloj.gif" id="reloj" style="display: none;">
	</form>
</body>
</html>