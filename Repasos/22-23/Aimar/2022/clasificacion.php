<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
function clasificacionRestaurantes($estrellas) {
    
    $clasificacion = [];

    foreach ($estrellas as $restaurante) {
        $comunidad = $restaurante['comunidad'];
        $numEstrellas = $restaurante['estrellas'];

        if (!isset($clasificacion[$comunidad])) {
            $clasificacion[$comunidad] = [
                'tres_estrellas' => 0,
                'dos_estrellas' => 0,
                'una_estrella' => 0,
                'total_restaurantes' => 0,
                'total_estrellas' => 0
            ];
        }

        if ($numEstrellas === 3) {
            $clasificacion[$comunidad]['tres_estrellas']++;
        } elseif ($numEstrellas === 2) {
            $clasificacion[$comunidad]['dos_estrellas']++;
        } elseif ($numEstrellas === 1) {
            $clasificacion[$comunidad]['una_estrella']++;
        }

        $clasificacion[$comunidad]['total_restaurantes']++;
        $clasificacion[$comunidad]['total_estrellas'] += $numEstrellas;
    }

    uasort($clasificacion, function($a, $b) use ($clasificacion) {
        if ($a['tres_estrellas'] !== $b['tres_estrellas']) {
            return $b['tres_estrellas'] <=> $a['tres_estrellas'];
        }

        if ($a['dos_estrellas'] !== $b['dos_estrellas']) {
            return $b['dos_estrellas'] <=> $a['dos_estrellas'];
        }

        if ($a['una_estrella'] !== $b['una_estrella']) {
            return $b['una_estrella'] <=> $a['una_estrella'];
        }
        
        $comunidadA = array_search($a, $clasificacion);
        $comunidadB = array_search($b, $clasificacion);
        return strcmp($comunidadA, $comunidadB);
    });

    
    echo "<table border='1'>";
    echo "<tr>
            <th>Comunidad</th>
            <th>Restaurantes de 3 estrellas</th>
            <th>Restaurantes de 2 estrellas</th>
            <th>Restaurantes de 1 estrella</th>
            <th>Total de Restaurantes</th>
            <th>Total de Estrellas</th>
          </tr>";

    foreach ($clasificacion as $comunidad => $datos) {
        echo "<tr>
                <td>" . htmlspecialchars($comunidad) . "</td>
                <td>" . $datos['tres_estrellas'] . "</td>
                <td>" . $datos['dos_estrellas'] . "</td>
                <td>" . $datos['una_estrella'] . "</td>
                <td>" . $datos['total_restaurantes'] . "</td>
                <td>" . $datos['total_estrellas'] . "</td>
              </tr>";
    }
    echo "</table>";
}
    require_once 'restarurantes.php';
    clasificacionRestaurantes($estrellas);

    ?>
</body>
</html>