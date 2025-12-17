<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    ini_set("display_errors", "on");
    error_reporting(E_ALL);
    require_once "funciones.php";
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metiendo nuevo usuario</title>
    <!--
    <link rel="stylesheet" href="style.css">
    -->
    <style>
        * {
            /*background-color: black;
            color: white;*/
        }
    </style>
</head>

<body>
    <?php
    print ("<pre>" . print_r($_POST, true) . "<pre>");
    if (!validar_login($_POST)) {
        print ("<p>Adelante $_POST[nick]</p>");
    } else {
        print ("<p>Adios $_POST[nick]</p>");
    }
    ?>
</body>

</html>