<?php
function Conectar() {
$host = "localhost";
$base = "cementosarg";
$user = "root";
$pass = "";

if (!($cnn = mysqli_connect($host, $user, $pass))) {
echo "Error al conectar al servidor de bases de datos."; // se hace la conexion , se conecta al servidor de base de datos
exit();
}

if (!mysqli_select_db($cnn, $base)) {
echo "Error al seleccionar la base de datos.";
exit(); // una vez que estoy conectado le digo con que base de datos trabajar
}

return $cnn;
}

// Abro la conexión.
$cnn = Conectar();
mysqli_set_charset($cnn, "utf8"); // le paso al conexion y el cotegamiento uft8 nos sirve para que no haga nada con los acentos
?>