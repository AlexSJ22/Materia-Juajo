<!DOCTYPE html>
<html lang="es">
<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL && ~E_DEPRECATED);
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fechas</title>
</head>

<body>
  <?php
  setlocale(LC_ALL, "Spanish_Spain.utf8", "es_ES.utf8");
  $fecha = $_POST['date'];
  print strftime("<p>La fecha seleccionada es: " . $fecha . "</p>");
  print strftime("<p>La fecha dentro de un año es: " . ($fecha + 24 * 60 * 60) . "</p>");
  print strftime("<p>La fecha anterior a esa año fue: " . (time() - 365 * 24 * 60 * 60). "</p>");
  /*print strftime("<p>Hoy es %A %e %B de %G</p>",time()+2*24*60*60);*/
  print "<hr>\n";

  $cadena_fecha="first monday of June 2023";
  print "<p>Expresión \"$cadena_fecha\"</p>\n";
  $fecha=strtotime($cadena_fecha);
  print strftime("<p>%A día %e de %B de %G a las %H:%M:%S</p>",$fecha);
  ?>
</body>

</html>