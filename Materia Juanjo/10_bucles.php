<!DOCTYPE html>
<html lang="es">
  <head>
    <?php
    ini_set('display_errors','On');
    error_reporting(E_ALL);
    ?>
    <meta charset="UTF-8">
    <title>Bucles en PHP</title>
  </head>
  <body>
<?php
/*
En PHP tenemos las estructuras de programación habituales 
Estructura repetitiva...for, while, do while...
Estructuras alternativas...if, if else
Estructura alternativa múltiple...switch   
*/
/*
Ejemplo de bucle (una lista)
*/

print "<p>La variable \$i vale $i</p>\n";


print "<ul>\n";
for($i=0;$i<10;$i++){
    print "\t<li>$i</li>\n";
}
print "</ul>\n";
print "<p>Al terminar el bucle, la variable \$i vale $i</p>\n";
$i="ELORRIETA";
print "<p>La variable \$i vale $i</p>\n";

/*
Un bucle for es una estructura de programación formada por tres expresiones separadas por ;

La primera se realiza una sola vez antes de entrar al bucle.
Podemos pensar que realiza labores de inicialización del bucle.
Si queremos que contenga más de una expresión, el separador a utilizar es la coma.

La segunda parte es la condición de reentrada. Determina si se vuelve a entrar al bucle, es decir, si se realiza una nueva iteración. Es posible que nunca se cumpla y nunca entre al bucle

La tercera se ejecuta al final de cada iteración y suele afectar a la condición de ruptura / de salida 

for(;;){}   BUCLE INFINITO
while(true) BUCLE INFINITO

*/
/*
Hay dos sentencias que interrumpen el flujo natural de un bucle

break.....Sale inmediatamente del bucle sin terminar la iteración en curso
continue..Interrumpe la iteración actual y, si la condición es cierta, continúa con la siguiente iteración desde el principio 
*/
print "<ul>\n";
for($i=12;$i<15;$i+=2){
    print "\t<li>$i</li>\n";
}
print "</ul>\n";

?>
  </body>
</html>