<?php
session_start(); // Le indico a PHP que voy a trabajar con sesiones.

// Controlo que el usuario se haya autenticado.
if ($_SESSION["id_user"] != session_id()) {
	header("Location: login.php");
}

require ("../cnn.php"); // En esta p�gina hago la conexi�n.

$id = (int)$_GET["Id"]; // Recupero el id del registro a borrar.
$error_mensaje = ""; // Esta variable la uso para almacenar el mesaje de error si lo hay.

// Borro el registro.
$sql = "DELETE FROM comprobantes WHERE id = $id";
// En la siguiente l�nea borro el registro. El s�mbolo ! es lo mismo que NOT.
if (!@mysqli_query ($cnn, $sql)) {
	// Si entra por ac� es porque hubo un error. Lo capturo y guardo en la variable $error_mensaje
	$error_mensaje = "<p>Error MySQL: ".mysqli_error()."</p><p>Comando SQL: ".$sql."</p>";
}

mysqli_close($cnn); // Cierro la conexi�n.

// Si la variable $error_mensaje es distina de "" (!=), significa que hubo alg�n error y lo muestro.
if ($error_mensaje != "") {
	echo "<h3><font color='ff0000'>ZONAMOS DIJO RAMOS!!!</font></h3>";
	echo $error_mensaje;
	// Construyo un link para volver al listado de registros.
	echo "<p>Volver a: <a href='comprobantes.php'>Listado</a></p>";
}
else {
	header("Location: comprobantes.php"); // Si todo OK, vuelvo al listado.
}
?>