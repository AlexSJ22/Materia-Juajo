<!DOCTYPE html>
<html lang="es">
    <?php
    ini_set('display_errors','On');
    error_reporting(E_ALL);
    ?>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibir datos</title>
  </head>
  <body>
    <?php
    $usuario=$_POST['usuario'];
    $usuarioSeguro=htmlspecialchars(strip_tags($usuario));   

    $contraseña=$_POST['contraseña'];
    $contraSeg=md5(htmlspecialchars(strip_tags($contraseña)));

    $contraAlmacenada="aff4db861160c7fd277b7fd0ca604e53";
    if (($usuarioSeguro == $_POST['usuario']) && ($contraSeg==$contraAlmacenada) ) {
        print "<p>Bienvenido ".$usuarioSeguro."</p>\n";
        print "<p>Acceso correcto</p>";
    }else {
        print "<p>Acceso incorrecto</p>";
    }
    ?>
  </body>
</html>