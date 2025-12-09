
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php
    ini_set('display_errors','On');
    error_reporting(E_ALL & ~E_DEPRECATED);
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones de fecha en PHP</title>
  </head>
  <body>
  <h1>Funciones de fecha en PHP</h1>
    <p>En sistemas operativos, la marca de fecha o <strong>timestamp</strong>. Es el número de segundos desde el 1 de enero de 1970</p>
  <p>Si usamos la función <code>strftime</code> se obtiene con %s</p>
    <?php
    setlocale(LC_ALL,"Spanish_Spain.utf8","es_ES.utf8");
    // "Hoy es lunes 30 de septiembre de 2024"
    print strftime("<p>Hoy es %A %e %B de %G</p>");
    
    print "<p>El timestamp se puede obtener con <code>time():</code>".time()."</p>\n";
    
    print "<p>También se obtiene con strftime y el parámetro %s: ".strftime("%s")."</p>\n";
/*
El timestamp es un entero y permite cálculos muy fáciles
*/
// Queremos la fecha de mañana y pasado
    print strftime("<p>Hoy es %A %e %B de %G</p>",time()+24*60*60);
    print strftime("<p>Hoy es %A %e %B de %G</p>",time()+2*24*60*60);
// Queremos avanzar un año 
print strftime("<p>Hoy es %A %e de %B de %G</p>",time()+365*24*60*60);
// Queremos retroceder un año
print strftime("<p>Hoy es %A %e de %B de %G</p>",time()-365*24*60*60);
// queremos ver el día de la semana que nació alguien 1/10/2003
$cumple=mktime(0,0,0,7,27,2004);
print "<p>Fecha de nacimiento: ".number_format($cumple,0,"'",".")."</p>\n";
print strftime("<p>Corresponde a %A %e de %B de %G</p>",$cumple);
$segundos_vividos=time()-mktime(0,0,0,7,27,2004);
print "<p>Has vivido: ".number_format($segundos_vividos,0,"'",".")." segundos</p>\n";
/*
Calcular los años (de 365 días). meses (de 30 días), días  hh:mm:ss vividos por Ibai Torre
*/
$anyos=floor($segundos_vividos/(365*24*60*60));
print "<p>$anyos años</p>\n";
$resto=$segundos_vividos-$anyos*(365*24*60*60);
$meses=floor($resto/(30*24*60*60));
print "<p>$meses meses</p>\n";
$resto=$resto-$meses*(30*24*60*60);
$dias=floor($resto/(24*60*60));
print "<p>$anyos años, $meses meses y $dias días</p>\n";
/////////////////////////////////////////////////////////////////////////
print "<hr>\n";

$cadena_fecha="next friday";

print "<p>Expresión \"$cadena_fecha\"</p>\n";

$fecha=strtotime($cadena_fecha);

print strftime("<p>%A día %e de %B de %G a las %H:%M:%S</p>",$fecha);

/////////////////////////////////////////////////////////////////////////
print "<hr>\n";

$cadena_fecha="noon";

print "<p>Expresión \"$cadena_fecha\"</p>\n";

$fecha=strtotime($cadena_fecha);

print strftime("<p>%A día %e de %B de %G a las %H:%M:%S</p>",$fecha);  ?>
  </body>
</html>