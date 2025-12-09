<!DOCTYPE html>
<html lang="es">
    <?php
    ini_set('display_errors','On');
    error_reporting(E_ALL && ~E_DEPRECATED);
    ?>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locale</title>
  </head>
  <body>
    <?php
    print setlocale(LC_ALL,0);
/*     for ($numero=0; $numero < 7 ; $numero++) {
        print "<p>El dia de la semana es ".strftime('%A')." </p>";
    } */
   print "<p>setLocale(LC_ALL,\"Spanish_Spain.utf8\")</p>".setLocale(LC_ALL,"Spanish_Spain.utf8");
    ?>
  </body>
</html>