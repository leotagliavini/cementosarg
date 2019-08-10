<?php
session_start();

if ($_SESSION["id_user"] != session_id()) {
	header("Location: login.php");
}

require ("../cnn.php");

//SELECT CONCAT(Address, " ", PostalCode, " ", City) AS Address
$sql = "SELECT com.id, com.id_cliente, cli.nombre AS cliente, 
		CONCAT(com.tipo, '-', com.letra, '-', com.prefijo, '-', com.numero) AS comprobante, 
		com.fecha, com.importe 
		FROM comprobantes com 
		INNER JOIN clientes cli ON com.id_cliente = cli.id 
		ORDER BY fecha DESC";

$rs = mysqli_query($cnn, $sql);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Cementos Argentina | Backend</title><!--Poner título-->
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<script language="JavaScript"> 
			function confirma_borrar() {
				return confirm("¿Confirma borrar el registro?");
			}
		</script>
	</head>
	<body>
		<?php require("header.php"); ?>
		<hr>
		<div class="container">
			<h2 align="center">Comprobantes</h2>
			<p>
				<a class="btn btn-secondary" href="comprobantes_altas.php">Nuevo Comprobante</a>
			</p>

			<p>
				<div class="table-responsive">
					<table class="table table-hover">
					  <tr>
					    <th>Id.</th>
					    <th>Id. Cliente</th>
					    <th>Cliente</th>
					    <th>Comprobante</th>
					    <th>Fecha</th>
					    <th>Importe</th>
					    <th>Editar</th>
					    <th>Borrar</th>
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
									echo "<td align='left'>".$dato["cliente"]."</td>";
									echo "<td align='center'>".$dato["comprobante"]."</td>";
									echo "<td align='center'>".$dato["fecha"]."</td>";
									echo "<td align='right'>".$dato["importe"]."</td>";
									echo "<td align='center'><a href='comprobantes_editar.php?Id=".$dato["id"]."'><img src='../img/editar.png'></a></td>";
									echo "<td align='center'><a href='comprobantes_borrar.php?Id=".$dato["id"]."' onClick='return confirma_borrar()'><img src='../img/eliminar.png'></a></td>";
									echo "</tr>";
								}
							}
							mysqli_free_result($rs);
							mysqli_close($cnn);
					  ?>
					</table>
				</div>
			</p>
		</div>	
		<?php require("footer.php"); ?>
	</body>
</html>