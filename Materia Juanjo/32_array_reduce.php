<!DOCTYPE html>
<html lang="es">
  <head>
    <?php
    ini_set('display_errors','On');
    error_reporting(E_ALL);
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array reduce</title>
    <!--
    <link rel="stylesheet" href="style.css">
    -->
  </head>
  <body>
    <?php
    $dato=range(10,100,5);
    print "<pre>".print_r($dato,true)."</pre>\n";   
    
    $resultado=array_reduce($dato,function($acumulado,$elemento){
        return $acumulado.", $elemento";
    });
    
    /* Reescribimos y le ponemos valor inicial cero*/
    
    $resultado=array_reduce($dato,
                            function($acumulado,$elemento){
                                        return $acumulado.", $elemento";
                                    },
                            0);
    
    print $resultado;
    
/*
Lista con los elementos del array
*/  
print "\n\n<ol>".array_reduce($dato,function($acumulado,$e){return $acumulado."\n\t<li>$e</li>";})."\n</ol>\n";

$misma_lista="<ol>";
foreach($dato as $d){
    $misma_lista.="<li>$d</li>";
}   
$misma_lista.="</ol>\n";
print $misma_lista;

/*
Ejemplo: Suma de los 100 primeros números
*/ 
function suma_de_dos($x,$y){
    return $x+$y; 
}

print "<p>Suma: ".array_reduce(range(1,100),'suma_de_dos',0)."</p>\n";
/*
Internamente está haciendo algo así

suma_de_dos(suma_de_dos(suma_de_dos(0,1),2),3)
*/
$suma=0;

foreach(range(1,100) as $n){
    $suma=suma_de_dos($suma,$n);
}

print "<p>Suma: $suma</p>";
/*
Los acumulados no son solamente números o cadenas.

Intenta lo siguiente:

Partiendo del valor inicial_

array(
    'hombres'=> 0,
    'mujeres'=> 0,
    'superficie'=> 0
  );
  
y usando los datos de provincias_densidad.php, haz un reduce para calcular el total de hombres, mujeres y Kilómetros cuadrados de todas las provincias.
En el mismo array, mete el total de habitantes y la densidad del conjunto.
*/
require_once 'datos/provincias_densidad.php';
$inicio=array(
    'hombres'=> 0,
    'mujeres'=> 0,
    'superficie'=> 0
  );

$totales=array_reduce($prov,'sumar_provincia',$inicio);
print "<pre>".print_r($totales,true)."</pre>\n";
/*
function sumar_provincia($calculado,$nueva){
    $calculado['hombres']+=$nueva['hombres'];
    $calculado['mujeres']+=$nueva['mujeres'];
    $calculado['superficie']+=$nueva['superficie'];
    return $calculado;
    
}
*/
function sumar_provincia($calculado,$nueva){
    $devolver['hombres']=$calculado['hombres']+$nueva['hombres'];
    $devolver['mujeres']=$calculado['mujeres']+$nueva['mujeres'];
    $devolver['superficie']=$calculado['superficie']+$nueva['superficie'];
    return $devolver;
}

function tabla_de_provincias(){
    global $prov;
    print "<ol>\n"; 
    foreach($prov as $p){
        print "<li>$p[nombre]</li>\n";
    }
    print "</ol>\n"; 
}

tabla_de_provincias();

    ?>
  </body>
</html>