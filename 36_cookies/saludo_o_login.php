<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creacion de cookies</title>
    <style>
        * {
            /*background-color: black;
            color: white;*/
            font-size: 20px;
        }
    </style>
</head>

<body>
    </form>

    <?php
    if (!isset($_COOKIE["bienvenida"])) {
        print ("<form action=\"recordar_usuario.php\" method=\"post\">");
        print ("<label for=\"nombre\">Como te llamas?</label>");
        print ("<input type=\"text\" name=\"nombre\" id=\"nombre\" autocomplete=\"off\">");
        print ("<button type=\"submit\">Recordarme</button>");
        print ("</form>");
    } else {
        print ("<p>Bienvendo al servidor " . $_COOKIE["bienvenida"] . "</p>");
        print ("<a href=\"olvidar_usuario.php\"><button>Olvidame</button></a>");
    }
    ?>
</body>

</html>