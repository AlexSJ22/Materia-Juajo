<!DOCTYPE html>
<html lang="es">
  <head>
    <?php
    ini_set('display_errors','On');
    error_reporting(E_ALL& ~E_WARNING);
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nivel de ERROR en PHP</title>
    <!--
    <link rel="stylesheet" href="style.css">
    -->
  </head>
  <body>
    <?php
    print "<p>Nivel de error actual:".error_reporting()."</p>\n";
    print "<p>\$midato vale $midato</p>\n";
    /*
    Cambiamos el nivel de error
    */
    $error_anterior=error_reporting(E_ALL);
    print "<p>El nuevo nivel de error es ".error_reporting()."</p>\n";
    print "<p>\$midato vale $midato</p>\n";
    print "<p>El retorno de error_reporting ha sido $error_anterior</p>\n";
    
    ?>
  </body>
</html>