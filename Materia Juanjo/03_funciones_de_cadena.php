<!DOCTYPE html>
<!--
Visita la sección de funciones de cadena en PHP.net y enreda con las posibilidades que tienes. 

Debes usar necesariamente las que aparecen a continuación.

Ten en cuenta que hay otra familia de funciones, la multibyte, como mb_strlen


    chr
    ord
    
    htmlentities
    html_entity_decode
    htmlspecialchars_decode
    htmlspecialchars
    
    strtolower
    strtoupper
    ucfirst
    ucwords
    lcfirst
    
    rtrim/ltrim/trim
    str_pad
    
    3 -> 11 -> 0000000000000011
    
    number_format

    strcmp
    strcasecmp
    strncmp
    strncasecmp
    strcoll
    
    strpos
    stripos

    strip_tags
    stripcslashes
    stripslashes
    
    strlen
    
    str_repeat
    str_replace
    str_ireplace
    str_shuffle
    str_word_count
    strchr
    
    md5 
    
    str_rot13
/************************************************** 
Preguntas interesantes:

¿Qué pasa con las funciones de cadena en ANSI?
¿Y en UTF-8?
¿Qué falla al hacer strtoupper("camión")?
Arréglalo
**************************************************/
-->
<html lang="es">
  <head>
    <?php
    ini_set('display_errors','On');
    error_reporting(E_ALL);
    ?>
    <meta charset="UTF-8">
    <title>Funciones de cadena en PHP</title>
  </head>
  <body>
  <h1>Funciones de cadena en PHP</h1>
  <h2>chr</h2>
<?php
    $numero=64;
    print "<p>chr($numero): ".chr($numero)."</p>\n";
    $numero=0x5B;
    print "<p>chr($numero): ".chr($numero)."</p>\n";
    $numero=065;
    print "<p>chr($numero): ".chr($numero)."</p>\n";
    
    $numero=65;
    print "<p>chr($numero)=".chr($numero)."</p>\n";
    $numero=48;
    print "<p>chr($numero)=".chr($numero)."</p>\n";
?>
  </body>
</html>