<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL && ~E_DEPRECATED);
    require_once 'provincias_densidad.php';
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Ejercicio poblacion</title>
    <link rel="stylesheet" type="text/css" href="14_calendario.css">
</head>

<body>
    <?php
    print ("<table>");
    print ("<tr>");
    print ("<th>Codigo Provincia<th>");
    print ("<th>Datos poblacion<th>");
    print ("<th>Por sexos<th>");
    print ("<th>Superficie de provincia<th>");
    print ("<th>Densidad de poblacion<th>");
    print ("</tr>");
    $clave = array_keys($prov);
    $valor = array_values($prov);
    for ($i = 0; $i < count($prov); $i++) {
        print ("<tr>");
        print ("<td>$clave[$i]</td>");
        print ("<tr>");
    }
    print ("</table>");
    ?>
</body>

</html>