<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL && ~E_DEPRECATED);
    require_once './capitales.php';
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Juego de paises y capitales</title>
    <link rel="stylesheet" type="text/css" href="14_calendario.css">
</head>

<body>
    <?php
    setlocale(LC_ALL, "es_ES.utf8", "Spanish_Spain.utf8");
    $numero = rand(0, 53);
    $claves = array_keys($capital);
    $valores = array_values($capital);
    asort($valores, SORT_LOCALE_STRING);
    print ("<h1>Guess the country</h1>");
    print ("<p>Pais $numero $claves[$numero]</p>");
    print ("<p>Cual es la capital de $claves[$numero]</p>");
    print ("<p>La capital es $valores[$numero]</p>");
    print ("<form id=\"formulario\"action=\"./24_comprobar_capital.php\" method=\"post\">");
    print ("<input type=\"hidden\" name=\"pais\" value=\"$numero\">");
    print ("<select name=\"capital\" id=\"capital\">");
    print ("<option value=\"0\" selected>Seleccionar capital</option>");
    foreach ($valores as $codigo => $nombre) {
        print ("<option value=\"$codigo\">$nombre</option>");
    }
    print ("<input type=\"submit\" value=\"Comprobar capital\">");
    print ("</select>");
    print ("</form>");
    ?>
</body>

</html>