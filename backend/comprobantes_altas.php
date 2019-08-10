<?php
session_start();

if ($_SESSION["id_user"] != session_id()) {
  header("Location: login.php");
}


require ("../cnn.php");

$id_cliente ="";
$error_mensaje="";
if (isset($_POST["btnGrabar"]) == "Grabar") {
  $id_cliente = $_POST["id_cliente"];
  $tipo= $_POST["tipo"];
  $letra= $_POST["letra"];
  $prefijo =$_POST["prefijo"];
  $numero=$_POST["numero"];
  $fecha=$_POST["fecha"];
  $importe=$_POST["importe"];
  $notas =$_POST["notas"];
  
  $sql = "INSERT INTO comprobantes(id_cliente,tipo,letra,prefijo,numero,fecha,importe,notas)
          VALUES ($id_cliente,'$tipo','$letra','$prefijo',$numero,'$fecha', $importe,'$notas')" ;

  // En la siguiente línea borro el registro. El símbolo ! es lo mismo que NOT.
  if (!@mysqli_query ($cnn, $sql)) {
    // Si entra por acá es porque hubo un error. Lo capturo y guardo en la variable $error_mensaje
    $error_mensaje = "<p>Error MySQL: ".mysqli_error($cnn)."</p><p>Comando SQL: ".$sql."</p>";
  }

  else {
    header("Location: comprobantes.php"); // Si todo OK, vuelvo al listado.
  }
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
    <?php require("header.php"); ?>
    <hr>
    <div class="container">
      <?php
        echo $error_mensaje;
      ?>
      <form method="post" action="comprobantes_altas.php">
     
        <p>  
          <label for='id_cliente'>Id. Cliente:</label>
          <select name="id_cliente" id="id_cliente">
            <?php
            // Este proceso carga el combo de clientes
            $sql = "SELECT id, nombre FROM clientes ORDER BY nombre";
            $rsClientes = mysqli_query($cnn, $sql);
            $cantidad = mysqli_num_rows($rsClientes);
            if ($cantidad > 0) {
              while ($datoClientes = mysqli_fetch_array ($rsClientes)) {
                echo "<option value='".$datoClientes["id"]."'>".$datoClientes["nombre"]."</option>";
              }
            }
            mysqli_free_result($rsClientes);
            mysqli_close($cnn);
            ?>
          </select>
        </p>

        <p>
          <label for="tipo">Tipo:</label><br><!--Ingresar un label letra-->
          <input type="radio" name="tipo" value="FA"> FA<br><!--Radio button-->
          <input type="radio" name="tipo" value="NC"> NC<br><!--Radio button-->
          <input type="radio" name="tipo" value="ND"> ND<br><!--Radio button-->
        </p>

        <p>
          <label for="letra">Letra:</label><!--Ingresar un label letra-->
          <input type="text" name="letra" placeholder="Letra de Comprobante" required><!--No tiene tag de cierre-->
        </p>

        <p>
          <label for="prefijo">Prefijo:</label><!--Ingresar un label prefijo-->
          <input type="text" name="prefijo" placeholder="Prefijo de Comprobante" required><!--No tiene tag de cierre-->
        </p>

        <p>
          <label for="numero">Número:</label><!--Ingresar un label numero-->
          <input type="text" name="numero" placeholder="Número de Comprobante" required><!--No tiene tag de cierre-->
        </p>

        <p>
          <label for="fecha">Fecha:</label><!--Ingresar un label fecha-->
          <input type="date" name="fecha" placeholder="Fecha de Comprobante" required><!--No tiene tag de cierre-->
        </p>

        <p>
          <label for="importe">Importe:</label><!--Ingresar un label importe-->
          <input type="number" name="importe" placeholder="Importe de Comprobante" required><!--No tiene tag de cierre-->
        </p>

        <p>
          <label for="notas">Notas:</label><!--Ingresar un label notas-->
        </p>

        <p>
          <textarea name="notas" rows="10" cols="100" placeholder="Notas de Comprobante"></textarea>
        </p>

        <p>
          <button class="btn btn-primary btn-lg btn-block" name="btnGrabar" value="Grabar" type="submit">Grabar</button><!--Ingresar un botón-->
        </p>
      </form>
    </div>
    <?php require("footer.php"); ?>
  </body>
</html>