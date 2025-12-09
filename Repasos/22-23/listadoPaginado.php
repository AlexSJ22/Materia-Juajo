<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Restaurantes Michelin - Listado Paginado</title>
    <style>
        * {
            background-color: black;
            color: white;
        }

        .novedad {
            color: yellow;
            font-weight: bold;
        }

        .paginacion {
            margin: 20px 0;
        }

        .paginacion a {
            margin: 0 10px;
            text-decoration: none;
            color: #00ffff;
        }

        .paginacion a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <?php

    // Configuración de paginación
    $por_pagina = 20;
    $total_restaurantes = count($estrellas);
    $total_paginas = ceil($total_restaurantes / $por_pagina);

    // Obtener página actual
    $pagina = isset($_GET['pagina']) ? max(1, min($total_paginas, intval($_GET['pagina']))) : 1;
    $inicio = ($pagina - 1) * $por_pagina;

    // Ordenar restaurantes alfabéticamente
    usort($estrellas, function ($a, $b) {
        return strcmp($a['restaurante'], $b['restaurante']);
    });

    // Obtener restaurantes para la página actual
    $restaurantes_pagina = array_slice($estrellas, $inicio, $por_pagina);

    echo "<h1>Restaurantes Michelin - Página $pagina</h1>";

    // Navegación
    echo "<div class='paginacion'>";
    if ($pagina > 1) {
        echo "<a href='listado_paginado.php?pagina=" . ($pagina - 1) . "'>Anterior</a> ";
    }
    echo "Página $pagina de $total_paginas";
    if ($pagina < $total_paginas) {
        echo " <a href='listado_paginado.php?pagina=" . ($pagina + 1) . "'>Siguiente</a>";
    }
    echo "</div>";

    // Lista de restaurantes
    echo "<ol start='" . ($inicio + 1) . "'>";
    foreach ($restaurantes_pagina as $restaurante) {
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

    // Navegación inferior
    echo "<div class='paginacion'>";
    if ($pagina > 1) {
        echo "<a href='./listadoPaginado.php?pagina=" . ($pagina - 1) . "'>Anterior</a> ";
    }
    echo "Página $pagina de $total_paginas";
    if ($pagina < $total_paginas) {
        echo " <a href='./listadoPaginado.php?pagina=" . ($pagina + 1) . "'>Siguiente</a>";
    }
    echo "</div>";
    ?>
</body>

</html>