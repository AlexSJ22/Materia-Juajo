<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso a BBDD desde PHP. Procedural</title>
    <!--
    <link rel="stylesheet" href="style.css">
    -->
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
    /*
    En general, trabajamos primero en local y loego lo subimos al servidor.
    */
    /*
    Habitualmente en local tenemos:

        define('SERVIDOR','localhost');
        define('BBDD','olimpiadas');
        define('USUARIO','root');
        define('CLAVE','');

    */
    /*
    En el servidor tenemos: (usuario dw2t_luisito)

        define('SERVIDOR','localhost');
        define('BBDD','dw2t_luisito');
        define('USUARIO','dw2t_luisito');
        define('CLAVE','12345');

    */
    /*
    Nos conectamos (o no)
    */
    define('SERVIDOR', 'localhost');
    define('BBDD', 'olimpiadas');
    define('USUARIO', 'juanjo');
    define('CLAVE', '12345');
    /*
        $conexion=mysqli_connect(SERVIDOR,USUARIO,CLAVE,BBDD);

        if(!$conexion){
            print "<p>Algo ha ido mal</p>\n";
            print "<p>Error ".mysqli_connect_errno()."</p>\n";
            print "<p>Error ".mysqli_connect_error()."</p>\n";
            die("Abortamos la misión");
        }
    */
    @$conexion = mysqli_connect(SERVIDOR, USUARIO, CLAVE, BBDD) OR die("<p>Error de conexión. Error " . mysqli_connect_errno() . ": " . mysqli_connect_error() . "</p>");

    // Si llega hasta aquí, estamos conectados
    
    /*
    FIJAMOS EL CHARSET EN EL QUEREMOS RECIBIR LOS DATOS
    */
    mysqli_set_charset($conexion, 'utf8');

    /*
        Ya podemos definir una query
    */
    /*
    SUPONGO QUE ME LLEGAN DATOS EN UN FORMULARO
    $mod='at5'
    SOY UN INGENUO Y USO EL DATO TAL Y COMO ESTÁ
    ME MEREZCO LO QUE ME PASE
    */
    $mod = 'at5';
    $sql = "SELECT `metal`,`ganador`,`paises`.nombre as `nom_pais`  FROM `medallas` LEFT JOIN 
`paises` ON `medallas`.`pais` = `paises`.`codigo` WHERE `modalidad` = '$mod'  ";
    /*
        Mandamos la query al servidor
    */
    $resultado = mysqli_query($conexion, $sql) OR die("<p>Error " . mysqli_errno($conexion) . ":" . mysqli_error($conexion) . "</p>");


    mysqli_data_seek($resultado, 0);
    print "<ol>\n";
    while ($fila = mysqli_fetch_assoc($resultado)) {//Mientras queden datos
        print "<li>$fila[ganador] ($fila[nom_pais]) &rarr; $fila[nom_pais] </li>\n";
    }
    print "</ol>\n";

    ?>
</body>

</html>