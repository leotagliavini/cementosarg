<?php
header("Content-Type: text/html;charset=utf-8");

$login_ok = 0;
$msg_login = "";

if (isset($_POST["cmdLogin"]) == "Conectar") {
	$usuario = $_POST["usuario"];
	$pass = $_POST["pass"];

	require ("cnn.php");

	$sql = "SELECT * FROM clientes WHERE usuario = '$usuario' AND pass = '$pass'";
	$rs = mysqli_query($cnn, $sql);
	$cantidad = mysqli_num_rows($rs);

	if ($cantidad == 0) {
		$msg_login = "<p><font color='FF0000'>Usuario o clave incorrecto.</font></p>";
	}
	else {
		session_start();
		$fila=mysqli_fetch_row($rs);
		$_SESSION["id_user"] = session_id(); // Variable de sesión p/controlar si el usuario está logueado.
		$_SESSION["id_cliente"]=$fila[0];
		$_SESSION["cliente"]=$fila[1];
		$login_ok = 1;
		$msg_login = "<p>Login OK!</p>";
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
	<link rel="stylesheet" href="css/estilo.css">
     <title>Cementos Argentina</title><!--Poner título-->
</head>
<body>
	<div align="center"><img src="img/cabe.jpg"><!--No tiene tag de cierre-->
<nav><a href="index.php">Inicio</a> | <a href="comprobantes.php">Comprobantes</a> | <a href="consultas.php">Consultas</a> | <a href="logout.php">Cerrar Sesión</a></nav>
<h1>Cementos Argentina</h1></div><!--Es el encabezado más grande-->
<p style="color:red; font-family:calibri, arial, helvetica;"><!--Cambia las propiedades de las letras-->
	Cementos Argentina es lskdfsdfsdgdsh sdhshgfhgh sjsndjfskjfnksj ksjdfhjksdhgjkhwjk sdkjfhkjwerhkjergh kjshgfjkehgkehg gekjghkjehgejk gekjghekjrhgjrhge erkgjhekrjhgjkehrgjkheg ekjghekjrhgjkehrgkje gerhkjr
</p>	
<p>
	<?php echo $msg_login; ?>
	<form method="post" action="index.php">
	
	<p>
		<label for="usuario">Usuario:</label><!--Ingresar un label usuario-->
		<input type="text" name="usuario" placeholder="Ingrese su usuario" required><!--No tiene tag de cierre-->
    </p>
    <p>
		<label for="pass">Contraseña:</label><!--Ingresar un label contraseña-->
		<input type="password" name="pass" placeholder="Ingrese su contraseña" required><!--No tiene tag de cierre-->
    </p>
    <p>
		<button name="cmdLogin" value="Conectar" type="submit">Ingresar</button><!--Ingresar un botón-->
    </p>
    </form>
</p>
</body>
</html>