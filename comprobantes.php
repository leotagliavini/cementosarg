<!--FRONT END-->
<?php
session_start();

if ($_SESSION["id_user"] != session_id()) {
	header("Location: index.php");
}

require ("cnn.php");

//$sql = "SELECT * FROM comprobantes ORDER BY fecha DESC";
$sql = "SELECT c.id, c.id_cliente, nombre, s.email, concat(tipo, '-',letra, '-',prefijo, numero) as comprobante
        FROM comprobantes c
        INNER JOIN clientes s on c.id_cliente=s.id";
$rs = mysqli_query($cnn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cementos Agentina | Comprobantes</title>
</head>
<body>
	<header>
	<div align="center"><img src="img/cabe.jpg"></div>
	</header>
	<nav><!-- Links -->
		<div align="center">					
		<a href="index.php">Inicio</a> | <a href="comprobantes.php">Comprobantes</a> | <a href="consultas.php">Consultas</a> | <a href="logout.php">Cerrar Sesión</a> | <a href="form-rrhh.php">Recursos Humanos</a>
		</div>	
		<div align="right">
			<img src="img/iconuser.png" width="30">
				<?php echo $_SESSION["cliente"];?>
				</div>	
	</nav>
	<!-- h1 es el encabezado más grande -->
	<h1 align="center">Cementos Argentina | Comprobantes</h1>
	<p>
		<table width="100%" border="1">
		  <tr>
		    <th>Id.</th>
		    <th>Id. Cliente</th>
		    <th>Nombre</th>
		    <!--<th>Letra</th>-->
		    <!--<th>Prefijo</th>-->
		    <!--<th>Núm.</th>-->
		    <!--<th>Fecha</th>-->
		    <!--<th>Importe</th>-->
		  </tr>

		<?php
		$cantidad = mysqli_num_rows($rs);
		if ($cantidad == 0) {
			echo "<tr><td colspan='8' align='center'>No hay registros...</td></tr>";
		}
		else {
			while ($dato = mysqli_fetch_array($rs)) {
				echo "<tr>";
				echo "<td align='left'>".$dato["id"]."</td>";
				echo "<td align='left'>".$dato["id_cliente"]."</td>";
				echo "<td align='center'>".$dato["nombre"]."</td>";
				//echo "<td align='center'>".$dato["comprobantes"]."</td>";
				//echo "<td align='center'>".$dato["prefijo"]."</td>";
				//echo "<td align='center'>".$dato["numero"]."</td>";
				//echo "<td align='center'>".$dato["fecha"]."</td>";
				//echo "<td align='right'>".$dato["importe"]."</td>";
				echo "</tr>";
			}
		}
		mysqli_free_result($rs);
		mysqli_close($cnn);
		?>
		</table>	
	</p>
	<footer>Todos los Derechos Reservados</footer>
</body>
</html>