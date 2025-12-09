<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL && ~E_DEPRECATED);
    require_once 'alumnos.php';
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Implode y explode</title>
    <link rel="stylesheet" type="text/css" href="14_calendario.css">
</head>

<body>
    <?php
    /**
     * Usamos explode para obtener un array a partir de una cadena
     */
    $dato = explode(',', "Pepito,Luisito,Ramontxu");
    print ("<pre>\$dato:" . print_r($dato, true) . "</pre>\n");
    /*
     * En este caso es lo mismo que 
     * 
     * $dato=array("Pepito","Luisito","Ramontxu");
     * $dato=[array(]"Pepito","Luisito","Ramontxu"];
     * 
     * pero podemos usar otros separadores. por ejemplo
     * podemos leer un csv linea a linea
     * 
     * Podemos hacer estadisticas de uso de palabras
     */
    $dato = explode(",", "Todas las palabras de un documento en una sola cadena");
    print ("<pre>\$dato:" . print_r($dato, true) . "</pre>\n");
    /*
     * Podemos pensar en explode como una forma compacta de definir arrays
     * 
     * Resulta bastante mas interesante su pariente "implode"
     * En vez de su separador, le damos  "pegamento" y una array cuyos elementos
     * debe pegar
     * 
     * Se podria usar para hacer un csv a partir de un array pero realmente hacer cosas mucho mas utiles
     */
    $cadena = implode(',', $dato);
    print ("<p>$cadena</p>\n");

    print ("<ol>\n");
    print ("\t<li>");
    print (implode("</li>\n\t<li>", $cuentas));
    print ("</li>\n");
    print ("</ol>\n");

    /**
     * o print ("<ol>\n\t<li>" . implode("</li>\n\t<li>", $cuentas) . "</li>\n" . "</ol>\n");
     */
    ?>
</body>

</html>