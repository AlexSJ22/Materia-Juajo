<?php
/**
 * En local
 */
/*define('SERVIDOR', 'localhost');
define('BBDD', 'organizacion');
define('USUARIO', 'root');
define('CLAVE', '');*/
/**
 * Cuando lo suvo al servidor dw2t_alex
 */
define('SERVIDOR', 'localhost');
define('BBDD', 'dw2t_alexis_josue');
define('USUARIO', 'dw2t_alexis_josue');
define('CLAVE', '12345');

$mysqli = new mysqli(SERVIDOR, USUARIO, CLAVE, BBDD);

$mysqli->set_charset('utf8');


$sql = "INSERT INTO `usuarios` (`nombre`, `primer apellido`, `segundo apellido`, `nickname`, `contraseña`) VALUES (?,?,?,?,?);";


$stmt = $mysqli->prepare($sql);

$contraseña = password_hash($_POST["contra"], PASSWORD_DEFAULT);

$stmt->bind_param("sssss", $_POST["nombre"], $_POST["ape1"], $_POST["ape2"], $_POST["nickname"], $contraseña);


if ($stmt->execute()) {
    echo "<p>Usuario insertado correctamente con ID: " . $stmt->insert_id . "</p>";
} else {
    echo "<p>Error: " . $stmt->error . "</p>";
}


if ($mysqli !== null && !$mysqli->connect_error) {
    $mysqli->close();
}
?>