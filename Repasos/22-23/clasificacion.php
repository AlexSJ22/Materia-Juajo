<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Clasificación por Comunidades</title>
    <style>
        * {
            background-color: black;
            color: white;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
        }

        th,
        td {
            border: 1px solid #444;
            padding: 8px 12px;
            text-align: center;
        }

        th {
            background-color: #333;
        }

        tr:hover {
            background-color: #222;
        }

        .tres-estrellas {
            color: gold;
        }

        .dos-estrellas {
            color: silver;
        }

        .una-estrella {
            color: #cd7f32;
            /* bronze */
        }
    </style>
</head>

<body>
    <?php
    require_once "./estrellas.php";

    // Agrupar por comunidad
    $comunidades_data = [];

    foreach ($estrellas as $restaurante) {
        $comunidad = $restaurante['comunidad'];

        if (!isset($comunidades_data[$comunidad])) {
            $comunidades_data[$comunidad] = [
                'tres_estrellas' => 0,
                'dos_estrellas' => 0,
                'una_estrella' => 0,
                'total_restaurantes' => 0,
                'total_estrellas' => 0
            ];
        }

        // Contar por tipo de estrella
        switch ($restaurante['estrellas']) {
            case 3:
                $comunidades_data[$comunidad]['tres_estrellas']++;
                break;
            case 2:
                $comunidades_data[$comunidad]['dos_estrellas']++;
                break;
            case 1:
                $comunidades_data[$comunidad]['una_estrella']++;
                break;
        }

        $comunidades_data[$comunidad]['total_restaurantes']++;
        $comunidades_data[$comunidad]['total_estrellas'] += $restaurante['estrellas'];
    }

    // Ordenar según los criterios especificados
    uksort($comunidades_data, function ($comunidad_a, $comunidad_b) use ($comunidades_data) {
        $a = $comunidades_data[$comunidad_a];
        $b = $comunidades_data[$comunidad_b];

        // Primero por restaurantes de 3 estrellas (descendente)
        if ($a['tres_estrellas'] != $b['tres_estrellas']) {
            return $b['tres_estrellas'] - $a['tres_estrellas'];
        }
        // Luego por restaurantes de 2 estrellas (descendente)
        if ($a['dos_estrellas'] != $b['dos_estrellas']) {
            return $b['dos_estrellas'] - $a['dos_estrellas'];
        }
        // Luego por restaurantes de 1 estrella (descendente)
        if ($a['una_estrella'] != $b['una_estrella']) {
            return $b['una_estrella'] - $a['una_estrella'];
        }
        // Finalmente alfabéticamente por nombre de comunidad
        return strcmp($comunidad_a, $comunidad_b);
    });

    echo "<h1>Clasificación de Comunidades por Estrellas Michelin</h1>";

    echo "<table>";
    echo "<tr>
            <th>Comunidad Autónoma</th>
            <th class='tres-estrellas'>3 Estrellas</th>
            <th class='dos-estrellas'>2 Estrellas</th>
            <th class='una-estrella'>1 Estrella</th>
            <th>Total Restaurantes</th>
            <th>Total Estrellas</th>
          </tr>";

    foreach ($comunidades_data as $comunidad => $data) {
        echo "<tr>";
        echo "<td style='text-align: left;'><strong>{$comunidad}</strong></td>";
        echo "<td class='tres-estrellas'>{$data['tres_estrellas']}</td>";
        echo "<td class='dos-estrellas'>{$data['dos_estrellas']}</td>";
        echo "<td class='una-estrella'>{$data['una_estrella']}</td>";
        echo "<td>{$data['total_restaurantes']}</td>";
        echo "<td>{$data['total_estrellas']}</td>";
        echo "</tr>";
    }

    echo "</table>";
    ?>
</body>

</html>