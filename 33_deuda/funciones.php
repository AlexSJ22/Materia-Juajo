<?php
require_once 'deuda_codigos.php';
function pagina_principal()
{
    menu_comunidades();
    tabla_comunidades();
    print "<p>Página principal</p>\n";
}

function pagina_comunidad($com)
{
    menu_comunidades($com);//Con una marcada
    menu_provincias($com);//De esa comunidad
    tabla_comunidad($com);
    print "<p>Página de la comunidad $com</p>";
}

function pagina_provincia($com, $prov)
{
    menu_comunidades($com);//Con una marcada
    menu_provincias($com, $prov);//De esa comunidad com una marcada
    //Tabla de ayuntamientos de esa provincia
    //Los nombres serán enlaces a la página del ayuntamiento
    tabla_provincia($com, $prov);
    print "<p>Página de la provincia $prov</p>";
}

function pagina_ayuntamiento($com, $prov, $ayto)
{
    global $deuda;
    print "<h1>Ayuntamiento de {$deuda[$prov][$ayto]['nombre']}</h1>";
    print "<p>Hay " . number_format($deuda[$prov][$ayto]['habitantes'], 0, "'", ".") . " habitantes que deben " . number_format($deuda[$prov][$ayto]['deuda'] * 1000, 0, "'", ".") . "€, es decir " . number_format($deuda[$prov][$ayto]['deuda'] * 1000 / $deuda[$prov][$ayto]['habitantes'], 2, "'", ".") . "€ por cabeza</p>";
}
function menu_comunidades($activo = -1)
{
    global $comunidad;
    print "<ul class=\"menu\">\n";
    foreach ($comunidad as $codigo => $nombre) {
        // $clase=($codigo==$activo)?' class= "activo"':"";
        // print "<li$clase><a href=\"$_SERVER[PHP_SELF]?com=$codigo\">$nombre</a></li>";
        print "<li";
        if ($codigo == $activo) {
            print ' class="activo"';
        }
        print "><a href=\"$_SERVER[PHP_SELF]?com=$codigo\">$nombre</a></li>\n";
    }
    print "</ul>\n";
}


function menu_provincias($com, $activo = -1)
{
    //Tengo las provincias en el array $provincia[$com]
    global $provincia;
    print "<ul class=\"menu\">\n";
    foreach ($provincia[$com] as $codigo => $nombre) {
        $clase = ($codigo == $activo) ? ' class= "activo"' : "";
        print "<li$clase><a href=\"$_SERVER[PHP_SELF]?com=$com&prov=$codigo\">$nombre</a></li>\n";
    }
    print "</ul>\n";
}
/*
function tabla_provincia($com,$prov){
    print "<p>Tabla de provinca $prov en la comunidad $com</p>\n";
}

function tabla_comunidad($com){
    print "<p>Tabla de la comunidad $com</p>\n";
}
function tabla_comunidades(){
    print "<p>Tabla de comunidades</p>\n";
}
*/
function tabla_provincia($com, $prov)
{
    //Tengo los ayuntamientos de la provincia en el array $deuda[$prov]
    global $deuda, $provincia;
    print "<table class=\"deuda\">\n";
    print "<caption>Deuda en la provincia de {$provincia[$com][$prov]}</caption>\n";
    print "<tr><th></th><th>Habitantes</th><th>Deuda</th><th>Deuda per Cápita</th></tr>\n";
    foreach ($deuda[$prov] as $codigo => $datos) {
        print "<tr>";
        print "\t<td><a  href=\"$_SERVER[PHP_SELF]?com=$com&prov=$prov&ayto=$codigo\">" . $datos['nombre'] . "</a></td>\n";
        print "\t<td>" . number_format($datos['deuda'] * 1000, 0, "'", ".") . "</td>\n";
        print "\t<td>" . number_format($datos['habitantes'], 0, "'", ".") . "</td>\n";
        print "\t<td>" . number_format($datos['deuda'] / $datos['habitantes'] * 1000, 2, "'", ".") . "</td>\n";
        print "</tr>";
    }
    print "</table>\n";
}

function tabla_comunidad($com)
{
    global $deuda, $provincia, $comunidad;
    // print "<pre>".print_r($provincia[$com],true)."</pre>";
    print "<table class=\"deuda\">\n";
    print "<caption>Deuda en la comunidad de $comunidad[$com]</caption>\n";
    print "<tr><th></th><th>Habitantes</th><th>Deuda</th><th>Deuda per Cápita</th></tr>\n";
    foreach ($provincia[$com] as $c => $p) {
        print "<tr>";
        print "<td>$p</td>";
        $deuda_total = array_sum(array_column($deuda[$c], 'deuda'));
        $poblacion_total = array_sum(array_column($deuda[$c], 'habitantes'));
        // Ahora hay que sumar los habitantes y la deuda de esa provincia
        print "<td>" . number_format($poblacion_total, 0, "'", ".") . "</td>";
        print "<td>" . number_format($deuda_total * 1000, 0, "'", ".") . "€</td>";
        print "<td>" . number_format($deuda_total * 1000 / $poblacion_total, 2, "'", ".") . "€</td>";
        print "</tr>";
    }
    print "</table>\n";
}

function tabla_comunidades()
{
    global $deuda, $provincia, $comunidad;
    print "<table class=\"deuda\">\n";
    print "<caption>Deuda por comunidades</caption>\n";
    print "<tr><th></th><th>Habitantes</th><th>Deuda</th><th>Deuda per Cápita</th></tr>\n";
    foreach ($comunidad as $com => $nom_com) {
        print "<tr>";
        print "<td>$nom_com</td>";

        // Hay que coger los códigos de provincias de $provincia[$com]
        // Por ejemplo en el País Vasco $provincia[15]
        // Array
        // (
        // [1] => Araba/Álava
        // [20] => Gipuzkoa
        // [48] => Bizkaia
        // )

        // sus claves son el array(1,20,48);

        // Quiero "juntar" los arrays de las tres provincias.

        // Hay tres arrays que sacamos de $deuda

        // $deuda[1] tiene los pueblos de Álava
        // $deuda[20] tiene los pueblos de Gipuzkoa
        // $deuda[48] tiene los pueblos de Bizkaia

        // Si los puedo "pegar" en un solo array con todos los pueblos, puedo sacar el array de habitantes de cada pueblo con array_column y sumas con array_sum

        // Hacemos un array de arrays y lo pegamos

        $muchos_pueblos = array();
        foreach (array_keys($provincia[$com]) as $prov) {
            $muchos_pueblos[] = $deuda[$prov];
        }

        // En el caso del Pais Vasco tengo tres arrays de pueblos.
        // Los pego

        $muchos_pueblos = array_merge(...$muchos_pueblos);
        $deuda_total = array_sum(array_column($muchos_pueblos, 'deuda'));
        $poblacion_total = array_sum(array_column($muchos_pueblos, 'habitantes'));

        // Ahora hay que sumar los habitantes y la deuda de esa provincia

        print "<td>" . number_format($poblacion_total, 0, "'", ".") . "</td>";
        print "<td>" . number_format($deuda_total * 1000, 0, "'", ".") . "€</td>";
        print "<td>" . number_format($deuda_total * 1000 / $poblacion_total, 2, "'", ".") . "€</td>";

        print "</tr>";
    }


    print "</table>\n";
}



?>