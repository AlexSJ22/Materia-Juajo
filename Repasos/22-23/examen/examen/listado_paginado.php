<?php

require_once "estrellas.php";

$numeroDeElementos = 21; 
$totalElementos = count($estrellas); 
$totalPaginas = ceil($totalElementos / $numeroDeElementos); 

$paginaActual = isset($_GET['page']) ? (int)$_GET['page'] : 1; 
$paginaActual = max(1, min($paginaActual, $totalPaginas)); 

$comienzo = ($paginaActual - 1) * $numeroDeElementos; 

$elementosActuales = array_slice($estrellas, $comienzo, $numeroDeElementos);

echo "<h1>Listado Paginado de Restaurantes</h1>";
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

echo "<div class='pagination'>";
if ($paginaActual > 1) {
    echo "<a href='?page=" . ($paginaActual - 1) . "'>Anterior</a> ";
}
for ($i = 1; $i <= $totalPaginas; $i++) {
    if ($i == $paginaActual) {
        echo "<strong>$i</strong> "; 
    } else {
        echo "<a href='?page=$i'>$i</a> ";
    }
}
if ($paginaActual < $totalPaginas) {
    echo "<a href='?page=" . ($paginaActual + 1) . "'>Siguiente</a>";
}
echo "</div>";

?>
