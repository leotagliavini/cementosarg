<!DOCTYPE html>
<html>
<head>
     <title>Recursos Humanos</title><!--Poner título-->
</head>
<body>
	<div align="center"><h1>Recursos Humanos</h1></div><!--Es el encabezado más grande-->
	<hr color="" width="5000000">
	<p>
	<form method="post" action="index.php">
	
	<p>
		<label for="apellido">Apellido:</label><!--Ingresar un label apellido-->
		<input type="text" name="apellido" placeholder="Ingrese su apellido" required><!--No tiene tag de cierre-->
    </p>
    <p>
		<label for="nombre">Nombre:</label><!--Ingresar un label nombre-->
		<input type="text" name="Nombre" placeholder="Ingrese su nombre" required><!--No tiene tag de cierre-->
    </p>
    <p>
		<label for="direccion">Dirección:</label><!--Ingresar un label dirección-->
		<input type="text" name="direccion" placeholder="Ingrese su direccion" required><!--No tiene tag de cierre-->
    </p>
    <p>
		<label for="telfijo">Teléfono fijo:</label><!--Ingresar un label teléfono fijo-->
		<input type="text" name="telfijo" placeholder="Ingrese su teléfono fijo" required><!--No tiene tag de cierre-->
    </p>
    <p>
		<label for="celular">Teléfono celular:</label><!--Ingresar un label usuario-->
		<input type="text" name="celular" placeholder="Ingrese su teléfono celular" required><!--No tiene tag de cierre-->
    </p>
    <p>
		<label for="correo">Correo:</label><!--Ingresar un label correo-->
		<input type="email" name="correo" placeholder="Ingrese su correo" required><!--No tiene tag de cierre-->
    </p>
       <p>
		<label for="dni">DNI:</label><!--Ingresar un label DNI-->
		<input type="number" name="dni" placeholder="Ingrese su DNI" required><!--No tiene tag de cierre-->
    </p>
       <p>
		<label for="fechanac">Fecha de Nacimiento:</label><!--Ingresar un label DNI-->
		<input type="date" name="fechanac" placeholder="Ingrese su fecha de nacimiento" required><!--No tiene tag de cierre-->
    </p>
    <h3> Experiencia Laboral</h3>
       <p>
		<textarea name="notas" rows="20" cols="100" placeholder="Escriba su experiencia laboral"></textarea> 
	   </p>
	<h3> Estudios</h3>
       <p>
    	<textarea name="notas" rows="20" cols="100" placeholder="Escriba sus estudios"></textarea>
       </p>
    <h3> Opiniones</h3>
       <p>
    	<textarea name="notas" rows="20" cols="100" placeholder="Escriba sus opiniones"></textarea>
       </p>
       <p>
        <button type="" value="Enviar" type="submit">Enviar</button>
        <button type="reset" value="Restablecer" type="reset">Restablecer</button>
    </form>
</p>
</body>
</html>