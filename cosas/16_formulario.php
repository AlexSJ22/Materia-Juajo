<!DOCTYPE html>
<html lang="es">
  <head>
    <?php
    ini_set('display_errors','On');
    error_reporting(E_ALL& ~E_WARNING);
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <!--
    <link rel="stylesheet" href="style.css">
    -->
  </head>
  <body>
    <?php
    $texto=$_POST["texto"];
    $contraseña=$_POST["password"];
    $email=$_POST["email"];
    $telf=$_POST["tel"];
    $numero=$_POST["number"];
    $rango=$_POST["range"];
    $fecha=$_POST["date"];
    $mes=$_POST["month"];
    $hora=$_POST["time"];
    $fechaHora=$_POST["datetime"];
    $color=$_POST["color"];
    $link=$_POST["url"];
    $busqueda=$_POST["search"];
    $link=$_POST["url"];
    $link=$_POST["url"];
    $link=$_POST["url"];
    print "<p>".$texto."</p>";
    ?>
  </body>
</html>