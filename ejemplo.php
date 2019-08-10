<!DOCTYPE html>
<html>
<head>
     <title>Ejemplo</title><!--Poner título-->
</head>
<body>
	<div align="center"><h1>Ejemplo</h1></div><!--Es el encabezado más grande-->
	<hr color="" width="5000000">
	<p>
	<form method="post" action="index.php">
	
    <p>
		<label for="nombre">Nombre:</label><!--Ingresar un label nombre-->
		<input type="text" name="Nombre" placeholder="Ingrese su nombre" required maxlength="50"><!--No tiene tag de cierre-->  
    </p>

    <p>
		<label for="direccion">Dirección:</label><!--Ingresar un label dirección-->
		<input type="text" name="direccion" placeholder="Ingrese su direccion" required maxlength="30"><!--No tiene tag de cierre-->
    </p>

      <p>
    <label for="localidad">Dirección:</label><!--Ingresar un label dirección-->
    <input type="text" name="localidad" placeholder="Ingrese su Localidad" required maxlength="30"><!--No tiene tag de cierre-->
    </p>

<select name="Provincias"><!--Lista desplegables-->
   <option value="1">Buenos Aires</option> 
   <option value="2">Catamarca</option> 
   <option value="3">Chaco</option>
   <option value="4">Chubut</option> 
   <option value="5">Córdoba</option> 
   <option value="6">Corrientes</option>
   <option value="7">Entre Ríos</option> 
   <option value="8">Formosa</option> 
   <option value="9">Jujuy</option> 
   <option value="10">La Pampa</option> 
   <option value="11">La Rioja</option> 
   <option value="12">Mendoza</option> 
   <option value="13">Misiones</option> 
   <option value="14">Neuquén</option> 
   <option value="15">Río Negro</option> 
   <option value="16">Salta</option> 
   <option value="17">San Juan</option> 
   <option value="18">San Luis</option> 
   <option value="19">Santa Cruz</option> 
   <option value="20">Santa Fé</option> 
   <option value="21">Santiago del Estero</option> 
   <option value="22">Tierra del Fuego</option> 
   <option value="23">Tucumán</option>  
</select>

<p>
    <label for="novedades">Novedades:</label><!--Ingresar un label novedades-->
    </p>
<input type="radio" name="gender" value="si"> Sí<br><!--Radio Button--> <input type="radio" name="gender" value="no"> No<br><!--Radio Button-->

 <p>
    <label for="email">Email:</label><!--Ingresar un label email-->
<input type="email" name="email" placeholder="Ingrese su email" maxlength="250"><!--Ingresar un tipo email-->
</p>

    <h3> Notas:</h3><!--Ingresar un cuadro de texto-->
       <p>
		<textarea name="notas" rows="20" cols="100" placeholder="Escriba sus notas"></textarea> 
	   </p>

       <p>
        <button type="" value="Enviar" type="submit">Enviar</button><!--Ingresar un botón enviar-->
    </form>
</p>
</body>
</html>