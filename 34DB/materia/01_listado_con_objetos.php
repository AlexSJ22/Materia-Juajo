<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    ?>
    <meta charset="UTF-8">
    <title>Acceso a BBDD desde PHP (Orientado a Objetos)</title>
</head>

<body>
    <?php
    /*
    Listado generado a partir de una query sin parámetros
    */
    /*
    CONFIGURACIÓN DE CONEXIÓN
    */
    define('SERVIDOR', 'localhost');
    define('BBDD', 'olimpiadas');
    define('USUARIO', 'root');
    define('CLAVE', '');

    $mysqli = new mysqli(SERVIDOR, USUARIO, CLAVE, BBDD);

    $mysqli->set_charset('utf8');


    $sql = 'SELECT codigo, nombre FROM `deportes` ORDER BY `deportes`.`nombre` DESC;';


    $resultado = $mysqli->query($sql);


    //Vamos a hacer una lista
    print "<p>Lista desde array de claves numéricas</p>\n";
    print "<ol>\n";
    // while($fila=mysqli_fetch_row($resultado)){
    while ($fila = $resultado->fetch_row()) {//Mientras queden datos
        // En el SELECT he puesto 'codigo' y 'nombre', que serán los índices 0 y 1 respectivamente.
        print "<li>$fila[1] ($fila[0])</li>\n";
    }
    print "</ol>\n";

    /*
        VERSIÓN CON ARRAY ASOCIATIVO
    */

    $resultado->data_seek(0);
    print "<p>Lista desde array asociativo</p>\n";
    print "<ol>\n";
    // while($fila=mysqli_fetch_assoc($resultado)){
    while ($fila = $resultado->fetch_assoc()) {//Mientras queden datos
        print "<li>$fila[nombre] ($fila[codigo])</li>\n";
    }
    print "</ol>\n";


    /*
    CIERRE DE CONEXIÓN
    Es buena práctica liberar la memoria del resultado y cerrar la conexión explícitamente.
    */
    $resultado->free();
    $mysqli->close();
    ?>
</body>

</html>