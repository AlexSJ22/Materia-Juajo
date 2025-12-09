<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Listado completo</title>
    <style>
        * {
            background-color: black;
            color: white;
        }

        a {
            color: #48e;
        }
    </style>
</head>

<body>
    <?php
    require_once "../Eje1/funciones.php";
    setlocale(LC_ALL, "spanish_Spain.utf8", "es_Es.utf8");
    usort($empresa, "ordenEmpresas");
    tabla_de_empresas($empresa);
    ?>
</body>

</html>