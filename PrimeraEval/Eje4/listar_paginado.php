<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    require_once "funciones.php";
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 - Tabla paginada</title>
    <!--
    <link rel="stylesheet" href="style.css">
    -->
</head>

<body>
    <?php
    tabla_paginada($empresa, $_GET['pagina'], 20);
    ?>
</body>

</html>