<!DOCTYPE html>
<html lang="es">
    <?php
    ini_set('display_errors','On');
    error_reporting(E_ALL);
    ?>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibir dato sin protegerse</title>
  </head>
  <body>
    <?php
/*
Los campos del formulario nos llegan el lo que técnicamente es un array asociativo.

A efectos prácticos:

Si usamos el método GET, tenemos los datos en el array $_GET

En una cadena podemos poner $_GET[nombre]
Fuera de cadenas, debemos poner $_GET['nombre']
*/


// print "<p>Bienvenido ".$_GET['nombre']."</p>\n";
// print "<p>Bienvenido $_GET[nombre]</p>\n";
$nombre=$_GET['nombre'];
print "<p>Bienvenido $nombre</p>\n";
/*
Fatal error: Uncaught Error: Undefined constant "nombre" in /home/juanjo/
print "<p>Bienvenido ".$_GET[nombre]."</p>\n";
*/
    ?>
  </body>
</html>