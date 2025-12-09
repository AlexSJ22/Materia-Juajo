<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    require_once 'funciones.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Completo</title>
    <!--
    <link rel="stylesheet" href="style.css">
    -->
</head>

<body>
    <form>
        <!--
  Si no ponemos método usa GET
  Si no ponemos action, se llama a sí mismo
 
  -->
        <?php desplegable_categorias(); ?>
        <input type="submit">
    </form>
    <?php
    if (isset($_GET['sector'])) {
        tabla_filtrar_categoria($_GET['sector']);
    }
    ?>
</body>

</html>