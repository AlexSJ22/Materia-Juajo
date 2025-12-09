<!DOCTYPE html>
<!--
Utiliza los arrays de datos $cuentas y $alumnos del documento alumnos.php para generar:

    1.- Una tabla a dos columnas en las que aparezcan la cuenta del servidor y el usuario correspondiente.
    
    2.- Un listado de alumnos en el que además cada nombre sea un enlace a la cuenta del alumno en el servidor


Incluye los datos desde el fichero datos/alumnos.php
-->
<html lang="es">
  <head>
    <?php
    ini_set('display_errors','On');
    error_reporting(E_ALL);
    require_once 'datos/alumnos.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Has olvidado el título</title>
    <!--
    <link rel="stylesheet" href="style.css">
    -->
  </head>
  <body>
    <?php
    /*
    print "<table>\n";
    print "<tr><th>Cuenta</th><th>Usuario</th></tr>\n";
    for($i=0;$i<count($cuentas);$i++){
        print "<tr><td>$cuentas[$i]</td><td>$alumnos[$i]</td></tr>\n";
    }
    print "</table>\n";
    */
    
    print "<ol>\n";
    for($i=0;$i<count($cuentas);$i++){
        print "<li><a href=\"http://10.0.56.66/~$cuentas[$i]\">$alumnos[$i]</a></li>\n";
    }
    print "</ol>\n";
    
    ?>
  </body>
</html>