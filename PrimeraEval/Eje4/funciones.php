<?php
require_once "../empresa.php";
function tabla_de_empresas($dato)
{
    //$dato es un array de empresas
    print "<table>\n";
    //Tomo los nombres de campo de la primera empresas
    // $primera=array_first($dato);//Puede que no haya índice cero
    $primera = array_values($dato)[0];
    // print "<pre>".print_r($primera,true)."</pre>\n";
    $campos = array_keys($primera);
    // print "<pre>".print_r($campos,true)."</pre>\n";
    //Cabecera de tabla.
    print "<tr><th>" . implode('</th><th>', $campos) . "</th></tr>\n";
    foreach ($dato as $d) {
        $d['nombre'] = "<a href=\"$d[web]\">$d[nombre]</a>\n";
        print "<tr><td>" . implode("</td><td>", $d) . "</td></tr>\n";
    }
    print "</table>\n";
}

function orden_empresas($a, $b)
{
    /*
    ESTO ESTÁ BIEN PERO ES CARO. MEJOR EL SIGUIENTE
    ASÍ NO LLAMAMOS A strcoll DOS VECES
    if(strcoll($a['categoria'],$b['categoria'])){
        //El if es cierto cuando es distinto de cero, 
        // es decir cuando las categorías son distintas
        //Ordenamos por categoría
        return strcoll($a['categoria'],$b['categoria']);
    }
    */
    if ($ordenar = strcoll($a['categoria'], $b['categoria'])) {
        //El if es cierto cuando es distinto de cero, 
        // es decir cuando las categorías son distintas
        //Ordenamos por categoría
        return $ordenar;
    }
    if ($a['empleados'] != $b['empleados']) {
        return $b['empleados'] <=> $a['empleados'];
    }
    if ($ordenar = strcoll($a['zona'], $b['zona'])) {
        return $ordenar;
    }
    return strcoll($a['nombre'], $b['nombre']);
}

function desplegable_categorias()
{
    global $empresa;
    // Se comparte con el ámbido de visibilidad de la función la variable
    // $empresa del ámbito "global", que es el fichero
    // $sectores=array_column($empresa,'categoria');
    // print "<pre>".print_r($sectores,true)."</pre>\n";
    // $sectores=array_unique($sectores);
    // print "<pre>".print_r($sectores,true)."</pre>\n";
    // $sectores=array_unique($sectores);
    // print "<pre>".print_r($sectores,true)."</pre>\n";
    // $sectores=array_values($sectores);
    // print "<pre>".print_r($sectores,true)."</pre>\n";
    ////////////////////////////////////////////////////////////
    $sectores = array_unique(array_column($empresa, 'categoria'));
    // print "<pre>".print_r($sectores,true)."</pre>\n";
    ////////////////////////////////////////////////////////////
    // $sectores=array_keys(array_column($empresa,null,'categoria'));
    // print "<pre>".print_r($sectores,true)."</pre>\n";
    ////////////////////////////////////////////////////////////
    print "<select name=\"sector\">\n";
    print "<option>--- categoría ---</option>\n";
    print "\t<option>" . implode("</option>\n\t<option>", $sectores) . "</option>\n";
    print "<select>\n";
}

function tabla_filtrar_categoria($cat)
{
    global $empresa;
    $filtrado = array_filter($empresa, function ($e) use ($cat) {
        return $e['categoria'] == $cat;
    });
    print "<h2>$cat</h2>\n";
    if (count($filtrado)) {
        tabla_de_empresas($filtrado);
    }
}

function csv_filtrar_poblacion($pob)
{
    global $empresa;
    $filtrado = array_filter($empresa, function ($e) use ($pob) {
        return mb_strtoupper($e['zona']) == mb_strtoupper($pob);
    });
    // Construimos un csv con los datos filtrados
    $campos = array_keys(array_values($filtrado)[0]);
    print implode(';', $campos);
    print "\n";
    usort($filtrado, 'orden_empresas');
    foreach ($filtrado as $f) {
        print implode(";", $f);
        print "\n";
    }
}

function JSON_filtrar_poblacion($pob)
{
    global $empresa;
    $filtrado = array_filter($empresa, function ($e) use ($pob) {
        return mb_strtoupper($e['zona']) == mb_strtoupper($pob);
    });
    // tabla_empresas($filtrado);
    print json_encode($filtrado);
}

function tabla_paginada($dato, $npagina, $nporpagina)
{
    /*
    Si hay 20 por página
     1..........0-19
     2.........20-39

    11.......200-219

    n........(n-1)*20..
    */
    $anterior = $npagina - 1;
    $siguiente = $npagina + 1;
    print "<h1>Página $npagina</h1>\n";
    print "<a href=\"?pagina=$anterior\">anterior</a>\n";
    print "<a href=\"?pagina=$siguiente\">siguiente</a>\n";
    $recortado = array_slice($dato, ($npagina - 1) * $nporpagina, $nporpagina);
    tabla_de_empresas($recortado);
}
?>