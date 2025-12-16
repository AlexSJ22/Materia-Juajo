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
    CONFIGURACIÓN DE CONEXIÓN
    */
    define('SERVIDOR', 'localhost');
    define('BBDD', 'olimpiadas');
    define('USUARIO', 'root');
    define('CLAVE', '');



    $mysqli->set_charset('utf8');
    /*
    DATO DE ENTRADA QUE PUEDE LLEGAR DE UN FORMULARIO, POR EJEMPLO
    */

    $mod = 'ar2';


    /*
    Preparamos solamente la query, indicando en las posiciones en que haya que meter parámetros una '?'
    El SGBD comprobará la query
    */

    $sql = "SELECT `metal`,`ganador`,`paises`.nombre as `nom_pais` FROM `medallas` LEFT JOIN`paises` ON `medallas`.`pais` = `paises`.`codigo` WHERE `modalidad` = ? ;";

    $stmt = $mysqli->prepare($sql);
    /*
    Esto debería devolver falso si está mal, antes lo hacía así paro ahora lanza una excepción
    */

    /*
    Ahora metemos los parámetros a la query. 
    Como le indicamos de qué tipo son, las cadenas se "escapan" automáticamente si es necesario
    */
    $stmt->bind_param("s", $mod);

    /*
    Ejecutamos la query
    */
    $stmt->execute();
    /*
    Le decimos en qué variables PHP queremos el resultado
    */

    $stmt->bind_result($db_metal, $db_ganador, $db_nom_pais);

    // 5. OBTENER FILAS: Usamos fetch() para iterar
    


    print "<table>\n";
    while ($stmt->fetch()) {
        print "<tr>\n";
        print "<td>$db_metal</td>\n";
        print "<td>$db_ganador</td>\n";
        print "<td>$db_nom_pais</td>\n";
        print "</tr>\n";
    }
    print "</table>\n";

    /*
    CIERRE DE CONEXIÓN
    Es buena práctica liberar la memoria del resultado y cerrar la conexión explícitamente.
    */
    if ($mysqli !== null && !$mysqli->connect_error) {
        $mysqli->close();
    }
    ?>
</body>

</html>