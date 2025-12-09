<!DOCTYPE html>
<!--
Escribe una tabla de doble entrada:;
 La primera columa contiene 0, 10, 20,....250
 La primera fila contiene 0, 1, 2,   9
 La celda que tiene en la primera fila un 8 y en la primera columna un 100 contiene 108 
 
 Cuando funcione sustituye el valor de cada celda por el valor ANSI correspondiente. Se supone que debes mostrar el ANSI europeo occidental.
 
 Puedes hacer una versión con el charset en utf-8 y el otro en iso-8859-1
 
 Funciones interesantes
 
 chr
 mb_chr
 htmlentities Tiene varios parámetros
 iconv
 
-->
<html lang="es">
  <head>
    <?php
    ini_set('display_errors','On');
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
    print "<table>\n";
    
    /*
    INICIO CABECERA
    */
    print "\t<tr>";
    print "<th></th>";
    for($i=0;$i<10;$i++){
        print "<th>$i</th>";
    }
    print "</tr>\n";
    /*
    FIN CABECERA
    */  

    for($i=0;$i<26;$i++){//Cada iteración escribe una fila
        print "<tr>\n";
        print "\t<th>".(10*$i)."</th>\n";   
        for($j=0;$j<10;$j++){//Una celda en cada iteración
            $dato=10*$i+$j;
            //Si no está en rango, pongo un cero
            $dato=(($dato<32)||($dato>255))?"0":$dato;
           //Si está entre 128 y 160 están libres, Lo quito
            $dato=($dato>127 && $dato<161)?"0":$dato;
            print "<td>$dato</td>";
        }
        print "\n</tr>\n";  
    }   
    
    print "</table>\n";
    ?>
  </body>
</html>
  </body>
</html>