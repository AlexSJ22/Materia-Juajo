<?php
/*define('SERVIDOR', 'localhost');
define('BBDD', 'organizacion');
define('USUARIO', 'root');
define('CLAVE', '');*/

define('SERVIDOR', 'localhost');
define('BBDD', 'dw2t_alexis_josue');
define('USUARIO', 'dw2t_alexis_josue');
define('CLAVE', '12345');
/**
 * Se podria trimear datos ejemplo nick,etc
 */

/*
Algunos usuarios:
Txati -> miclavesecreta
*/

function guardar_usuario($datos)
{
    if (!comprobar_nick($datos['nick'])) {
        print "<p>Nick no válido: $datos[nick]</p>";
        return false;
    }
    $mysqli = new mysqli(SERVIDOR, USUARIO, CLAVE, BBDD);

    $mysqli->set_charset('utf8');

    $datos['nombre'] = $mysqli->real_escape_string($datos['nombre']);
    $datos['ape1'] = $mysqli->real_escape_string($datos['ape1']);
    $datos['ape2'] = $mysqli->real_escape_string($datos['ape2']);
    $datos['nick'] = $mysqli->real_escape_string($datos['nick']);

    $datos['clave'] = password_hash($datos['clave'], PASSWORD_BCRYPT);
    $sql = "INSERT INTO `usuarios` (`id`, `nombre`, `ape1`, `ape2`, `nickname`, `contraseña`) VALUES (NULL, '$datos[nombre]', '$datos[ape1]', '$datos[ape2]', '$datos[nick]', '$datos[clave]');";

    if (!$mysqli->query($sql)) {
        print "<p>Error al insertar</p>";
        print "<p>$sql</p>";
    } else {
        print "<p>Insertado</p>\n";
    }
    $mysqli->close();
}

function comprobar_nick($nick)
{
    if (!preg_match('/^[a-z0-9]{3,10}$/i', $nick)) {
        return false;
    }
    /*
    Miro si ya existe ese nick en algún registro.
    Si lo encuentro devuelvo falso
    Podemos ahorrarnos el trabajo definiendo el campo como unique
    */
    return true;
}

function validar_login($datos)
{
    if (!preg_match('/^[a-z0-9]{3,10}$/i', $datos['nick'])) {
        return false;
    }
    /*
    Habrá que buscar en la tabla el usuario con nick $datos['nick']

    Si no existe, acceso denegado

    Si existe pero la password no coincide, acceso denegado
    */
    $mysqli = new mysqli(SERVIDOR, USUARIO, CLAVE, BBDD);

    $mysqli->set_charset('utf8');

    $sql = "SELECT `contraseña`  FROM `usuarios` WHERE `nickname` = ?;";

    $stmt = $mysqli->prepare($sql);

    $stmt->bind_param("s", $datos['nick']);

    $stmt->bind_result($clave);

    $stmt->execute();
    $stmt->store_result();
    print "<p>Lineas devueltas " . ($stmt->num_rows) . " </p>";
    /*      
            if($stmt->affected_rows != 1){//El usuario no existe
                return false;
            }
    */
    if ($stmt->num_rows == 0) {//El usuario no existe
        return false;
    }

    $stmt->bind_result($clave);

    print "<p>Antes del fetch Clave:$clave</p>\n";

    /*
    Salvo que la tabla esté corrupta, solamente hay un registro
    */
    $stmt->fetch();

    print "<p>Después del fetch Clave:$clave</p>\n";

    /*
    Si llegamos aquí hay un único registro con ese nick

    Comparamos la clave proporcionada por el usuario ($datos['clave']) con la encriptada sacada de la BBDD ($clave)
    y devuelvo ese valor
    */
    $mysqli->close();

    return password_verify($datos['pass'], $clave);
}
?>