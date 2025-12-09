<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Has olvidado el título</title>
    <!--
    <link rel="stylesheet" href="style.css">
    -->
</head>

<body>
    <?php
    require_once 'datos/alumnos.php';
    require_once 'datos/capitales.php';
    // print "<pre>".print_r($capital,true)."</pre>\n";
    // sort($capital);
    // print "<pre>".print_r($capital,true)."</pre>\n";
    // rsort($capital);
    // print "<pre>".print_r($capital,true)."</pre>\n"; 
    // asort($capital);
    // print "<pre>".print_r($capital,true)."</pre>\n";
    // arsort($capital);
    // print "<pre>".print_r($capital,true)."</pre>\n";
    // ksort($capital);
    // print "<pre>".print_r($capital,true)."</pre>\n";
    // krsort($capital);
    // print "<pre>".print_r($capital,true)."</pre>\n";
    
    /*
    Trasteamos un poco con funciones de ordenación/comparación de cadenas strcmp
    */

    $cadena1 = "A";
    $cadena2 = "Z";
    print "<p>strcmp(\"$cadena1\",\"$cadena2\"): " . strcmp($cadena1, $cadena2) . "</p>";

    $cadena1 = "A";
    $cadena2 = "B";
    print "<p>strcmp(\"$cadena1\",\"$cadena2\"): " . strcmp($cadena1, $cadena2) . "</p>";

    $cadena1 = "C";
    $cadena2 = "A";
    print "<p>strcmp(\"$cadena1\",\"$cadena2\"): " . strcmp($cadena1, $cadena2) . "</p>";

    $cadena1 = "F";
    $cadena2 = "F";
    print "<p>strcmp(\"$cadena1\",\"$cadena2\"): " . strcmp($cadena1, $cadena2) . "</p>";

    $cadena1 = "HOLA";
    $cadena2 = "HOLA";
    print "<p>strcmp(\"$cadena1\",\"$cadena2\"): " . strcmp($cadena1, $cadena2) . "</p>";

    $cadena1 = "HOLA";
    $cadena2 = "Hola";
    print "<p>strcmp(\"$cadena1\",\"$cadena2\"): " . strcmp($cadena1, $cadena2) . "</p>";

    /*
    PODEMOS COMPARAR IGNORANDO MAYÚSCULAS Y MINÚSCULAS strcasecmp
    */
    $cadena1 = "HOLA";
    $cadena2 = "Hola";
    print "<p>strcasecmp(\"$cadena1\",\"$cadena2\"): " . strcasecmp($cadena1, $cadena2) . "</p>";

    $cadena1 = "A";
    $cadena2 = "a";
    print "<p>strcasecmp(\"$cadena1\",\"$cadena2\"): " . strcasecmp($cadena1, $cadena2) . "</p>";

    $cadena1 = "A";
    $cadena2 = "Á";
    print "<p>strcasecmp(\"$cadena1\",\"$cadena2\"): " . strcasecmp($cadena1, $cadena2) . "</p>";
    /*
   Podemos usar el comparador basado en locale strcoll
   */
    setlocale(LC_ALL, 'spanish_Spain.utf8', 'es_ES.utf8', 'es-ES.utf8');

    $cadena1 = "A";
    $cadena2 = "Á";
    print "<p>strcoll(\"$cadena1\",\"$cadena2\"): " . strcoll($cadena1, $cadena2) . "</p>";

    $cadena1 = "Á";
    $cadena2 = "A";
    print "<p>strcoll(\"$cadena1\",\"$cadena2\"): " . strcoll($cadena1, $cadena2) . "</p>";
    /*  
        Se suelen usar este tipo de funciones para logins porque son lo que se llama binary safe

        Supongamos que recibimos una contraseña en $clave

        Tenemos almacenada la cadena 'clavesecreta'

        strcmp($clave,'clavesecreta') puede valer:

            negativo si $clave es alfabéticamente anterior a 'clavesecreta'
            positivo si $clave es alfabéticamente posterior a 'clavesecreta'
            cero si son iguales (ACCESS GRANTED)

        En PHP no hay tipos y los enteros nos vales de booleanos.
        Cualquier número es cierto excepto cero, que es falso.

        Tenemos que permitir acceso cuando strcmp($clave,'clavesecreta') sea falso
    */
    if (!strcmp($clave, 'clavesecreta')) {
        print "<p>Bienvenido</p>\n";
    } else {
        print "<p>Acceso denegado</p>\n";
    }
    // OPERADOR SPACESHIP
// En el caso de los números, realiza el mismo papel que strcmp o similar  
    
    $n1 = 5;
    $n2 = 8;
    print "<p>$n1<=>$n2:" . ($n1 <=> $n2) . "</p>\n";

    $n1 = 12;
    $n2 = 8;
    print "<p>$n1<=>$n2:" . ($n1 <=> $n2) . "</p>\n";

    $n1 = 7;
    $n2 = 7;
    print "<p>$n1<=>$n2:" . ($n1 <=> $n2) . "</p>\n";

    /*
    Preparamos la función que ordenará los alumnos
    */
    print "<pre>\$clase: " . print_r($clase, true) . "</pre>\n";

    function alumnos_por_apellido($a, $b)
    {
        if (strcoll($a['ape1'], $b['ape1'])) {//Si los apellidos primeros son distintos
            //Ordenamos por primer apellidos
            return strcoll($a['ape1'], $b['ape1']);
        }
        //Si el programa llega aquí, el primer apellido era igual
        // Lo anterior está bien pero es muy feo
        // Estamos llamando a la función de comparación dos veces
        // En algunos contextos podría consumis demasiados recursos
        //Comparamos por segundo apellido
        if ($comparar = strcoll($a['ape2'], $b['ape2'])) {
            return $comparar;
        }
        //Si llega hasta aquí, los dos apellidos coinciden
        //Comparamos por el nombre
        return strcoll($a['nombre'], $b['nombre']);
    }

    $clase[] = array(
        'nombre' => 'Álvaro',
        'ape1' => 'Álvarez',
        'ape2' => 'Alvarez',
        'cuenta' => 'dw2t_alvaro'
    );

    $clase[] = array(
        'nombre' => 'Úrsula',
        'ape1' => 'Úrsulez',
        'ape2' => 'Úrsulez',
        'cuenta' => 'dw2t_ursula'
    );

    setlocale(LC_ALL, 'spanish_Spain.utf8', 'es_ES.utf8', 'es-ES.utf8');

    usort($clase, "alumnos_por_apellido");

    print "<pre>\$clase: " . print_r($clase, true) . "</pre>\n";
    ?>
</body>

</html>