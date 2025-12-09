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
	$n=15;
	print "<p>decbin($n): ".decbin($n)."</p>\n";
	$n2=9;
	print "<p>decbin($n2): ".decbin($n2	)."</p>\n";
	print "<p> Este es $n:".str_pad(decbin($n),32, "0", STR_PAD_LEFT)." </p>\n";
	print "<p> Numero decimal $n2:". str_pad(decbin($n2),32, "0", STR_PAD_LEFT)."</p>\n";
    ?>
  </body>
</html>