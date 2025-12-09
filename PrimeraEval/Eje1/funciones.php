<?php
require_once "../empresa.php";
function tabla_de_empresas($dato)
{
    print ("<table>\n");
    //Tomo los nombres de campo de la primera empresa
    //$primera = array_first($dato);
    $primera = array_values($dato)[0];
    //print ("<pre>" . print_r($primera, true) . "</pre>");
    $campos = array_keys($primera);
    //print ("<pre>" . print_r($campos, true) . "</pre>");
    //Cabecera de tabla
    print ("<tr><th>" . implode("</th><th>", $campos) . "</th></tr>\n");
    foreach ($dato as $d) {
        $d["nombre"] = "<a href=\"$d[web]\"> $d[nombre]</a>\n";
        print ("<tr><td>" . implode("</td><td>", $d) . "</td></tr>\n");
    }
    print ("</table>\n");
}

function ordenEmpresas($a, $b)
{
    //Esto esta bien pero no es correcto
    //Asi no se llama a la funcion dos veces

    /*if (strcoll($a["categoria"], $b["categoria"])) {
        //El if es cierco cuando es distinto de cero 
        //Es decir cuando las categorias son distintas
        //Ordenamos por categoria
        return strcoll($a["categoria"], $b["categoria"];
    }*/

    if ($ordenar = strcoll($a["categoria"], $b["categoria"])) {
        //El if es cierco cuando es distinto de cero 
        //Es decir cuando las categorias son distintas
        //Ordenamos por categoria
        return $ordenar;
    }

    if ($a["empleados"] != $b["empleados"]) {
        return $b["empleados"] <=> $a["empleados"];
    }

    if ($ordenar = strcoll($a["zona"], $b["zona"])) {
        return $ordenar;
    }

    return strcoll($a["nombre"], $b["nombre"]);
}
?>