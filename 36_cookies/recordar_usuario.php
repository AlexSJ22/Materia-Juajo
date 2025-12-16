<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recordar usuario</title>
    <style>
        * {
            /*background-color: black;
            color: white;*/
        }
    </style>
</head>

<body>
    <?php
    setcookie("bienvenida", $_POST["nombre"], time() + 365 * 24 + 60 * 60);
    header("Location: saludo_o_login.php");
    ?>
</body>

</html>