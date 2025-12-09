<!DOCTYPE html>
<html lang="es">
  <head>
    <?php
    ini_set('display_errors','On');
    error_reporting(E_ALL);
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordenación de arrays</title>
    <!--
    <link rel="stylesheet" href="style.css">
    -->
  </head>
  <body>
    <?php
    require_once 'datos/alumnos.php';
    require_once 'datos/provincias.php';
    // print "<pre>\$cuentas: ".print_r($cuentas,true)."</pre>\n";
    // print "<pre>\$alumnos: ".print_r($alumnos,true)."</pre>\n";
    // print "<pre>\$usuario: ".print_r($usuario,true)."</pre>\n";
    // print "<pre>\$clase: ".print_r($clase,true)."</pre>\n";
    // print "<pre>\$provincia: ".print_r($provincia,true)."</pre>\n";
    
    // sort($cuentas);
    
    // print "<pre>\$cuentas: ".print_r($cuentas,true)."</pre>\n";
    
    // sort($provincia);
    
    setlocale(LC_ALL,'spanish_Spain.utf8','es_ES.utf8');
    
    // sort($provincia,SORT_LOCALE_STRING);
    
    // print "<pre>\$provincia: ".print_r($provincia,true)."</pre>\n";
    
    $usuario['dw2t_alvaro']="Álvaro Álvarez";
    $usuario['dw2t_ursula']="Úrsula Úrsulez"; 
    
    // print "<pre>\$usuario: ".print_r($usuario,true)."</pre>\n";
    
    // sort($usuario);
    // sort($usuario,SORT_LOCALE_STRING);
    // print "<pre>\$usuario: ".print_r($usuario,true)."</pre>\n";
    
    /*
    HAY DOS FORMAS DE RESPETAR LA ASOCIACION CLAVE -> VALOR
    
    -Ordenar por claves
    -Ordenar por valores    
    */
    // ksort($provincia,SORT_NUMERIC);
    // ksort($provincia,SORT_STRING);
    // ksort($provincia);
    
    
    asort($provincia,SORT_LOCALE_STRING);
    
    print "<pre>\$provincia: ".print_r($provincia,true)."</pre>\n";
    ?>
  </body>
</html>