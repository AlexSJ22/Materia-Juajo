<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL && ~E_DEPRECATED);
    require_once './capitales.php';
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Comprobar capital</title>
    <link rel="stylesheet" type="text/css" href="">
</head>

<body>
    <?php
    $respuesta = $_POST['capital'];
    $secreto = $_POST["pais"];
    $clave = array_keys($capital);
    $valor = array_values($capital);
    print ("<p>Este es el numero que elegiste $respuesta<p>");
    print ("<p>Este es el numero secreto $secreto<p>");
    print ("<div>");
    if ($valor[$respuesta] == $valor[$secreto]) {
        print ("<p>Es correcto, la capital de $clave[$secreto] es $valor[$secreto] </p>");
    } else {
        print ("<p>Es incorrecto, la capital de $clave[$secreto] es $valor[$secreto] </p>");
        print ("<table>");
        print ("<tr>");
        print ("<th>Pais</th>");
        print ("<th> Capital</th>");
        print ("</tr>");
        for ($i = 0; $i < count($capital); $i++) {
            print ("<tr>");
            print ("<td> $clave[$i] </td>");
            print ("<td> $valor[$i] </td>");
            print ("</tr>");
        }
        print ("</table>");
    }
    print ("</div>");
    ?>
</body>

</html>