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
    print ("<p>valores " . print_r($_GET, true) . "</p>");
    $paises = array_keys($capital);
    $valores = array_values($capital);
    if ($_GET['pais'] != $_GET['capital']) {
        print ("<p>Has fallado</p>");
        print ("<p>Lo siento, la capital de " . $paises[$_GET['pais']] . " No es " . $valores[$_GET['capital']] . "</p>");
    } else {
        print ("<p>Has acertado</p>");
        print ("<p>La capital de " . $paises[$_GET['pais']] . " es " . $valores[$_GET['capital']] . "</p>");

    }
    ?>
</body>

</html>