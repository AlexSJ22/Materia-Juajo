<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Listado completo</title>
</head>

<body>
    <?php
    require_once "../empresa.php";
    setlocale(LC_ALL, "es_ES.utf8", "Spanish_Spain.utf8");
    $pagina = 20;
    $total = count($empresa);
    $totalPag = $total / $pagina;
    asort($empresa);
    for ($i = 0; $i < count($empresa); $i++) {
        $datos = array_column($empresa, "categoria");
        $zone = array_column($empresa, "zona");
        $name = array_column($empresa, "nombre");
        $lugar = array_column($empresa, "direccion");
        $telf = array_column($empresa, "telefono");
        $url = array_column($empresa, "web");
        $employees = array_column($empresa, "empleados");
    }
    $categorias = array_values($datos);
    $zona = array_values($zone);
    $nombre = array_values($name);
    $direccion = array_values($lugar);
    $telefono = array_values($telf);
    $web = array_values($url);
    $empleados = array_values($employees);

    /*print ("<pre>" . print_r($dato, true) . "</pre>");*/

    print ("<table>\n");
    /*
    INICIO CABECERA
    */
    print "\t<tr>";
    print "<th>Categoria</th>";
    print "<th>Zona</th>";
    print "<th>Nombre</th>";
    print "<th>Direccion</th>";
    print "<th>Telefono</th>";
    print "<th>Web</th>";
    print "<th>Empleados</th>";
    print "</tr>\n";
    /**
     * Body
     */
    for ($i = 0; $i < count($empresa); $i++) {
        print ("<tr>");
        print ("<td> $categorias[$i] </td>\n");
        print ("<td> $zona[$i] </td>\n");
        print ("<td> $nombre[$i] </td>\n");
        print ("<td> $direccion[$i] </td>\n");
        print ("<td> $telefono[$i] </td>\n");
        print ("<td><a href=\"$web[$i]\">$web[$i]</a> </td>\n");
        print ("<td> $empleados[$i]</td>\n");
        print ("</tr>");
    }
    print ("</table>\n");
    ?>
</body>

</html>