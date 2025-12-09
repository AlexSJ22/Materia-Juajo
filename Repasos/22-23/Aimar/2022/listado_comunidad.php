<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <?php
    require_once 'restarurantes.php';
    $comunidades = array_map(function($restaurante) {
        return $restaurante['comunidad'];
    }, $estrellas);
    
    // Elimina duplicados
    $comunidadUnicas = array_unique($comunidades);
    
    // Genera enlaces para cada comunidad
    $enlaces = array_map(function($comunidad) {
        $comunidadUrl = urlencode($comunidad);
        return "<a href='?comunidad=$comunidadUrl'>$comunidad</a>";
    }, $comunidadUnicas);
    
    echo implode(' | ', $enlaces);
    
    if (isset($_GET['comunidad'])) {
        $comunidadSeleccionada = urldecode($_GET['comunidad']);
        mostrarComunidad($comunidadSeleccionada, $estrellas);
    }
    
    function mostrarComunidad($comunidad, $estrellas) {
        echo "<p>Has seleccionado la comunidad: " . htmlspecialchars($comunidad) . "</p>";
        
        $restaurantesComunidad = array_filter($estrellas, function($restaurante) use ($comunidad) {
            return $restaurante['comunidad'] == $comunidad;
        });
        usort($restaurantesComunidad, function($a, $b) {
            if ($a['estrellas'] != $b['estrellas']) {
                return $b['estrellas'] <=> $a['estrellas'];
            }
            return strcmp($a['restaurante'], $b['restaurante']);
        });
    
        echo "<ol>";
        foreach ($restaurantesComunidad as $restaurante) {
            if($restaurante['novedad'] == "SI") {
                echo "<li class='novedad'>" . htmlspecialchars($restaurante['restaurante']) . " - " . $restaurante['estrellas'] . " estrellas</li>";
            } else {
                echo "<li>" . htmlspecialchars($restaurante['restaurante']) . " - " . $restaurante['estrellas'] . " estrellas</li>";
            }
        }
        echo "</ol>";
    }
    

    

    
    ?>
</body>
</html>