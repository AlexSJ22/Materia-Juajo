<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminacion de cookies</title>
    <!--
    <link rel="stylesheet" href="style.css">
    -->
    <style>
        * {
            /*background-color: black;
            color: white;*/
            font-size: 25px;
        }
    </style>
</head>

<body>
    <?php
    setcookie("bienvenida", "", time() - 365 * 24 * 60 * 60);
    print ("<p>Hasta pronto</p>");
    //header("Location: saludo_o_login.php");
    ?>
</body>

</html>