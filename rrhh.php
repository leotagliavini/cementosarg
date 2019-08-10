<!DOCTYPE html>
<html>
<head>
	<title>Formulario de contacto</title>
</head>
<body>
		<h1>Cementos Argentina </h1>
		<p>
		<form form method = "post" action = "index.php">  <!-- el post es para ocultar los datos de la direccion,el get los muestra-->
		
		<p>
		<label for = "Apellido"> apellido </label>
		<input type="text" name="usuario" 
		</p>
		<p>
		<label for = "Nombre"> Nombre </label>
		<input type="text" name="Nombre" 
		</p>
		<p>
		<label for = "direccion"> Direccion </label>
		<input type="text" name="Direccion" 
		</p> 
		<p>
		<label for = "Telefono fijo"> Telefono fijo </label>
		<input type="text" name="Direccion" 
		</p> 
		<p>
		<label for = "Telefono movil"> Telefono movil </label>
		<input type="text" name="Telefono movil" 
		</p> 
		<p>
		<label for = "email"> email </label>
		<input type="email" name="email"
		</p> 
		<p>
		<label for = "dni"> dni </label>
		<input type="number" name="dni" 
		</p> 
		<p>
		<label for = "Fecha de nacimiento"> Fecha de nacimiento </label>
		<input type="date" name="fecha de nacimiento"
		</p> 
		<hr>
		<h3> Experiencias personales </h3> 
		<textarea name="referencias personales"rows="20" cols= "100">Escriba aqui sus referencias personales</textarea>
		<h3> Estudios </h3>
		<textarea name="Estudios"rows="20" cols= "100"></textarea>
		<p>
		<button type="text" name="Enviar"value="Enviar" type="submit">Enviar</button>
		</p>
		<p>
		<button type="reset" name="Restablecer" value="Restablecer" type="reset">Restablecer</button>
		</p>
	</form> 
</body>
</html>