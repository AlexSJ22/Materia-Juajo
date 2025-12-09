<!DOCTYPE html>
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
/*
Un array asociativo es una colección ordenada de parejas. 
El primer miembro de la pareja es la "clave" y puede ser un número o una cadena. 

El segundo miembro es el dato y puede ser de un tipo mucho más complejo. Lo llamamos "valor".

Si el dato es un array, hablamos de array doble, triple.

De nuevo, como en el caso del array de claves numéricas, lo más sencillo es declararlo directamente

*/
$alumno['nombre']="Luisito";
$alumno['apellidos']="Liusitez Lisitagoitia";
$alumno['edad']=22;
// $alumno['aficiones']=array("correr","saltar","nadar");
print "<pre>".print_r($alumno,true)."</pre>\n";

print "<p>Saludos $alumno[nombre] $alumno[apellidos], tienes $alumno[edad] años.</p>\n";

print "<p>Saludos ".$alumno['nombre']." ".$alumno['apellidos'].", tienes ".$alumno['edad']." años.</p>\n";

$otro=array(
    'nombre' => 'Pepito',
    'apellidos' => 'Pepìtez Pepitabeitia',
    'edad' => 35,
);

$otro['nombre']='Joseba';

print "<pre>".print_r($otro,true)."</pre>\n";
/*
Podemos recorrer un array asociativo de dos maneras
*/
foreach($alumno as $tipodato => $dato){
    print "<p>\$alumno[$tipodato]=$dato</p>\n";
    $dato="NADA";//No ocurre nada en el array
    // $tipodato="NADA";//No ocurre nada en el array
    // $alumno[$tipodato]="NADA";//Me cargo el array
}

print "<pre>".print_r($alumno,true)."</pre>\n";
/*
Podemos usar foreach sin las claves, cuando sólo nos interesan los valores
*/

foreach($otro as $dato){
    print "<p>$dato</p>\n";
}
/*
Hay toda una categoría de funciones de array en PHP.
Entre ellas hay dos que "separan" las parejas de un array asociativo
*/

print "<pre>\$alumno: ".print_r($alumno,true)."</pre>\n";

$claves=array_keys($alumno);
$valores=array_values($alumno);

print "<pre>\$claves: ".print_r($claves,true)."</pre>\n";
print "<pre>\$valores: ".print_r($valores,true)."</pre>\n";
    ?>
  </body>
</html>