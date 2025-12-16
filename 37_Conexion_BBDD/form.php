<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibir datos</title>
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
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    print ("<form action=\"recibir_datos.php\" method=\"post\"><br>");
    print ("<label for=\"nombre\">Introduzca su nombre</label><br>");
    print ("<input type=\"text\" name=\"nombre\" id=\"nombre\" autocomplete=\"off\" required><br>");
    print ("<label for=\"ape1\">Introduzca su primer apellido</label><br>");
    print ("<input type=\"text\" name=\"ape1\" id=\"ape1\" autocomplete=\"off\" required><br>");
    print ("<label for=\"ape2\">Introduzca su segundo apellido</label><br>");
    print ("<input type=\"text\" name=\"ape2\" id=\"ape2\" autocomplete=\"off\" required><br>");
    print ("<label for=\"nickname\">Introduzca su nickname</label><br>");
    print ("<input type=\"text\" name=\"nickname\" id=\"nickname\" autocomplete=\"off\" required><br>");
    print ("<label for=\"contra\">Introduzca su contraseña</label><br>");
    print ("<input type=\"password\" name=\"contra\" id=\"contra\" autocomplete=\"off\" required><br>");
    print ("<input type=\"submit\" value=\"Enviar datos\">");
    print ("</form>");
    ?>
</body>

</html>