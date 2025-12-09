<!DOCTYPE html>
<!--
Guarda los datos de provincias.php y los incluyes en tu programa 23_formulario_de_provincias.php como fichero externo.
Genera un formulario a partir del array con todas las provincias con su código correspondiente en un drop-down list (desplegable).
Deben aparecer las provincias ordenadas alfabéticamente.
Recoge el dato en otro fichero 23_recoger_provincia.php que diga "Has elegido la provincia 40 que es Segovia" 

Puedes comprobar que el dato sea correcto con array_key_exists() y en caso de que no lo sea usar die() para terminar
-->
<html lang="es">
  <head>
    <?php
    ini_set('display_errors','On');
    error_reporting(E_ALL);
    ?>
    <meta charset="UTF-8">
    <title>Formulario de provincias</title>
  </head>
  <body>
  <p>Enunciado en el código fuente como comentario</p>
<?php
require_once "datos/provincias.php";
setlocale(LC_ALL,'spanish_Spain.utf8','es_ES.utf8');
asort($provincia,SORT_LOCALE_STRING);
// print "<pre>".print_r($provincia,true)."</pre>\n";
print <<<FORM1
<form action="23_recibir_provincia.php" method="GET">
<select name="prov">
<option value="0" selected>-- seleccionar provincia --</option>

FORM1;
foreach($provincia as $codigo => $nombre){
    print "\t<option value=\"$codigo\">$nombre</option>\n";
}
print <<<FORM2
</select>
<input type="submit">
</form>
FORM2;
?>
<!--
<form action="23_recibir_provincia.php" method="GET">
<select name="prov">
    <option value="4">Almería</option>
    <option value="1">Araba/Álava</option>
    <option  value="33">Asturias</option>
</select>
<input type="submit">
</form>
-->
  </body>
</html>