<?php
	echo "<div class='container'>";
	echo "<header>";
	echo "<h1 align='center'>Cementos Argentina | Backend</h1>";
	echo "<nav>
			<div align='center'>
				<a href='login.php'>Inicio</a> | <a href='comprobantes.php'>Comprobantes</a> | <a href='clientes_listado.php'>Clientes</a> | <a href='empleados_listado.php'>Empleados</a> | <a href='https://www.facebook.com' target='_blank'><img src='../img/facebook.jpg' width='16' height='16'></a> | <a href='logout.php'>Cerrar Sesión</a>
			</div>";
			if (isset($_SESSION['empleado'])) {
				echo "<div align='right'><img src='../img/iconuser.png' width='30'>".$_SESSION['empleado']."
					  </div>";
			}
	echo "</nav>";
	echo "</header>";
	echo "</div>";
