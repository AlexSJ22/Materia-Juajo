<?php



define('SERVIDOR', "localhost");
define('USUARIO', 'atacar');
define('CLAVE', 'atacar');
define('BBDD', "atacar");



function desplegable_deportes($marcado = -1)
{
    @$conexion = mysqli_connect(SERVIDOR, USUARIO, CLAVE, BBDD) or die("<p>Error de Conexión " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p>\n");

    mysqli_set_charset($conexion, 'utf8');

    $sql = "SELECT * FROM `deportes`";

    $resultado = mysqli_query($conexion, $sql) or
        die("<p>Error: " . mysqli_errno($conexion) . ": " . mysqli_error($conexion) . "</p>");

    print "<select id=\"deporte\">\n";
    print "<option value=\"0\"> -- Seleccionar deporte -- </option>\n";
    while ($fila = mysqli_fetch_assoc($resultado)) {
        //<option value="ar">Tiro con arco</option>
        $selected = (($fila['codigo'] === $marcado) ? " selected " : "");
        print "<option value=\"$fila[codigo]\" $selected >$fila[nombre]</option>\n";
    }

    print "</select>\n";
    mysqli_free_result($resultado);
    mysqli_close($conexion);
}

function tabla_deportes()
{
    @$conexion = mysqli_connect(SERVIDOR, USUARIO, CLAVE, BBDD) or die("<p>Error de Conexión " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p>\n");

    mysqli_set_charset($conexion, 'utf8');

    $sql = "SELECT * FROM `deportes`";

    $resultado = mysqli_query($conexion, $sql) or
        die("<p>Error: " . mysqli_errno($conexion) . ": " . mysqli_error($conexion) . "</p>");

    print "<table>\n";
    while ($fila = mysqli_fetch_assoc($resultado)) {
        print "<tr><td>$fila[codigo]</td> <td>$fila[nombre]<td></tr>\n";
    }

    print "</table>\n";
    mysqli_free_result($resultado);
    mysqli_close($conexion);
}

function desplegable_modalidad($deporte, $marcado = 0)
{
    @$conexion = mysqli_connect(SERVIDOR, USUARIO, CLAVE, BBDD) OR die("<p>Error de Conexión " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p>\n");
    mysqli_set_charset($conexion, 'utf8');
    // --------------------------------
    $sql = "SELECT * FROM `modalidades` WHERE `deporte` = '$deporte' ORDER BY CAST(SUBSTRING(`codigo`, 3) AS INT); ";
    @$resultado = mysqli_query($conexion, $sql) or
        die("<p>Error: " . mysqli_errno($conexion) . ": " . mysqli_error($conexion) . "</p>");
    print "<select id=\"modalidad\">\n";
    print "<option value=\"0\"> -- Seleccionar modalidad --</option>\n";
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $marcar = (($marcado === $fila['codigo']) ? " selected " : "");
        print "<option $marcar value=\"$fila[codigo]\">$fila[nombre]</option>\n";
    }
    print "</select>\n";
    mysqli_free_result($resultado);
    mysqli_close($conexion);
}

function medallas_modalidad($mod)
{
    @$conexion = mysqli_connect(SERVIDOR, USUARIO, CLAVE, BBDD) OR die("<p>Error de Conexión " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p>\n");
    mysqli_set_charset($conexion, 'utf8');
    // $mod=mysqli_escape_string($conexion,$mod);
    // --------------------------------
    $sql = "SELECT `metal`,`ganador`,`paises`.nombre as `nom_pais`  FROM `medallas` LEFT JOIN 
`paises` ON `medallas`.`pais` = `paises`.`codigo` WHERE `modalidad` = '$mod'  ";
    // $sql=mysqli_escape_string($conexion,$sql);
    print "<p class=\"query\">" . $sql . "</p>";
    @$resultado = mysqli_query($conexion, $sql) or
        die("<p>Error: " . mysqli_errno($conexion) . ": " . mysqli_error($conexion) . "</p>");
    print "<table>\n";
    while ($fila = mysqli_fetch_assoc($resultado)) {
        print "<tr>\n";
        print "<td>$fila[metal]</td>\n";
        print "<td>$fila[ganador]</td>\n";
        print "<td>$fila[nom_pais]</td>\n";
        print "</tr>\n";
    }
    print "</table>\n";
    mysqli_free_result($resultado);
    mysqli_close($conexion);
}

?>