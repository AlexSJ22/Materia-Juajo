
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Has olvidado el título</title>
    <!--
    <link rel="stylesheet" href="style.css">
    -->
  </head>
  <body>
    <?php
/*
Una función hash genera una cadena a partir de otra, que es la contraseña. La idea es almacenar en la BBDD hash(contraseña) y usar esto para validar entrada por login.
Como consecuencia el dueño de la BBDD no conoce las claves de los usuarios
*/

$clave='12345';
print "<p>$clave &rarr; ".md5($clave)."</p>\n";
$clave='libros';
print "<p>$clave &rarr; ".md5($clave)."</p>\n";
$clave='estudiamos en Elorrieta';
print "<p>$clave &rarr; ".md5($clave)."</p>\n";

/*
Una buena función hash debe hacer prácticamente impposible el proceso inverso.

Lamentablemente md5 fue hackeada hace años porque avanzó la técnica matemática 

Busca en google alguna página que te desencripte md5

Por ejemplo https://www.md5online.org/md5-decrypt.html
*/

/*
Por otro lado hay gente que ha hecho BBDD con un montón de posibles password y su hash.

Esto convierte la operación inversa al hash que es astronómicamente cara y larga como para llevar varios años en una query que dura un segundito

Sellaman rainbow tables o tablas arco iris
*/
/*
Podemos intentar tener un md5 privado. Es decir que la cadena hash que genere en mi máquina sea distinta de la que generaría en otras. Para ello le ponemos "sal". Esto es una cadena que definimos nosotros con la que hacemos operaciones a nivel de bit antes de encriptar la password.

Por ejemplo, la sal es "elorrieta-errekamari"

Antes de encriptar "libros" hago un "OR" a nivel de bit entre las dos cadenas

Almaceno md5("libros"|"elorrieta-errekamari") 
*/
/*
El algoritmo crypt exige sal
*/
print "<p>".crypt('libros','hola')."</p>\n";
/*
Otra opción es password_encrypt
*/
print "<p>libros &rarr;".password_hash('libros',PASSWORD_BCRYPT )."</p>\n";

/*
Una forma de comparar hashes podría ser tratarlo como "objetos cadena" pero en general preferimos comparar byte a byte.
La función adecuada strcmp

*/
$cadena1="HOLA";
$cadena2="ADIOS";

/*
QUé valores puede tomar strcmp($cadena1,$cadena2)

positivo si $cadena1 > $cadena2
negativo si $cadena1 < $cadena2
0        si $cadena1 == $cadena2

CIERTO si $cadena1 < $cadena2
CIERTO si $cadena1 > $cadena2
FALSO  si $cadena1 == $cadena2
*/
$password_introducida="HOLA";
$password_almacenada="HOLA";
// $password_almacenada="ADIOS";

if(strcmp($password_introducida,$password_almacenada)==0){
    print "<p>access granted</p>\n";
}

if(!strcmp($password_introducida,$password_almacenada)){
    print "<p>access granted</p>\n";
}

    ?>

  </body>
</html>