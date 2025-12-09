<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones en PHP</title>
    <!--
    <link rel="stylesheet" href="style.css">
    -->
</head>

<body>
    <?php
    /*
    Una función es un bloque de código que puede ser utilizado más de una vez a lo largo de un programa o incluso en varios programas
    */

    function saludar()
    {
        print "<>Un saludo</   p>\n";
    }
    saludar();
    /*
    Comparemos el "símbolo" saludar con el correspondiente a una variable
    */
    $dato = "alumno";

    print "<p>La variable \$dato vale $dato</p>\n";
    /*
    Podemos modificar el valo y hasta el "tipo"
    */
    $dato = 15;

    print "<p>La variable \$dato vale $dato</p>\n";

    $dato = array();

    /*print "<p>La variable \$dato vale $dato</p>\n";*/
    /*
        function saludar()
        {
            print "<p>Un saludo diferente</p>\n";
        }
        Esto da un error faltal del tipo cannot redeclare */
    /*No podemos modificar un funcion ya definida */
    /*Si intentamos usar una variable que no tenemos declarada nos da un warning pero realiza las sentencias correspondientes con un valor
    nulo de la variable */
    print ("<p>Bienvenido $alumno</p>");
    /*
    Si intentamos llamar a un funcion no definida
    buen_dia();
    */

    buenas_tardes();
    function buenas_tardes()
    {
        print ("<p>Buenas tardes</p>");
    }
    /*
    Con las variables no pasa lo ismo
    Mas arriba usamos la variable alumno sin definirla antes
    PHP no baja hasta aqui para ver si alumno vale 'Pepe', se queda con el null
    Sin embargo al poner
    buenas_tardes();
    PHP sigue letendo el fichero buscando la definicion de la funciones
    Este es el motivo por el que no permite redefinir funciones
    */
    $alumno = "Pepe";
    ?>
</body>

</html>