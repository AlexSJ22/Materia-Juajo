<?php

require_once "estrellas.php";

// Lista de comunidades autónomas de España
$comunidades = [
    "Andalucía", "Aragón", "Asturias", "Cantabria", "Castilla y León", "Castilla-La Mancha",
    "Cataluña", "Extremadura", "Galicia", "Madrid", "Murcia", "Navarra",
    "País Vasco", "La Rioja", "Islas Baleares", "Islas Canarias"
];

// Número de elementos por página
$numeroDeElementos = 21;

// Obtener la comunidad seleccionada desde el parámetro 'comunidad' en la URL
$comunidadSeleccionada = isset($_GET['comunidad']) ? $_GET['comunidad'] : '';

// Filtrar los restaurantes según la comunidad seleccionada
if ($comunidadSeleccionada && in_array($comunidadSeleccionada, $comunidades)) {
    $restaurantesFiltrados = array_filter($estrellas, function ($item) use ($comunidadSeleccionada) {
        return $item['comunidad'] === $comunidadSeleccionada;
    });
} else {
    $restaurantesFiltrados = $estrellas; // Mostrar todos si no hay comunidad seleccionada
}

$totalElementos = count($restaurantesFiltrados); 
$totalPaginas = ceil($totalElementos / $numeroDeElementos); 

$paginaActual = isset($_GET['page']) ? (int)$_GET['page'] : 1; 
$paginaActual = max(1, min($paginaActual, $totalPaginas)); 

$comienzo = ($paginaActual - 1) * $numeroDeElementos; 

// Obtener los elementos de la página actual
$elementosActuales = array_slice($restaurantesFiltrados, $comienzo, $numeroDeElementos);

echo "<h1>Listado Paginado de Restaurantes</h1>";
if ($comunidadSeleccionada) {
    echo "<h2>Comunidad: " . htmlspecialchars($comunidadSeleccionada) . "</h2>";
} else {
    echo "<h2>Todos los Restaurantes de España</h2>";
}

// Enlaces de comunidades
echo "<div class='comunidades'>";
echo "<h3>Filtrar por Comunidad Autónoma:</h3>";
foreach ($comunidades as $comunidad) {
    echo "<a href='?comunidad=" . urlencode($comunidad) . "'>$comunidad</a> ";
}
echo "</div>";

// Mostrar los restaurantes de la página actual
foreach ($elementosActuales as $item) {
    echo "<p>".$item['restaurante']. ", ";
    echo " ".$item['localidad'].",";
    echo " " . $item['provincia'] . ", ";
    echo " (" . $item['comunidad'] . ") ";
    
    // Convertir el número de estrellas en el símbolo de estrella
    echo ", " . str_repeat("★", $item['estrellas']);
    
    // Mostrar "NOVEDAD" en rojo si el valor de novedad es "si"
    if (strtolower($item['novedad']) === "si") {
        echo ", <span style='color: red; font-weight: bold;'>NOVEDAD</span>";
    }
    echo "</p>";
}

?>
