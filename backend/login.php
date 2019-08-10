<?php
header("Content-Type: text/html;charset=utf-8");

$login_ok = 0;
$msg_login = "";

if (isset($_POST["cmdLogin"]) == "Conectar") {
	$usuario = $_POST["usuario"];
	$pass = $_POST["pass"];

	require ("../cnn.php");

	$sql = "SELECT * FROM empleados WHERE usuario = '$usuario' AND pass = '$pass'";
	$rs = mysqli_query($cnn, $sql);
	$cantidad = mysqli_num_rows($rs);

	if ($cantidad == 0) {
		$msg_login = "<div class='alert alert-danger' role='alert'>
		  				Usuario o contraseña incorrecto
					  </div>";
	}
	else {
		session_start();
		$fila=mysqli_fetch_row($rs);
		$_SESSION["id_user"] = session_id(); // Variable de sesión p/controlar si el usuario está logueado.
		$_SESSION["id_cliente"]=$fila[0];
		$_SESSION["empleado"]=$fila[1];
		$login_ok = 1;
		$msg_login = "<div class='alert alert-success' role='alert'>
		  				Login OK!
					  </div>";
		$dato = mysqli_fetch_array($rs);

		mysqli_free_result($rs);
		mysqli_close($cnn);
	}
/*
if ($login_ok == 1) {
header("Location: sistema.php");
}
*/
}
?>
<!DOCTYPE html>
<html>
	<head>
		 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	     <title>Cementos Argentina | Backend</title><!--Poner título-->
	     <link rel="stylesheet" href="../css/bootstrap.min.css">
	</head>
	<body>
		<div align="center">
			<?php require("header.php"); ?>
		</div>
		<hr>
		<div class="container">		
			<p>
				<?php echo $msg_login; ?>
				<form method="post" action="login.php">
				
				<p>
					<label for="usuario">Usuario:</label><!--Ingresar un label usuario-->
					<input type="text" name="usuario" placeholder="Ingrese su usuario" required><!--No tiene tag de cierre-->
			    </p>
			    <p>
					<label for="pass">Contraseña:</label><!--Ingresar un label contraseña-->
					<input type="password" name="pass" placeholder="Ingrese su contraseña" required><!--No tiene tag de cierre-->
			    </p>
			    <p>
					<button class="btn btn-primary btn-lg btn-block" name="cmdLogin" value="Conectar" type="submit">Ingresar</button><!--Ingresar un botón-->
			    </p>
			    </form>
			</p>		
			<script src="../js/bootstrap.min.js"></script>

				<!--Agregar anuncio-->
				<!--<div class="card" style="width: 18rem;">
					  <img src="../img/cabe.jpg" class="card-img-top" alt="...">
					  <div class="card-body">
					    <h5 class="titulo">Imagen</h5>
					    <p class="card-text">A esta imagen la saqué del index.</p>
					    <a href="#" class="btn btn-primary">Ingresar</a>
					  </div>
					</div>-->
				
		</div>
	</body>
</html>