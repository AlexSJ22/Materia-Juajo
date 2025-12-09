<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<!--
Utilizando los datos de deuda_codigos.php escribe lo necesario para que al acceder a este documento ocurra lo siguiente:
**************************************************************
Si entramos sin parámetros se nos muestra la deuda total de los ayuntamientos, la población total, la deuda por habitante y una tabla con esos mismos datos de las comunidades.

En la tabla, los nombres de las comunidades son enlaces a este mismo documento enviando en la propia URL ?com=XX
***************************************************************
Si entramos con un parámetro comunidad, nos muestra los habitantes, deuda total y deuda por habitante de esa comunidar y una tabla de provincias con datos análogos a los anteriores que enlacen a este mismo documento con ?prov=XX
**************************************************************
Si llegamos al documento con una provincia, nos presenta los datos de esa provincia y una tabla con los pueblos.
Los pueblos son a su vez enlaces y apuntan a una especie de ficha de pueblo que es lo que enseña este mismo documento cuando se llega con pueblo=XX (es posible que te haga falta enviar el código de provincia)
***************************************************************
Te puede facilitar algo las cosas llamar al programa con más datos:
principal.php
principal.php?com=XX
principal.php?com=XX&prov=XX
principal.php?com=XX&prov=XX&ayto=XX
Así no tienes que andar investigando a qué provincia o comunidad pertenece un ayuntamiento (podrías necesitarlo para la navegación)

***************************************************************
Deberias hacer al menos las siguientes funciones

tabla_total()
tabla_autonomia()
tabla_provincia()
deuda_provincia()
deuda_comunidad()
deuda_total()

Deberías pensar el tema de la navegación y escribir por ejemplo 
tres funciones como

navegacion_global()
navegacion_comunidad()
navegacion_provincia()
navegacion_pueblo()

Puedes optar por menús "normales" o breadcrumb
***************************************************************
MEJORAS

Hay nombres que contienen una coma como "Balears, Illes" o 'Palmas, Las'. Intenta que aparezcan como Illes Balears o Las Palmas.

Anda con ojo con las comunidades con más de un idioma 'Lorcha/Orxa, l\'' 'Pinós, el/Pinoso'

Haz un documento con una tabla que se enlace desde el principal y permita ver los 200 pueblos más endeudados o más endeudados por habitante.

Haz una tarta o similar que muestre cuánto de cada deuda le corresponde a cada comunidad o a cada provincia dentro de la comunidad
*******************************************************
Teniendo en cuenta que las tablas que hacemos son todas iguales, cambia en la cabecera, por ejemplo, comunidad por nombre y realiza funciones diferentes para calcular el array auxiliar que tenemos en cada una y para escribir la tabla.
Es decir
array_provincia()
array_comuinidad()
array_general()
escribir_tabla($dato,$caption)
-->
<html>

<head>
    <?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Deuda viva de los ayuntamientos</title>
    <link rel="stylesheet" href="deuda.css" type="text/css">
</head>

<body>
    <?php
    require_once 'funciones.php';
    /*
    principal.php
    principal.php?com=XX
    principal.php?com=XX&prov=XX
    principal.php?com=XX&prov=XX&ayto=XX
    */

    /*
    Empezamos por examinar el $_GET
    */
    /*
    Si tenemos comunidad
        Si tenemos provincia
            Si tenemos ayuntamiento
                Página del ayuntamiento $ayto en $prov en $com
            Si no 
                Página de la provincia $prov en $com
        Si no
           Página de comunidad $com
    Si no
       Página completa

    */


    if (isset($_GET['com'])) {
        if (isset($_GET['prov'])) {
            if (isset($_GET['ayto'])) {
                pagina_ayuntamiento($_GET['com'], $_GET['prov'], $_GET['ayto']);
            } else {
                pagina_provincia($_GET['com'], $_GET['prov']);
            }
        } else {
            pagina_comunidad($_GET['com']);
        }

    } else {
        pagina_principal();
    }





    
    /*if(!isset($_GET['com'])){//No hay comunidad
        pagina_principal();
    }else{//Tenemos comunidad
        if(!isset($_GET['prov'])){//No hay provincia
            pagina_comunidad($_GET['com']);
        }else{//Hay comunidad y provincia
            if(!isset($_GET['ayto'])){//No hay ayuntamiento
                pagina_provincia($_GET['com'],$_GET['prov']);
            }else{//Hay comunidad, provincia y ayuntamiento
                pagina_ayuntamiento($_GET['com'],$_GET['prov'],$_GET['ayto']);
            }
        }
    }*/
    
    ?>
    <img src="handcufmoney.jpg">
</body>

</html>