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
    Listado a partir de una query que recibe un parámetro
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
    /*
    DATO DE ENTRADA QUE PUEDE LLEGAR DE UN FORMULARIO, POR EJEMPLO
    */

    $mod = 'ar2';

    /* *  ESCAPE DE DATOS DE ENTRADA
     * CRÍTICO: Usamos real_escape_string() antes de construir la query.
     * Esto hace que caracteres como comillas simples (que permiten la Inyección SQL)
     * sean inofensivos.
     */

    $mod = $mysqli->real_escape_string($mod);

    /*
    Cuando el dato está saneado, podemos hacer la query
    */

    $sql = "SELECT `metal`,`ganador`,`paises`.nombre as `nom_pais` FROM `medallas` LEFT JOIN`paises` ON `medallas`.`pais` = `paises`.`codigo` WHERE `modalidad` = '$mod' ";


    $resultado = $mysqli->query($sql);



    print "<table>\n";
    while ($fila = $resultado->fetch_assoc()) {
        print "<tr>\n";
        print "<td>$fila[metal]</td>\n";
        print "<td>$fila[ganador]</td>\n";
        print "<td>$fila[nom_pais]</td>\n";
        print "</tr>\n";
    }
    print "</table>\n";

    /*
    CIERRE DE CONEXIÓN
    Es buena práctica liberar la memoria del resultado y cerrar la conexión explícitamente.
    */
    $resultado->free();
    $mysqli->close();
    ?>
</body>

</html>