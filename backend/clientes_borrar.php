<?php
session_start(); // Le indico a PHP que voy a trabajar con sesiones.

// Controlo que el usuario se haya autenticado.
if ($_SESSION["id_user"] != session_id()) {
	header("Location: login.php");
}

require ("../cnn.php"); // En esta página hago la conexión.

$id = (int)$_GET["Id"]; // Recupero el id del registro a borrar.
$error_mensaje = ""; // Esta variable la uso para almacenar el mesaje de error si lo hay.

// Borro el registro.
$sql = "DELETE FROM clientes WHERE id = $id";
// En la siguiente línea borro el registro. El símbolo ! es lo mismo que NOT.
if (!@mysqli_query ($cnn, $sql)) {
	// Si entra por acá es porque hubo un error. Lo capturo y guardo en la variable $error_mensaje
	$error_mensaje = "<p>Error MySQL: ".mysqli_error()."</p><p>Comando SQL: ".$sql."</p>";
}

mysqli_close($cnn); // Cierro la conexión.

// Si la variable $error_mensaje es distina de "" (!=), significa que hubo algún error y lo muestro.
if ($error_mensaje != "") {
	echo "<h3><font color='ff0000'>ZONAMOS DIJO RAMOS!!!</font></h3>";
	echo $error_mensaje;
	// Construyo un link para volver al listado de registros.
	echo "<p>Volver a: <a href='clientes_listado.php'>Listado</a></p>";
}
else {
	header("Location: clientes_listado.php"); // Si todo OK, vuelvo al listado.
}
?>