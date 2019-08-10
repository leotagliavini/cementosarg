<?php
session_start();

if ($_SESSION["id_user"] != session_id()) {
	header("Location: login.php");
}

require ("../cnn.php");
$error_mensaje = "";
if (isset($_POST["btnEditar"]) == "Editar") {
	$id = $_POST["id"];
	$id_cliente = $_POST["id_cliente"];
	$tipo = $_POST["tipo"];
	$letra = $_POST["letra"];
	$prefijo = $_POST["prefijo"];
	$numero = $_POST["numero"];
	$fecha = $_POST["fecha"];
	$importe = $_POST["importe"];
	$notas = $_POST["notas"];

	$sql = "UPDATE comprobantes 
			SET id_cliente = $id_cliente, tipo = '$tipo', letra = '$letra', 
			prefijo = $prefijo, numero = $numero, fecha = '$fecha', importe = $importe, notas = '$notas' 
			WHERE id = $id";

	if (!@mysqli_query ($cnn, $sql)) {
	    // Si entra por acá es porque hubo un error. Lo capturo y guardo en la variable $error_mensaje
	    $error_mensaje = "<p>Error MySQL: ".mysqli_error($cnn)."</p><p>Comando SQL: ".$sql."</p>";
  	}
  	else  {
		header("location: comprobantes.php");
	}
}
else {
	$id = (int)$_GET["Id"];
	$sql = "SELECT * FROM comprobantes where id = $id";
	$rs = mysqli_query ($cnn, $sql);
	$dato = mysqli_fetch_array ($rs);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Cementos Argentina | Backend</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css"><!--Fuente-->
</head>
<body>
	<?php require("header.php"); ?>
	<?php if($error_mensaje == ""){
		echo $error_mensaje;
	}
	?>
	<hr>
	<div class="container">
		<form form method = "post" action = "comprobantes_editar.php">

			<p>
				<label for="id">Id.:</label>
				<input type="number" name="id" value ="<?php echo $dato["id"] ?>" readonly> 
			</p>

			<p>  
			    <label for='id_cliente'>Id. Cliente:</label>
			    <select name="id_cliente" id="id_cliente">
			    <?php
			    // Este proceso carga el combo de clientes
			    $sql = "SELECT id, nombre FROM clientes ORDER BY nombre";
			    $rsClientes = mysqli_query($cnn, $sql);
			    $cantidad = mysqli_num_rows($rsClientes);
			    if ($cantidad > 0) {
			    	while ($datoClientes = mysqli_fetch_array ($rsClientes)) {
				      	if ($datoClientes["id"] == $dato["id_cliente"]) { 
				        	echo "<option value='".$datoClientes["id"]."' selected>".$datoClientes["nombre"]."</option>";
				        }
				        else {
				        	echo "<option value='".$datoClientes["id"]."'>".$datoClientes["nombre"]."</option>";
				      	}
				    }
			    }
			    mysqli_free_result($rsClientes);
			    mysqli_close($cnn);
			    ?>
			    </select>
	  		</p>

			<p>
				<label for="tipo">Tipo:</label><br><!--Ingresar un label letra-->
			    <input type="radio" name="tipo" value="FA" <?php if ($dato["tipo"] == "FA") { echo "checked"; } ?>> FA<br><!--Radio button-->
			    <input type="radio" name="tipo" value="NC" <?php if ($dato["tipo"] == "NC") { echo "checked"; } ?>> NC<br><!--Radio button-->
			    <input type="radio" name="tipo" value="ND" <?php if ($dato["tipo"] == "ND") { echo "checked"; } ?>> ND<br><!--Radio button-->
			</p>

			<p>
				<label for = "letra">Letra:</label>
				<input type="text" name="letra" value = "<?php echo $dato["letra"] ?>">
			</p>

			<p>
				<label for = "prefijo">Prefijo:</label>
				<input type="text" name="prefijo" value = "<?php echo $dato["prefijo"] ?>">
			</p>

			<p>
				<label for = "numero">Número:</label>
				<input type="text" name="numero" value = "<?php echo $dato["numero"] ?>">
			</p>

			<p>
				<label for = "fecha">Fecha:</label>
				<input type="date" name="fecha" value = "<?php echo $dato["fecha"] ?>">
			</p> 

			<p>
				<label for = "importe">Importe:</label>
				<input type="number" name="importe" value = "<?php echo $dato["importe"] ?>">
			</p>

			<p>
				<label for = "nota">Notas:</label>
			</p>

			<p>
	    		<textarea name="notas" rows="10" cols="100"><?php echo $dato ["notas"] ?></textarea>
	       </p>

			<p>
				<button class="btn btn-primary btn-lg btn-block" type="text" name="btnEditar" value="Editar" type ="submit">Editar</button>
			</p>
		</form>
	</div>
	<?php require("footer.php"); ?>
</body>
</html>