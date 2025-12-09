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
    // Inicializa la página a 1 si no está establecida
    $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    require_once 'restarurantes.php';

    // Muestra los restaurantes para la página actual
    mostrarRestaurantes($pagina, $estrellas);

    // Variables de control para redirección
    $redirigir = false;

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['anterior'])) {
            // Si se presiona "anterior" y la página es mayor que 1, retrocede
            if ($pagina > 1) {
                $pagina--;
                $redirigir = true;
            }
        }
        if (isset($_GET['siguiente'])) {
            // Si se presiona "siguiente" y hay más páginas, avanza
            if (count($estrellas) / 10 > $pagina) {
                $pagina++;
                $redirigir = true;
            }
        }

        // Redirige solo si es necesario para evitar el bucle
        if ($redirigir) {
            header("Location: ?pagina=$pagina");
            exit;
        }
    }

    function mostrarRestaurantes($pagina, $estrellas)
    {
        // Empieza a generar una nueva lista
        echo "<ol start='" . ($pagina * 10 - 9) . "'>\n";
        for ($i = 0; $i < 10; $i++) {
            $indice = ($pagina - 1) * 10 + $i;
            if (isset($estrellas[$indice])) {
                $restaurante = $estrellas[$indice];
                if ($restaurante['novedad'] == "SI") {
                    echo "<li class='novedad'>" . htmlspecialchars($restaurante['restaurante']) . "</li>\n";
                } else {
                    echo "<li>" . htmlspecialchars($restaurante['restaurante']) . "</li>\n";
                }
            }
        }
        echo "</ol>\n";
    }
    ?>

    <form method="GET">
        <!-- Incluye la página actual como input oculto -->
        <input type="hidden" name="pagina" value="<?php echo $pagina; ?>">
        <button type="submit" name="anterior">Anterior</button>
        <button type="submit" name="siguiente">Siguiente</button>
    </form>
</body>

</html>
