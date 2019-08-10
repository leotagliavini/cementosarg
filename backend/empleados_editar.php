<?php
session_start();

if ($_SESSION["id_user"] != session_id()) {
	header("Location: login.php");
}

require ("../cnn.php");
if (isset($_POST["btnEditar"]) == "Editar") {
	$error_mensaje = "";
	$id = $_POST ["id"];
	$nombre = $_POST ["nombre"];
	$usuario = $_POST ["usuario"];
	$pass = $_POST ["pass"];
	$rol = $_POST ["rol"];
	$email = $_POST ["email"];

	$sql = "UPDATE empleados 
			SET nombre = '$nombre', usuario = '$usuario', pass = '$pass', 
			rol = '$rol', email = '$email' 
			WHERE id = $id";

	$rs = mysqli_query($cnn, $sql); 
	header("location: empleados_listado.php");
}
else {
	$id = (int)$_GET ["Id"];
	$sql = "SELECT * FROM empleados where id = $id";
	$rs = mysqli_query ($cnn, $sql);
	$dato = mysqli_fetch_array ($rs);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Cementos Argentina | Backend</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css">
	</head>
	<body>
		<?php require("header.php"); ?>
		<?php if($error_mensaje == ""){
			echo $error_mensaje;
		}
		?>
		<hr>
		<div class="container">
			<form form method = "post" action = "empleados_editar.php">

				<p>
					<label for="id">Id.:</label>
					<input type="number" name="id" value ="<?php echo $dato["id"] ?>" readonly> 
				</p>

				<p>
					<label for="nombre">Nombre de Usuario:</label><!--Ingresar un label usuario-->
		      		<input type="text" name="nombre" value ="<?php echo $dato["nombre"] ?>"><!--No tiene tag de cierre--> 
				</p>

				<p>
					<label for="usuario">Usuario:</label><!--Ingresar un label tipo-->
		      		<input type="text" name="usuario" value="<?php echo $dato ["usuario"] ?>"><!--No tiene tag de cierre-->
				</p>

				<p>
					<label for="pass">Contraseña:</label><!--Ingresar un label letra-->
		      		<input type="text" name="pass" value = "<?php echo $dato["pass"] ?>"><!--No tiene tag de cierre-->
				</p>

				<p>
					<label for="rol">Rol:</label><br><!--Ingresar un label letra-->
				    <input type="radio" name="rol" value="A" <?php if ($dato["rol"] == "A") { echo "checked"; } ?>> A<br><!--Radio button-->
				    <input type="radio" name="rol" value="B" <?php if ($dato["rol"] == "B") { echo "checked"; } ?>> B<br><!--Radio button-->
				    <input type="radio" name="rol" value="C" <?php if ($dato["rol"] == "C") { echo "checked"; } ?>> C<br><!--Radio button-->
				</p>

				<p>
					<label for="email">Correo:</label><!--Ingresar un label email-->
		      		<input type="text" name="email" value = "<?php echo $dato["email"] ?>"><!--No tiene tag de cierre-->
				</p>

				<p>
					<button class="btn btn-primary btn-lg btn-block" type="text" name="btnEditar" value="Editar" type ="submit">Editar</button>
				</p>
			</form>
		</div>
		<? require ("footer.php"); ?>
	</body>
</html>