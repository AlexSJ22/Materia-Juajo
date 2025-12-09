<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Seleccionar sector</title>
</head>

<body>
    <?php
    require_once "../empresa.php";
    setlocale(LC_ALL, "es_ES.utf8", "Spanish_Spain.utf8");
    /*
    Obtener categoria
    */
    $categoria;
    for ($i = 0; $i < count($empresa); $i++) {
        $categoria = array_column($empresa, "categoria");
    }
    $cat = array_unique($categoria);
    $categorias = array_values($cat);
    /*print ("<pre>" . print_r($categorias, true) . "</pre>");*/

    /**
     * Pagina
     */
    print ("<h1>Seleccionar categoria</h1>\n");
    print (" <form action=\"./seleccionar_sector.php\" method=\"post\">\n");
    print ("<select name=\"categoria\" id=\"categoria\">\n");
    for ($i = 0; $i < count($categorias); $i++) {
        print ("<option value=\"$categorias[$i]\">$categorias[$i]</option>\n");
    }
    print ("</select>\n");
    print ("<input type=\"submit\" value=\"Enviar datos\">\n");
    print ("</form>\n");


    $categoriaSeleccionada = $_POST['categoria'];
    if ($categoriaSeleccionada) {
        crearEmpresa($categoriaSeleccionada);
    } else {
        print ("Envie un dato");
    }


    function crearEmpresa($categoria)
    {
        global $empresa;
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

        foreach ($empresa as $caracteres) {
            print ("<tr>");
            print ("<td>" . $caracteres["categoria"] . "</td>");
            print ("<td>" . $caracteres["zona"] . "</td>");
            print ("<td>" . $caracteres["nombre"] . "</td>");
            print ("<td>" . $caracteres["direccion"] . "</td>");
            print ("<td>" . $caracteres["telefono"] . "</td>");
            print ("<td>" . $caracteres["web"] . "</td>");
            print ("<td>" . $caracteres["empleados"] . "</td>");
            print ("</tr>");

        }
        print ("</table>\n");
    }
    ?>
</body>

</html>