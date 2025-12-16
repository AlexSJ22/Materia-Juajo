<?PHP
ini_set('display_errors', 'On');
error_reporting(E_ALL);

define('SERVIDOR', "localhost");
define('USUARIO', 'root');
define('CLAVE', '');
define('BBDD', "olimpiadas");

function obtenerDatos()
{
    @$conexion = new mysqli(SERVIDOR, USUARIO, CLAVE, BBDD) or die(
        "<p>Error de Conexión " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p>\n");
    mysqli_set_charset($conexion, 'utf8');
    $sql = "SELECT * FROM `deportes`";

    //$sql = mysqli_real_escape_string($sql, "");
    $resultado = mysqli_query($conexion, $sql) or
        die("<p>Error: " . mysqli_errno($conexion) . ": " . mysqli_error($conexion) . "</p>");
    print ("<ul>");
    while ($fila = mysqli_fetch_assoc($resultado)) {
        print "<li id=\"$fila[codigo]\" >  $fila[nombre]\"</li>\n";
    }
    print ("</ul>");
    mysqli_free_result($resultado);
    mysqli_close($conexion);
}
function obtenerDatoEspecifico()
{
    @$conexion = mysqli_connect(SERVIDOR, USUARIO, CLAVE, BBDD) or die(
        "<p>Error de Conexión " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p>\n");
    mysqli_set_charset($conexion, 'utf8');
    $valor = "oro";
    $sql = "SELECT * FROM `medallas` WHERE `metal` = '$valor'";

    // $sql = mysqli_real_escape_string($sql, "");
    $resultado = mysqli_query($conexion, $sql) or
        die("<p>Error: " . mysqli_errno($conexion) . ": " . mysqli_error($conexion) . "</p>");
    print ("<ol>");
    while ($fila = mysqli_fetch_assoc($resultado)) {
        print "<li> $fila[ganador]</li>\n";
    }
    print ("</ol>");
    mysqli_free_result($resultado);
    mysqli_close($conexion);
}
?>