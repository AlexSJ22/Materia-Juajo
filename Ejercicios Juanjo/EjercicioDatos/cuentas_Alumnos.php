<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL && ~E_DEPRECATED);
    require_once 'datos/alumnos.php';
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Ejercicio cuentas alumnos</title>
    <link rel="stylesheet" type="text/css" href="14_calendario.css">
</head>

<body>
    <?php
    print ("<table>");
    print ("<tr>");
    print ("<th> Cuenta </th><th> Usuario </th>");
    print ("</tr>");
    print ("<tbody>");
    for ($i = 0; $i < count($cuentas); $i++) {
        print ("<tr><td>$cuentas[$i]</td><td>$alumnos[$i]</td></tr>");
    }
    print ("</tbody>");
    print ("</table>");


    print ("<ol>");
    for ($i = 0; $i < count($cuentas); $i++) {
        print ("<li><a href=\"http://10.0.56.66/~$cuentas[$i]\">$alumnos[$i]</a></li>");
    }
    print ("</ol>");
    ?>
</body>

</html>