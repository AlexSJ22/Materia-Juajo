<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL && ~E_DEPRECATED);
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Array Map</title>
    <link rel="stylesheet" type="text/css" href="14_calendario.css">
</head>

<body>
    <?php
    require_once "./alumnos.php";
    require_once "./capitales.php";
    //print ("<pre>" . print_r($alumnos, true) . "</pre>");
    $resultado = array_map("mb_strtoupper", $alumnos);
    print ("<pre>" . print_r($resultado, true) . "</pre>");
    /**
     * Podemos hacer nosotros una funcion
     */
    function cubo($n)
    {
        return $n * $n * $n;
    }

    //print ("<pre>" . print_r(array_map('cubo', range(1, 20)), true) . "</pre>");
    print ("<pre>" . print_r(
        array_map(
            'cubo',
            range(1, 20)
        )
        ,
        true
    ) . "</pre>");

    $dato = range(1, 20);
    $dato = array_map("cubo", $dato);
    print ("<pre>" . print_r($dato, true) . "</pre>");

    /**
     * Podemos definir la funcion de forma anonima
     */
    $dato = array_map(function ($n) {
        return $n * $n;
    }, range(1, 2));
    /**
     * En el caso de array asociativos
     */
    print ("<pre>" . print_r(array_map("mb_strtoupper", $capital), true) . "</pre>");
    /**
     * Uso de array_map con varios arrays
     */
    function suma($a, $b)
    {
        return $a + $b;
    }
    $suma = array_map('suma', range(1, 20), range(1, 200, 10));
    print ("<pre>" . print_r($suma, true) . "</pre>");
    /**
     * Tbla de capitales sin bucles
     */
    function fila($p, $c)
    {
        return "<tr><td>$p</td><td>$c</td></tr>";
    }
    $filas = array_map("fila", array_keys($capital), $capital);
    print ("<pre>" . print_r(array_map("htmlentities", $filas), true) . "</pre>");
    print ("<table>\n\t" . implode("\n\t", $filas) . "\n</table>\n");
    ?>
</body>

</html>