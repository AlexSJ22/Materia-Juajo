<!DOCTYPE html>
<html lang="es">
  <head>
    <?php
    ini_set('display_errors','On');
    error_reporting(E_ALL);
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array map</title>
    <!--
    <link rel="stylesheet" href="style.css">
    -->
  </head>
  <body>
    <?php
    require_once "datos/capitales.php";
    require_once "datos/alumnos.php";
    // print "<pre>".print_r($alumnos,true)."</pre>\n";
    $resultado=array_map('mb_strtoupper',$alumnos);
    print "<pre>".print_r($resultado,true)."</pre>\n";
    /*
    Podemos hacer nosotros una función
    */
    
    function cubo($n){
        return $n*$n*$n;
    }
    
    // print "<pre>".print_r(array_map('cubo',range(1,20)),true)."</pre>\n";
    
    print "<pre>".print_r(
                    array_map(
                        'cubo',
                        range(1,20))
                    ,true)."</pre>\n";
                    
    $dato=range(1,20);
    $dato=array_map('cubo',$dato);  
    print "<pre>".print_r($dato,true)."</pre>\n";   

    /*
    Podemos definir la función de forma anónima
    */  
    
    $dato=array_map(function($n){return $n*$n;},range(1,2));
    
    print "<pre>".print_r($dato,true)."</pre>\n";
    
    
/*
En al caso de los arrays asociativos....
*/

print "<pre>".print_r(array_map('mb_strtoupper',$capital),true)."</pre>\n";

/*
Uso de array_map con varios arrays
*/

function suma($a,$b){
    return $a+$b;
}

$suma=array_map('suma',range(1,20),range(1,200,10));
print "<pre>".print_r($suma,true)."</pre>\n";

/*
Tabla de capitales sin bucles
*/
function fila($p,$c){
    return "<tr><td>$p</td><td>$c</td></tr>";
}
$las_filas=array_map('fila',array_keys($capital),$capital);

// print "<pre>".print_r($las_filas,true)."</pre>\n";
print "<pre>".print_r(array_map('htmlentities',$las_filas),true)."</pre>\n";
print "<pre>".htmlentities(print_r($las_filas,true))."</pre>\n";
print "<table>\n\t".implode("\n\t",$las_filas)."\n</table>\n";

/*
Pon todo lo anterior en una única expresión, incluyendo que la función sea anónima.
INDENTA para que se pueda leer
*/
/*
MODIFICA LA TABLA DE CAPITALES QUITANDO LOS TR DE LA FUNCIÓN. 
ORGANIZA LAS FILAS EN GRUPOS DE TRES PAREJAS ANTES DE HACER LA TABLA
Mira la función array_chunk
*/
    ?>
  </body>
</html>