<!DOCTYPE html>
<html lang="es">
  <head>
    <?php
    ini_set('display_errors','On');
    error_reporting(E_ALL);
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays en PHP</title>
    <!--
    <link rel="stylesheet" href="style.css">
    -->
  </head>
  <body>
    <?php
    /*
    Un array en PHP se puede inicializar directamente con la palabra reservada array.
    */
    
    $fruta=array('pera','manzana','plátano');
    // $fruta=['pera','manzana','plátano'];
    // print "<pre>\n";
    // print_r($fruta);
    // print "</pre>\n";
    
    print "<pre>".print_r($fruta,true)."</pre>\n";
    
    /* Otra posibilidad es ir asignando elemento a elemento */
    
    $postre[0]="Helado";
    $postre[1]='Tiramisú';
    
    print "<pre>\$postre: ".print_r($postre,true)."</pre>\n";
    
    $postre[]='Melón';
    
    print "<pre>\$postre: ".print_r($postre,true)."</pre>\n";
    
    $postre[5]='Tarta';
    
    print "<pre>\$postre: ".print_r($postre,true)."</pre>\n";
    
    $postre[4]='Cuajada';

    print "<pre>\$postre: ".print_r($postre,true)."</pre>\n";
    
    $postre[]="Natillas";

    print "<pre>\$postre: ".print_r($postre,true)."</pre>\n";
    
    /*
    Si tenemos un array "bien hecho", se recorre bastante bien
    */
    for($i=0;$i<count($fruta);$i++){
        print "<p>\$fruta[$i]=$fruta[$i]</p>\n";
    }
    /*
    MÁS FEO Y SUPUESTAMENTE MÁS EFICIENTE
    MEJOR NO USAR. SE LEE PEOR
    
    for($i=0,$l=count($fruta);$i<$l;$i++){
        print "<p>\$fruta[$i]=$fruta[$i]</p>\n";
    }
    
    */
    /*
    Si el array tiene huecos, el método falla
    */
    
    for($i=0;$i<count($postre);$i++){
        @print "<p>\$postre[$i]=$postre[$i]</p>\n";
}

    print "<p>Versión con foreach</p>\n";
/*  
    foreach($postre as $clave => $valor){
        print "<p>\$postre[$clave]=$valor</p>\n";
    }
*/  
    foreach($postre as $clave => $valor){
        print "<p>\$postre[$clave]=$postre[$clave]</p>\n";
    }
    
    print "<p>Foreach solo de valores</p>\n";
    foreach($postre as $plato){
        print "<p>$plato</p>\n";
    }
/*
INTENTO FALLIDO DE CAMBIAR LOS DATOS USANDO LA VARIABLE VALOR
*/
print "<pre>\$postre: ".print_r($postre,true)."</pre>\n";
foreach($postre as $clave => $valor){
    $valor="Aguacate";
    print "<p>\$postre[$clave]=$valor</p>\n";
}
print "<pre>\$postre: ".print_r($postre,true)."</pre>\n";
/*
INTENTO EXITOSO DE MODIFICAR LOS DATOS CON LA CLAVE
*/
foreach($postre as $clave => $valor){
    $postre[$clave]='Aguacate';
    print "<p>\$postre[$clave]=$valor</p>\n";
}
print "<pre>\$postre: ".print_r($postre,true)."</pre>\n";

/*
Lo normal es que al recorrer el array en un foreach se manejen copias de las claves y los valores
pero podemos usar REFERENCIAS. No copiamos el dato sino que tenemos acceso directamente a él
*/
foreach($postre as $clave => &$valor){
    $valor="Patatas";
}
print "<pre>\$postre: ".print_r($postre,true)."</pre>\n";

foreach($postre as &$valor){
    $valor="Yogur";
}
print "<pre>\$postre: ".print_r($postre,true)."</pre>\n";
    ?>
  </body>
</html>