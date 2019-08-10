<?php
function Conectar() {
// Se definen variables
$host = "localhost";
$base = "cementosarg";
$user = "root";
$pass = "";

if (!($cnn = mysqli_connect($host, $user, $pass))) {
echo "Error al conectar al servidor de bases de datos.";
exit();
}

if (!mysqli_select_db($cnn, $base)) {
echo "Error al seleccionar la base de datos.";
exit();
}

return $cnn;
}

// Abro la conexión
$cnn = Conectar();
mysqli_set_charset($cnn, "utf8");
?>