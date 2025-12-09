<!DOCTYPE html>
<html lang="es">
  <head>
    <?php
    ini_set('display_errors','On');
    error_reporting(E_ALL);
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones y parámetros</title>
    <!--
    <link rel="stylesheet" href="style.css">
    -->
  </head>
  <body>
    <?php
/*
A veces las funciones reciben parámetros
Son valores que se les pasan.
Por ejemplo
*/
function sumar_uno($dato){
    $dato++;
    print "<p>sumar_uno: El dato vale $dato</p>\n";
}

$valor=12;

sumar_uno($valor);

print "<p>El dato original vale $valor</p>\n";

sumar_uno(8+5);

sumar_uno($valor+5);
/*
Antes de hacer la llamada, se resuelve la expresión y se copia el resultado en el parámetro/variable $dato de la función.

A esto se le llama "PASO POR VALOR"
*/

/*
Hay otra forma de pasar los datos.
En vez de copiar el dato "se comparte la variable" con la función.
Si modificamos la variable en la función, se modifica el original.
A esto lo llamamos "PASO POR REFERENCIA".
*/

function sumar_uno_ref(&$dato){
    $dato++;
    print "<p>sumar_uno: El dato vale $dato</p>\n";
}

$numerito=7;
print "<p>Antes de la llamada \$numerito: $numerito</p>\n";
sumar_uno_ref($numerito);
print "<p>Al terminar la función \$numerito: $numerito</p>\n";

// sumar_uno_ref(12);
// sumar_uno_ref($numerito+12);

/*
VALORES POR DEFECTO
*/
function saludar_opcional($mensaje="Ojo que viene galerna",$color="navy"){
    print "<p style=\"color:$color;\">$mensaje</p>\n";
}
saludar_opcional();

saludar_opcional("Ya es de noche");

saludar_opcional("Ya es de noche","red");
?>
  </body>
</html>