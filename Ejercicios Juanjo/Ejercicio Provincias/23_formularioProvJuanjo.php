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
    <title>Provincias formulario</title>
    <link rel="stylesheet" type="text/css" href="">
</head>

<body>
    <?php
    setlocale(LC_ALL, "spanish_Spain.utf8", "es_Es.utf8");
    asort($provincia, SORT_LOCALE_STRING);
    //print ("<pre>" . print_r($provincia, true) . "</pre>");
    print <<<FORM1
    <form action="23_recibir_provinciaJuanjo.php" method="GET">
    <select name="prov">
    <option value="0" selected>-- Seleccionar provincia--</option>
    FORM1;
    foreach ($provincia as $codigo => $nombre) {
        print ("\t <option value=\"$codigo\"> $nombre</option>");
    }
    print <<<FORM2
    </select>
    <input type="submit">
    </form>
    FORM2;
    ?>
</body>

</html>