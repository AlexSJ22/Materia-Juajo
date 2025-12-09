<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<!--
En el ejercicio del calendario cambia tantos bucles como puedas por implodes.
Puedes usar las funciones de array que consideres oportunas 
para prepararte el array de datos a partir de las 

funciones de fecha

1.-Si el mes tiene 30 días, te preparas el array range(1,30)
2.-Si empieza en miércoles le pones delante otros dos elementos que contengan " ". En pruebas, mejor "H"
3.-Si acaba en martes, le pones detrás 5 elementos
4.-Manipulas el array para que sea un array doble con filas de 7 elementos
Le pones como primer elemento el array "lun" "mar" "mie".
5.-Cambias cada fila de 7 elementos por una fila de tabla html (implode)
6.-Pegas las filas con otro implode para obtener la tabla
-->
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <?php
    ini_set('display_errors','On');
    error_reporting(E_ALL);
    ?>
    <?php
    /*
    Por ejemplo. Hagamos octubre de 2025
    31 días. empieza en miércoles y acaba en viernes
    
    1.-Si el mes tiene 30 días, te preparas el array range(1,30)
    */
    $dato=range(1,31);
    print "<pre>".print_r($dato,true)."</pre>\n";
    /*
    2.-Si empieza en miércoles le pones delante otros dos elementos que contengan " ". En pruebas, mejor "H"
    */
    print "<pre>".print_r(array_fill(15,2,'D'),true)."</pre>\n";
    $dato=array_merge(array_fill(15,2,'D'),$dato);
    print "<pre>".print_r($dato,true)."</pre>\n";
        
    /*
    3.-Si acaba en martes, le pones detrás 5 elementos.
    TOMA RESTO MÓDULO 7 Y PIENSA
    En este caso, le pongo detrás 2
    */
    $dato=array_merge($dato,array_fill(0,2,'D'));
    print "<pre>".print_r($dato,true)."</pre>\n";
    /*
    4.-Manipulas el array para que sea un array doble con filas de 7 elementos
    Le pones como primer elemento el array "lun" "mar" "mie".
    */
    $dato=array_chunk($dato,7);
    print "<pre>".print_r($dato,true)."</pre>\n";
    array_unshift($dato,array('Lun','Mar','Mier','Jue','Vie','Sab','Dom'));
    print "<pre>".print_r($dato,true)."</pre>\n";
    /*
    5.-Cambias cada fila de 7 elementos por una fila de tabla html (implode)
    */
    foreach($dato as &$semana){
        $semana='<td>'.implode('</td><td>',$semana).'<td>';
    }
    print "<pre>".print_r($dato,true)."</pre>\n";
    /*
    6.-Pegas las filas con otro implode para obtener la tabla
    */
    $dato='<table><tr>'.implode('</tr><tr>',$dato).'</tr></table>';
    print $dato;
    ?>
    </body>
</html>