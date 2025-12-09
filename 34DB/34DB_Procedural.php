<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso a BBDD desde PHP. Procedural</title>
    <!--
    <link rel="stylesheet" href="style.css">
    -->
    <style>
        * {
            background-color: black;
            color: white;
        }
    </style>
</head>
<!--
Cuando queremos usar alguna de las extensiones de PHP para
 BBDD la primera opción a tomar es si nuestro programa 
 servirá sólo para un SGDB (por ejemplo, ORACLE) o bien 
 trabajamos con una "extensión abstracta".


Lo segundo quiere decir que usamos funciones genéricas
 comunmente asociadas a un objeto. En el constructor 
 decimos cuál es el SGDB que usamos.
VENTAJA:Podemos trabajar con cualquier SGBD sin conocer su
 propio interfaz. Esto facilita migraciones a otro SGBD y
 también cambios de personal.
DESVENTAJA: El añadir una capa más resta eficiencia a la 
herramienta.

La otra alternativa es usar un interfaz propio para cada SGBD
Nosotros usaremos MySQLi donde i viene de improved, mejorado
-->

<body>
    <?php
    define('SERVIDOR', 'localhost');
    define('BBDD', 'olimpiadas');
    define('USUARIO', 'root');
    define('CLAVE', '');
    /*$conexion = mysqli_connect(SERVIDOR, BBDD, USUARIO, CLAVE) or die;
    if (!$conexion) {
        print ("<p>No hay conexion </p>");
        print ("<p>Error " . mysqli_connect_errno() . " : " . mysqli_connect_errno() . "</p>");
        die("Abortamos la mision");
    }*/
    $conexion = mysqli_connect(SERVIDOR, USUARIO, CLAVE, BBDD) or die("
    <p>Error de conexion Error" . mysqli_connect_errno() . " : " . mysqli_connect_error() . "</p>");
    /**
     * Fijamos los charset en el que queremos recibir los datos
     */
    mysqli_set_charset($conexion, "utf8");
    /**
     * Definimos la query
     */
    $sql = 'SELECT * FROM `deportes` ORDER BY `deportes`.`nombre` ASC;';
    /***
     * Mandamos la query al servidor
     */
    $resultado = mysqli_query($conexion, $sql) or die("
    <p>Error de conexion" . mysqli_connect_errno() . " : " . mysqli_connect_error() . "</p>");
    print ("<p>Query realizada con exito</p>");
    print ("<p>Tenemos " . mysqli_num_rows($resultado) . "</p>");
    /**
     * Hay varias formas de obtener datos
     */
    $dato = mysqli_fetch_row($resultado);
    print ("<pre>" . print_r($dato, true) . "</pre>");
    /**
     * La siguiente llamada saca el siguiente registro
     */
    $dato = mysqli_fetch_row($resultado);
    print ("<pre>" . print_r($dato, true) . "</pre>");
    $dato = mysqli_fetch_assoc($resultado);
    print ("<pre>" . print_r($dato, true) . "</pre>");

    /**
     * Tercera forma
     */
    $dato = mysqli_fetch_assoc($resultado);
    print ("<pre>" . print_r($dato, true) . "</pre>");
    $dato = mysqli_fetch_array($resultado);
    print ("<pre>" . print_r($dato, true) . "</pre>");

    //Volvemos al inicio como si acabmos de hacer el mysqli_query
    mysqli_data_seek($resultado, 0);
    $dato = mysqli_fetch_assoc($resultado);
    print ("<pre>" . print_r($dato, true) . "</pre>");
    /**
     * Empieza a contar por el registro 0
     */
    //Vamos al registro 10
    mysqli_data_seek($resultado, 10);
    $dato = mysqli_fetch_row($resultado);
    print ("<p>Registro numero 10</p>");
    print ("<pre>" . print_r($dato, true) . "</pre>");
    /**
     * En una situacion normal, empezamos desde cero 
     */
    mysqli_data_seek($resultado, 0);
    //<li> aguas abiertas (ow)</li>
    print ("<ol>");
    while ($fila = mysqli_fetch_row($resultado)) {
        print ("<li>$fila[1] ($fila[0])</li>");
    }
    print ("</ol>");
    /**
     * Version con el array asociativo
     */
    mysqli_data_seek($resultado, 0);
    //<li> aguas abiertas (ow)</li>
    print ("<ol>");
    while ($fila = mysqli_fetch_assoc($resultado)) {
        print ("<li>$fila[nombre] ($fila[codigo])</li>");
    }
    print ("</ol>");
    /**
     * Podemos extrae todos los registros a la vez
     */
    mysqli_data_seek($resultado, 0);
    $todo = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    print ("<pre>" . print_r($todo, true) . "</pre>");
    print ("<pre>" . json_encode($todo, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "</pre>");
    ?>
</body>

</html>