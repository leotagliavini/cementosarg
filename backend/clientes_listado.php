<?php
session_start();

if ($_SESSION["id_user"] != session_id()) {
	header("Location: login.php");
}

require ("../cnn.php");

//SELECT CONCAT(Address, " ", PostalCode, " ", City) AS Address
$sql = "SELECT * FROM clientes";

$rs = mysqli_query($cnn, $sql);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Cementos Agentina | Backend</title>
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
			<h2 align="center">Clientes</h2>
			<p>
				<a class="btn btn-secondary" href="clientes_altas.php">Nuevo Cliente</a>
			</p>

			<p>
				<div class="table-responsive">
					<table class="table table-hover">
					  <tr>
					    <th>Id.</th>
					    <th>Usuario</th>
					    <th>Contraseña</th>
					    <th>Nombre</th>
					    <th>Correo</th>
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
								echo "<td align='left'>".$dato["usuario"]."</td>";
								echo "<td align='center'>".$dato["pass"]."</td>";
								echo "<td align='left'>".$dato["nombre"]."</td>";
								echo "<td align='center'>".$dato["email"]."</td>";
								echo "<td align='center'><a href='clientes_editar.php?Id=".$dato["id"]."'><img src='../img/editar.png'></td>";
								echo "<td align='center'><a href='clientes_borrar.php?Id=".$dato["id"]."' onClick='return confirma_borrar()'><img src='../img/eliminar.png'></td>";
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