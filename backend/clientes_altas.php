<?php
session_start();

if ($_SESSION["id_user"] != session_id()) {
header("Location: login.php");
}


require ("../cnn.php");
$error_mensaje = "";
if (isset($_POST["btnGrabar"]) == "Grabar") {
  $usuario= $_POST["usuario"];
  $pass =$_POST["pass"];
  $nombre= $_POST["nombre"];
  $email=$_POST["email"];
  $sql = "INSERT INTO clientes(usuario,pass,nombre,email)
          VALUES ('$usuario','$pass','$nombre', '$email')" ;

  // En la siguiente línea borro el registro. El símbolo ! es lo mismo que NOT.
  if (!@mysqli_query ($cnn, $sql)) {
    // Si entra por acá es porque hubo un error. Lo capturo y guardo en la variable $error_mensaje
    $error_mensaje = "<p>Error MySQL: ".mysqli_error($cnn)."</p><p>Comando SQL: ".$sql."</p>";
  }

  else {
    header("Location: clientes_listado.php"); // Si todo OK, vuelvo al listado.
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <title>Cementos Argentina | Backend</title><!--Poner título-->
       <link rel="stylesheet" href="../css/bootstrap.min.css"><!--Fuente-->
  </head>
  <body>
    <?php require("header.php"); ?>
    <hr>
    <div class="container"><!--Acoplar todo-->
      <?php
        echo $error_mensaje;
      ?>
      <form method="post" action="clientes_altas.php">

        <p>
          <label for="usuario">Usuario:</label><!--Ingresar un label tipo-->
          <input type="text" name="usuario" placeholder="Nombre de usuario" required><!--No tiene tag de cierre-->
        </p>

        <p>
          <label for="pass">Contraseña:</label><!--Ingresar un label letra-->
          <input type="text" name="pass" placeholder="Contraseña" required><!--No tiene tag de cierre-->
        </p>

        <p>
          <label for="nombre">Nombre de Cliente:</label><!--Ingresar un label usuario-->
          <input type="text" name="nombre" placeholder="Nombre completo" required><!--No tiene tag de cierre-->
        </p>

         <p>
          <label for="email">Correo:</label><!--Ingresar un label numero-->
          <input type="text" name="email" placeholder="Correo" required><!--No tiene tag de cierre-->
        </p>
        
        <p>
          <button class="btn btn-primary btn-lg btn-block" name="btnGrabar" value="Grabar" type="submit">Grabar</button><!--Ingresar un botón-->
        </p>
      </form> 
    </div>
    <?php require("footer.php"); ?>
  </body>
</html>