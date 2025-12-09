<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Restaurantes Michelin por Comunidad</title>
    <style>
        * {
            background-color: black;
            color: white;
        }

        .novedad {
            color: yellow;
            font-weight: bold;
        }

        .menu-comunidades {
            margin: 20px 0;
        }

        .menu-comunidades a {
            display: block;
            margin: 5px 0;
            text-decoration: none;
            color: #00ffff;
        }

        .menu-comunidades a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <?php
    require_once "./estrellas.php";

    // Obtener lista única de comunidades
    $comunidades = array_unique(array_column($estrellas, 'comunidad'));
    sort($comunidades);

    // Verificar si se ha seleccionado una comunidad
    $comunidad_seleccionada = isset($_GET['comunidad']) ? $_GET['comunidad'] : null;

    if (!$comunidad_seleccionada) {
        // Mostrar menú de comunidades
        echo "<h1>Selecciona una Comunidad Autónoma</h1>";
        echo "<div class='menu-comunidades'>";
        foreach ($comunidades as $comunidad) {
            $comunidad_encoded = urlencode($comunidad);
            echo "<a href='listado_comunidad.php?comunidad={$comunidad_encoded}'>{$comunidad}</a>";
        }
        echo "</div>";
    } else {
        $comunidad_seleccionada = urldecode($comunidad_seleccionada);

        // Filtrar restaurantes por comunidad
        $restaurantes_comunidad = array_filter($estrellas, function ($restaurante) use ($comunidad_seleccionada) {
            return $restaurante['comunidad'] == $comunidad_seleccionada;
        });

        // Ordenar: primero por estrellas (descendente), luego alfabéticamente
        usort($restaurantes_comunidad, function ($a, $b) {
            if ($a['estrellas'] != $b['estrellas']) {
                return $b['estrellas'] - $a['estrellas'];
            }
            return strcmp($a['restaurante'], $b['restaurante']);
        });

        echo "<h1>Restaurantes Michelin - {$comunidad_seleccionada}</h1>";
        echo "<p><a href='listado_comunidad.php'>← Volver al menú de comunidades</a></p>";

        if (empty($restaurantes_comunidad)) {
            echo "<p>No hay restaurantes con estrella Michelin en esta comunidad.</p>";
        } else {
            echo "<ol>";
            foreach ($restaurantes_comunidad as $restaurante) {
                $clase_novedad = ($restaurante['novedad'] == 'SI') ? " class='novedad'" : "";
                $estrellas_texto = str_repeat('★', $restaurante['estrellas']);

                echo "<li{$clase_novedad}>";
                echo "<strong>{$restaurante['restaurante']}</strong> - {$estrellas_texto}";
                echo " ({$restaurante['localidad']}, {$restaurante['provincia']})";
                if ($restaurante['novedad'] == 'SI') {
                    echo " <em>- ¡Novedad!</em>";
                }
                echo "</li>";
            }
            echo "</ol>";
        }
    }
    ?>
</body>

</html>