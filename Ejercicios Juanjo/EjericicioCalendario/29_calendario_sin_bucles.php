<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<!--
En el ejercicio del calendario cambia tantos bucles como puedas por implodes.
Puedes usar las funciones de array que consideres oportunas 
para prepararte el array de datos a partir de las 

funciones de fecha

1.-Si el mes tiene 30 días, te preparas el array range(1,30)
2.-Si empieza en miércoles le pones delante otros dos elementos que contengan " ". En pruebas, mejor "H"
3.-Si acaba en martes, le pones detrás 5 elementos
4.-Manipulas el array para que sea un array doble con filas de 7 elementos
Le pones como primer elemento el array "lun" "mar" "mie".
5.-Cambias cada fila de 7 elementos por una fila de tabla html (implode)
6.-Pegas las filas con otro implode para obtener la tabla
-->

<head>
    <?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL && ~E_DEPRECATED);
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Calendario sin bucles</title>
    <link rel="stylesheet" type="text/css" href="14_calendario.css">
</head>

<body>
    <?php
    /**
     * Octubre 2025, 31 dias, empieza en miercoles y acaba en viernes
     * 1.-Si el mes tiene 30 días, te preparas el array range(1,30)
     */
    $dato = range(1, 31);
    print ("<pre>" . print_r($dato, true) . "</pre>");
    /**
     * 2.-Si empieza en miércoles le pones delante otros dos elementos que contengan " ". En pruebas, mejor "H"
     */
    $dato = array_merge(array_fill(15, 2, 'D'), $dato);
    print ("<pre>" . print_r(array_fill(15, 2, 'D'), true) . "</pre>");
    print ("<pre>" . print_r($dato, true) . "</pre>");
    /**
     * 3.-Si acaba en martes, le pones detrás 5 elementos
     * En este caso, se le pone detras 2
     */
    $fin = count($dato) % 7;
    $dato = array_merge($dato, array_fill(0, 2, 'D'));
    print ("<pre>" . print_r($dato, true) . "</pre>");
    /**
     * 4.-Manipulas el array para que sea un array doble con filas de 7 elementos
     *Le pones como primer elemento el array "lun" "mar" "mie".
     */
    $dato = array_chunk($dato, 7);
    print ("<pre>" . print_r($dato, true) . "</pre>");
    array_unshift($dato, array('Lun', 'Mar', 'Mier', 'Jue', 'Vie', 'Sa', 'Do'));
    print ("<pre>" . print_r($dato, true) . "</pre>");
    /**
     * 5.-Cambias cada fila de 7 elementos por una fila de tabla html (implode)
     */
    foreach ($dato as &$semana) {
        $semana = '<td>' . implode('</td><td>', $semana) . '</td>';
    }
    print ("<pre>" . print_r($dato, true) . "</pre>\n");
    /**
     * 6.-Pegas las filas con otro implode para obtener la tabla
     */
    $dato = '<table><tr>' . implode('</tr><tr>', $dato) . '</tr></table>';
    print ($dato);
    ?>
</body>

</html>