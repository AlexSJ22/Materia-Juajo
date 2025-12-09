<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL && ~E_DEPRECATED);
    require_once './provincias.php';
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Provincias l</title>
    <link rel="stylesheet" type="text/css" href="">
</head>

<body>
    <?php
    setlocale(LC_ALL, "es_ES.utf8", "Spanish_Spain.utf8");
    asort($provincia, SORT_LOCALE_STRING);
    print ("<h1>Guess the provincia</h1>\n");
    print ("<form id=\"formulario\"action=\"./23_recoger_provincia.php\" method=\"get\">\n");
    print ("<select name=\"capital\" id=\"capital\">\n");
    print ("<option value=\"0\" selected>Seleccionar provincia</option>\n");
    foreach ($provincia as $codigo => $nombre) {
        print ("\t <option value=\"$codigo\"> $nombre</option>");
    }
    print ("</select>\n");
    print ("<input type=\"submit\" value=\"Enviar provincia\">\n");
    print ("</form>\n");
    ?>
</body>

</html>