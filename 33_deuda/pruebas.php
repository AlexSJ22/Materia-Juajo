<?php
require_once "deuda_codigos.php";
print ("<pre>" . print_r($comunidad, true) . "</pre>");
generarTabla();

function generarTabla()
{
    global $deuda;
    global $comunidad;
    print ("<table>");
    print ("<tr>");
    print ("<th></th>");
    print ("<th>Habitantes</th>");
    print ("<th>Deuda</th>");
    print ("<th>Deuda por persona</th>");
    print ("</tr>");
    for ($i = 1; $i < count($comunidad); $i++) {
        echo "<tr>";
        echo "<td>" . $comunidad[$i] . "</td>";
        $sumaDeuda = 0;
        $sumaPoblacion = 0;

        // Si la comunidad existe en $deuda
        if (isset($deuda[$i])) {

            foreach ($deuda[$i] as $idMunicipio => $datos) {
                $sumaDeuda += (float) $datos['deuda'];
                $sumaPoblacion += (float) $datos['habitantes'];
            }

        }

        echo "<td>" . $sumaPoblacion . "</td>";
        echo "<td>" . $sumaDeuda . "</td>";
        echo "</tr>";
    }

    print ("</table>");

}

function datos()
{
    global $deuda;
    global $comunidad;
    $debt = 0;
    $habitantes = 0;

    foreach ($deuda as $id => $municipio) {
        $nombreComunidad = isset($comunidad[$id])
            ? $comunidad[$id]
            : "SIN COMUNIDAD";
        echo "----------------------------------------------------<br>";
        echo "Comunidad $nombreComunidad <br>";
        echo "----------------------------------------------------<br>";
        foreach ($municipio as $nombre => $datos) {

            echo "*********************<br>";
            echo "<strong>Municipio</strong> $datos[nombre] <br>";
            $debt += $datos['deuda'];
            echo "<strong>Deuda</strong> $datos[deuda] <br>";
            $habitantes += $datos['habitantes'];
            echo "<strong>Habitantes</strong> $datos[habitantes]<br>";
        }
    }
    echo "La deuda total es $debt";
    echo "Hay  $habitantes habitantes en el pais";

}

?>